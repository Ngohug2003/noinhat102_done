@extends('layouts.Client.master')
@section('content')
<div class="page-wrapper">
    <div class="banner-wrapper">
        <div class="banner-top">
            <img src="{{asset('noithat102/images/banner-top.jpg')}}" alt="">
        </div>
        <h1 class="page-title">Video nổi bật</h1>
    </div>

    <div class="video-archive py-4 my-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="video-box">
                        <div class="video-image mb-3">
                            <a href="https://www.youtube.com/watch?v=XhixdLPAeFA&t=1s" data-fancybox="video" class="d-block">
                                <img src="{{asset('noithat102/images/thi-cong-biet-thu-parkcity.jpg')}}" alt="">
                                <div class="icon-play"><i class="fas fa-play-circle fa-fw"></i></div>
                            </a>
                        </div>
                        <div class="video-text text-center">
                            <h3 class="video-title size20 fw-700 text-uppercase">
                                <a href="https://www.youtube.com/watch?v=XhixdLPAeFA&t=1s" class="text-primary" data-fancybox="video">TRẢI NGHIỆM THỰC TẾ BIỆT THỰ PARKCITY 2,5 TRIỆU ĐÔ SIÊU SANG</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="video-box">
                        <div class="video-image mb-3">
                            <a href="https://www.youtube.com/watch?v=XhixdLPAeFA&t=1s" data-fancybox="video" class="d-block">
                                <img src="{{asset('noithat102/images/thi-cong-biet-thu-parkcity.jpg')}}" alt="">
                                <div class="icon-play"><i class="fas fa-play-circle fa-fw"></i></div>
                            </a>
                        </div>
                        <div class="video-text text-center">
                            <h3 class="video-title size20 fw-700 text-uppercase">
                                <a href="https://www.youtube.com/watch?v=XhixdLPAeFA&t=1s" class="text-primary" data-fancybox="video">TRẢI NGHIỆM THỰC TẾ BIỆT THỰ PARKCITY 2,5 TRIỆU ĐÔ SIÊU SANG</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="video-box">
                        <div class="video-image mb-3">
                            <a href="https://www.youtube.com/watch?v=XhixdLPAeFA&t=1s" data-fancybox="video" class="d-block">
                                <img src="{{asset('noithat102/images/thi-cong-biet-thu-parkcity.jpg')}}" alt="">
                                <div class="icon-play"><i class="fas fa-play-circle fa-fw"></i></div>
                            </a>
                        </div>
                        <div class="video-text text-center">
                            <h3 class="video-title size20 fw-700 text-uppercase">
                                <a href="https://www.youtube.com/watch?v=XhixdLPAeFA&t=1s" class="text-primary" data-fancybox="video">TRẢI NGHIỆM THỰC TẾ BIỆT THỰ PARKCITY 2,5 TRIỆU ĐÔ SIÊU SANG</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="video-box">
                        <div class="video-image mb-3">
                            <a href="https://www.youtube.com/watch?v=XhixdLPAeFA&t=1s" data-fancybox="video" class="d-block">
                                <img src="{{asset('noithat102/images/thi-cong-biet-thu-parkcity.jpg')}}" alt="">
                                <div class="icon-play"><i class="fas fa-play-circle fa-fw"></i></div>
                            </a>
                        </div>
                        <div class="video-text text-center">
                            <h3 class="video-title size20 fw-700 text-uppercase">
                                <a href="https://www.youtube.com/watch?v=XhixdLPAeFA&t=1s" class="text-primary" data-fancybox="video">TRẢI NGHIỆM THỰC TẾ BIỆT THỰ PARKCITY 2,5 TRIỆU ĐÔ SIÊU SANG</a>
                            </h3>
                        </div>
                    </div>
                </div>

            </div>

            <nav aria-label="Page navigation" class="navigation-wrapper pt-4 mb-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">‹</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item current"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">›</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>

</div>
@endsection