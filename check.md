@extends('layouts.Client.master')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mt-5">
        <h2 class="mb-4">Xác nhận đơn hàng</h2>
        <form action="{{ route('placeOrder') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-4 mb-30">
                    <h3 class="order__subtitle">THÔNG TIN ĐỊA CHỈ</h3>
                    <div class="form-group">
                        <label for="province">Tỉnh/Thành phố:</label>
                        <select id="province" name="province" class="form-control">
                            <option value="">Chọn tỉnh thành</option>
                            <!-- Options will be populated by AJAX -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="district">Quận/Huyện:</label>
                        <select id="district" name="district" class="form-control">
                            <option value="">Chọn quận huyện</option>
                            <!-- Options will be populated by AJAX -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ward">Phường/Xã:</label>
                        <select id="ward" name="ward" class="form-control">
                            <option value="">Chọn phường xã</option>
                            <!-- Options will be populated by AJAX -->
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 mb-30">
                    <h3 class="order__subtitle">THỜI GIAN NHẬN HÀNG</h3>
                    <div class="form-group pl-10 mb-2">
                        <label class="radio-styled">
                            <input class="radio-styled__input" type="radio" checked name="delivery_time" value="0" required>
                            <span class="radio-styled__icon"></span>
                            <span>Trong giờ hành chính</span>
                        </label>
                    </div>
                    <div class="form-group pl-10">
                        <label class="radio-styled">
                            <input class="radio-styled__input" type="radio" name="delivery_time" value="1" required>
                            <span class="radio-styled__icon"></span>
                            <span>Ngoài giờ hành chính</span>
                        </label>
                    </div>
                    <h3 class="order__subtitle mt-20">HÌNH THỨC THÀNH TOÁN</h3>
                    <div class="form-group pl-10 mb-2">
                        <label class="radio-styled">
                            <input class="radio-styled__input" type="radio" checked name="payment_method" value="0" required>
                            <span class="radio-styled__icon"></span>
                            <span>Thanh Toán Tiền Mặt</span>
                        </label>
                        <label class="radio-styled">
                            <input class="radio-styled__input" type="radio" name="payment_method" value="1" required>
                            <span class="radio-styled__icon"></span>
                            <span>Thanh Toán Chuyển khoản</span>
                        </label>
                    </div>
                </div>
                <div class="col-lg-4 mb-30">
                    <h3 class="order__subtitle">ĐƠN HÀNG</h3>
                    <ul class="order__list list-unstyled">
                        @foreach (session()->get('cart', []) as $item)
                            <li class="order__list-item mb-3">
                                <div class="product-3 d-flex align-items-center">
                                    <a class="product-3__iwrap" href="{{ route('product-checkout.show', $item['id']) }}">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="img-fluid" style="max-width: 100px;">
                                    </a>
                                    <div class="media-body ml-3">
                                        <h4 class="product-3__title">
                                            <a class="text-dark" href="{{ route('product-checkout.show', $item['id']) }}">{{ $item['name'] }}</a>
                                        </h4>
                                        <p class="mb-1">Giá: {{ number_format($item['price'], 0, ',', '.') }} VND</p>
                                        <p class="text-700 text-danger ">
                                            {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VND
                                        </p>
                                        <p class="mb-0">Số lượng: {{ $item['quantity'] }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="order__total d-flex justify-content-between align-items-center mt-3">
                        <span class="font-weight-bold">Tổng tiền:</span>
                        <span class="text-danger font-weight-bold">{{ number_format(array_sum(array_map(function ($item) {
                            return $item['price'] * $item['quantity'];
                        }, session()->get('cart', []))), 0, ',', '.') }} VND</span>
                    </div>
                    <button style="background-color: #006800" class="btn btn-success btn-block mt-3 mb-5 text-uppercase rounded-18">ĐẶT HÀNG</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       $(document).ready(function() {
    // Load provinces on page load
    $.ajax({
        url: '/api/provinces',
        method: 'GET',
        success: function(data) {
            let provinceSelect = $('#province');
            provinceSelect.empty();
            provinceSelect.append('<option value="">Chọn tỉnh thành</option>');
            $.each(data, function(key, value) {
                provinceSelect.append('<option value="' + value.province_id + '">' + value.name + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error('Error fetching provinces:', error);
        }
    });

    // Load districts based on selected province
    $('#province').change(function() {
    let provinceId = $(this).val();
    console.log('Selected province ID:', provinceId); // Debugging line
    if (provinceId) {
        $.ajax({
            url: '/api/districts/' + provinceId,
            method: 'GET',
            success: function(data) {
                let districtSelect = $('#district');
                districtSelect.empty();
                districtSelect.append('<option value="">Chọn quận huyện</option>');
                $.each(data, function(key, value) {
                    districtSelect.append('<option value="' + value.district_id + '">' + value.name + '</option>');
                });
                $('#ward').empty().append('<option value="">Chọn phường xã</option>'); // Clear wards
            },
            error: function(xhr, status, error) {
                console.error('Error fetching districts:', error);
            }
        });
    } else {
        $('#district').empty().append('<option value="">Chọn quận huyện</option>');
        $('#ward').empty().append('<option value="">Chọn phường xã</option>');
    }
});

    // Load wards based on selected district
    $('#district').change(function() {
        let districtId = $(this).val();
        $.ajax({
            url: '/api/wards/' + districtId,
            method: 'GET',
            success: function(data) {
                let wardSelect = $('#ward');
                wardSelect.empty();
                wardSelect.append('<option value="">Chọn phường xã</option>');
                $.each(data, function(key, value) {
                    wardSelect.append('<option value="' + value.wards_id + '">' + value.name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching wards:', error);
            }
        });
    });
});

    </script>
@endsection
