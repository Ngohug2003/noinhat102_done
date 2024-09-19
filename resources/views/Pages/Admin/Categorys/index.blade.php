@extends('Layouts.Admin.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="my-4">Danh sách danh mục</h1>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Người tạo</th>
                        <th>Người cập nhập</th>
                        <th>Thời gian tạo</th>
                        <th>Thời gian cập nhật</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Người tạo</th>
                        <th>Người cập nhập</th>
                        <th>Thời gian tạo</th>
                        <th>Thời gian cập nhật</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($categories as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>
                                @if ($value->image)
                                    <img src="{{ asset('Categorys/' . $value->image) }}" alt="{{ $value->name }}"
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



                                <a href=" {{ route('admin.editCategory', $value->id) }}" class="btn btn-warning btn-sm"
                                    title="Chỉnh sửa">
                                    <i class="fas fa-edit"></i> Chỉnh sửa
                                </a>


                                {{-- {{ route('posts.destroy', $value->id) }} --}}
                                <form action="{{ route('admin.destroyDanhMuc', $value->id) }}" method="POST"
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
        </div>

    </div>
@endsection
