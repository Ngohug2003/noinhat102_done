<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all(); 
        return view('pages.Admin.Categorys.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.Admin.Categorys.create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('Categorys'), $imageName);
            } else {
                $imageName = null;
            }

            $category = [
                'name' => $request->name,
                'image' => $imageName,
                'created_by' => auth()->user()->id,
            ];
            Category::query()->create($category);
            return redirect()->back()->with('success', 'Thêm danh mục thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('pages.Admin.Categorys.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $category = Category::findOrFail($id);

            if ($request->hasFile('image')) {
                if ($category->image && file_exists(public_path('Categorys/' . $category->image))) {
                    unlink(public_path('Categorys/' . $category->image));
                }

                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('Categorys'), $imageName);
                $category->image = $imageName;
            }

            $category->name = $request->name;
            $category->updated_by = auth()->user()->id;
            $category->save();

            return redirect()->route('listDanhMuc')->with('success', 'Cập nhật danh mục thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);

            if ($category->image && file_exists(public_path('Categorys/' . $category->image))) {
                unlink(public_path('Categorys/' . $category->image));
            }

            $category->delete();

            return redirect()->route('admin.listDanhMuc')->with('success', 'Xóa danh mục thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error: ' . $th->getMessage());
        }
    }
    
}
