@extends('layouts.Client.master')
@section('content')
    <div class="page-wrapper">
        <div class="product-archive py-4 my-1">
            <div class="container">
                <div class="page-title text-center text-uppercase size22 fw-500 pb-2 mb-3">
                    @isset($selectedCategory)
                    Danh mục: {{ $selectedCategory->name }}
                @else
                    Sản phẩm
                @endisset
                </div>
                <div class="product-search-box mb-4">
                    <form class="form-inline justify-content-end">
                        <input class="form-control rounded-0" type="search" placeholder="Tìm kiếm..." aria-label="Tìm kiếm">
                        <button class="btn bg-secondary rounded-0" type="submit"><i
                                class="far fa-search fa-fw text-white"></i></button>
                    </form>
                </div>
                <div class="product-box-img mb-4">
                    <img src="{{ asset('noithat102/images/san-pham-go-oc-cho.png') }}" alt="">
                </div>


                <div class="row">
                    @foreach ($products as $item)
                        <div class="col-lg-4 mb-4">
                            <div class="product-box">
                                <div class="product-image">
                                    <a href="{{ route('products.show', $item->slug) }}">
                                        <img src="{{ Storage::url($item->image) }}" alt="">
                                    </a>
                                </div>
                                <div class="product-text">
                                    <h3 class="product-title">
                                        <a href="{{ route('products.show', $item->slug) }}">{{ $item->name }}</a>
                                    </h3>
                                    <div class="price">{{ number_format($item->price, 0, ',', '.') }} VND: <span>Liên hệ</span></div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

                <nav aria-label="Page navigation" class="navigation-wrapper pt-4 mb-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="" aria-label="Previous">
                                <span aria-hidden="true">‹</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item current"><a class="page-link" href="">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">›</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>

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
                                <p><img src="{{ asset('noithat102') }}/images/tam-nhin-va-su-menh.jpg"></p>
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
                                <p><img src="{{ asset('noithat102') }}/images/sofa.jpg"></p>
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
                                <h3 style="text-align: center;font-size: 20px;" align="center"><strong>DỊCH VỤ THIẾT KẾ NỘI
                                        THẤT&nbsp;</strong></h3>
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
                                <h2 class="uppercase" style="text-align: center;"><strong>NỘI THẤT ÓC CHÓ 102</strong></h2>
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
