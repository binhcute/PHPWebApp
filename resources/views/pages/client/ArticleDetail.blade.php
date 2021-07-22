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
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
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
                            <li><i class="fal fa-user"></i> By <a href="#">{{$article->fullname}}</a></li>
                            <li><i class="far fa-calendar"></i><a href="#">{{$article->updated_at}}</a></li>
                            <li><i class="fal fa-comment"></i><a href="#">4 Comments</a></li>
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
                                Share this post
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
                        <img src="{{URL::to('/') }}/server/assets/image/user/{{$article->avatar }}" alt="">
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
                        <a href="#" class="name">{{$article->fullname}}</a>
                        <p>Hoa nở là hữu tình</p>
                    </div>
                </div>
                <div class="related-blog">
                    <div class="block-title pb-0 border-bottom-0">
                        <h2 class="title">Related Blog</h2>
                    </div>
                    <div class="row learts-mb-n40">
                        <div class="col-md-6 col-12 learts-mb-40">
                            <div class="blog">
                                <div class="image">
                                    <a href="blog-details-right-sidebar.html"><img src="assets/images/blog/s370/blog-2.jpg" alt="Blog Image"></a>
                                </div>
                                <div class="content">
                                    <ul class="meta">
                                        <li><i class="far fa-calendar"></i><a href="#">January 22, 2020</a></li>
                                        <li><i class="far fa-eye"></i> 158 views</li>
                                    </ul>
                                    <h5 class="title mb-0"><a href="blog-details-right-sidebar.html">Tile Tray with Brass Handles</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 learts-mb-40">
                            <div class="blog">
                                <div class="image">
                                    <a href="blog-details-right-sidebar.html"><img src="assets/images/blog/s370/blog-3.jpg" alt="Blog Image"></a>
                                </div>
                                <div class="content">
                                    <ul class="meta">
                                        <li><i class="far fa-calendar"></i><a href="#">January 22, 2020</a></li>
                                        <li><i class="far fa-eye"></i> 119 views</li>
                                    </ul>
                                    <h5 class="title mb-0"><a href="blog-details-right-sidebar.html">Dining Table Chairs Makeover</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Comments-wrapper">
                    <div class="block-title pb-0 border-bottom-0">
                        <h2 class="title">Comments <span class="text-muted">(4)</span></h2>
                    </div>
                    <ul class="comment-list">
                        <li>
                            <div class="comment">
                                <div class="thumbnail">
                                    <img src="assets/images/comment/comment-2.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h4 class="name">Scott James</h4>
                                    <p>Thanks for always keeping your WordPress themes up to date. Your level of support and dedication is second to none.</p>
                                    <div class="actions">
                                        <span class="date">April 22, 2020 at 2:10 am</span>
                                        <a class="reply-link" href="#">Reply</a>
                                    </div>
                                </div>
                            </div>
                            <ul class="child-comment">
                                <li>
                                    <div class="comment">
                                        <div class="thumbnail">
                                            <img src="assets/images/comment/comment-3.jpg" alt="">
                                        </div>
                                        <div class="content">
                                            <h4 class="name">Edna Watson</h4>
                                            <p>Thanks for always keeping your WordPress themes up to date. Your level of support and dedication is second to none.</p>
                                            <div class="actions">
                                                <span class="date">April 22, 2020 at 2:10 am</span>
                                                <a class="reply-link" href="#">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="comment">
                                <div class="thumbnail">
                                    <img src="assets/images/comment/comment-4.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h4 class="name">Gerhard</h4>
                                    <p>Thanks for always keeping your WordPress themes up to date. Your level of support and dedication is second to none.</p>
                                    <div class="actions">
                                        <span class="date">April 22, 2020 at 2:10 am</span>
                                        <a class="reply-link" href="#">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="comment">
                                <div class="thumbnail">
                                    <img src="assets/images/comment/comment-1.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h4 class="name">Owen Christ</h4>
                                    <p>Thank you very much!</p>
                                    <div class="actions">
                                        <span class="date">April 22, 2020 at 2:10 am</span>
                                        <a class="reply-link" href="#">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="block-title pb-0 border-bottom-0">
                        <h2 class="title">Leave your thought here</h2>
                    </div>
                    <div class="comment-form">
                        <form action="#">
                            <div class="row learts-mb-n20">
                                <div class="col-md-6 col-12 learts-mb-20">
                                    <input type="text" placeholder="Your name (*)">
                                </div>
                                <div class="col-md-6 col-12 learts-mb-20">
                                    <input type="text" placeholder="Mail (*)">
                                </div>
                                <div class="col-12 learts-mb-20">
                                    <textarea placeholder="Message"></textarea>
                                </div>
                                <div class="col-12 text-center learts-mb-20 learts-mt-20">
                                    <button class="btn btn-dark btn-outline-hover-dark">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
                    <h3 class="widget-title product-filter-widget-title">Recent Post</h3>
                    <ul class="widget-blogs">
                        <li class="widget-blog">
                            <div class="thumbnail">
                                <a href="blog-details-right-sidebar.html"><img src="assets/images/blog/widget/widget-1.jpg" alt="Widget Blog Post"></a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="blog-details-right-sidebar.html">Start a Kickass Online Blog</a></h6>
                                <span class="date">January 22, 2020</span>
                            </div>
                        </li>
                        <li class="widget-blog">
                            <div class="thumbnail">
                                <a href="blog-details-right-sidebar.html"><img src="assets/images/blog/widget/widget-2.jpg" alt="Widget Blog Post"></a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="blog-details-right-sidebar.html">Tile Tray with Brass Handles</a></h6>
                                <span class="date">January 22, 2020</span>
                            </div>
                        </li>
                        <li class="widget-blog">
                            <div class="thumbnail">
                                <a href="blog-details-right-sidebar.html"><img src="assets/images/blog/widget/widget-3.jpg" alt="Widget Blog Post"></a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a href="blog-details-right-sidebar.html">Dining Table Chairs Makeover</a></h6>
                                <span class="date">January 22, 2020</span>
                            </div>
                        </li>
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
                        <li><a href="#">Gift ideas</a> <span class="count">11</span></li>
                        <li><a href="#">Feature</a> <span class="count">2</span></li>
                        <li><a href="#">Kitchen</a> <span class="count">11</span></li>
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