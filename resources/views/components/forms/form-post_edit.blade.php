<div class="container mt-5">
    {{-- <div class="row"> --}}
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
        {{-- <div class="col-md-10 offset-md-1"> --}}
        <div class="">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Thêm Tin Tức</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.updatetintuc',$post->slug)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Tiêu Đề</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$post->name}}">
                        </div>
                        <div class="form-group">
                            <label for="noi_dung">Nội Dung</label>
                            <textarea  id="noi_dung" name="content" class="form-control" rows="10">{{$post->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Hình ảnh hiện tại</label>
                            @if ($post->image)
                                <div>
                                    <img src="{{ asset('images/' . $post->image) }}" alt="Current image" style="max-width: 150px; max-height: 150px;">
                                </div>
                            @else
                                <p>Chưa có hình ảnh</p>
                            @endif
                        </div>
                        <div  class="form-group">
                            <label for="image">Thay đổi hình ảnh</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select class="form-control" id="status" name="status">
                                <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Hiển thị</option>
                                <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-4">Chỉnh sửa Tin Tức</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
