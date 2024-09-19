@extends('Layouts.Admin.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="my-4">Danh sách đơn hàng</h1>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Tỉnh</th>
                        <th>Huyện</th>
                        <th>Xã</th>
                        <th>Địa chỉ</th>
                        <th>Thời gian đặt</th>
                        <th>Xem chi tiết</th>
                    </tr>
                </thead>
                <tfoot>

                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Tỉnh</th>
                        <th>Huyện</th>
                        <th>Xã</th>
                        <th>Địa chỉ</th>
                        <th>Thời gian đặt</th>
                        <th>Xem chi tiết</th>

                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->customer->email }}</td>
                            <td>{{ $order->customer->phone }}</td>
                            <td>{{ $order->customer->province->name ?? 'N/A' }}</td>
                            <td>{{ $order->customer->district->name ?? 'N/A' }}</td>
                            <td>{{ $order->customer->ward->name ?? 'N/A' }}</td>
                            <td>{{ $order->customer->address }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i:s') }}</td>
                            @foreach ($order->orderItems as $item)
                                <td>
                                    <a class="btn btn-success" href="{{ route('orders.show',$item->id) }}">Xem</a>
                                </td>
                            @endforeach


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
