@extends('Layouts.Admin.master')

@section('content')
<div class="container-fluid px-4">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Chỉnh sửa Slide</h1>

        <div class="card p-4 shadow-sm">
            <form action="{{ route('admin.updateSlider', $slide->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Slide Title -->
                <div class="form-group mb-3">
                    <label for="slide_title" class="form-label">Tiêu đề Slide:</label>
                    <input type="text" class="form-control" id="slide_title" name="title" value="{{ old('title', $slide->title) }}">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Slide Description -->
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Mô tả Slide:</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $slide->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Active Status -->
                <div class="form-group mb-3">
                    <label for="active" class="form-label">Trạng thái:</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="active" name="active" {{ $slide->active ? 'checked' : '' }}>
                        <label class="form-check-label" for="active">Hoạt động</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="gallery">Ảnh slide</label>
                    <div id="galleryContainer">
                        @foreach ($slide->gallerySlides as $gallery)
                        <div class="row mb-3 align-items-center gallery-row">
                            <div class="col-md-8">
                                <input type="hidden" name="existing_galleries[]" value="{{ $gallery->image }}">
                                @error('gallery.*')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div  class="col-md-4 d-flex justify-content-start align-items-center">
                                <!-- Custom Checkbox -->
                                <div  class="form-check">
                                    <input  type="checkbox" class="form-check-input" id="deleteGallery{{ $gallery->id }}" name="delete_galleries[]" value="{{ $gallery->id }}">
                                    <label class="form-check-label" for="deleteGallery{{ $gallery->id }}">Xóa</label>
                                </div>
                            </div>
                            <!-- Display existing image -->
                            <div class="col-md-12 mt-2">
                                <img src="{{ Storage::url($gallery->image) }}" alt="Gallery Image" class="img-thumbnail" width="150">
                            </div>
                        </div>
                        @endforeach
                        <div class="row mb-3 align-items-center gallery-row">
                            <div class="col-md-8">
                                <input multiple type="file" class="form-control @error('gallery.*') is-invalid @enderror" name="gallery_images[]">
                                @error('gallery.*')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection
