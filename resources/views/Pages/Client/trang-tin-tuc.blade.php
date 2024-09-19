@extends('layouts.Client.master')
@section('content')
    <div class="page-wrapper">
        <div class="banner-wrapper">
            <div class="banner-top">
                <img src="{{ asset('noithat102') }}/images/banner-top.jpg" alt="">
            </div>
            <h1 class="page-title">Tin tức</h1>
        </div>

        <div class="blog-archive py-4 my-1">
            <div class="container">
                <div class="row">





                    @foreach ($posts as $post)
                        @if ($post->status == 0)
                            <!-- Chỉ hiển thị bài viết nếu status là 0 -->
                            <div class="col-6 col-lg-4 mb-4">
                                <div class="post-box">
                                    <div class="post-image mb-3">
                                        <a href="{{ route('Client.postShow', ['slug' => $post->slug]) }}">
                                            <img src="{{ asset('images/' . $post->image) }}" alt="{{$post->name}}">
                                        </a>
                                    </div>
                                    <h3 class="post-title size18 fw-700">
                                        <a
                                            href="{{ route('Client.postShow', ['slug' => $post->slug]) }}">{{ $post->name }}</a>
                                    </h3>
                                </div>
                            </div>
                        @endif
                    @endforeach

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
