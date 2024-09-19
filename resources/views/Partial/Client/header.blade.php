<header>
    <div class="header-main">
        <div class="container">
            <div class="main-nav">
                <div class="overlay-mobile"></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
                </button>
                <a class="navbar-brand mobile wow zoomIn  animated" href="{{route('index')}}">
                    <image src="{{asset('noithat102/images/logo_102.png')}}" alt="">
                </a>
                <nav class="navbar navbar-expand-lg navbar-light bg mobile p-0">
                    <a class="navbar-brand" href=".">
                        <image src="{{asset('noithat102/images/logo_102.png')}}" alt="">
                    </a>
                    <div class="collapse navbar-collapse mobile" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                               
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('index')}}">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Giới thiệu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Gỗ óc chó</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('products.index') }}">Sản phẩm</a>
                                <span class="btn-dropmenu"><i class="fas fa-caret-down fa-fw"></i></span>
                                <ul class="sub-menu">
                                    @if(isset($categories))
                                        @foreach ($categories as $item)
                                            <li><a href="{{ route('products.index', ['category' => $item->slug]) }}" class="nav-link">{{ $item->name }}</a></li>
                                        @endforeach
                                    @else
                                        <li><a href="#" class="nav-link">Không có danh mục nào</a></li>
                                    @endif
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Dự án</a>
                                <span class="btn-dropmenu"><i class="fas fa-caret-down fa-fw"></i></span>
                                <ul class="sub-menu">
                                    <li><a href="./tin-tuc-chung" class="nav-link">Thiết kế nội thất</a></li>
                                    <li><a href="./thong-tin-du-an" class="nav-link">Thi công nội thất</a></li>
                                    <li><a href="./catalogue" class="nav-link">Thiết kế kiến trúc</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Video</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('trang-tin-tuc')}}">Tin tức</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="">Tuyển dụng</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('lien-he')}}">Liên hệ </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('cart.view')}}">Giỏ hàng</a>
                            </li>
                        </ul>
                    </div>
                    <!--end navbar-collapse-->
                </nav>
            </div>
            <!--end-main-menu-->
        </div>
    </div>
</header>





