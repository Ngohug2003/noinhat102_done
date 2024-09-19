<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->select('id', 'name', 'views', 'status', 'image', 'created_at', 'updated_at', 'created_by', 'updated_by', 'slug')
            ->with(['creator', 'updater'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.Admin.Posts.index', compact('posts'));
    }

    public function create()
    {
        return view('pages.Admin.Posts.create_tintuc');
    }

    public function store(StorePostRequest $request)
    {
        try {
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
            } else {
                $imageName = null;
            }

            $post = [
                'name' => $request->name,
                'content' => $request->content,
                'image' => $imageName,
                'created_by' => auth()->user()->id,
                'slug' => Str::slug($request->name), // Tạo slug từ tên bài viết
            ];
            Post::query()->create($post);
            return redirect()->back()->with('success', 'Thêm tin tức thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error: ' . $th->getMessage());
        }
    }

    public function edit(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('pages.Admin.Posts.edit_post', compact('post'));
    }

    public function update(Request $request, string $slug)
    {
        try {
            $post = Post::where('slug', $slug)->firstOrFail();

            if ($request->hasFile('image')) {
                if ($post->image && file_exists(public_path('images/' . $post->image))) {
                    unlink(public_path('images/' . $post->image));
                }

                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $post->image = $imageName;
            }

            $post->name = $request->name;
            $post->content = $request->content;
            $post->status = $request->status;
            $post->updated_by = auth()->id();
            $newSlug = Str::slug($request->name);
            if ($newSlug !== $post->slug) {
                // Đảm bảo slug là duy nhất
                if (Post::where('slug', $newSlug)->exists()) {
                    $newSlug .= '-' . time();
                }
                $post->slug = $newSlug;
            }
            $post->save();

            return redirect()->back()->with('success', 'Cập nhật tin tức thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error: ' . $th->getMessage());
        }
    }
    public function destroy(string $slug)
    {
        try {
            $post = Post::where('slug', $slug)->firstOrFail();

            if ($post->image && file_exists(public_path('images/' . $post->image))) {
                unlink(public_path('images/' . $post->image));
            }
            $post->delete();
            return redirect()->route('admin.posts.index')->with('success', 'Xóa tin tức thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error: ' . $th->getMessage());
        }
    }
}
