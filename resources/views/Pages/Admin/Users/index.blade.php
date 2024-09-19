@extends('Layouts.Admin.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="my-4">Danh sách User</h1>
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
                   <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                   </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
