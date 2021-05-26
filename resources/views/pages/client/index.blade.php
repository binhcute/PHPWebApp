@extends('layout_client')
@section('content')
@section('title','Trang Chủ')
    <!-- Slider main container Start -->
    <div class="home1-slider swiper-container">
        <div class="swiper-wrapper">
            <div class="home1-slide-item swiper-slide" data-swiper-autoplay="5000" data-bg-image="{{asset('client/images/slider/home1/slide-1.jpg')}}">
                <div class="home1-slide1-content">
                    <span class="bg"></span>
                    <span class="slide-border"></span>
                    <span class="icon"><img src="{{asset('client/images/slider/home1/slide-1-1.png')}}" alt="Slide Icon"></span>
                    <h2 class="title">Handicraft Shop</h2>
                    <h3 class="sub-title">Just for you</h3>
                    <div class="link"><a href="shop.html">shop now</a></div>
                </div>
            </div>
            <div class="home1-slide-item swiper-slide" data-swiper-autoplay="5000" data-bg-image="{{asset('client/images/slider/home1/slide-2.jpg')}}">
                <div class="home1-slide2-content">
                    <span class="bg" data-bg-image="{{asset('client/images/slider/home1/slide-2-1.png')}}"></span>
                    <span class="slide-border"></span>
                    <span class="icon">
                        <img src="{{asset('client/images/slider/home1/slide-2-2.png')}}" alt="Slide Icon">
                        <img src="{{asset('client/images/slider/home1/slide-2-3.png')}}" alt="Slide Icon">
                    </span>
                    <h2 class="title">Newly arrived</h2>
                    <h3 class="sub-title">Sale up to <br>10%</h3>
                    <div class="link"><a href="shop.html">shop now</a></div>
                </div>
            </div>
            <div class="home1-slide-item swiper-slide" data-swiper-autoplay="5000" data-bg-image="{{asset('client/images/slider/home1/slide-3.jpg')}}">
                <div class="home1-slide3-content">
                    <h2 class="title">Affectious gifts</h2>
                    <h3 class="sub-title">
                        <img class="left-icon " src="{{asset('client/images/slider/home1/slide-2-2.png')}}" alt="Slide Icon">
                        For friends & family
                        <img class="right-icon " src="{{asset('client/images/slider/home1/slide-2-3.png')}}" alt="Slide Icon">
                    </h3>
                    <div class="link"><a href="shop.html">shop now</a></div>
                </div>
            </div>
        </div>
        <div class="home1-slider-prev swiper-button-prev"><i class="ti-angle-left"></i></div>
        <div class="home1-slider-next swiper-button-next"><i class="ti-angle-right"></i></div>
    </div>
    <!-- Slider main container End -->

    <!-- Sale Banner Section Start -->
    <div class="section section-padding">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title text-center">
                <h3 class="sub-title">Just for you</h3>
                <h2 class="title title-icon-both">Making & crafting</h2>
            </div>
            <!-- Section Title End -->

            <div class="row learts-mb-n40">

                <div class="col-lg-5 col-md-6 col-12 mr-auto learts-mb-40">
                    <div class="sale-banner1" data-bg-image="{{asset('client/images/banner/sale/sale-banner1-1.png')}}">
                        <div class="inner">
                            <img src="{{asset('client/images/banner/sale/sale-banner1-1.1.png')}}" alt="Sale Banner Icon">
                            <span class="title">Spring sale</span>
                            <h2 class="sale-percent">
                                <spam class="number">40</spam> % <br> off
                            </h2>
                            <a href="shop.html" class="link">shop now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12 learts-mb-40">
                    <div class="sale-banner2">
                        <div class="inner">
                            <div class="image"><img src="{{asset('client/images/banner/sale/sale-banner2-1.jpg')}}" alt=""></div>
                            <div class="content row justify-content-between mb-n3">
                                <div class="col-auto mb-3">
                                    <h2 class="sale-percent">10% off</h2>
                                    <span class="text">YOUR NEXT PURCHASE</span>
                                </div>
                                <div class="col-auto mb-3">
                                    <a class="btn btn-hover-dark" href="shop.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Sale Banner Section End -->

    <!-- Category Banner Section Start -->
    <div class="section section-fluid section-padding pt-0">
        <div class="container">
            <div class="category-banner1-carousel">

                <div class="col">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image"><img src="{{asset('client/images/banner/category/banner-s1-1.jpg')}}" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html">Gift ideas</a>
                                    <span class="number">16</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image"><img src="{{asset('client/images/banner/category/banner-s1-2.jpg')}}" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html">Home Decor</a>
                                    <span class="number">16</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image"><img src="{{asset('client/images/banner/category/banner-s1-3.jpg')}}" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html">Kids & Babies</a>
                                    <span class="number">6</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image"><img src="{{asset('client/images/banner/category/banner-s1-4.jpg')}}" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html">Kitchen</a>
                                    <span class="number">15</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="shop.html" class="image"><img src="{{asset('client/images/banner/category/banner-s1-5.jpg')}}" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="shop.html">Kniting & Sewing</a>
                                    <span class="number">4</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Category Banner Section End -->

    <!-- Product Section Start -->
    <div class="section section-fluid section-padding pt-0">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title text-center">
                <h3 class="sub-title">Shop now</h3>
                <h2 class="title title-icon-both">Shop our best-sellers</h2>
            </div>
            <!-- Section Title End -->

            <!-- Products Start -->
            <div class="products row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <span class="product-badges">
                                    <span class="onsale">-13%</span>
                                </span>
                                <img src="{{asset('client/images/product/s328/product-1.jpg')}}" alt="Product Image">
                                <img class="image-hover " src="{{asset('client/images/product/s328/product-1-hover.jpg')}}" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">Boho Beard Mug</a></h6>
                            <span class="price">
                                <span class="old">$45.00</span>
                            <span class="new">$39.00</span>
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($product as $item)
                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="product-details.html" class="image">
                                <img src="server/assets/images/product/{{ $item->img}}" alt="Product Image">
                                <img class="image-hover " src="{{asset('client/images/product/s328/product-2-hover.jpg')}}" alt="Product Image">
                            </a>
                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product-info">
                            <h6 class="title"><a href="product-details.html">{{$item->name}}</a></h6>
                            <span class="price">
                                {{$item->price}} vnd
                            </span>
                            <div class="product-buttons">
                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <!-- Products End -->

        </div>
    </div>
    <!-- Product Section End -->

@endsection