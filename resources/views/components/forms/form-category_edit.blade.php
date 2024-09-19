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
                    <h1>Cập nhật danh mục sản phẩm</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.updateDanhMuc', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    
                        <div class="form-group">
                            <label for="name">Danh mục</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}">
                        </div>
                       
                        <div class="form-group">
                            <label for="image">Hình Ảnh</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if($category->image)
                                <img src="{{ asset('Categorys/' . $category->image) }}" alt="{{ $category->name }}" width="100">
                            @endif
                        </div>
                        
                    
                        <button type="submit" class="btn btn-primary btn-block mt-4">Cập nhật danh mục</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
