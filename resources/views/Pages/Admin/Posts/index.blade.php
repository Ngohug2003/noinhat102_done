@extends('Layouts.Admin.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="my-4">Danh sách tin tức</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Name</th>
                        <th scope="col">Views</th>
                        <th scope="col">Status</th>
                        <th scope="col">Image</th>
                        <th scope="col">Người tạo</th>
                        <th scope="col">Người người cập nhập</th>
                        <th scope="col">Thời gian tạo</th>
                        <th scope="col">Thời gian cập nhật</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $key => $value)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->views }}</td>
                            <td>
                                <span
                                    class="badge {{ $value->status == 0 ? 'badge-danger text-warning' : 'badge-success text-danger' }}">
                                    {{ $value->status == 0 ? 'Hiển thị' : 'Ẩn' }}
                                </span>
                            </td>
                            <td>
                                @if ($value->image)
                                    <img src="{{ asset('images/' . $value->image) }}" alt="{{ $value->name }}"
                                        class="img-thumbnail" width="100">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $value->creator->name ?? 'N/A' }}</td>
                            <td>{{ $value->updater->name ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($value->created_at)->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($value->updated_at)->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}
                            </td>
                            <td>
                                {{-- {{ route('posts.show', $value->id) }} --}}
                                <a href="" class="btn btn-info btn-sm" title="Xem">
                                    <i class="fas fa-eye"></i> Xem
                                </a>

                                <a href="{{ route('admin.edittintuc', $value->slug) }}" class="btn btn-warning btn-sm"
                                    title="Chỉnh sửa">
                                    <i class="fas fa-edit"></i> Chỉnh sửa
                                </a>
                                <form action="{{ route('admin.destroytintuc', $value->slug) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Xóa"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                        <i class="fas fa-trash"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $posts->links() }} --}}
        </div>
    </div>
@endsection
