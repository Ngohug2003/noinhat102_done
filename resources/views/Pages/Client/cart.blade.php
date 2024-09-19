@extends('layouts.Client.master')
@section('content')
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Cảm ơn',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 10000
            });
        });
    </script>
@endif

<div class="container mt-5">
    <div>
        @if (!empty($cart) && count($cart) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng giá</th>
                        <td>Hành động</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td><img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" width="50"></td>
                            <td>
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control quantity-input" data-id="{{ $item['id'] }}" style="width: 60px;" />
                            </td>
                            <td>{{ number_format($item['price'], 0, ',', '.') }} VND</td>
                            <td class="total-price">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VND</td>
                            <td>
                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between mt-4 mb-5">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Mua hàng tiếp</a>
                <a style="background-color: #006800 " href="{{ route('cart.checkout') }}" class="btn btn-primary">Thanh toán</a>
            </div>
        @else
            <p>Giỏ hàng của bạn đang trống.</p>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lắng nghe sự kiện thay đổi số lượng sản phẩm
        document.querySelectorAll('.quantity-input').forEach(function(input) {
            input.addEventListener('change', function() {
                var productId = this.getAttribute('data-id');
                var newQuantity = this.value;

                // Gửi yêu cầu AJAX để cập nhật số lượng sản phẩm
                fetch('{{ route('cart.update', '') }}/' + productId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        quantity: newQuantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Cập nhật tổng giá trực tiếp trên trang
                        var totalPriceElement = input.closest('tr').querySelector('.total-price');
                        totalPriceElement.textContent = new Intl.NumberFormat('vi-VN').format(data.new_total_price) + ' VND';
                    } else {
                        alert('Cập nhật số lượng thất bại.');
                    }
                });
            });
        });
    });
</script>
@endsection
