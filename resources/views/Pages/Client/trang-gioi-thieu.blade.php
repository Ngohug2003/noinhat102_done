@extends('layouts.Client.master')
@section('content')
<div class="page-wrapper">
    <div class="banner-wrapper">
        <div class="banner-top">
            <img src="{{asset('noithat102/images/banner-top.jpg')}}" alt="">
        </div>
        <h1 class="page-title">Giới thiệu</h1>
    </div>


    <section class="section section-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="about-text d-flex flex-column justify-content-center">
                        <h2 style="font-size:25px;margin-bottom: 20px;"><strong style="color: #006800;">NỘI THẤT 102</strong><br>ĐƠN VỊ CHUYÊN SÂU NỘI THẤT GỖ ÓC CHÓ</h2>
                        <p> là công ty Kiến trúc – Nội thất uy tín và chất lượng. Đặc biệt, đơn vị có bề dày kinh nghiệm +12 năm trong lĩnh vực thiết kế và thi công nội thất gỗ óc chó. Thương hiệu Nội thất Nội thất 102 đã được khẳng định trong những
                            không gian xứng tầm đẳng cấp tại các biệt thự của Vinhomes, Ecopark, Park City, Starlake… và khắp các tỉnh thành cả nước.
                        </p>
                        <div class="mt-4">
                            <a href="#" class="button btn-viewmore text-uppercase size16 text-primary d-inline-block">Tìm hiểu thêm <i class="far fa-chevron-right fa-fw"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="about-image">
                        <img src="{{asset('noithat102/images/slide-image-2.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section home-about pt-2">
        <div class="container-fluid px-lg-0">
            <div class="row no-gutters">
                <div class="col-lg-7 ,b-4">
                    <div class="about-image">
                        <img src="{{asset('noithat102/images/tam-nhin-va-su-menh.jpg')}}" alt="" class="w-100"></img>
                    </div>
                </div>
                <div class="col-lg-5 mb-4">
                    <div class="about-text py-4 d-flex flex-column justify-content-center text-justify">
                        <h3><span style="color: #006800;font-weight: bold;">TẦM NHÌN & SỨ MỆNH</span></h3>
                        <p>
                            Để xứng đáng với sự tín nhiệm của quý khách hàng, Nội thất Nội thất 102 định hướng tầm nhìn là “Chuyên gia kiến tạo không gian cao cấp” với Nội thất Gỗ óc chó. Ngay từ khi thành lập, Nội thất 102 đã xác định sứ mệnh của mình là tối ưu không gian xứng
                            tầm đẳng cấp. Chúng tôi cam kết trao tặng cho quý vị những giá trị sống “chuẩn” phong cách sang trọng, đẳng cấp và khác biệt.
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
                <div class="col-lg-5 mb-4">
                    <div class="about-text py-4 d-flex flex-column justify-content-center text-justify">
                        <div class="wp-block-column two-up-slider__content is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:33.33%">
                            <h2 style="font-size:25px"><strong>CHẤT LƯỢNG DỊCH VỤ</strong></h2>
                            <br>
                            <p align="justify">Đối với Nội thất Nội thất 102, tiêu chí phát triển bền vững chính là sự tin tưởng và hài lòng của khách hàng. Thấu hiểu điều đó, ngay từ những ngày đầu thành lập chúng tôi đã quyết tâm xây dựng đội ngũ nhân sự chuyên
                                sâu, chuyên nghiệp trong lĩnh vực mà mình đảm nhiệm. Bởi vậy, chất lượng dịch vụ và sản phẩm mang thương hiệu Nội thất Nội thất 102 luôn dẫn đầu xu hướng với chất lượng hoàn hảo nhất, theo các tiêu chí:</p>
                            <ul>
                                <li>Lợi ích của khách hàng là kim chỉ nam cho mọi hoạt động.</li>
                                <li>Đảm bảo chất lượng dịch vụ và cam kết 100% vật liệu là gỗ óc chó tự nhiên Bắc Mỹ.</li>
                                <li>Cam kết đảm bảo tiến độ công việc thiết kế thi công nội thất theo đúng hợp đồng ký kết với khách hàng.</li>
                                <li>Cam kết chế độ bảo hành, bảo trì uy tín cho tất cả dịch vụ của Công ty.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mb-4">
                    <div class="about-image">
                        <img src="{{asset('noithat102/images/tam-nhin-va-su-menh2.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section pt-2">
        <div class="container">
            <div class="container-section-title text-center mb-4">
                <h2 class="section-title size26 fw-700 mb-4">XƯỞNG SẢN XUẤT HIỆN ĐẠI, QUY MÔ LỚN</h2>
                <p>Xưởng sản xuất nội thất quy mô 3800m2 được trang bị hệ thống máy móc với công nghệ tiên tiến cùng quy trình sản xuất chuyên nghiệp theo tiêu chuẩn của quốc tế. Chúng tôi đã quy tụ được đội ngũ nghệ nhân lành nghề say mê với chất
                    liệu gỗ óc chó, không ngừng nâng cao tay nghề để chế tác ra những sản phẩm hoàn mỹ nhất, góp phần tạo nên giá trị bền vững cho ngôi nhà.</p>
            </div>
            <div class="about-video">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/XhixdLPAeFA?si=Z9NtxDnkpJu84Sbm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="section home-about pt-2">
        <div class="container-fluid px-lg-0">
            <div class="row no-gutters">
                <div class="col-lg-7">
                    <div class="about-image">
                        <img src="{{asset('noithat102/images/tam-nhin-va-su-menh.jpg')}}" alt="" class="w-100"></img>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-text d-flex flex-column justify-content-center text-justify py-4">
                        <h3><strong>NGUỒN NHÂN LỰC SÁNG TẠO & TÂM HUYẾT</strong></h3>
                        <br>
                        <p>
                            Nội thất Nội thất 102 sở hữu nguồn nhân lực có “tài và tâm nâng tầm không gian Việt”. Phòng Thiết kế được dẫn dắt bởi chuyên gia kiến tạo không gian – KTS Hoàng Tiến Quỳnh đã quy tu được đội ngũ kiến trúc sư tài năng, nhiệt huyết và giàu kinh nghiệm thực
                            tế. Những “đứa con tinh thần” mang thương hiệu Nội thất 102 xuất phát từ ý tưởng thiết kế độc đáo dựa trên mong muốn của chủ nhân ngôi nhà. </p>

                        <p>Để hiện thực hóa ý tưởng của kiến trúc sư, các nghệ nhân gỗ đã tỉ mỉ chế tác “lên hình thành dạng” cho từng sản phẩm nội thất gỗ óc chó. Họ có thâm niên lâu năm và có sự am hiểu sâu sắc về gỗ, để “thổi hồn” tinh tế và sống
                            động nhất. Cùng với đó, đội ngũ thi công của chúng tôi rất chuyên nghiệp và tận tâm trong từng công trình.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section home-faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="section-title size30 text-uppercase fw-700 mb-4">Câu hỏi thường gặp</h2>
                    <div class="faq-wrapper">
                        <div id="accordion">
                            <div class="card pl-0">
                                <div class="card-header pl-0" id="heading-5">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link pl-0" data-toggle="collapse" data-target="#collapse-5" aria-expanded="true" aria-controls="collapse-5">
                                        Cơ sở vật chất của Nội thất 102 như thế nào?
                              </button>
                                    </h5>
                                </div>

                                <div id="collapse-5" class="collapse show" aria-labelledby="heading-5" data-parent="#accordion">
                                    <div class="card-body pl-0">
                                        Nội thất 102 là tổng thầu thiết kế thi công nội thất uy tín và chất lượng hàng đầu. Điều đặc biệt của chúng tôi là không bán nội thất đơn thuần mà kiến tạo không gian nội thất gỗ óc chó. Tất cả các dự án của Nội thất 102, chuyên gia kiến tạo không gian
                                        sẽ đưa ra các giải giáp để tối ưu diện tích sử dụng, bố trí sắp xếp nội thất khoa học để trao tặng quý vị ngôi nhà sang trọng và đẳng cấp nhất.
                                    </div>
                                </div>
                            </div>

                            <div class="card pl-0">
                                <div class="card-header pl-0" id="heading-6">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed pl-0" data-toggle="collapse" data-target="#collapse-6" aria-expanded="true" aria-controls="collapse-6">
                                        Lợi thế của khách hàng khi lựa chọn Nội thất 102?
                              </button>
                                    </h5>
                                </div>

                                <div id="collapse-6" class="collapse" aria-labelledby="heading-6" data-parent="#accordion">
                                    <div class="card-body pl-0">
                                        Nội thất 102 là tổng thầu thiết kế thi công nội thất uy tín và chất lượng hàng đầu. Điều đặc biệt của chúng tôi là không bán nội thất đơn thuần mà kiến tạo không gian nội thất gỗ óc chó. Tất cả các dự án của Nội thất 102, chuyên gia kiến tạo không gian
                                        sẽ đưa ra các giải giáp để tối ưu diện tích sử dụng, bố trí sắp xếp nội thất khoa học để trao tặng quý vị ngôi nhà sang trọng và đẳng cấp nhất.
                                    </div>
                                </div>
                            </div>

                            <div class="card pl-0">
                                <div class="card-header pl-0" id="heading-7">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed pl-0" data-toggle="collapse" data-target="#collapse-7" aria-expanded="true" aria-controls="collapse-7">
                                        Phạm vi hoạt động của Nội thất 102 tại tỉnh thành nào?
                              </button>
                                    </h5>
                                </div>

                                <div id="collapse-7" class="collapse" aria-labelledby="heading-7" data-parent="#accordion">
                                    <div class="card-body pl-0">
                                        Nội thất 102 là tổng thầu thiết kế thi công nội thất uy tín và chất lượng hàng đầu. Điều đặc biệt của chúng tôi là không bán nội thất đơn thuần mà kiến tạo không gian nội thất gỗ óc chó. Tất cả các dự án của Nội thất 102, chuyên gia kiến tạo không gian
                                        sẽ đưa ra các giải giáp để tối ưu diện tích sử dụng, bố trí sắp xếp nội thất khoa học để trao tặng quý vị ngôi nhà sang trọng và đẳng cấp nhất.
                                    </div>
                                </div>
                            </div>

                            <div class="card pl-0">
                                <div class="card-header pl-0" id="heading-8">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed pl-0" data-toggle="collapse" data-target="#collapse-8" aria-expanded="true" aria-controls="collapse-8">
                                        Phương thức liên hệ với Nội thất 102?
                              </button>
                                    </h5>
                                </div>

                                <div id="collapse-8" class="collapse" aria-labelledby="heading-8" data-parent="#accordion">
                                    <div class="card-body pl-0">
                                        Nội thất 102 là tổng thầu thiết kế thi công nội thất uy tín và chất lượng hàng đầu. Điều đặc biệt của chúng tôi là không bán nội thất đơn thuần mà kiến tạo không gian nội thất gỗ óc chó. Tất cả các dự án của Nội thất 102, chuyên gia kiến tạo không gian
                                        sẽ đưa ra các giải giáp để tối ưu diện tích sử dụng, bố trí sắp xếp nội thất khoa học để trao tặng quý vị ngôi nhà sang trọng và đẳng cấp nhất.
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
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
    <div class="map pt-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.0743459744094!2d105.80017578647153!3d20.98965673075716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acbfe683c48f%3A0x5e18835309d23628!2zMzEgxJAuIE5ndXnhu4VuIFhp4buDbiwgVGhhbmggWHXDom4gTmFtLCBUaGFuaCBYdcOibiwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1703132324384!5m2!1svi!2s"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
@endsection