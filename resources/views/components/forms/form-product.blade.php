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
   
    <div class="card">
        <div class="card-header text-center">
            <h1>Thêm sản phẩm</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.StoreProduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image">Hình Ảnh</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Danh mục</label>
                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Sản phẩm</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="discount">Giảm giá (%)</label>
                    <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount">
                    @error('discount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="short_description">Mô tả ngắn</label>
                    <textarea id="short_description" name="short_description" class="form-control @error('short_description') is-invalid @enderror"></textarea>
                    @error('short_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Nội Dung</label>
                    <textarea id="noi_dung" name="description" class="form-control @error('description') is-invalid @enderror" rows="10"></textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gallery">Gallery</label>
                    <div id="galleryContainer">
                        <div class="row mb-3 align-items-center gallery-row">
                            <div class="col-md-8">
                                <input type="file" class="form-control @error('galleries.*') is-invalid @enderror" multiple name="galleries[]">
                                @error('galleries.*')
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
                <button type="submit" class="btn btn-primary btn-block mt-4">Thêm sản phẩm</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('addGalleryRowBtn').addEventListener('click', function() {
        var galleryContainer = document.getElementById('galleryContainer');
        var rowCount = galleryContainer.getElementsByClassName('gallery-row').length;
        var newRow = document.createElement('div');
        newRow.classList.add('row', 'mb-3', 'align-items-center', 'gallery-row');

        newRow.innerHTML = `
            <div class="col-md-8">
                <input type="file" class="form-control" name="galleries[]">
            </div>
            <div class="col-md-4 d-flex justify-content-start">
                <button type="button" class="btn btn-danger removeRowBtn">-</button>
            </div>
        `;

        galleryContainer.appendChild(newRow);

        // Attach event listener to the new remove button
        attachRemoveRowEvent(newRow.querySelector('.removeRowBtn'));
    });

    function attachRemoveRowEvent(button) {
        button.addEventListener('click', function() {
            var galleryContainer = document.getElementById('galleryContainer');
            if (galleryContainer.getElementsByClassName('gallery-row').length > 1) {
                var row = this.closest('.gallery-row');
                row.remove();
            } else {
                alert("Không thể xóa hàng duy nhất");
            }
        });
    }

    // Attach event listeners to the initial remove buttons
    document.querySelectorAll('.removeRowBtn').forEach(function(button) {
        attachRemoveRowEvent(button);
    });
</script>
