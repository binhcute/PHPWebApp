@extends('layout_client')
@section('content')
@section('title','Chi Tiết Sản Phẩm')

@foreach ($product_brand as $brand)

@foreach($product_cate as $cate)

@foreach($product_color as $color)
<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="{{ URL::to('/') }}/client/images/bg/page-title-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page-title">
                    <h1 class="title">Shop</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('/product')}}">Sản Phẩm</a></li>
                        <li class="breadcrumb-item active">{{$product->name}}</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Page Title/Header End -->

<!-- Single Products Section Start -->
<div class="section section-padding border-bottom">
    <div class="container">
        <div class="row learts-mb-n40">

            <!-- Product Images Start -->
            <div class="col-lg-6 col-12 learts-mb-40">
                <div class="product-images">
                    <button class="product-gallery-popup hintT-left" data-hint="Click to enlarge" data-images='[
                            {"src": "{{ url::to("/")}}/server/assets/images/product/{{$product->img}}", "w": 700, "h": 1100},
                            {"src": "client/images/product/single/1/product-zoom-2.jpg", "w": 700, "h": 1100},
                            {"src": "client/images/product/single/1/product-zoom-3.jpg", "w": 700, "h": 1100},
                            {"src": "client/images/product/single/1/product-zoom-4.jpg", "w": 700, "h": 1100}
                        ]'><i class="far fa-expand"></i></button>
                    <a href="https://www.youtube.com/watch?v=M829YSPnjUw" class="product-video-popup video-popup hintT-left" data-hint="Click to see video"><i class="fal fa-play"></i></a>
                    <div class="product-gallery-slider">
                        <div class="product-zoom">
                            <img src="{{ URL::to('/') }}/server/assets/images/product/{{ $product->img }}" alt="">
                        </div>
                        @if ($product->img_hover !=null)
                        <div class="product-zoom">
                            <img src="{{ URL::to('/') }}/server/assets/images/product/hover/{{ $product->img_hover }}" alt="">
                        </div>
                        @endif

                    </div>
                    <div class="product-thumb-slider">
                        @if ($product->img_hover !=null)
                        <div class="item">
                            <img src="{{ URL::to('/') }}/server/assets/images/product/{{ $product->img }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ URL::to('/') }}/server/assets/images/product/hover/{{ $product->img_hover }}" alt="">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Product Images End -->

            <!-- Product Summery Start -->
            <div class="col-lg-6 col-12 learts-mb-40">
                <div class="product-summery">
                    <div class="product-nav">
                        <a href="#"><i class="fal fa-long-arrow-left"></i></a>
                        <a href="#"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    <div class="product-ratings">
                        <span class="star-rating">
                            <span class="rating-active" style="width: 100%;">ratings</span>
                        </span>
                        <a href="#reviews" class="review-link">(Có <span class="count">3</span> lượt đánh giá)</a>
                    </div>
                    <h3 class="product-title">{{$product->name}}</h3>
                    <div class="product-price">{{number_format($product->price).' '.'VND'}}</div>
                    <div class="product-description">
                        <p><b>Date: </b><i>{{$product->updated_at}}</i></p>
                    </div>
                    <div class="product-description">
                        <p><b>Trạng Thái: </b>Còn Hàng</p>
                    </div>
                    <div class="product-brands">
                        <span class="title">Nhà Cung Cấp</span>
                        <div class="brands">
                            <a href="#"><img src="{{URL::to('/') }}/server/assets/images/portfolio/{{$brand->img}}" alt=""></a>
                        </div>
                    </div>
                    
                    <div class="product-variations">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="label"><span>Số Lượng</span></td>
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
                        <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark hintT-top" data-hint="Add to Wishlist"><i class="fal fa-heart"></i></a>
                        <button onclick="addProduct('{{$product->id}}','{{$product->name}}','{{$product->price}}',`{{ URL::to('/') }}/server/assets/images/product/{{ $product->img }}`,this)" class="btn btn-dark btn-hover-primary"><i class="fal fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                        <a onclick="updateProduct()" class="btn btn-icon btn-outline-body btn-hover-dark hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                    </div>
                    <br>
                    <div class="product-meta">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="label"><span>Series</span></td>
                                    <td class="value">{{$product->series}}</td>
                                </tr>
                                <tr>
                                    <td class="label"><span>Danh Mục</span></td>
                                    <td class="value">
                                        <ul class="product-category">
                                            <li><a href="#">{{$cate->name}}</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><span>Từ Khóa</span></td>
                                    <td class="value">
                                        <ul class="product-tags">
                                            <li><a href="#">{{$product->keyword}}</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><span>Chia Sẻ</span></td>
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
<!-- Single Products Section End -->

<!-- Single Products Infomation Section Start -->
<div class="section section-padding border-bottom">
    <div class="container">

        <ul class="nav product-info-tab-list">
            <li><a class="active" data-toggle="tab" href="#tab-description">Chi Tiết Sản Phẩm</a></li>
            <li><a data-toggle="tab" href="#tab-additional_information">Thông Tin Thêm</a></li>
            <li><a data-toggle="tab" href="#tab-pwb_tab">Nhà Cung Cấp</a></li>
            <li><a data-toggle="tab" href="#tab-reviews">Bình Luận (3)</a></li>
        </ul>
        <div class="tab-content product-infor-tab-content">
            <div class="tab-pane fade show active" id="tab-description">
                <div class="row">
                    <div class="col-lg-10 col-12 mx-auto">
                        <p>{!!$product->detail!!}</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-pwb_tab">
                <div class="row learts-mb-n30">
                    <div class="col-12 learts-mb-30">
                        <div class="row learts-mb-n10">
                            <div class="col-lg-2 col-md-3 col-12 learts-mb-10"><img src="client/images/brands/brand-3.png" alt=""></div>
                            <div class="col learts-mb-10">
                                <h6>{{$brand->name}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 learts-mb-30">
                        <div class="row learts-mb-n10">
                            <div class="col-lg-2 col-md-3 col-12 learts-mb-10"><img src="client/images/brands/brand-8.png" alt=""></div>
                            <div class="col learts-mb-10">
                                <p>{{$brand->detail}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-additional_information">
                <div class="row">
                    <div class="col-lg-8 col-md-10 col-12 mx-auto">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Số Lượng</td>
                                        <td>{{$product->quantity}}</td>
                                    </tr>
                                    <tr>
                                        <td>Màu Sắc</td>
                                        <td>{{$color->name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-reviews">
                <div class="product-review-wrapper">
                    <span class="title">Có 3 reviews sản phẩm {{$product->name}}</span>
                    <ul class="product-review-list">
                        <li>
                            <div class="product-review">
                                <div class="thumb"><img src="client/images/review/review-1.jpg" alt=""></div>
                                <div class="content">
                                    <div class="ratings">
                                        <span class="star-rating">
                                            <span class="rating-active" style="width: 100%;">ratings</span>
                                        </span>
                                    </div>
                                    <div class="meta">
                                        <h5 class="title">Edna Watson</h5>
                                        <span class="date">November 27, 2020</span>
                                    </div>
                                    <p>Thanks for always keeping your WordPress themes up to date. Your level of support and dedication is second to none.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <span class="title">Thêm Bình Luận</span>
                    <div class="review-form">
                        <p class="note">Chỉ hiển thị tên trong lượt đánh giá, email của bạn sẽ được bảo mật</p>
                        <form action="#">
                            <div class="row learts-mb-n30">
                                <div class="col-md-6 col-12 learts-mb-30"><input type="text" placeholder="Tên Hiển Thị *"></div>
                                <div class="col-md-6 col-12 learts-mb-30"><input type="email" placeholder="Email *"></div>
                                <div class="col-12 learts-mb-10">
                                    <div class="form-rating">
                                        <span class="title">Đánh giá của bạn</span>
                                        <span class="rating"><span class="star"></span></span>
                                    </div>
                                </div>
                                <div class="col-12 learts-mb-30"><textarea placeholder="Bình luận của bạn *"></textarea></div>
                                <div class="col-12 text-center learts-mb-30"><button class="btn btn-dark btn-outline-hover-dark">Gửi</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Single Products Infomation Section End -->

<!-- Recommended Products Section Start -->
<div class="section section-padding">
    <div class="container">

        <!-- Section Title Start -->
        <div class="section-title2 text-center">
            <h2 class="title">Có Thể Bạn Cũng Thích</h2>
        </div>
        <!-- Section Title End -->

        <!-- Products Start -->
        <div class="product-carousel">
            @foreach($list as $item)
            <div class="col">
                <div class="product">
                    <div class="product-thumb">
                        <a href="product-details.html" class="image">
                            <!-- <span class="product-badges">
                                    <span class="onsale">-13%</span>
                                </span> -->
                            <img src="{{ URL::to('/') }}/server/assets/images/product/{{ $item->img }}" alt="Product Image">
                            <img class="image-hover " src="{{ URL::to('/') }}/server/assets/images/product/hover/{{ $item->img_hover }}" alt="Product Image">
                        </a>
                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="product-info">
                        <h6 class="title"><a href="product-details.html">{{$item->name}}</a></h6>
                        <span class="price">
                            <span class="new">{{$item->price}}</span>
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
<!-- Recommended Products Section End -->
@endforeach
@endforeach
@endforeach
@endsection