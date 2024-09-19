@extends('layouts.Client.master')
@section('content')
<div class="slider-home">
    <div class="slider-wrapper">
        <div class="swiper-container slide-home">
            <div class="swiper-button-next slide-home-next"><i class="fal fa-angle-right fa-fw"></i></div>
            <div class="swiper-button-prev slide-home-prev"><i class="fal fa-angle-left fa-fw"></i></div>
            <div class="swiper-wrapper">
                @if ($activeSlide && $activeSlide->gallerySlides->isNotEmpty())
                    @foreach ($activeSlide->gallerySlides as $gallery)
                        <div class="swiper-slide wow fadeIn animated">
                            <div class="box-img">
                                <a href="#">
                                    <img src="{{ Storage::url($gallery->image) }}" alt="Banner Image" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Chua co banner</p> 
                @endif
            </div>
            
        </div>
    </div>
</div>

<section class="section home-project">
    <div class="container">
        <div class="tab-project mb-4">
            <ul class="nav mb-4 pb-1 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item mt-3">
                    <a class="nav-link active" id="project-1-tab" data-toggle="pill" href="#project-1" role="tab" aria-controls="project-1" aria-selected="true">Thiết kế nội thất</a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link" id="project-2-tab" data-toggle="pill" href="#project-2" role="tab" aria-controls="project-2" aria-selected="false">Thi công nội thất</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="project-1" role="tabpanel" aria-labelledby="project-1-tab">
                    <div class="project-slide-wrapper position-relative">
                        <div class="swiper-button-next project-home-next"><i class="far fa-chevron-right fa-fw"></i></div>
                        <div class="swiper-button-prev project-home-prev"><i class="far fa-chevron-left fa-fw"></i></div>
                        <div class="swiper-container home-project-slide">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide wow fadeIn animated">
                                    <a href="/trang-chi-tiet-du-an.html">
                                        <img src="{{asset('noithat102')}}/images/anh-du-an-1.jpg" alt="">
                                        <h4 class="project-tabs-title text-center size18 fw-600 mb-0">Thi Công Nội Thất Biệt Thự Liền Kề Parkcity</h4>
                                    </a>
                                </div>
                                <div class="swiper-slide wow fadeIn animated">
                                    <a href="/trang-chi-tiet-du-an.html">
                                        <img src="{{asset('noithat102')}}/images/anh-du-an-2.jpg" alt="">
                                        <h4 class="project-tabs-title text-center size18 fw-600 mb-0">Thi Công Nội Thất Biệt Thự Liền Kề Parkcity</h4>
                                    </a>
                                </div>
                                <div class="swiper-slide wow fadeIn animated">
                                    <a href="/trang-chi-tiet-du-an.html">
                                        <img src="{{asset('noithat102')}}/images/anh-du-an-3.jpg" alt="">
                                        <h4 class="project-tabs-title text-center size18 fw-600 mb-0">Thi Công Nội Thất Biệt Thự Liền Kề Parkcity</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="project-2" role="tabpanel" aria-labelledby="project-2-tab">
                    <div class="project-slide-wrapper position-relative">
                        <div class="swiper-button-next project-home-next-2"><i class="far fa-chevron-right fa-fw"></i></div>
                        <div class="swiper-button-prev project-home-prev-2"><i class="far fa-chevron-left fa-fw"></i></div>
                        <div class="swiper-container home-project-slide-2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide wow fadeIn animated">
                                    <a href="/trang-chi-tiet-du-an.html">
                                        <img src="{{asset('noithat102/images/anh-du-an-1.jpg')}}" alt="">
                                        <h4 class="project-tabs-title text-center size18 fw-600 mb-0">Thi Công Nội Thất Biệt Thự Liền Kề Parkcity</h4>
                                    </a>
                                </div>
                                <div class="swiper-slide wow fadeIn animated">
                                    <a href="/trang-chi-tiet-du-an.html">
                                        <img src="{{asset('noithat102/images/anh-du-an-2.jpg')}}" alt="">
                                        <h4 class="project-tabs-title text-center size18 fw-600 mb-0">Thi Công Nội Thất Biệt Thự Liền Kề Parkcity</h4>
                                    </a>
                                </div>
                                <div class="swiper-slide wow fadeIn animated">
                                    <a href="/trang-chi-tiet-du-an.html">
                                        <img src="{{asset('noithat102/images/anh-du-an-3.jpg')}}" alt="">
                                        <h4 class="project-tabs-title text-center size18 fw-600 mb-0">Thi Công Nội Thất Biệt Thự Liền Kề Parkcity</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="/trang-du-an.html" class="button btn-viewmore text-uppercase size16 text-primary d-inline-block">Xem thêm <i class="far fa-chevron-right fa-fw"></i></a>
        </div>
    </div>
</section>

<section class="section home-about pt-2">
    <div class="container">
        <div class="col-12">
            <div class="container-section-title text-center px-1 px-md-3 mb-4 pb-1 wow fadeInUp animated">
                <h2 class="section-title size36 fw-600 mb-3">NỘI THẤT CAO CẤP <span>102</span></h2>
                <p>Là thương hiệu Nội thất gỗ óc chó uy tín hàng đầu tại Việt Nam, Nội thất 102 cung cấp các giải pháp tổng thể từ kiến trúc – thiết kế nội thất và thi công hoàn thiện. Với sứ mệnh là chuyên gia kiến tạo không gian cao cấp, nổi bật
                    là biệt thự, chung cư penthouse… Chúng tôi luôn không ngừng nghiên cứu, sáng tạo để trao tặng đến quý vị những giá trị sống hoàn thiện nhất.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid px-lg-0">
        <div class="row no-gutters">
            <div class="col-lg-8 mb-4 wow fadeInUp animated">
                <div class="about-image">
                    <img class="w-100"  src="{{asset('noithat102/images/about-1.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-4 wow fadeInUp animated">
                <div class="about-text d-flex flex-column justify-content-center text-justify py-4">
                    <h3>SỰ <span style="color: #006800;font-weight: bold;">HOÀN HẢO</span></h3>
                    <p>
                        Tối ưu diện tích và công năng sử dụng để tôn lên sự tinh tế, sang trọng và đẳng cấp của nội thất gỗ óc chó, Nội thất 102 luôn lắng nghe và thấu hiểu khách hàng để biến ngôi nhà thành “tổ ấm” hoàn hảo nhất. Đó chính là nơi thoải mái, yên bình nhất của
                        các thành viên trong gia đình. Hoàng Tiến Quỳnh Kiến trúc sư – CEO R Cộng
                    </p>
                    <p><strong>Hoàng Tiến Quỳnh</strong><br><em>Kiến trúc sư – CEO R Cộng</em></p>
                    <div class="mt-2">
                        <a href="#" class="button btn-viewmore text-uppercase size16 text-primary d-inline-block">Xem thêm <i class="far fa-chevron-right fa-fw"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-lg-0">
        <div class="row no-gutters">

            <div class="col-lg-4 mb-4 wow fadeIn animated">

                <div class="about-text d-flex flex-column justify-content-center text-justify py-4">

                    <div class="wp-block-column two-up-slider__content is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:33.33%">
                        <h2 class="wp-block-heading has-text-color" style="color:#006800;font-size:25px">SHOWROOM <br><strong style="color:#333">NỘI THẤT 102</strong></h2>
                        <p class="text-justify">Showroom Nội thất Nội thất 102 – Không gian nghệ thuật trưng bày những tinh hoa của nội thất gỗ óc chó tự nhiên.&nbsp; Những tuyệt tác tinh tế và độc đáo trong bộ sưu tập nội thất mới nhất dẫn đầu xu hướng thiết kế đang
                            đón chờ những vị khách yêu thích không gian sống hiện đại, sang trọng và đẳng cấp. Quý vị hãy ghé thăm và cùng cảm nhận sự khác biệt trong từng không gian của Showroom Nội thất Nội thất 102..</p>
                        <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
                        <p><strong>Showroom Hà Nội: Tòa nhà R+, Số 03/23 Lê Văn Lương, P. Nhân Chính, Q. Thanh Xuân, Hà Nội</strong>.</p>
                        <p><strong>Showroom Sài Gòn: &nbsp;01 –&nbsp; Lakeview&nbsp; 2, số 21 Tố Hữu, P. Thủ Thiêm, Quận 2, Hồ Chí</strong> <strong>Minh.</strong></p>

                    </div>

                    <div class="mt-2">
                        <a href="#" class="button btn-viewmore text-uppercase size16 text-body d-inline-block"><strong>HOT LINE:</strong> 098 141 3333</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 wow fadeIn animated">
                <div class="about-image">
                    <div class="swiper-container about-image-slide">
                        <div class="swiper-button-next about-slide-next"><i class="fal fa-chevron-right fa-fw"></i></div>
                        <div class="swiper-button-prev about-slide-prev"><i class="fal fa-chevron-left fa-fw"></i></div>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{asset('noithat102/images/slide-image.jpg')}}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('noithat102/images/slide-image.jpg')}}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('noithat102/images/slide-image.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section pt-2">
    <div class="container">
        <h2 class="section-title text-center size26 fw-700 mb-4 wow fadeInUp animated"><span>VIDEO</span><br> XƯỞNG SẢN XUẤT NỘI THẤT 102</h2>
        <div class="about-video">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/XhixdLPAeFA?si=Z9NtxDnkpJu84Sbm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<section class="section-experience">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 wow fadeIn animated">
                <div class="experience-text text-white d-flex flex-column justify-content-center py-4">
                    <h2 style="font-size:25px;"><strong style="color: #006800;">13+</strong><br>NĂM KINH NGHIỆM</h2>
                    <p>&nbsp;</p>
                    <h3 style="font-size: 18px;"><strong>Trong lĩnh vực thiết kế và thi công phân khúc nội thất cao cấp.</strong></h3>
                    <p>13 năm&nbsp; – chặng đường xây dựng và phát triển với những thử thách để tạo dựng lên Nội thất 102 vững chắc trong tâm trí của khách hàng. Tri kỷ từ ngay lần đầu gặp gỡ đến khi hoàn thiện “trao chìa khóa vàng nhận nhà ước mơ”,
                        đơn vị đã làm trọn nghĩa vẹn tình của một chuyên gia kiến tạo không gian cao cấp. Và chắc chắn, Nội thất 102 sẽ luôn đồng hành với khách hàng lâu dài trong quá trình trải nghiệm cuộc sống tại ngôi nhà với nội thất gỗ óc
                        chó.
                    </p>
                    <div class="mt-4">
                        <a href="#" class="button btn-viewmore text-uppercase size18 text-body d-inline-block"><strong style="color: #fff;">HOT LINE:</strong><strong style="color: #006800;"> 098 141 3333</strong></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 wow fadeIn animated">
                <div class="experience-video">
                    <div class="embed-responsive embed-responsive-16by9 h-100">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/XhixdLPAeFA?si=Z9NtxDnkpJu84Sbm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-f4f4f4">
    <div class="container-fluid">
        <div class="container-section-title text-center mb-4">
            <span class="icon_svg wow fadeIn animated"><svg width="42" height="41" viewBox="0 0 53 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.25902 22.9411L2.25898 22.9411L2.2555 22.9501C1.49727 24.8998 1.09375 26.6928 1.09375 28.3125C1.09375 31.4819 2.18008 34.188 4.35539 36.3634C6.53071 38.5387 9.2368 39.625 12.4062 39.625C15.3896 39.625 17.9849 38.523 20.1446 36.3634C22.3199 34.188 23.4062 31.4819 23.4062 28.3125C23.4062 25.6111 22.6135 23.3253 20.9609 21.5483C19.7242 20.1386 18.2912 19.1496 16.6686 18.6128L23.7137 7.76336L24.2548 6.93004L23.425 6.38358L17.0187 2.16483L16.1963 1.62325L15.6422 2.43721L5.64845 17.1155C4.06695 19.3305 2.92504 21.2761 2.25902 22.9411ZM29.2903 22.9411L29.2902 22.9411L29.2867 22.9501C28.5285 24.8998 28.125 26.6928 28.125 28.3125C28.125 31.4819 29.2113 34.188 31.3866 36.3634C33.562 38.5387 36.2681 39.625 39.4375 39.625C42.4208 39.625 45.0162 38.523 47.1759 36.3634C49.3512 34.188 50.4375 31.4819 50.4375 28.3125C50.4375 25.6111 49.6447 23.3253 47.9921 21.5483C46.7554 20.1386 45.3224 19.1496 43.6998 18.6128L50.7449 7.76336L51.2861 6.93004L50.4562 6.38358L44.05 2.16483L43.2276 1.62325L42.6734 2.43721L32.6797 17.1154C31.0982 19.3305 29.9563 21.2761 29.2903 22.9411Z" stroke="#006800" stroke-width="2"></path>
                </svg>
            </span>
            <h2 class="section-title mt-4 size24 fw-700 wow fadeInUp animated">KHÁCH HÀNG NÓI VỀ <span>NỘI THẤT 102</span></h2>
        </div>
        <div class="testimonials-slide-wrapper position-relative">
            <div class="swiper-button-next testimonials-next"><i class="fal fa-chevron-right fa-fw"></i></div>
            <div class="swiper-button-prev testimonials-prev"><i class="fal fa-chevron-left fa-fw"></i></div>
            <div class="swiper-container testimonials-slide">
                <div class="swiper-wrapper">
                    <div class="swiper-slide wow fadeIn animated">
                        <div class="testimonials-box">
                            <div class="testimonials-image mb-4">
                                <a href="https://www.youtube.com/watch?v=Gom7pMgeQg8" data-fancybox="video"> <img src="{{asset('noithat102/images/khach-hang.jpg')}}" alt="" title="Chị Hà">
                                    <span class="icon_svg">
                                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="64" height="64" rx="32" fill="black" fill-opacity="0.7"></rect>
                                            <path d="M45 30.2679C46.3333 31.0378 46.3333 32.9622 45 33.7321L27 44.1244C25.6667 44.8942 24 43.9319 24 42.3923L24 21.6077C24 20.0681 25.6667 19.1058 27 19.8756L45 30.2679Z" fill="white"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="testimonials-tex text-center">
                                <h3 class="testimonials-title mb-2"><a href="https://www.youtube.com/watch?v=Gom7pMgeQg8" data-fancybox="video" title="Chị Hà" target="_blank" class="text-body fw-700">Chị Hà</a></h3>
                                <p class="testimonials-localtion size16 font-italic text-primary">Khu Biệt Thự Parkcity – Hà Nội</p>
                            </div>

                        </div>
                    </div>
                    <div class="swiper-slide wow fadeIn animated">
                        <div class="testimonials-box">
                            <div class="testimonials-image mb-4">
                                <a href="https://www.youtube.com/watch?v=Gom7pMgeQg8" data-fancybox="video"> <img src="{{asset('noithat102/images/khach-hang.jpg')}}" alt="" title="Chị Hà">
                                    <span class="icon_svg">
                                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="64" height="64" rx="32" fill="black" fill-opacity="0.7"></rect>
                                            <path d="M45 30.2679C46.3333 31.0378 46.3333 32.9622 45 33.7321L27 44.1244C25.6667 44.8942 24 43.9319 24 42.3923L24 21.6077C24 20.0681 25.6667 19.1058 27 19.8756L45 30.2679Z" fill="white"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="testimonials-tex text-center">
                                <h3 class="testimonials-title mb-2"><a href="https://www.youtube.com/watch?v=Gom7pMgeQg8" data-fancybox="video" title="Chị Hà" target="_blank" class="text-body fw-700">Chị Hà</a></h3>
                                <p class="testimonials-localtion size16 font-italic text-primary">Khu Biệt Thự Parkcity – Hà Nội</p>
                            </div>

                        </div>
                    </div>
                    <div class="swiper-slide wow fadeIn animated">
                        <div class="testimonials-box">
                            <div class="testimonials-image mb-4">
                                <a href="https://www.youtube.com/watch?v=Gom7pMgeQg8" data-fancybox="video"> <img src="{{asset('noithat102/images/khach-hang.jpg')}}" alt="" title="Chị Hà">
                                    <span class="icon_svg">
                                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="64" height="64" rx="32" fill="black" fill-opacity="0.7"></rect>
                                            <path d="M45 30.2679C46.3333 31.0378 46.3333 32.9622 45 33.7321L27 44.1244C25.6667 44.8942 24 43.9319 24 42.3923L24 21.6077C24 20.0681 25.6667 19.1058 27 19.8756L45 30.2679Z" fill="white"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="testimonials-tex text-center">
                                <h3 class="testimonials-title mb-2"><a href="https://www.youtube.com/watch?v=Gom7pMgeQg8" data-fancybox="video" title="Chị Hà" target="_blank" class="text-body fw-700">Chị Hà</a></h3>
                                <p class="testimonials-localtion size16 font-italic text-primary">Khu Biệt Thự Parkcity – Hà Nội</p>
                            </div>

                        </div>
                    </div>
                    <div class="swiper-slide wow fadeIn animated">
                        <div class="testimonials-box">
                            <div class="testimonials-image mb-4">
                                <a href="https://www.youtube.com/watch?v=Gom7pMgeQg8" data-fancybox="video"> <img src="{{asset('noithat102/images/khach-hang.jpg')}}" alt="" title="Chị Hà">
                                    <span class="icon_svg">
                                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="64" height="64" rx="32" fill="black" fill-opacity="0.7"></rect>
                                            <path d="M45 30.2679C46.3333 31.0378 46.3333 32.9622 45 33.7321L27 44.1244C25.6667 44.8942 24 43.9319 24 42.3923L24 21.6077C24 20.0681 25.6667 19.1058 27 19.8756L45 30.2679Z" fill="white"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="testimonials-tex text-center">
                                <h3 class="testimonials-title mb-2"><a href="https://www.youtube.com/watch?v=Gom7pMgeQg8" data-fancybox="video" title="Chị Hà" target="_blank" class="text-body fw-700">Chị Hà</a></h3>
                                <p class="testimonials-localtion size16 font-italic text-primary">Khu Biệt Thự Parkcity – Hà Nội</p>
                            </div>

                        </div>
                    </div>
                    <div class="swiper-slide wow fadeIn animated">
                        <div class="testimonials-box">
                            <div class="testimonials-image mb-4">
                                <a href="https://www.youtube.com/watch?v=Gom7pMgeQg8" data-fancybox="video"> <img src="{{asset('noithat102/images/khach-hang.jpg')}}" alt="" title="Chị Hà">
                                    <span class="icon_svg">
                                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="64" height="64" rx="32" fill="black" fill-opacity="0.7"></rect>
                                            <path d="M45 30.2679C46.3333 31.0378 46.3333 32.9622 45 33.7321L27 44.1244C25.6667 44.8942 24 43.9319 24 42.3923L24 21.6077C24 20.0681 25.6667 19.1058 27 19.8756L45 30.2679Z" fill="white"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="testimonials-tex text-center">
                                <h3 class="testimonials-title mb-2"><a href="https://www.youtube.com/watch?v=Gom7pMgeQg8" data-fancybox="video" title="Chị Hà" target="_blank" class="text-body fw-700">Chị Hà</a></h3>
                                <p class="testimonials-localtion size16 font-italic text-primary">Khu Biệt Thự Parkcity – Hà Nội</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination testimonials-pagination mt-4"></div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="partner-wrapper">
            <h2 class="section-title text-center size26 fw-700 mb-4 wow fadeInUp animated">TRUYỀN THÔNG NÓI VỀ <span>Nội thất 102</span></h2>
            <div class="swiper-container partner-slide">
                <div class="swiper-wrapper">
                    <div class="swiper-slide wow fadeInUp animated">
                        <a href="#" target="_blank"><img src="{{asset('noithat102/images/logo-1.png')}}" alt="a"></a>
                    </div>
                    <div class="swiper-slide wow fadeInUp animated">
                        <a href="#" target="_blank"><img src="{{asset('noithat102/images/logo-2.png')}}" alt="1"></a>
                    </div>
                    <div class="swiper-slide wow fadeInUp animated">
                        <a href="#" target="_blank"><img src="{{asset('noithat102/images/logo-3.png')}}" alt="2"></a>
                    </div>
                    <div class="swiper-slide wow fadeInUp animated">
                        <a href="#" target="_blank"><img src="{{asset('noithat102/images/logo-4.png')}}" alt="3"></a>
                    </div>
                    <div class="swiper-slide wow fadeInUp animated">
                        <a href="#" target="_blank"><img src="{{asset('noithat102/images/logo-5.png')}}" alt=""></a>
                    </div>
                    <div class="swiper-slide wow fadeInUp animated">
                        <a href="#" target="_blank"><img src="{{asset('noithat102/images/logo-6.png')}}" alt=""></a>
                    </div>
                    <div class="swiper-slide wow fadeInUp animated">
                        <a href="#" target="_blank"><img src="{{asset('noithat102/images/logo-7.png')}}" alt=""></a>
                    </div>
                    <div class="swiper-slide wow fadeInUp animated">
                        <a href="#" target="_blank"><img src="{{asset('noithat102/images/logo-8.png')}}" alt=""></a>
                    </div>
                    <div class="swiper-slide wow fadeInUp animated">
                        <a href="#" target="_blank"><img src="{{asset('noithat102/images/logo-9.png')}}" alt=""></a>
                    </div>
                    <div class="swiper-slide wow fadeInUp animated">
                        <a href="#" target="_blank"><img src="{{asset('noithat102/images/logo-10.png')}}" alt=""></a>
                    </div>
                    <div class="swiper-slide wow fadeInUp animated">
                        <a href="#" target="_blank"><img src="{{asset('noithat102/images/logo-11.png')}}" alt=""></a>
                    </div>
                    <div class="swiper-slide wow fadeInUp animated">
                        <a href="#" target="_blank"><img src="{{asset('noithat102/images/logo-12.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section home-blog bg-f4f4f4">
    <div class="container">
        <h2 class="section-title text-center text-uppercase size26 fw-700 mb-4 pb-2 wow fadeInUp animated">Tin tức nổi bật</h2>
        <div class="row">
            <div class="col-6 col-lg-4 wow fadeInUp animated">
                <div class="post-box">
                    <div class="post-image mb-3">
                        <a href="/trang-chi-tiet-tin.html"><img src="{{asset('noithat102/images/tin-1.webp')}}" alt=""></a>
                    </div>
                    <h3 class="post-title size18 fw-700"><a href="/trang-chi-tiet-tin.html">Đại sứ đồng hành của thương hiệu nội thất gỗ óc chó cao cấp bậc nhất Sài thành</a> </h3>
                </div>
            </div>
            <div class="col-6 col-lg-4 wow fadeInUp animated">
                <div class="post-box">
                    <div class="post-image mb-3">
                        <a href="/trang-chi-tiet-tin.html"><img src="{{asset('noithat102/images/tin-1.webp')}}" alt=""></a>
                    </div>
                    <h3 class="post-title size18 fw-700"><a href="/trang-chi-tiet-tin.html">Đại sứ đồng hành của thương hiệu nội thất gỗ óc chó cao cấp bậc nhất Sài thành</a> </h3>
                </div>
            </div>
            <div class="col-6 col-lg-4 wow fadeInUp animated">
                <div class="post-box">
                    <div class="post-image mb-3">
                        <a href="/trang-chi-tiet-tin.html"><img src="{{asset('noithat102/images/tin-1.webp')}}" alt=""></a>
                    </div>
                    <h3 class="post-title size18 fw-700"><a href="/trang-chi-tiet-tin.html">Đại sứ đồng hành của thương hiệu nội thất gỗ óc chó cao cấp bậc nhất Sài thành</a> </h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section home-faq">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeIn animated">
                <h2 class="section-title size24 text-uppercase fw-700 mb-4">Câu hỏi thường gặp</h2>
                <div class="faq-wrapper">
                    <div id="accordion">
                        <div class="card pl-0">
                            <div class="card-header pl-0" id="heading-1">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed pl-0" data-toggle="collapse" data-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                        Dịch vụ thiết kế thi công của Nội thất 102 có gì đặc biệt?
                              </button>
                                </h5>
                            </div>

                            <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion">
                                <div class="card-body pl-0">
                                    Nội thất 102 là tổng thầu thiết kế thi công nội thất uy tín và chất lượng hàng đầu. Điều đặc biệt của chúng tôi là không bán nội thất đơn thuần mà kiến tạo không gian nội thất gỗ óc chó. Tất cả các dự án của Nội thất 102, chuyên gia kiến tạo không gian
                                    sẽ đưa ra các giải giáp để tối ưu diện tích sử dụng, bố trí sắp xếp nội thất khoa học để trao tặng quý vị ngôi nhà sang trọng và đẳng cấp nhất.
                                </div>
                            </div>
                        </div>

                        <div class="card pl-0">
                            <div class="card-header pl-0" id="heading-2">
                                <h5 class="mb-0">
                                    <button class="btn btn-link pl-0" data-toggle="collapse" data-target="#collapse-2" aria-expanded="true" aria-controls="collapse-2">
                                        Dịch vụ thiết kế thi công của Nội thất 102 có gì đặc biệt?
                              </button>
                                </h5>
                            </div>

                            <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion">
                                <div class="card-body pl-0">
                                    Nội thất 102 là tổng thầu thiết kế thi công nội thất uy tín và chất lượng hàng đầu. Điều đặc biệt của chúng tôi là không bán nội thất đơn thuần mà kiến tạo không gian nội thất gỗ óc chó. Tất cả các dự án của Nội thất 102, chuyên gia kiến tạo không gian
                                    sẽ đưa ra các giải giáp để tối ưu diện tích sử dụng, bố trí sắp xếp nội thất khoa học để trao tặng quý vị ngôi nhà sang trọng và đẳng cấp nhất.
                                </div>
                            </div>
                        </div>

                        <div class="card pl-0">
                            <div class="card-header pl-0" id="heading-3">
                                <h5 class="mb-0">
                                    <button class="btn btn-link pl-0" data-toggle="collapse" data-target="#collapse-3" aria-expanded="true" aria-controls="collapse-3">
                                        Dịch vụ thiết kế thi công của Nội thất 102 có gì đặc biệt?
                              </button>
                                </h5>
                            </div>

                            <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion">
                                <div class="card-body pl-0">
                                    Nội thất 102 là tổng thầu thiết kế thi công nội thất uy tín và chất lượng hàng đầu. Điều đặc biệt của chúng tôi là không bán nội thất đơn thuần mà kiến tạo không gian nội thất gỗ óc chó. Tất cả các dự án của Nội thất 102, chuyên gia kiến tạo không gian
                                    sẽ đưa ra các giải giáp để tối ưu diện tích sử dụng, bố trí sắp xếp nội thất khoa học để trao tặng quý vị ngôi nhà sang trọng và đẳng cấp nhất.
                                </div>
                            </div>
                        </div>

                        <div class="card pl-0">
                            <div class="card-header pl-0" id="heading-4">
                                <h5 class="mb-0">
                                    <button class="btn btn-link pl-0" data-toggle="collapse" data-target="#collapse-3" aria-expanded="true" aria-controls="collapse-4">
                                        Dịch vụ thiết kế thi công của Nội thất 102 có gì đặc biệt?
                              </button>
                                </h5>
                            </div>

                            <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion">
                                <div class="card-body pl-0">
                                    Nội thất 102 là tổng thầu thiết kế thi công nội thất uy tín và chất lượng hàng đầu. Điều đặc biệt của chúng tôi là không bán nội thất đơn thuần mà kiến tạo không gian nội thất gỗ óc chó. Tất cả các dự án của Nội thất 102, chuyên gia kiến tạo không gian
                                    sẽ đưa ra các giải giáp để tối ưu diện tích sử dụng, bố trí sắp xếp nội thất khoa học để trao tặng quý vị ngôi nhà sang trọng và đẳng cấp nhất.
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn animated">
                <div class="consulting-form">
                    <h2 class="section-title size24 text-uppercase fw-700 text-white text-center mb-4">ĐĂNG KÝ NHẬN TƯ VẤN</h2>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Họ tên">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group">
                            <select class="custom-select mr-sm-2">
                            <option selected>Loại hình tư vấn</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <textarea type="email" class="form-control" rows="4" placeholder="Nội dung liên hệ"></textarea>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn bg-primary btn-submit text-white text-uppercase">Đăng ký ngay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection