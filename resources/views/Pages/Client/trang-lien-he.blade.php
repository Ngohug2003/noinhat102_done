@extends('layouts.Client.master')
@section('content')
<div class="page-wrapper">
    <div class="banner-wrapper">
        <div class="banner-top">
            <img src="{{asset('noithat102/images/banner-top.jpg')}}" alt="">
        </div>
        <h1 class="page-title">Liên hệ</h1>
    </div>

    <div class="page-contact py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info">
                        <h2 class="company-name text-uppercase fw-700 size26 mb-4">Nội thất óc chó 102</h2>
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="icon-box"><i class="fas fa-map-marker-alt fa-fw"></i></div>
                            <strong>Showroom: Tòa Nhà R+, Số 03 Ngõ 23 Lê Văn Lương,<br> Q.Thanh Xuân, Hà Nội.</strong>
                        </div>
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="icon-box"><i class="fas fa-phone-alt fa-fw"></i></div>
                            <strong>Hotline: <a href="tel:08 141 3333">08 141 3333</a></strong>
                        </div>
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="icon-box"><i class="fas fa-envelope fa-fw"></i></div>
                            <strong>Email:<a href="mailto:contact@rcong.vn">noithat102@gmail.vn</a></strong>
                        </div>
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="icon-box"><i class="fas fa-home fa-fw"></i></div>
                            <strong>Website:<a href="#"></a>www.noithat102.vn</a></strong>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <h2 class="form-title fw-700 text-uppercase size26">Liên hệ</h2>
                        <p>Nhận ngay ưu đãi đặc biệt từ Showroom & tư vấn miễn phí từ đội ngũ kiến trúc sư của chúng tôi</p>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Họ tên">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Số điện thoại">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Địa chỉ căn hộ">
                            </div>
                            <div class="form-group">
                                <textarea type="email" class="form-control" rows="4" placeholder="Lời nhắn của bạn"></textarea>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn bg-primary btn-submit text-white text- fw-700 text-uppercase">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="map pt-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.0743459744094!2d105.80017578647153!3d20.98965673075716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acbfe683c48f%3A0x5e18835309d23628!2zMzEgxJAuIE5ndXnhu4VuIFhp4buDbiwgVGhhbmggWHXDom4gTmFtLCBUaGFuaCBYdcOibiwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1703132324384!5m2!1svi!2s"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection