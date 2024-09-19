<div class="container mt-5">
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Chỉnh sửa sản phẩm</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Hình ảnh sản phẩm chính -->
                        <div class="form-group">
                            <label for="image">Hình Ảnh</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="img-thumbnail mt-2" width="150">
                            @endif
                        </div>

                        <!-- Danh mục sản phẩm -->
                        <div class="form-group">
                            <label for="category">Danh mục</label>
                            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" {{ $product->category_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tên sản phẩm -->
                        <div class="form-group">
                            <label for="name">Sản phẩm</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Giá sản phẩm -->
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $product->price) }}">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Giảm giá sản phẩm -->
                        <div class="form-group">
                            <label for="discount">Giảm giá (%)</label>
                            <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{ old('discount', $product->discount) }}">
                            @error('discount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mô tả ngắn -->
                        <div class="form-group">
                            <label for="short_description">Mô tả ngắn</label>
                            <textarea id="short_description" name="short_description" class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description',  $product->short_description) }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nội dung sản phẩm -->
                        <div class="form-group">
                            <label for="description">Nội Dung</label>
                            <textarea id="noi_dung" name="description" class="form-control @error('description') is-invalid @enderror" rows="10">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Gallery -->
                        <div class="form-group">
                            <label for="gallery">Ảnh slide</label>
                            <div id="galleryContainer">
                                @foreach ($product->galleries as $gallery)
                                <div class="row mb-3 align-items-center gallery-row">
                                    <div class="col-md-8">
                                        <input type="hidden" name="existing_galleries[]" value="{{ $gallery->image }}">
                                        @error('gallery.*')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-start align-items-center">
                                        <!-- Custom Checkbox -->
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="deleteGallery{{ $gallery->id }}" name="delete_galleries[]" value="{{ $gallery->id }}">
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
                                        <input type="file" class="form-control @error('gallery.*') is-invalid @enderror" name="galleries[]">
                                        @error('gallery.*')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-start">
                                        <button type="button" class="btn btn-success btnStyle me-2" id="addGalleryRowBtn">+</button>
                                        <button type="button" class="btn btn-danger btnStyle removeRowBtn">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-4">Cập nhật sản phẩm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('addGalleryRowBtn').addEventListener('click', function() {
        var galleryContainer = document.getElementById('galleryContainer');
        var newRow = document.createElement('div');
        newRow.classList.add('row', 'mb-3', 'align-items-center', 'gallery-row');
        newRow.innerHTML = `
            <div class="col-md-8">
                <input type="file" class="form-control" name="galleries[]">
                <input type="hidden" name="existing_galleries[]">
            </div>
            <div class="col-md-4 d-flex justify-content-start">
                <button type="button" class="btn btn-danger removeRowBtn">-</button>
            </div>
        `;
        galleryContainer.appendChild(newRow);
        attachRemoveRowEvent(newRow.querySelector('.removeRowBtn'));
    });

    function attachRemoveRowEvent(button) {
        button.addEventListener('click', function() {
            var galleryContainer = document.getElementById('galleryContainer');
            if (galleryContainer.getElementsByClassName('gallery-row').length > 1) {
                var row = this.closest('.gallery-row');
                row.remove();
            } else {
                alert("Không thể xóa");
            }
        });
    }

    document.querySelectorAll('.removeRowBtn').forEach(function(button) {
        attachRemoveRowEvent(button);
    });
</script>
