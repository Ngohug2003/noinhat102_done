@extends('layouts.Client.master')
@section('content')
<div class="page-wrapper">

    <div class="project-single py-4 my-1">

        <div class="project-gallery mb-4">
            <div class="swiper-button-next project-gallery-next"><i class="far fa-chevron-right fa-fw"></i></div>
            <div class="swiper-button-prev project-gallery-prev"><i class="far fa-chevron-left fa-fw"></i></div>
            <div class="swiper-container project-gallery-slide">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="{{asset('noithat102/images/tam-nhin-va-su-menh.jpg')}}" class="gallery-image" data-fancybox="gallery"><img src="{{asset('noithat102/images/tam-nhin-va-su-menh.jpg')}}"></a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{asset('noithat102/images/tam-nhin-va-su-menh.jpg')}}" class="gallery-image" data-fancybox="gallery"><img src="{{asset('noithat102/images/tam-nhin-va-su-menh.jpg')}}"></a>
                    </div>
                    <div class="swiper-slide">
                        <a href="{{asset('noithat102/images/tam-nhin-va-su-menh.jpg')}}" class="gallery-image" data-fancybox="gallery"><img src="{{asset('noithat102/images/tam-nhin-va-su-menh.jpg')}}"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mb-4">
            <div class="row no-gutters">
                <div class="col-lg-6 mb-4">
                    <div class="project-image">
                        <img src="{{asset('noithat102/images/tam-nhin-va-su-menh.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="project-content bg-f4f4f4 p-2 p-lg-5 h-100">
                        <h2>Biệt Thự Vinhomes Ocean Park – Gia Lâm</h2>
                        <p>BIỆT THỰ VINHOMES OCEANPARK 500m2–CẮT BỎ CỘT MỞ KHÔNG GIAN</p>
                        <p>Công trình khẳng định sự độc đáo của <strong>Nội thất 102</strong> trong việc đưa ra các ý tưởng thiết kế và thi công nội thất gỗ óc chó, đó là thay đổi mặt bằng công năng đến biến một công trình theo khuôn
                            mẫu sẵn có trở thành một tác phẩm riêng mang sắc Nội thất 102.</p>
                        <p>Những bức tường, cột ngăn cách các không gian trong biệt thự Vinhomes Ocean Park Gia Lâm không làm khó được Nội thất 102 trong việc kiến tạo một “KIỆT TÁC” đầy ấn tượng. Từ ý tưởng thiết kế đến phương
                            án thi công đã hoàn toàn thuyết phục được gia chủ mang lại sự hài lòng tuyệt đối cho vị khách hàng có nhiều trải nghiệm.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <h2 class="related-projects text-center text-uppercase size28 fw-700 mb-4">Dự án tiêu biểu</h2>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="project-box">
                        <div class="project-image">
                            <a href="#"><img src="{{asset('noithat102/images/du-an.jpg')}}" alt=""></a>
                        </div>
                        <div class="project-text text-center">
                            <div class="cat-name bg-primary text-white text-uppercase fw-600 mb-3">Thi công nội thất</div>
                            <h3 class="project-name size18 fw-700 text-uppercase"><a href="#" class="text-white">Công Thiết Kế Nội Thất Parkcity</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="project-box">
                        <div class="project-image">
                            <a href="#"><img src="{{asset('noithat102/images/du-an.jpg')}}" alt=""></a>
                        </div>
                        <div class="project-text text-center">
                            <div class="cat-name bg-primary text-white text-uppercase fw-600 mb-3">Thi công nội thất</div>
                            <h3 class="project-name size18 fw-700 text-uppercase"><a href="#" class="text-white">Công Thiết Kế Nội Thất Parkcity</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="project-box">
                        <div class="project-image">
                            <a href="#"><img src="{{asset('noithat102/images/du-an.jpg')}}" alt=""></a>
                        </div>
                        <div class="project-text text-center">
                            <div class="cat-name bg-primary text-white text-uppercase fw-600 mb-3">Thi công nội thất</div>
                            <h3 class="project-name size18 fw-700 text-uppercase"><a href="#" class="text-white">Công Thiết Kế Nội Thất Parkcity</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="project-box">
                        <div class="project-image">
                            <a href="#"><img src="{{asset('noithat102/images/du-an.jpg')}}" alt=""></a>
                        </div>
                        <div class="project-text text-center">
                            <div class="cat-name bg-primary text-white text-uppercase fw-600 mb-3">Thi công nội thất</div>
                            <h3 class="project-name size18 fw-700 text-uppercase"><a href="#" class="text-white">Công Thiết Kế Nội Thất Parkcity</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="project-box">
                        <div class="project-image">
                            <a href="#"><img src="{{asset('noithat102./images/du-an.jpg')}}" alt=""></a>
                        </div>
                        <div class="project-text text-center">
                            <div class="cat-name bg-primary text-white text-uppercase fw-600 mb-3">Thi công nội thất</div>
                            <h3 class="project-name size18 fw-700 text-uppercase"><a href="#" class="text-white">Công Thiết Kế Nội Thất Parkcity</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="project-box">
                        <div class="project-image">
                            <a href="#"><img src="{{asset('noithat102/images/du-an.jpg')}}" alt=""></a>
                        </div>
                        <div class="project-text text-center">
                            <div class="cat-name bg-primary text-white text-uppercase fw-600 mb-3">Thi công nội thất</div>
                            <h3 class="project-name size18 fw-700 text-uppercase"><a href="#" class="text-white">Công Thiết Kế Nội Thất Parkcity</a></h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection