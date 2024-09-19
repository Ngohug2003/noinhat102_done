<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSlideRequest;
use App\Models\GallerySlide;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $slider = Slide::all();
        return view('Pages.Admin.Slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pages.Admin.Slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSlideRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $dataSlide = [
                    'title' => $request->title,
                    'description' => $request->description,

                ];

                $slide = Slide::create($dataSlide);

                if ($request->hasFile('gallery_images')) {
                    foreach ($request->file('gallery_images') as $image) {
                        $imagePath = $image->store('public/slides', 'public');
                        GallerySlide::create([
                            'slide_id' => $slide->id,
                            'image' => $imagePath,
                        ]);
                    }
                }
            });
            return redirect()->back()->with('success', 'Thêm thành công');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
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
        $slide = Slide::with('gallerySlides')->findOrFail($id); // Lấy slide và các gallery để chỉnh sửa
        return view('Pages.Admin.Slider.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'delete_galleries.*' => 'nullable|exists:gallery_slides,id'
        ]);

        // Find the slide by ID
        $slide = Slide::findOrFail($id);

        // Update slide details
        $slide->title = $request->input('title');
        $slide->description = $request->input('description');
        $slide->active = $request->has('active') ? 1 : 0; // Xử lý trạng thái active

        $slide->save();

        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $path = $file->store('public/galleries');
                $gallery = new GallerySlide();
                $gallery->image = $path;
                $gallery->slide_id = $slide->id;
                $gallery->save();
            }
        }

        // Handle deleting selected gallery images
        if ($request->has('delete_galleries')) {
            $deleteIds = $request->input('delete_galleries');
            foreach ($deleteIds as $id) {
                $gallery = GallerySlide::find($id);
                if ($gallery) {
                    // Delete the image file from storage
                    Storage::delete($gallery->image);
                    // Delete the record from the database
                    $gallery->delete();
                }
            }
        }

        return redirect()->route('admin.editSlider', $slide->id)->with('success', 'Slide updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $slide = Slide::findOrFail($id);

            // Xóa tất cả hình ảnh gallery liên quan
            foreach ($slide->gallerySlides as $gallery) {
                Storage::disk('public')->delete($gallery->image);
                $gallery->delete();
            }

            // Xóa slide
            $slide->delete();

            return redirect()->route('admin.slides.index')->with('success', 'Slide đã được xóa thành công.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:slides,id',
            'active' => 'required|boolean'
        ]);

        $slideId = $request->id;
        $isActive = $request->active;

        try {
            // Nếu slide hiện tại được bật (active = 1)
            if ($isActive) {
                // Tắt tất cả các slide khác
                Slide::where('id', '!=', $slideId)->update(['active' => 0]);
            }

            // Cập nhật trạng thái của slide hiện tại
            $slide = Slide::findOrFail($slideId);
            $slide->active = $isActive ? 1 : 0;
            $slide->save();

            return response()->json(['success' => true, 'message' => 'Cập nhật trạng thái thành công']);
        } catch (\Exception $e) {
            // Ghi log lỗi và trả về phản hồi lỗi
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi']);
        }
    }

    // Kiểm tra số lượng slide đang hoạt động
    public function checkActiveSlides()
    {
        $activeSlideCount = Slide::where('active', 1)->count();
        return response()->json(['activeSlideCount' => $activeSlideCount]);
    }
}
