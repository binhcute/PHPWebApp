<!DOCTYPE html>
<html class="no-js" lang="vn">


<!-- Mirrored from htmldemo.hasthemes.com/learts/learts/{{route('index')}} by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Mar 2021 04:13:06 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Learts – @yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('client/images/favicon.png')}}">

    <!-- CSS
	============================================ -->

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <!-- <link rel="stylesheet" href="{{asset('client/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/vendor/font-awesome-pro.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/vendor/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/vendor/customFonts.css')}}"> -->

    <!-- Plugins CSS (All Plugins Files) -->
    <!-- <link rel="stylesheet" href="{{asset('client/css/plugins/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/photoswipe.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/photoswipe-default-skin.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/slick.css')}}"> -->

    <!-- Main Style CSS -->
    <!-- <link rel="stylesheet" href="{{asset('client/css/style.css')}}"> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="{{asset('client/css/vendor/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/plugins/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/style.min.css')}}">

</head>

<body>


    <!-- Header Section Start -->
    <div class="header-section section bg-white d-none d-xl-block">
        <div class="container">
            <div class="row row-cols-lg-3 align-items-center">

                <!-- Header Language & Currency Start -->
                <div class="col">
                    <ul class="header-lan-curr">
                        <li><a href="#">Việt Nam</a>
                            <ul class="curr-lan-sub-menu">
                                <li><a href="#">English</a></li>
                            </ul>
                        </li>
                        <li><a href="#">VND</a>
                            <ul class="curr-lan-sub-menu">
                                <li><a href="#">USD</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Header Language & Currency End -->

                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo justify-content-center">
                        <a href="{{route('index')}}"><img src="{{asset('client/images/logo/logo.png')}}" alt="Learts Logo"></a>
                    </div>
                </div>
                <!-- Header Logo End -->
                <!-- Header Tools Start -->
                <div class="col">
                    <div class="header-tools justify-content-end">
                        <div class="header-login">
                            @if(Auth::check())
                            <div class="blog-author" style="margin-bottom: 0px;">
                                <div class="thumbnail" style="width: 32px;">
                                    @if(Auth::user()->avatar!=null)
                                    <a href="#offcanvas-account" class="offcanvas-toggle"><img src="{{URL::to('/') }}/server/assets/image/account/{{Auth::user()->avatar }}" alt="" style="height:32px"></a>
                                    @else
                                    <a href="#offcanvas-account" class="offcanvas-toggle"><img src="{{asset('client/images/comment/comment-1.jpg')}}" alt="" style="height:32px"></a>
                                    @endif
                                </div>
                            </div>
                            @else
                            <a href="{{route('login')}}"><i class="fal fa-user"></i></a>
                            @endif
                        </div>
                        <div class="header-search">
                            <a href="#offcanvas-search" class="offcanvas-toggle"><i class="fal fa-search"></i></a>
                        </div>
                        <div class="header-wishlist">
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle"><span class="wishlist-count">3</span><i class="fal fa-heart"></i></a>
                        </div>
                        <div class="header-cart">
                            <a href="#offcanvas-cart" class="offcanvas-toggle"><span class="cart-count">3</span><i class="fal fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->
            </div>
        </div>

        <!-- Site Menu Section Start -->
        <div class="site-menu-section section">
            <div class="container">
                <nav class="site-main-menu justify-content-center">
                    <ul>
                        <li><a href="{{route('index')}}"><span class="menu-text">Trang Chủ</span></a></li>
                        <li><a href="{{URL::to('/product')}}"><span class="menu-text">Sản Phẩm</span></a></li>
                        <li><a href="{{URL::to('/article')}}"><span class="menu-text">Bài Viết</span></a></li>
                        <li><a href="{{URL::to('/categories_detail')}}"><span class="menu-text">Danh Mục</span></a></li>
                        <li><a href="{{URL::to('/brand_detail')}}"><span class="menu-text">Nhà Cung Cấp</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Site Menu Section End -->

    </div>
    <!-- Header Section End -->

    <!-- Header Sticky Section Start -->
    <div class="sticky-header header-menu-center section bg-white d-none d-xl-block">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="{{route('index')}}"><img width="50" height="50" src="{{asset('client/images/logo/genz.gif')}}" alt="Learts Logo"><img style="padding-left: 15px" width="200" height="40" src="{{asset('client/images/logo/logo-2.png')}}"></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Search Start -->
                <div class="col d-none d-xl-block">
                    <nav class="site-main-menu justify-content-center">
                        <ul>
                        <li><a href="{{URL::to('/product')}}"><span class="menu-text">Sản Phẩm</span></a></li>
                        <li><a href="{{URL::to('/article')}}"><span class="menu-text">Bài Viết</span></a></li>
                        <li><a href="{{URL::to('/categories_detail')}}"><span class="menu-text">Danh Mục</span></a></li>
                        <li><a href="{{URL::to('/brand_detail')}}"><span class="menu-text">Nhà Cung Cấp</span></a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Search End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        <div class="header-login">
                            @if(Auth::check())
                            <div class="blog-author" style="margin-bottom: 0px;">
                                <div class="thumbnail" style="width: 32px;">
                                    @if(Auth::user()->avatar!=null)
                                    <a href="#offcanvas-account" class="offcanvas-toggle"><img src="{{URL::to('/') }}/server/assets/image/account/{{Auth::user()->avatar }}" alt="" style="height:32px"></a>
                                    @else
                                    <a href="#offcanvas-account" class="offcanvas-toggle"><img src="{{asset('client/images/comment/comment-1.jpg')}}" alt="" style="height:32px"></a>
                                    @endif
                                </div>
                            </div>
                            @else
                            <a href="{{route('login')}}"><i class="fal fa-user"></i></a>
                            @endif
                        </div>
                        <div class="header-search d-none d-sm-block">
                            <a href="#offcanvas-search" class="offcanvas-toggle"><i class="fal fa-search"></i></a>
                        </div>
                        <div class="header-wishlist">
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle"><span class="wishlist-count">3</span><i class="fal fa-heart"></i></a>
                        </div>
                        <div class="header-cart">
                            <a href="#offcanvas-cart" class="offcanvas-toggle"><span class="cart-count">3</span><i class="fal fa-shopping-cart"></i></a>
                        </div>
                        <div class="mobile-menu-toggle d-xl-none">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>

    </div>
    <!-- Header Sticky Section End -->
    <!-- Mobile Header Section Start -->
    <div class="mobile-header bg-white section d-xl-none">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="{{route('index')}}"><img src="{{asset('client/images/logo/logo-2.png')}}" alt="Learts Logo"></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        <div class="header-login d-none d-sm-block">
                            <a href="{{route('login')}}"><i class="fal fa-user"></i></a>
                        </div>
                        <div class="header-search d-none d-sm-block">
                            <a href="#offcanvas-search" class="offcanvas-toggle"><i class="fal fa-search"></i></a>
                        </div>
                        <div class="header-wishlist d-none d-sm-block">
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle"><span class="wishlist-count">3</span><i class="fal fa-heart"></i></a>
                        </div>
                        <div class="header-cart">
                            <a href="#offcanvas-cart" class="offcanvas-toggle"><span class="cart-count">3</span><i class="fal fa-shopping-cart"></i></a>
                        </div>
                        <div class="mobile-menu-toggle">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>
    </div>
    <!-- Mobile Header Section End -->

    <!-- Mobile Header Section Start -->
    <div class="mobile-header sticky-header bg-white section d-xl-none">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="{{route('index')}}"><img width="50" height="50" src="{{asset('client/images/logo/genz.gif')}}" alt="Learts Logo"><img style="padding-left: 15px;" width="180" height="40" src="{{asset('client/images/logo/logo-2.png')}}"></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        <div class="header-login d-none d-sm-block">
                            <a href="{{route('login')}}"><i class="fal fa-user"></i></a>
                        </div>
                        <div class="header-search d-none d-sm-block">
                            <a href="#offcanvas-search" class="offcanvas-toggle"><i class="fal fa-search"></i></a>
                        </div>
                        <div class="header-wishlist d-none d-sm-block">
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle"><span class="wishlist-count">3</span><i class="fal fa-heart"></i></a>
                        </div>
                        <div class="header-cart">
                            <a href="#offcanvas-cart" class="offcanvas-toggle"><span class="cart-count">3</span><i class="fal fa-shopping-cart"></i></a>
                        </div>
                        <div class="mobile-menu-toggle">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>
    </div>
    <!-- Mobile Header Section End -->
    @if (Auth::check())
    <!-- OffCanvas account Start -->
    <div id="offcanvas-account" class="offcanvas offcanvas-account">
        <div class="inner">
            <div class="head">
                <span class="title">Tài Khoản</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <li>
                        <div class="account-client">
                            @if(Auth::user()->avatar!=null)
                            <img src="{{URL::to('/') }}/server/assets/image/account/{{Auth::user()->avatar }}" alt="">
                            @else
                            <img src="{{asset('client/images/comment/comment-1.jpg')}}" alt="">
                            @endif
                            <div class="social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                            <h5><i>Thông tin cá nhân ({{Auth::user()->username}})</i></h5>
                            <hr>
                            <div class="account-content">
                                <a href="#" class="name">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
                                
                                <h5>Phone: <i>{{Auth::user()->phone}}</i></h5>
                                <h5>Email: <i>{{Auth::user()->email}}</i></h5>
                            </div>
                            <hr>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="foot">
                <div class="buttons">
                    @if(Auth::user()->level == 1)
                    <a href="{{URL::to('/admin')}}" class="btn btn-secondary btn-hover-primary"><i class="fas fa-users-cog"></i> Trang Admin</a>
                    @endif
                    <a href="{{URL::to('/account')}}" class="btn btn-dark btn-hover-primary"><i class="fas fa-user-circle"></i> Tài Khoản</a>
                    <a href="{{ route('logout') }}" class="btn btn-outline-dark btn-hover-primary" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fas fa-door-open" data-feather="log-in"> </i> Đăng Xuất
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- OffCanvas Cart End -->
    @endif
    <!-- OffCanvas Search Start -->
    <div id="offcanvas-search" class="offcanvas offcanvas-search">
        <div class="inner">
            <div class="offcanvas-search-form">
                <button class="offcanvas-close">×</button>
                <form action="#">
                    <div class="row mb-n3">
                        <div class="col-lg-8 col-12 mb-3"><input type="text" name="key" placeholder="Search Products..."></div>
                        <div class="col-lg-4 col-12 mb-3">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <p class="search-description text-body-light mt-2"> <span>Tìm Kiếm Một Sản Phẩm Nào Đó Theo Ý Thích Của Bạn</span></p>

        </div>
    </div>
    <!-- OffCanvas Search End -->

    <!-- OffCanvas Wishlist Start -->
    <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
        <div class="inner">
            <div class="head">
                <span class="title">Yêu Thích</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <li>
                        <a href="product-details.html" class="image"><img src="{{asset('client/images/product/cart-product-1.jpg')}}" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="product-details.html" class="title">Walnut Cutting Board</a>
                            <span class="quantity-price">1 x <span class="amount">$100.00</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="product-details.html" class="image"><img src="{{asset('client/images/product/cart-product-2.jpg')}}" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="product-details.html" class="title">Lucky Wooden Elephant</a>
                            <span class="quantity-price">1 x <span class="amount">$35.00</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="product-details.html" class="image"><img src="{{asset('client/images/product/cart-product-3.jpg')}}" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="product-details.html" class="title">Fish Cut Out Set</a>
                            <span class="quantity-price">1 x <span class="amount">$9.00</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="foot">
                <div class="buttons">
                    <a href="{{URL::to('/favorite')}}" class="btn btn-dark btn-hover-primary">Xem Danh Sách</a>
                </div>
            </div>
        </div>
    </div>
    <!-- OffCanvas Wishlist End -->

    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
        <div class="inner">
            <div class="head">
                <span class="title">Giỏ Hàng</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list number_format" id="mang-index">

                </ul>
            </div>
            <div class="foot">
                <div class="sub-total">
                    <strong>Tổng Cộng :</strong>
                    <span class="amount" id="tongtien-layout"></span>
                </div>
                <div class="buttons">
                    <a href="{{URL::to('/cart')}}" class="btn btn-dark btn-hover-primary">Xem Giỏ Hàng</a>
                    <a href="{{URL::to('/checkout')}}" class="btn btn-outline-dark">Thanh Toán Nhanh</a>
                </div>
            </div>
        </div>
    </div>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Search Start -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
        <div class="inner customScroll">
            <div class="offcanvas-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button><i class="fal fa-search"></i></button>
                </form>
            </div>
            <div class="offcanvas-menu">
                <ul>
                    <li><a href="{{route('index')}}"><span class="menu-text">Trang Chủ</span></a></li>
                    <li><a href="{{URL::to('/product')}}"><span class="menu-text">Sản Phẩm</span></a></li>
                    <li><a href="{{URL::to('/article')}}"><span class="menu-text">Bài Viết</span></a></li>
                    <li><a href="{{URL::to('/categories_detail')}}"><span class="menu-text">Danh Mục</span></a></li>
                    <li><a href="{{URL::to('/brand_detail')}}"><span class="menu-text">Nhà Cung Cấp</span></a></li>
                </ul>
            </div>
            <div class="offcanvas-buttons">
                <div class="header-tools">
                    <div class="header-login">
                        @if(Auth::check())
                        <div class="blog-author" style="margin-bottom: 0px;">
                            <div class="thumbnail" style="width: 32px;">
                                @if(Auth::user()->avatar!=null)
                                <a href="#offcanvas-account" class="offcanvas-toggle"><img src="{{URL::to('/') }}/server/assets/image/account/{{Auth::user()->avatar }}" alt="" style="height:32px"></a>
                                @else
                                <a href="#offcanvas-account" class="offcanvas-toggle"><img src="{{asset('client/images/comment/comment-1.jpg')}}" alt="" style="height:32px"></a>
                                @endif
                            </div>
                        </div>
                        @else
                        <a href="{{route('login')}}"><i class="fal fa-user"></i></a>
                        @endif
                    </div>
                    <div class="header-wishlist">
                        <a href="wishlist.html"><span>3</span><i class="fal fa-heart"></i></a>
                    </div>
                    <div class="header-cart">
                        <a href="shopping-cart.html"><span class="cart-count">3</span><i class="fal fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
            <div class="offcanvas-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
    <!-- OffCanvas Search End -->

    <div class="offcanvas-overlay"></div>

    @yield('content')

    <div class="footer1-section section section-padding">
        <div class="container">
            <div class="row text-center row-cols-1">

                <div class="footer1-logo col text-center">
                    <img width="200" height="200" src="{{asset('client/images/logo/gen.png')}}" alt="">
                </div>

                <div class="footer1-social col">
                    <ul class="widget-social justify-content-center">
                        <li class="hintT-top" data-hint="Twitter"> <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a></li>
                        <li class="hintT-top" data-hint="Facebook"> <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="hintT-top" data-hint="Instagram"> <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                        <li class="hintT-top" data-hint="Youtube"> <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>

                <div class="footer1-menu col">
                    <ul class="widget-menu justify-content-center">
                        <li><a href="{{URL::to('/about_us')}}">Về chúng tôi</a></li>
                        <li><a href="#">Địa chỉ</a></li>
                        <li><a href="{{URL::to('/LienHe')}}">Liên hệ</a></li>
                        <li><a href="#">Hỗ trợ</a></li>
                        <li><a href="#">Policy</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>

                <div class="footer1-copyright col">
                    <p class="copyright">&copy; 2021 | <a href="https://caothang.edu.vn/"><strong> Cao đẳng kỹ thuật Cao Thắng.</strong></a></p>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="quickViewModal modal fade" id="quickViewModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="close" data-dismiss="modal">&times;</button>
                <div class="row learts-mb-n30">

                    <!-- Product Images Start -->
                    <div class="col-lg-6 col-12 learts-mb-30">
                        <div class="product-images">
                            <div class="product-gallery-slider-quickview">
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-1.jpg')}}">
                                    <img src="{{asset('client/images/product/single/1/product-1.jpg')}}" alt="">
                                </div>
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-2.jpg')}}">
                                    <img src="{{asset('client/images/product/single/1/product-2.jpg')}}" alt="">
                                </div>
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-3.jpg')}}">
                                    <img src="{{asset('client/images/product/single/1/product-3.jpg')}}" alt="">
                                </div>
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-4.jpg')}}">
                                    <img src="{{asset('client/images/product/single/1/product-4.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Images End -->

                    <!-- Product Summery Start -->
                    <div class="col-lg-6 col-12 overflow-hidden learts-mb-30">
                        <div class="product-summery customScroll">
                            <div class="product-ratings">
                                <span class="star-rating">
                                    <span class="rating-active" style="width: 100%;">ratings</span>
                                </span>
                                <a href="#reviews" class="review-link">(<span class="count">3</span> customer reviews)</a>
                            </div>
                            <h3 class="product-title">Cleaning Dustpan & Brush</h3>
                            <div class="product-price">£38.00 – £50.00</div>
                            <div class="product-description">
                                <p>Easy clip-on handle – Hold the brush and dustpan together for storage; the dustpan edge is serrated to allow easy scraping off the hair without entanglement. High-quality bristles – no burr damage, no scratches, thick and durable, comfortable to remove dust and smaller particles.</p>
                            </div>
                            <div class="product-variations">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="label"><span>Size</span></td>
                                            <td class="value">
                                                <div class="product-sizes">
                                                    <a href="#">Large</a>
                                                    <a href="#">Medium</a>
                                                    <a href="#">Small</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Color</span></td>
                                            <td class="value">
                                                <div class="product-colors">
                                                    <a href="#" data-bg-color="#000000"></a>
                                                    <a href="#" data-bg-color="#ffffff"></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Quantity</span></td>
                                            <td class="value">
                                                <div class="product-quantity">
                                                    <span class="qty-btn minus"><i class="ti-minus"></i></span>
                                                    <input type="text" class="input-qty" value="1">
                                                    <span class="qty-btn plus"><i class="ti-plus"></i></span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="product-buttons">
                                <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark"><i class="fal fa-heart"></i></a>
                                <a href="#" class="btn btn-dark btn-outline-hover-dark"><i class="fal fa-shopping-cart"></i> Add to Cart</a>
                                <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark"><i class="fal fa-random"></i></a>
                            </div>
                            <div class="product-brands">
                                <span class="title">Brands</span>
                                <div class="brands">
                                    <a href="#"><img src="{{asset('client/images/brands/brand-3.png')}}" alt=""></a>
                                    <a href="#"><img src="{{asset('client/images/brands/brand-8.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="product-meta mb-0">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="label"><span>SKU</span></td>
                                            <td class="value">0404019</td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Category</span></td>
                                            <td class="value">
                                                <ul class="product-category">
                                                    <li><a href="#">Kitchen</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Tags</span></td>
                                            <td class="value">
                                                <ul class="product-tags">
                                                    <li><a href="#">handmade</a></li>
                                                    <li><a href="#">learts</a></li>
                                                    <li><a href="#">mug</a></li>
                                                    <li><a href="#">product</a></li>
                                                    <li><a href="#">learts</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Share on</span></td>
                                            <td class="va">
                                                <div class="product-share">
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                                    <a href="#"><i class="fal fa-envelope"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Product Summery End -->

                </div>
            </div>
        </div>
    </div>

    <!-- JS
============================================ -->

    <!-- Vendors JS -->
    <!-- <script src="{{asset('client/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('client/js/vendor/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('client/js/vendor/jquery-migrate-3.1.0.min.js')}}"></script>
<script src="{{asset('client/js/vendor/bootstrap.bundle.min.js')}}"></script> -->

    <!-- Plugins JS -->
    <!-- <script src="{{asset('client/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('client/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('client/js/plugins/swiper.min.js')}}"></script>
<script src="{{asset('client/js/plugins/slick.min.js')}}"></script>
<script src="{{asset('client/js/plugins/mo.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.instagramFeed.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('client/js/plugins/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('client/js/plugins/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.matchHeight-min.js')}}"></script>
<script src="{{asset('client/js/plugins/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('client/js/plugins/photoswipe.min.js')}}"></script>
<script src="{{asset('client/js/plugins/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.zoom.min.js')}}"></script>
<script src="{{asset('client/js/plugins/ResizeSensor.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.sticky-sidebar.min.js')}}"></script>
<script src="{{asset('client/js/plugins/product360.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('client/js/plugins/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('client/js/plugins/scrollax.min.js')}}"></script> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="{{asset('client/js/vendor/vendor.min.js')}}"></script>
    <script src="{{asset('client/js/plugins/plugins.min.js')}}"></script>

    <!-- Main Activation JS -->
    <script src="{{asset('client/js/main.js')}}"></script>
    <script src="{{asset('client/js/xulygiohang.js')}}"></script>

</body>


<!-- Mirrored from htmldemo.hasthemes.com/learts/learts/{{route('index')}} by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Mar 2021 04:14:01 GMT -->

</html>