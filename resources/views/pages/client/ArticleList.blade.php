@extends('layout_client')
@section('content')
@section('title','Bài Viết')

    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="assets/images/bg/page-title-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Blog</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
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
                    <div class="row no-gutters learts-mb-n40">

                        <div class="col-12 border-bottom learts-pb-40 learts-mb-40">
                            <div class="blog">
                                <div class="row learts-mb-n30">
                                    <div class="col-md-5 col-12 learts-mb-30">
                                        <div class="image mb-0">
                                            <a href="blog-details-right-sidebar.html"><img src="assets/images/blog/s345/blog-1.jpg" alt="Blog Image"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-12 align-self-center learts-mb-30">
                                        <div class="content">
                                            <ul class="meta">
                                                <li><i class="far fa-calendar"></i><a href="#">January 22, 2020</a></li>
                                                <li><i class="far fa-eye"></i> 201 views</li>
                                            </ul>
                                            <h5 class="title"><a href="blog-details-right-sidebar.html">Start a Kickass Online Blog</a></h5>
                                            <div class="desc">
                                                <p>Working on writing our first book has been one of the most amazing projects. It seems like it will be forever until I get to show you what we’ve been…</p>
                                            </div>
                                            <a href="blog-details-right-sidebar.html" class="link">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        </ul>
                    </div>
                    <!-- Blog Post Widget End -->

                    <!-- Categories Start -->
                    <div class="single-widget learts-mb-40">
                        <div class="widget-banner">
                            <img src="{{asset('client/images/banner/widget-banner.jpg')}}" alt="">
                        </div>
                    </div>
                    <!-- Categories End -->

                    <!-- Categories Start -->
                    <div class="single-widget learts-mb-40">
                        <h3 class="widget-title product-filter-widget-title">Categories</h3>
                        <ul class="widget-list">
                            <li><a href="#">Gift ideas</a></li>
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