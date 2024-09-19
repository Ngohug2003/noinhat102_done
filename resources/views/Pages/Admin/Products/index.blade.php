@extends('Layouts.Admin.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="my-4">Danh sách danh mục</h1>
        <a class="btn btn-warning mt-5 mb-5" 
                       href="{{ route('export') }}">
                              Export User Data
                      </a>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Giá</th>
                            <th>Giảm giá (%)</th>
                            <th>Hình ảnh</th>
                            <th>Hành động</th>
                        </tr>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Giảm giá (%)</th>   
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ number_format($product->price) }} VND</td>
                            <td>{{ $product->discount ?? '0' }}%</td>
                            {{-- <td>{{number_format($product->price - ($product->price * ($product->discount / 100)))}} VND</td> --}}
                            <td>
                                @if ($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" width="100">
                                @else
                                    <span>Chưa có ảnh</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.editProduct', $product->id) }}"
                                    class="btn btn-primary btn-sm">Sửa</a>
                                <form action="{{ route('admin.destroyProduct', $product->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Bạn có muốn xóa sản phẩm ?');" type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                   
                                </form>
                            </td>
                        </tr>
                        {{-- {{ $product->links() }} --}}
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
