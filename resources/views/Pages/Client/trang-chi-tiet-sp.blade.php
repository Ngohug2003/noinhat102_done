@extends('layouts.Client.master')
@section('content')
{{-- @if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tạo thông báo thông qua alert JavaScript
        alert('{{ session('success') }}');
    });
</script>
@endif --}}
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Thành công',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        });
    </script>
@endif
    <div class="page-wrapper">
        <div class="product-archive py-4 my-1">
            <div class="container">

                <div class="wrap-breadcrumbs">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb pl-0">
                            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('products.index') }}">Sản phẩm</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('products.index', ['category' => $product->category->slug]) }}">
                                    {{ $product->category->name }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                        </ol>
                    </nav>
                </div>


                <div class="row">
                    <div class="col-lg-7 mb-4">
                        <div class="product-gallery">
                            <div class="swiper-container gallery-1 mb-2">
                                <div class="swiper-wrapper main">
                                    @foreach ($product->galleries as $gallery)
                                        <div class="swiper-slide">
                                            <a href="{{ Storage::url($gallery->image) }}"
                                                data-fancybox="product-gallery"><img
                                                    src="{{ Storage::url($gallery->image) }}" alt=""
                                                    class="w-100" /></a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next gallery-next-2">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </div>
                                <div class="swiper-button-prev gallery-prev-2">
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div thumbsSlider="" class="swiper-container gallery-2">
                                <div class="swiper-wrapper">
                                    @foreach ($product->galleries as $gallery)
                                        <div class="swiper-slide">
                                            <img src="{{ Storage::url($gallery->image) }}" alt="" class="w-100" />
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                        <!--product-gallery-->
                    </div>
                    <div class="col-lg-5 mb-4">
                        <div class="product-info">
                            <h1 class="product-title size22 fw-700">{{ $product->name }}</h1>

                            <div class="product-price">
                                <div class="sale-price">
                                    {{ number_format($product->price - $product->price * ($product->discount / 100)) }}
                                    VND</div>
                                <div class="old-price">{{ number_format($product->price) }} VND(<span
                                        class="discount-percentage">{{ $product->discount }}%</span>) </div>
                            </div>
                            <div class="product-desc pt-2">
                                <p><strong>Liên hệ: 096.685.6666</strong></p>
                                <p><em>{{ $product->short_description }}</em></p>
                            </div>
                            <div class="product_meta">
                                <span class="sku_wrapper">Mã: <span class="sku">SF-M055</span></span>
                                <span class="posted_in">Danh mục: <a href="#" rel="tag">Sản phẩm</a>,
                                    <a href="#"
                                        rel="tag">{{ $product->category->name ?? 'Không có danh mục' }}</a>
                                </span>
                                <span class="tagged_as">Từ khóa: <a href="#" rel="tag">bộ sofa và bàn trà gỗ óc
                                        chó</a>,
                                    <a href="#" rel="tag">sofa</a>,
                                    <a href="#">sofa gỗ óc chó</a>
                                </span>
                                <div class="product-actions pt-3 d-fl">

                                    <form action="{{ route('cart.add', ['productId' => $product->id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                        <input type="hidden" name="image" value="{{ Storage::url($product->image) }}">
                                        <div class="quantity">
                                            <label for="quantity">Số lượng:</label>
                                            <input type="number" id="quantity" name="quantity" value="1" min="1" class="form-control" />
                                        </div>

                                        <input type="hidden" name="price" value="{{ $product->price - $product->price * ($product->discount / 100) }}">

                                        <button style="background-color: #016800" type="submit"
                                            class="btn btn-primary mt-2" name="action" value="buy_now">Mua ngay</button>
                                        <button style="background-color: #8b0304" type="submit"
                                            class="btn btn-secondary mt-2" name="action" value="add_to_cart">Thêm vào giỏ
                                            hàng</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-content py-5">
                    <div class="tab-title text-center size14 fw-500 text-uppercase mb-2">
                        <span>Mô tả</span>
                    </div>
                    <div class="product-detail">
                        <p>Sofa gỗ óc chó SF-M055 kiểu dáng hiện đại, phù hợp cho các không gian nội thất cao cấp và đủ diện
                            tích, với hình dáng độc lạ của bộ sofa thì những chi tiết thi công phải đòi hỏi một yếu tốt thẩm
                            mỹ rất cao, cao hơn nhiều những
                            sản phẩm cùng chủng loại. Cùng chiếc bàn vô cùng độc đáo và đẹp mắt. Điểm nhấn thu hút mọi ánh
                            nhìn.</p>
                        <p>Chất liệu gỗ hoàn toàn tự nhiên và được vanh cong tạo điểm nhấn khác biệt, không chỉ đem lại vẻ
                            sang trọng. Bộ sofa gỗ óc chó SF-M055 còn mang tới giá trị hoàn hoản cho người sử dụng. Màu sắc
                            luôn là yếu tốt then chốt để đánh
                            giá một sản phẩm có được xử lý hoàn hảo hay không. Trên thực tế, những bộ sofa gỗ óc chó hiện
                            nay đều phủ một lớp sơn đen nâu để nhấn mạnh vẻ đẹp có bản chất gỗ đang có.</p>
                        <p><a href="#" aria-label="External"><span style="color: #0000ff;">Nội thất
                                    102</span></a>&nbsp;đang là đơn vị đi đầu trong lĩnh vực phát triển các sản phẩm cao cấp
                            cũng như có kiểu
                            dáng khác lạ, nhằm đẹp lại giá trị tinh thần rất lớn cho người sử dụng.</p>
                    </div>
                </div>

                <div class="similar-product mb-4">
                    <h3 class="similar-product-title text-uppercase size22 fw-700">Sản phẩm tương tự</h3>

                    <div class="swiper-button-next similar-product-next"><i class="far fa-chevron-right fa-fw"></i></div>
                    <div class="swiper-button-prev similar-product-prev"><i class="far fa-chevron-left fa-fw"></i></div>
                    <div class="swiper-container similar-product-slide">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="product-box">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="{{ asset('noithat102/images/product.jpg') }}" alt="">
                                            <img src="{{ asset('noithat102/images/product.jpg') }}" alt=""
                                                class="image-hover">
                                        </a>
                                    </div>
                                    <div class="product-text">
                                        <h3 class="product-title"><a href="#">Sofa gỗ óc chó SF-M051</a></h3>
                                        <div class="price">Giá: <span>Liên hệ</span> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-box">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="{{ asset('noithat102/images/product.jpg') }}" alt="">
                                            <img src="{{ asset('noithat102/images/product.jpg') }}" alt=""
                                                class="image-hover">
                                        </a>
                                    </div>
                                    <div class="product-text">
                                        <h3 class="product-title"><a href="#">Sofa gỗ óc chó SF-M051</a></h3>
                                        <div class="price">Giá: <span>Liên hệ</span> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-box">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="{{ asset('noithat102/images/product.jpg') }}" alt="">
                                            <img src="{{ asset('noithat102/images/product.jpg') }}" alt=""
                                                class="image-hover">
                                        </a>
                                    </div>
                                    <div class="product-text">
                                        <h3 class="product-title"><a href="#">Sofa gỗ óc chó SF-M051</a></h3>
                                        <div class="price">Giá: <span>Liên hệ</span> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-box">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="{{ asset('noithat102/images/product.jpg') }}" alt="">
                                            <img src="{{ asset('noithat102/images/product.jpg') }}" alt=""
                                                class="image-hover">
                                        </a>
                                    </div>
                                    <div class="product-text">
                                        <h3 class="product-title"><a href="#">Sofa gỗ óc chó SF-M051</a></h3>
                                        <div class="price">Giá: <span>Liên hệ</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="construction pt-4">
                    <h3 class="construction-title text-center fw-700 size22 mb-4 pb-2"><span>THIẾT KẾ THI CÔNG NỘI THẤT TẠI
                            102</span></h3>

                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="construction-box">
                                <div class="construction-image">
                                    <img src="{{ asset('noithat102/images/anh-du-an-1.jpg') }}" alt=""
                                        class="w-100">
                                </div>
                                <div class="construction-text text-center">
                                    <h4 class="text-uppercase size16 text-white mb-2 px-3">KẾ NỘI THẤT GỖ ÓC CHÓ</h4>
                                    <a href="#" target="_blank">
                                        <span>Khám phá</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="construction-box">
                                <div class="construction-image">
                                    <img src="{{ asset('noithat102/images/anh-du-an-1.jpg') }}" alt=""
                                        class="w-100">
                                </div>
                                <div class="construction-text text-center">
                                    <h4 class="text-uppercase size16 text-white mb-2 px-3">KẾ NỘI THẤT GỖ ÓC CHÓ</h4>
                                    <a href="#" target="_blank">
                                        <span>Khám phá</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="construction-box">
                                <div class="construction-image">
                                    <img src="{{ asset('noithat102/images/anh-du-an-1.jpg') }}" alt=""
                                        class="w-100">
                                </div>
                                <div class="construction-text text-center">
                                    <h4 class="text-uppercase size16 text-white mb-2 px-3">KẾ NỘI THẤT GỖ ÓC CHÓ</h4>
                                    <a href="#" target="_blank">
                                        <span>Khám phá</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-4">
                            <div class="construction-box">
                                <div class="construction-image">
                                    <img src="{{ asset('noithat102/images/anh-du-an-1.jpg') }}" alt=""
                                        class="w-100">
                                </div>
                                <div class="construction-text text-center">
                                    <h4 class="text-uppercase size16 text-white mb-2 px-3">KẾ NỘI THẤT GỖ ÓC CHÓ</h4>
                                    <a href="#" target="_blank">
                                        <span>Khám phá</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="construction-box">
                                <div class="construction-image">
                                    <img src="{{ asset('noithat102/images/anh-du-an-1.jpg') }}" alt=""
                                        class="w-100">
                                </div>
                                <div class="construction-text text-center">
                                    <h4 class="text-uppercase size16 text-white mb-2 px-3">KẾ NỘI THẤT GỖ ÓC CHÓ</h4>
                                    <a href="#" target="_blank">
                                        <span>Khám phá</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="construction-box">
                                <div class="construction-image">
                                    <img src="{{ asset('noithat102/images/anh-du-an-1.jpg') }}" alt=""
                                        class="w-100">
                                </div>
                                <div class="construction-text text-center">
                                    <h4 class="text-uppercase size16 text-white mb-2 px-3">KẾ NỘI THẤT GỖ ÓC CHÓ</h4>
                                    <a href="#" target="_blank">
                                        <span>Khám phá</span>
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="short-description">
                    <p>Thấu hiểu nhu cầu của Qúy khách hàng, nội thất 102 cung cấp dịch vụ trọn gói: <strong>Thiết kế nội
                            thất – Thi công nội thất– Sản xuất nội thất – Lắp đặt nội thất</strong>. Những năm qua, với bề
                        dày kinh nghiệm cùng sự dẫn dắt,
                        định hướng chính xác của ban lãnh đạo công ty, nội thất 102 đã nhận được rất nhiều sự quan tâm và
                        trở thành nơi trao gửi niềm tin cho hàng triệu gia đình Việt. Vinh hạnh trở thành một trong số các
                        đơn vị thiết kế và thi
                        công với các dòng sản phẩm nội thất gỗ óc chó hàng đầu tại Việt Nam. Với sứ mệnh đưa các sản phẩm
                        nội thất gỗ óc chó đến gần hơn với không gian, nội thất 102 đầu tư xưởng sản xuất với công nghệ hiện
                        đại, quy trình làm việc
                        chuẩn chỉnh, đáp ứng mọi yêu cầu của khách hàng. Hệ thống Showroom trưng bày và thiết kế không gian
                        mẫu đầy ấn tưởng với những trải nghiệm thực tế. Ghé thăm 102 để được nhận tư vấn và hỗ trợ trực tiếp
                        từ các kiến trúc sư
                        với những giải pháp và ý tưởng đi đầu trong thiết kế nội thất.</p>


                    <table cellpadding="15">
                        <tr>
                            <td width="50%">
                                <h3 style="font-size: 20px;" align="center"><strong>SHOWROOM NỘI THẤT GỖ ÓC CHÓ TẠI MIỀN
                                        BẮC</strong></h3>
                                <p><img src="{{ asset('noithat102/images/tam-nhin-va-su-menh.jpg') }}"></p>
                                <p>
                                <ul>
                                    <li>Showroom nội thất cao cấp 5 Tầng tại 102 tại<strong>&nbsp;D4- 31, Khu đô thị
                                            Gleximco, Lê trọng tấn, Hà Đông, Hà Nội</strong></li>
                                    <li>Không gian nghệ thuật trưng bày những tinh hoa của nội thất gỗ óc chó</li>
                                    <li>Không gian để trải nghiệm những tuyệt tác tinh tế và độc đáo về nội thất gỗ óc chó
                                        dẫn đầu xu hướng</li>
                                    <li>Hình ảnh thực tế tại Showroom</li>
                                </ul>
                                </p>
                            </td>
                            <td width="50%">
                                <h3 style="font-size: 20px;" align="center"><strong>XƯỞNG CHUYÊN SẢN XUẤT GỖ ÓC CHÓ HIỆN
                                        ĐẠI</strong></h3>
                                <p><img src="{{ asset('noithat102/images/sofa.jpg') }}"></p>
                                <p>
                                <ul>
                                    <li>Hệ thống nhà xưởng sản xuất gỗ óc chó lên đến 2000m2</li>
                                    <li>Dây chuyền sản xuất nội thất gỗ óc chó đạt tiêu chuẩn quốc tế</li>
                                    <li>Nhập khẩu 100% máy móc hiện đại chuyên sản xuất nội thất cao cấp từ gỗ óc chó</li>
                                    <li>Với hơn +100 thợ thủ công tay nghề cao dày dặn kinh nghiệm</li>
                                    <li>Thực hiện Handmade hoàn toàn những sản phẩm nội thất từ gỗ óc chó cao cấp</li>
                                </ul>
                                </p>
                            </td>
                        </tr>
                    </table>

                    <table cellpadding="15">
                        <tr>
                            <td width="50%">
                                <h3 style="text-align: center;font-size: 20px;" align="center"><strong>QUY TRÌNH THIẾT KẾ
                                        NỘI THẤT TẠI 102</strong></h3>
                                <p style="text-align: left;">Thiết kế nội thất tại&nbsp;<strong>102</strong>&nbsp;Quý khách
                                    hàng sẽ được trải nghiệm quy trình làm việc chuyên nghiệp theo quy chuẩn quốc tế</p>
                                <ul>
                                    <li style="text-align: left;">Bước 1: Tiếp nhận thông tin, gặp gỡ, lắng nghe và tư vấn
                                    </li>
                                    <li style="text-align: left;">Bước 2: Khảo sát thực trạng</li>
                                    <li style="text-align: left;">Bước 3: Thiết kế sơ bộ và báo giá</li>
                                    <li style="text-align: left;">Bước 4: Ký hợp đồng với chủ đầu tư</li>
                                    <li style="text-align: left;">Bước 5: Thiết kế không gian nội thất 3D</li>
                                    <li style="text-align: left;">Bước 6: Hoàn thiện hồ sơ và bàn giao cho chủ đầu tư</li>
                                    <li style="text-align: left;">Bước 7: Thanh lý hợp đồng</li>
                                    <li style="text-align: left;">Bước 8: Bảo hành và bảo trì</li>
                                </ul>
                            </td>
                            <td width="50%">
                                <h3 style="text-align: center;font-size: 20px;" align="center"><strong>DỊCH VỤ THIẾT KẾ
                                        NỘI THẤT&nbsp;</strong></h3>
                                <p>Khi thiết kế nội thất, gu thẩm mỹ, sở thích cá nhân của khách hàng luôn
                                    được&nbsp;<strong>Nội thất 102</strong>&nbsp;ưu tiên. 102 đã thật sự chiếm trọn trái tim
                                    của khách hàng:</p>
                                <ul>
                                    <li>Tư vấn thiết kế miễn phí</li>
                                    <li>Thiết kế chuẩn theo ý tưởng của khách hàng</li>
                                    <li>Luôn thể hiện cái “tôi” riêng biệt trong từng không gian</li>
                                    <li>Số lần sửa đổi bản vẽ không giới hạn</li>
                                    <li>Luôn luôn cập nhật và tìm hiểu những xu hướng nội thất mới</li>
                                    <li>Lên ý tưởng và thiết kế chi tiết cho từng không gian</li>
                                    <li>Tối ưu công năng sử dụng</li>
                                    <li>Thiết kế mang tính khả thi</li>
                                </ul>
                            </td>
                        </tr>
                    </table>

                    <table cellpadding="15">
                        <tr>
                            <td width="50%">
                                <p><img src="{{ asset('noithat102/images/slide-image-2.jpg') }}"></p>
                            </td>
                            <td width="50%">
                                <h2 class="uppercase" style="text-align: center;"><strong>NỘI THẤT ÓC CHÓ 102</strong>
                                </h2>
                                <h3 style="text-align: center;">Nơi tinh hoa nghệ thuật gỗ óc chó</h3>
                                <ul>
                                    <li>Cam kết tiến độ công việc đạt chuẩn 100% theo hợp đồng với khách hàng.</li>
                                    <li>Lấy lợi ích của khách hàng làm giá trị cốt lõi cho mọi hoạt động của công ty.</li>
                                    <li>Chế độ bảo hành, đảm bảo uy tín, tin cậy cho mọi sản phẩm.</li>
                                    <li>Đảm bảo tuyệt đối về chất lượng và nguốn gốc xuất xứ của vật liệu.</li>
                                    <li>Đội ngũ kiến trúc sư và thợ có trình độ cao.</li>
                                    <li>Công nghệ sản xuất hiện đại</li>
                                </ul>
                            </td>
                        </tr>
                    </table>

                </div>

            </div>
        </div>
    </div>
@endsection
