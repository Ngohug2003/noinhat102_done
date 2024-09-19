@extends('layouts.Client.master')
@section('content')
<div class="page-wrapper">

    <div class="blog-single py-5 my-1">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-10">
                    <h1 class="post-title size36 fw-700 mb-4">{{$post->name}}</h1>
                    <div class="post-content mb-4">   
                            {!! $post->content !!}
                    <div class="post-rate py-4">
                        <div class="star-input">
                            <input type="radio" id="5-star" name="rating" value="5" required="required"><span></span>
                            <input type="radio" id="4-star" name="rating" value="4" required="required" checked=""><span></span>
                            <input type="radio" id="3-star" name="rating" value="3" required="required"><span></span>
                            <input type="radio" id="2-star" name="rating" value="2" required="required"><span></span>
                            <input type="radio" id="1-star" name="rating" value="1" required="required"><span></span>
                        </div>
                        <span class="size18">5/5 - (1 bình chọn)</span>
                    </div>

                    <div class="fb-like d-flex justify-content-lg-end" data-href="http://locahost/noithat102" data-width="130" data-layout="" data-action="" data-size="" data-share="true"></div>

                    <div class="comment-area mb-4">
                        <div class="comment-title fw-600 size20 mb-4">2 bình luận trong “Thiết kế thi công nội thất biệt thự phong cách hiện đại, sang trọng và đẳng cấp”</div>
                        <div class="comment-list">
                            <ul>
                                <li class="comment-item mb-4">
                                    <div class="comment-wrap border mb-4">
                                        <div class="comment-contener d-block d-lg-flex align-items-center border">
                                            <div class="user-comment text-center p-4">
                                                <div class="avatar mb-2"><img src="{{asset('noithat102/images/avatar.jpg')}}" class="rounded-circle"></div>
                                                <b class="d-block">Hoàng đình Đai</b>
                                                <time datetime="2022-06-12T17:56:07+07:00">12/06/2022 lúc 17:56</time>
                                            </div>
                                            <div class="comment-content pl-4">
                                                <p>Tôi muốn báo giá thi công nội thất nhà biệt thự khu victoria ở phường điện dương quảng nam Đà Nẵng</p>
                                            </div>
                                        </div>
                                        <div class="btn-reply text-right my-2 mr-2">
                                            <a rel="nofollow" class="comment-reply-link" href="#">Trả lời</a>
                                        </div>
                                    </div>

                                    <div class="reply-form mb-4">
                                        <h3 class="comment-reply-title size18 mb-4 fw-700">Phản hồi đến Hoàng đình Đai<small>
                                            <a rel="nofollow" class="cancel-comment-reply-link ml-1" href="#" style="">Hủy</a></small>
                                        </h3>
                                        <form>
                                            <div class="row form-group">
                                                <div class="col-6"><input type="text" class="form-control" name="name" placeholder="Họ tên *"></div>
                                                <div class="col-6"><input type="email" class="form-control" name="email" placeholder="Email"></div>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-submit bg-primary text-white text-uppercase">Gửi bình luận</button>
                                        </form>
                                    </div>

                                    <ul class="reply">
                                        <li class="comment-item mb-4">
                                            <div class="comment-wrap d-flex align-items-center border">
                                                <div class="user-comment text-center p-4">
                                                    <div class="avatar mb-2"><img src="{{asset('noithat102/images/avatar.jpg')}}" class="rounded-circle"></div>
                                                    <b class="d-block">Hoàng đình Đai</b>
                                                    <time datetime="2022-06-12T17:56:07+07:00">12/06/2022 lúc 17:56</time>
                                                </div>
                                                <div class="comment-content pl-4">
                                                    <p>Tôi muốn báo giá thi công nội thất nhà biệt thự khu victoria ở phường điện dương quảng nam Đà Nẵng</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="comment-item mb-4">
                                    <div class="comment-wrap border mb-4">
                                        <div class="comment-contener d-block d-lg-flex align-items-center border">
                                            <div class="user-comment text-center p-4">
                                                <div class="avatar mb-2"><img src="{{asset('noithat102/images/avatar.jpg')}}" class="rounded-circle"></div>
                                                <b class="d-block">Hoàng đình Đai</b>
                                                <time datetime="2022-06-12T17:56:07+07:00">12/06/2022 lúc 17:56</time>
                                            </div>
                                            <div class="comment-content pl-4">
                                                <p>Tôi muốn báo giá thi công nội thất nhà biệt thự khu victoria ở phường điện dương quảng nam Đà Nẵng</p>
                                            </div>
                                        </div>
                                        <div class="btn-reply text-right my-2 mr-2">
                                            <a rel="nofollow" class="comment-reply-link" href="#">Trả lời</a>
                                        </div>
                                    </div>

                                    <div class="reply-form mb-4">
                                        <h3 class="comment-reply-title size18 mb-4 fw-700">Phản hồi đến Hoàng đình Đai<small>
                                            <a rel="nofollow" class="cancel-comment-reply-link ml-1" href="#" style="">Hủy</a></small>
                                        </h3>
                                        <form>
                                            <div class="row form-group">
                                                <div class="col-6"><input type="text" class="form-control" name="name" placeholder="Họ tên *"></div>
                                                <div class="col-6"><input type="email" class="form-control" name="email" placeholder="Email"></div>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-submit bg-primary text-white text-uppercase">Gửi bình luận</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="comment-form mb-4">
                        <h3 class="fw-700 size20 mb-3">Bình luận</h3>
                        <form>
                            <div class="row form-group">
                                <div class="col-6"><input type="text" class="form-control" name="name" placeholder="Họ tên *"></div>
                                <div class="col-6"><input type="email" class="form-control" name="email" placeholder="Email"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn btn-submit bg-primary text-white text-uppercase">Gửi bình luận</button>
                        </form>
                    </div>

                </div>
            </div>


            <h3 class="related-title text-center mb-4">Bài viết liên quan</h3>
            <div class="row">
                <div class="col-6 col-lg-4 mb-4">
                    <div class="post-box">
                        <div class="post-image mb-3">
                            <a href="#"><img src="{{asset('noithat102/images/tin-1.webp')}}" alt=""></a>
                        </div>
                        <h3 class="post-title size18 fw-700"><a href="#">Đại sứ đồng hành của thương hiệu nội thất gỗ óc chó cao cấp bậc nhất Sài thành</a> </h3>
                    </div>
                </div>
                <div class="col-6 col-lg-4 mb-4">
                    <div class="post-box">
                        <div class="post-image mb-3">
                            <a href="#"><img src="{{asset('noithat102/images/tam-nhin-va-su-menh.jpg')}}" alt=""></a>
                        </div>
                        <h3 class="post-title size18 fw-700"><a href="#">Đại sứ đồng hành của thương hiệu nội thất gỗ óc chó cao cấp bậc nhất Sài thành</a> </h3>
                    </div>
                </div>
                <div class="col-6 col-lg-4 mb-4">
                    <div class="post-box">
                        <div class="post-image mb-3">
                            <a href="#"><img src="{{asset('noithat102/images/tin-1.webp')}}" alt=""></a>
                        </div>
                        <h3 class="post-title size18 fw-700"><a href="#">Đại sứ đồng hành của thương hiệu nội thất gỗ óc chó cao cấp bậc nhất Sài thành</a> </h3>
                    </div>
                </div>
                <div class="col-6 col-lg-4 mb-4">
                    <div class="post-box">
                        <div class="post-image mb-3">
                            <a href="#"><img src="{{asset('noithat102/images/tin-1.webp')}}" alt=""></a>
                        </div>
                        <h3 class="post-title size18 fw-700"><a href="#">Đại sứ đồng hành của thương hiệu nội thất gỗ óc chó cao cấp bậc nhất Sài thành</a> </h3>
                    </div>
                </div>
                <div class="col-6 col-lg-4 mb-4">
                    <div class="post-box">
                        <div class="post-image mb-3">
                            <a href="#"><img src="{{asset('noithat102')}}/images/tam-nhin-va-su-menh.jpg" alt=""></a>
                        </div>
                        <h3 class="post-title size18 fw-700"><a href="#">Đại sứ đồng hành của thương hiệu nội thất gỗ óc chó cao cấp bậc nhất Sài thành</a> </h3>
                    </div>
                </div>
                <div class="col-6 col-lg-4 mb-4">
                    <div class="post-box">
                        <div class="post-image mb-3">
                            <a href="#"><img src="{{asset('noithat102/images/tin-1.webp')}}" alt=""></a>
                        </div>
                        <h3 class="post-title size18 fw-700"><a href="#">Đại sứ đồng hành của thương hiệu nội thất gỗ óc chó cao cấp bậc nhất Sài thành</a> </h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection