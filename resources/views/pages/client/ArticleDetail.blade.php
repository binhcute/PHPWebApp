@extends('layout_client')
@section('content')
@section('title','Bài Viết')

<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="{{asset('client/images/bg/page-title-1.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page-title">
                    <h1 class="title">Bài Viết</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active">Bài Viết</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Page Title/Header End -->

<!-- Portfolio Section Start -->
<div class="section section-padding">
    <div class="container">
        <div class="row learts-mb-n50">

            <div class="col-xl-9 col-lg-8 col-12 learts-mb-50">
                <div class="single-blog">
                    <div class="image">
                        <a href="blog-details-right-sidebar.html"><img src="{{ URL::to('/') }}/server/assets/image/article/{{$article->article_img }}" alt="Blog Image"></a>
                    </div>
                    <div class="content">
                        <h2 class="title">{{$article->article_name}}</h2>
                        <ul class="meta">
                            <li><i class="fal fa-user"></i> By <a href="#">{{$article->firstName}} {{$article->lastName}}</a></li>
                            <li><i class="far fa-calendar"></i><a href="#">{{$article->updated_at}}</a></li>
                            <li><i class="fal fa-comment"></i><a href="#">{{count($comment)}} Comments</a></li>
                            <li><i class="far fa-eye"></i> 201 views</li>
                        </ul>
                        <div class="desc">
                            <p>{!!$article->article_description!!}</p>
                        </div>
                    </div>
                    <div class="blog-footer row no-gutters justify-content-between align-items-center">
                        <div class="col-auto">
                            <ul class="tags">
                                <i class="icon fas fa-tags"></i>
                                <li><a href="#">{{$article->article_keyword}}</a></li>
                            </ul>
                        </div>
                        <div class="col-auto">
                            <div class="post-share">
                                Chia sẻ bài viết
                                <span class="toggle"><i class="fas fa-share-alt"></i></span>
                                <ul class="social-list">
                                    <li class="hintT-top" data-hint="Facebook"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="hintT-top" data-hint="Twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="hintT-top" data-hint="Pinterest"><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li class="hintT-top" data-hint="Google Plus"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li class="hintT-top" data-hint="Email"><a href="#"><i class="fal fa-envelope-open"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-author">
                    <div class="thumbnail">
                        @if($article->avatar!=null)
                        <img src="{{URL::to('/') }}/server/assets/image/account/{{$article->avatar }}" alt="">
                        @else
                        <img src="{{asset('client/images/comment/comment-1.jpg')}}" alt="">
                        @endif
                        <div class="social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="content">
                        <a href="#" class="name">{{$article->firstName}} {{$article->lastName}}</a>
                        <p>Hoa nở là hữu tình</p>
                    </div>
                </div>
                <div class="related-blog">
                    <div class="block-title pb-0 border-bottom-0">
                        <h2 class="title">Có Thể Bạn Nên Xem</h2>
                    </div>
                    <div class="row learts-mb-n40">
                        @foreach($related as $relate)
                        <div class="col-md-6 col-12 learts-mb-40">
                            <div class="blog">
                                <div class="image">
                                    <a href="{{URL::to('article',$relate->article_id)}}"><img src="{{URL::to('/') }}/server/assets/image/article/{{$relate->article_img}}" alt="Blog Image"></a>
                                </div>
                                <div class="content">
                                    <ul class="meta">
                                        <li><i class="far fa-calendar"></i><a href="#">{{$relate->updated_at}}</a></li>
                                        <li><i class="far fa-eye"></i> {{$relate->view}} views</li>
                                    </ul>
                                    <h5 class="title mb-0"><a href="{{URL::to('article',$relate->article_id)}}">{{$relate->article_name}}</a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="Comments-wrapper">
                    <div class="block-title pb-0 border-bottom-0">
                        <h2 class="title">Bình Luận <span class="text-muted">({{count($comment)}})</span></h2>
                    </div>
                    <ul class="comment-list">
                        @foreach($comment as $cmt)
                        <li>
                            <div class="comment">
                                <div class="thumbnail">
                                    <img src="{{URL::to('/') }}/server/assets/image/account/{{$cmt->avatar}}" alt="">
                                </div>
                                <div class="content">
                                    <h4 class="name">{{$cmt->firstName}} {{$cmt->lastName}}</h4>
                                    <p>{!!$cmt->comment_description!!}</p>
                                    <div class="actions">
                                        <span class="date">{{$cmt->updated_at}}</span>
                                        <a class="reply-link" href="#">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="block-title pb-0 border-bottom-0">
                        <h2 class="title">Hãy để lại suy nghĩ của bạn</h2>
                    </div>
                    @if(Auth::check())
                    <div class="comment-form">
                        <form action="{{route('BinhLuan.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row learts-mb-n20">
                            <input type="hidden" name="article_id" value="{{ $article->article_id }}">
                            <input type="hidden" name="role" value="0">
                            <div class="col-12 learts-mb-20">
                                <textarea name="comment_description" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12 text-center learts-mb-20 learts-mt-20">
                                <button type="submit" class="btn btn-dark btn-outline-hover-primary">Đăng</button>
                            </div>
                    </div>
                    </form>
                </div>
                @else
                <div class="text-center">
                        <p class="note">Hãy Đăng Nhập Để Thêm Bình Luận</p>
                        <a href="{{route('login')}}" type="button" class="btn btn-info btn-hover-primary">Đăng Nhập Ngay</a>

                    </div>
                    @endif
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-12 learts-mb-10">
            <!-- Search Start -->
            <div class="single-widget learts-mb-40">
                <div class="widget-search">
                    <form action="#">
                        <input type="text" placeholder="Search products....">
                        <button><i class="fal fa-search"></i></button>
                    </form>
                </div>
            </div>
            <!-- Search End -->

            <!-- Blog Post Widget Start -->
            <div class="single-widget learts-mb-40">
                <h3 class="widget-title product-filter-widget-title">Bài đăng gần đây</h3>
                <ul class="widget-blogs">
                    @foreach($recent as $rc)
                    <li class="widget-blog">
                        <div class="thumbnail">
                            <a href="{{URL::to('/article/'.$rc->article_id)}}"><img src="{{URL::to('/') }}/server/assets/image/article/{{$rc->article_img}}" alt="Widget Blog Post"></a>
                        </div>
                        <div class="content">
                            <h6 class="title"><a href="{{URL::to('/article/'.$rc->article_id)}}">{{$rc->article_name}}</a></h6>
                            <span class="date">{{$rc->updated_at}}</span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- Blog Post Widget End -->

            <!-- Categories Start -->
            <div class="single-widget learts-mb-40">
                <div class="widget-banner">
                    <img src="assets/images/banner/widget-banner.jpg" alt="">
                </div>
            </div>
            <!-- Categories End -->

            <!-- Categories Start -->
            <div class="single-widget learts-mb-40">
                <h3 class="widget-title product-filter-widget-title">Categories</h3>
                <ul class="widget-list">
                    @foreach($cate as $rc)
                    <li><a href="{{URL::to('/article/'.$rc->cate_id)}}">{{$rc->cate_name}}</a> <span class="count">11</span></li>
                    @endforeach
                </ul>
            </div>
            <!-- Categories End -->

            <!-- Tags Start -->
            <div class="single-widget learts-mb-40">
                <h3 class="widget-title product-filter-widget-title">Product Tags</h3>
                <div class="widget-tags">
                    <a href="#">design</a>
                    <a href="#">fashion</a>
                    <a href="#">learts</a>
                </div>
            </div>
            <!-- Tags End -->
        </div>

    </div>
</div>

</div>
<!-- Portfolio Section End -->

@endsection