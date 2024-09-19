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
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <div class="container">
        <div class="">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Thêm User</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.StoreUser') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nhập tên" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Nhập email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Nhập mật khẩu">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label for="role">Vai trò</label>
                            <select name="role" class="form-select">
                                <option value="">Chọn vai trò</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div> --}}
                        
                        <button type="submit" class="btn btn-primary btn-block mt-4">Thêm User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
