{{-- resources/views/orders/show.blade.php --}}
@extends('Layouts.Admin.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="my-4">Chi tiết đơn hàng</h1>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Thông tin đơn hàng</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tbody>

                        <tr>
                            <th>Tên</th>
                            <td>{{ $order->customer->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $order->customer->email }}</td>
                        </tr>
                        <tr>
                            <th>Số điện thoại</th>
                            <td>{{ $order->customer->phone }}</td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td>{{ $order->customer->address }}</td>
                        </tr>
                        <tr>
                            <th>Tỉnh</th>
                            <td>{{ $order->customer->province->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Huyện</th>
                            <td>{{ $order->customer->district->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Xã</th>
                            <td>{{ $order->customer->ward->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Tổng đơn hàng</th>
                            <td>{{ number_format($order->total_price, 0, ',', '.') }} VNĐ</td>
                        </tr>
                        <tr>
                            <th>Trạng thái</th>
                            @if ($order->status == 'Chưa xác nhận')
                                <td class="text-danger">Chưa xác nhận</td>
                            @elseif ($order->status == 'Đã xác nhận')
                                <td class="text-success">Đã xác nhận</td>
                            @elseif ($order->status == 'Đang giao hàng')
                                <td class="">Đang giao hàng</td>
                            @elseif ($order->status == 'Đã giao hàng')
                                <td class="">Đã giao hàng</td>
                            @else
                                <td>Không xác định</td>
                            @endif

                        </tr>
                        <tr>
                            <th>Ghi Chú</th>
                            <td>{{ $order->note }}</td>
                        </tr>
                        <tr>
                            <th>Thời gian nhận hàng</th>
                            @php
                                if ($order->delivery_time == 0) {
                                    echo '<td>Trong giờ hành chính</td>';
                                }
                                if ($order->delivery_time == 1) {
                                    echo '<td>Ngoài giờ hành chính</td>';
                                }
                            @endphp
                        </tr>
                        <tr>
                            <th>Phương thức thanh toán</th>
                            @php
                                if ($order->payment_method == 0) {
                                    echo '<td>Thanh toán tiền mặt</td>';
                                }
                                if ($order->payment_method == 1) {
                                    echo '<td>Thanh toán chuyển khoản</td>';
                                }
                            @endphp

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title">Danh sách sản phẩm</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>
                                    @if ($item->product->image)
                                        <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}"
                                            width="100">
                                    @else
                                <td>Chưa có ảnh</td>
                        @endif
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
