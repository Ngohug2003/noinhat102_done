@extends('layouts.Client.master')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display error message -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mt-5">
        <h2 class="mb-4">Xác nhận đơn hàng</h2>
        <form action="{{route('placeOrder')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-4 mb-30">
                    <h3 class="order__subtitle">THÔNG TIN KHÁCH HÀNG</h3>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Họ và tên" id="name" name="name"
                            required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email" id="email" name="email"
                            required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" placeholder="Số điện thoại" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="province">Tỉnh/Thành phố:</label>
                        <select id="province" name="province_id" class="form-control">
                            <option value="">Chọn tỉnh thành</option>
                            <!-- Option các tỉnh thành sẽ được load ở đây bằng JavaScript/AJAX -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="district">Quận/Huyện:</label>
                        <select id="district" name="district_id" class="form-control">
                            <option value="">Chọn quận huyện</option>
                            <!-- Option các quận huyện sẽ được load ở đây -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ward">Phường/Xã:</label>
                        <select id="ward" name="ward_id" class="form-control">
                            <option value="">Chọn phường xã</option>
                            <!-- Option các phường xã sẽ được load ở đây -->
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Địa chỉ nhận hàng" name="address" required>
                    </div>
                    <div class="form-group">
                        <label>Lưu ý đơn hàng</label>
                        <textarea class="form-control" name="note" rows="3" placeholder="Viết chú ý, yêu cầu hoá đơn GTGT,..."></textarea>
                    </div>
                </div>
                <div class="col-lg-4 mb-30">
                    <h3 class="order__subtitle">THỜI GIAN NHẬN HÀNG</h3>
                    <div class="form-group pl-10 mb-2">
                        <label class="radio-styled">
                            <input class="radio-styled__input" type="radio" checked name="delivery_time" value="0"
                                required>
                            <span class="radio-styled__icon"></span>
                            <span>Trong giờ hành chính</span>
                        </label>
                    </div>
                    <div class="form-group pl-10">
                        <label class="radio-styled">
                            <input class="radio-styled__input" type="radio" name="delivery_time" value="1"
                                required>
                            <span class="radio-styled__icon"></span>
                            <span>Ngoài giờ hành chính</span>
                        </label>
                    </div>
                    <h3 class="order__subtitle mt-20">HÌNH THỨC THÀNH TOÁN</h3>
                    <div class="form-group pl-10 mb-2">
                        <label class="radio-styled">
                            <input class="radio-styled__input" type="radio" checked name="payment_method" value="0"
                                required>
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
                                    <a class="product-3__iwrap" href="#">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="img-fluid"
                                            style="max-width: 100px;">
                                    </a>
                                    <div class="media-body ml-3">
                                        <h4 class="product-3__title">
                                            <a class="text-dark"
                                                href="#">{{ $item['name'] }}</a>
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
                        <span
                            class="text-danger font-weight-bold">{{ number_format(
                                array_sum(
                                    array_map(function ($item) {
                                        return $item['price'] * $item['quantity'];
                                    }, session()->get('cart', [])),
                                ),
                                0,
                                ',',
                                '.',
                            ) }}
                            VND</span>
                    </div>
                    <button style="background-color: #006800"
                        class="btn btn-success btn-block mt-3 mb-5 text-uppercase rounded-18">ĐẶT HÀNG</button>
                </div>

            </div>
        </form>
    </div>
@endsection
