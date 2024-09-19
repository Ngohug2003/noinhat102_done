<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
        }
        .invoice {
            border: 2px solid #000;
            padding: 20px;
            margin-top: 20px;
        }
        .invoice h1 {
            text-align: center;
            text-transform: uppercase;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .invoice .header, .invoice .customer, .invoice .footer {
            margin-bottom: 20px;
        }
        .header div, .customer div {
            margin-bottom: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        .footer div {
            margin-top: 20px;
        }
        .footer .signature {
            float: right;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Cảm ơn bạn đã đặt hàng!</h1>
    <p>Đơn hàng của bạn đã được đặt thành công. Dưới đây là thông tin đơn hàng:</p>
    <div class="invoice">
        <h1>Thông tin đơn hàng</h1>
        <div class="header">
            <div>Ngày: {{ now()->format('d-m-Y') }}</div>
            <div>Đơn vị cung cấp : Noithat102</div>
            <div>Mã số thuế: ***************</div>

        </div>

        <div class="customer">
            <div>Tên khách hàng: {{ $orderDetails['name'] }}</div>
            <div>SĐT: {{ $orderDetails['phone'] }}</div>
            <div>Email: {{ $orderDetails['email'] }}</div>
            <div>Địa chỉ: {{ $orderDetails['address'] }} , {{ $orderDetails['ward'] }} , {{ $orderDetails['district'] }} , {{ $orderDetails['province'] }}</div>
        </div>

        <table>
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên hàng hóa dịch vụ</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
                <th>Chi tiết sản phẩm</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orderDetails['items'] as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ $item['price'] }} VND</td>
                    <td>{{ $item['total'] }} VND</td>
                    <td>
                        <a href="{{ $item['link'] }}">{{ $item['name'] }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="footer">
            <div>Tổng tiền: {{ $orderDetails['total_price'] }} VND</div>
            <div>Thời gian nhận hàng: {{ $orderDetails['delivery_time'] }}</div>
            <div>Phương thức thanh toán: {{ $orderDetails['payment_method'] }}</div>
         
            <div class="signature">
                <div>Người mua hàng</div>
                <div>(Ký, ghi rõ họ tên)</div>
            </div>
        </div>
    </div>
</body>
</html>
