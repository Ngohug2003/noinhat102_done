@extends('Layouts.Admin.master')
@section('content')
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="container-fluid px-4">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Thêm Slide và Gallery Slide</h1>

        <div class="card p-4 shadow-sm">
            <form action="{{ route('admin.StoreSlider') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Slide Title -->
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Tiêu đề Slide:</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        placeholder="Nhập tiêu đề cho slide" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Slide Description -->
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Mô tả Slide:</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3"
                        placeholder="Nhập mô tả cho slide">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Gallery Images -->
                <div class="form-group mb-3">
                    <label for="gallery_images" class="form-label">Hình ảnh slider Gallery:</label>
                    <input type="file" class="form-control-file @error('gallery_images') is-invalid @enderror" id="gallery_images" name="gallery_images[]" multiple
                        accept="image/*">
                    @error('gallery_images')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Lưu</button>
            </form>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        max-width: 600px;
    }

    h1 {
        font-size: 24px;
        color: #333;
    }

    .card {
        background-color: #fff;
        border: 1px solid #e3e6f0;
        border-radius: 0.5rem;
    }

    .form-label {
        font-weight: 600;
        color: #495057;
    }

    .form-control {
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    .is-invalid {
        border-color: #e3342f;
    }

    .invalid-feedback {
        color: #e3342f;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
@endsection
