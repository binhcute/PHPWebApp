@extends('layout_client')
@section('content')
@section('title','Sản Phẩm')

    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="assets/images/bg/page-title-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Shop</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Shop Products Section Start -->
    <div class="section section-padding pt-0">

        <!-- Shop Toolbar Start -->
        <div class="shop-toolbar border-bottom">
            <div class="container">
                <div class="row learts-mb-n20">

                    <!-- Isotop Filter Start -->
                    <div class="col-md col-12 align-self-center learts-mb-20">
                        <div class="isotope-filter shop-product-filter" data-target="#shop-products">
                            <button class="active" data-filter="*">all</button>
                            <button data-filter=".featured">Hot Products</button>
                            <button data-filter=".new">New Products</button>
                            <button data-filter=".sales">Sales Products</button>
                        </div>
                    </div>
                    <!-- Isotop Filter End -->

                    <div class="col-md-auto col-12 learts-mb-20">
                        <ul class="shop-toolbar-controls">

                            <li>
                                <div class="product-sorting">
                                    <select class="nice-select">
                                        <option value="menu_order" selected="selected">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by latest</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="product-column-toggle d-none d-xl-flex">
                                    <button class="toggle hintT-top" data-hint="5 Column" data-column="5"><i class="ti-layout-grid4-alt"></i></button>
                                    <button class="toggle active hintT-top" data-hint="4 Column" data-column="4"><i class="ti-layout-grid3-alt"></i></button>
                                    <button class="toggle hintT-top" data-hint="3 Column" data-column="3"><i class="ti-layout-grid2-alt"></i></button>
                                </div>
                            </li>
                            <li>
                                <a class="product-filter-toggle" href="#product-filter">Filters</a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- Shop Toolbar End -->

        <!-- Product Filter Start -->
        <div id="product-filter" class="product-filter bg-light">
            <div class="container">
                <div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1 learts-mb-n30">

                    <!-- Sort by Start -->
                    <div class="col learts-mb-30">
                        <h3 class="widget-title product-filter-widget-title">Sort by</h3>
                        <ul class="widget-list product-filter-widget customScroll">
                            <li><a href="#">Popularity</a></li>
                            <li><a href="#">Average rating</a></li>
                            <li><a href="#">Newness</a></li>
                            <li><a href="#">Price: low to high</a></li>
                            <li><a href="#">Price: high to low</a></li>
                        </ul>
                    </div>
                    <!-- Sort by End -->

                    <!-- Price filter Start -->
                    <div class="col learts-mb-30">
                        <h3 class="widget-title product-filter-widget-title">Price filter</h3>
                        <ul class="widget-list product-filter-widget customScroll">
                            <li> <a href="#">All</a></li>
                            <li> <a href="#"><span class="amount"><span class="cur-symbol">£</span>0.00</span> - <span class="amount"><span class="cur-symbol">£</span>80.00</span></a></li>
                            <li> <a href="#"><span class="amount"><span class="cur-symbol">£</span>80.00</span> - <span class="amount"><span class="cur-symbol">£</span>160.00</span></a></li>
                            <li> <a href="#"><span class="amount"><span class="cur-symbol">£</span>160.00</span> - <span class="amount"><span class="cur-symbol">£</span>240.00</span></a></li>
                            <li> <a href="#"><span class="amount"><span class="cur-symbol">£</span>240.00</span> - <span class="amount"><span class="cur-symbol">£</span>320.00</span></a></li>
                            <li> <a href="#"><span class="amount"><span class="cur-symbol">£</span>320.00</span> +</a></li>
                        </ul>
                    </div>
                    <!-- Price filter End -->

                    <!-- Categories Start -->
                    <div class="col learts-mb-30">
                        <h3 class="widget-title product-filter-widget-title">Categories</h3>
                        <ul class="widget-list product-filter-widget customScroll">
                            <li><a href="#">Gift ideas</a> <span class="count">16</span></li>
                            <li><a href="#">Home Decor</a> <span class="count">16</span></li>
                            <li><a href="#">Kids &amp; Babies</a> <span class="count">6</span></li>
                            <li><a href="#">Kitchen</a> <span class="count">15</span></li>
                            <li><a href="#">Kniting &amp; Sewing</a> <span class="count">4</span></li>
                            <li><a href="#">Pots</a> <span class="count">4</span></li>
                            <li><a href="#">Toys</a> <span class="count">6</span></li>
                        </ul>
                    </div>
                    <!-- Categories End -->

                    <!-- Filters by colors Start -->
                    <div class="col learts-mb-30">
                        <h3 class="widget-title product-filter-widget-title">Filters by colors</h3>
                        <ul class="widget-colors product-filter-widget customScroll">
                            <li><a href="#" class="hintT-top" data-hint="Black"><span data-bg-color="#000000">Black</span></a></li>
                            <li><a href="#" class="hintT-top" data-hint="White"><span data-bg-color="#FFFFFF">White</span></a></li>
                            <li><a href="#" class="hintT-top" data-hint="Dark Red"><span data-bg-color="#b2483c">Dark Red</span></a></li>
                            <li><a href="#" class="hintT-top" data-hint="Flaxen"><span data-bg-color="#d5b85a">Flaxen</span></a></li>
                            <li><a href="#" class="hintT-top" data-hint="Pine"><span data-bg-color="#01796f">Pine</span></a></li>
                            <li><a href="#" class="hintT-top" data-hint="Tortilla"><span data-bg-color="#997950">Tortilla</span></a></li>
                        </ul>
                    </div>
                    <!-- Filters by colors End -->

                    <!-- Brands Start -->
                    <div class="col learts-mb-30">
                        <h3 class="widget-title product-filter-widget-title">Brands</h3>
                        <ul class="widget-list product-filter-widget customScroll">
                            <li><a href="#">Alexander</a> <span class="count">(2)</span></li>
                            <li><a href="#">Carmella</a> <span class="count">(4)</span></li>
                            <li><a href="#">Danielle</a> <span class="count">(7)</span></li>
                            <li><a href="#">Diana Day</a> <span class="count">(13)</span></li>
                            <li><a href="#">Emilia</a> <span class="count">(2)</span></li>
                            <li><a href="#">Gasmine</a> <span class="count">(15)</span></li>
                            <li><a href="#">Jack &amp; Ella</a> <span class="count">(7)</span></li>
                            <li><a href="#">Juliette</a> <span class="count">(11)</span></li>
                        </ul>
                    </div>
                    <!-- Brands End -->

                </div>
            </div>
        </div>
        <!-- Product Filter End -->

        <div class="section learts-mt-70">
            <div class="container">
                <div class="row learts-mb-n50">

                    <div class="col-lg-9 col-12 learts-mb-50 order-lg-2">
                        <!-- Products Start -->
                        <div id="shop-products" class="products isotope-grid row row-cols-xl-4 row-cols-md-3 row-cols-sm-2 row-cols-1">

                            <div class="grid-sizer col-1"></div>

                            <div class="grid-item col featured">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <img src="assets/images/product/s328/product-17.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/product/s328/product-17-hover.jpg" alt="Product Image">
                                        </a>
                                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">3D Attractive Pot</a></h6>
                                        <span class="price">
                                            $90.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col new">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <span class="product-badges">
                                                <span class="outofstock"><i class="fal fa-frown"></i></span>
                                            </span>
                                            <img src="assets/images/product/s328/product-14.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/product/s328/product-14-hover.jpg" alt="Product Image">
                                        </a>
                                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Abstract Folded Pots</a></h6>
                                        <span class="price">
                                            $50.00 - $55.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col featured">
                                <div class="product">
                                    <div class="product-thumb">
                                        <span class="product-badges">
                                            <span class="hot">hot</span>
                                        </span>
                                        <a href="product-details.html" class="image">
                                            <img src="assets/images/product/s328/product-30.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/product/s328/product-30-hover.jpg" alt="Product Image">
                                        </a>
                                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Adhesive Tape Dispenser</a></h6>
                                        <span class="price">
                                            $15.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col featured">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <img src="assets/images/product/s328/product-9.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/product/s328/product-9-hover.jpg" alt="Product Image">
                                        </a>
                                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Aluminum Equestrian</a></h6>
                                        <span class="price">
                                            $100.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col sales featured">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <span class="product-badges">
                                                <span class="onsale">-20%</span>
                                            </span>
                                            <img src="assets/images/product/s328/product-25.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/product/s328/product-25-hover.jpg" alt="Product Image">
                                        </a>
                                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Antique Sewing Scissors</a></h6>
                                        <span class="price">
                                            <span class="old">$15.00</span>
                                        <span class="new">$12.00</span>
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col sales">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <span class="product-badges">
                                                <span class="onsale">-13%</span>
                                            </span>
                                            <img src="assets/images/product/s328/product-1.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/product/s328/product-1-hover.jpg" alt="Product Image">
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

                            <div class="grid-item col new">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <img src="assets/images/product/s328/product-31.jpg" alt="Product Image">
                                        </a>
                                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Bouncer Measuring Cup</a></h6>
                                        <span class="price">
                                            $150.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col new">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <img src="assets/images/product/s328/product-15.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/product/s328/product-15-hover.jpg" alt="Product Image">
                                        </a>
                                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Brush & Dustpan Set</a></h6>
                                        <span class="price">
                                            $9.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col featured">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <img src="assets/images/product/s328/product-12.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/product/s328/product-12-hover.jpg" alt="Product Image">
                                        </a>
                                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Cape Cottage Playhouse</a></h6>
                                        <span class="price">
                                            $35.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col new">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <span class="product-badges">
                                                <span class="outofstock"><i class="fal fa-frown"></i></span>
                                            </span>
                                            <img src="assets/images/product/s328/product-32.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/product/s328/product-32-hover.jpg" alt="Product Image">
                                        </a>
                                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                        <div class="product-options">
                                            <ul class="colors">
                                                <li style="background-color: #000000;">color one</li>
                                                <li style="background-color: #ffffff;">color two</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Cleaning Dustpan & Brush</a></h6>
                                        <span class="price">
                                            $38.00 - $50.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col featured">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <img src="assets/images/product/s328/product-6.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/product/s328/product-6-hover.jpg" alt="Product Image">
                                        </a>
                                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Clear Silicate Teapot</a></h6>
                                        <span class="price">
                                            $140.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col sales new">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <span class="product-badges">
                                                <span class="onsale">-13%</span>
                                            </span>
                                            <img src="assets/images/product/s328/product-19.jpg" alt="Product Image">
                                        </a>
                                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Country Feast Set</a></h6>
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

                            <div class="grid-item col new">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <span class="product-badges">
                                                <span class="outofstock"><i class="fal fa-frown"></i></span>
                                            <span class="hot">hot</span>
                                            </span>
                                            <img src="assets/images/product/s328/product-8.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/product/s328/product-8-hover.jpg" alt="Product Image">
                                        </a>
                                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                        <div class="product-options">
                                            <ul class="colors">
                                                <li style="background-color: #000000;">color one</li>
                                                <li style="background-color: #b2483c;">color two</li>
                                            </ul>
                                            <ul class="sizes">
                                                <li>Large</li>
                                                <li>Medium</li>
                                                <li>Small</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Decorative Christmas Fox</a></h6>
                                        <span class="price">
                                            $50.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col featured">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <img src="assets/images/product/s328/product-28.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/product/s328/product-28-hover.jpg" alt="Product Image">
                                        </a>
                                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Digital Camera System</a></h6>
                                        <span class="price">
                                            $350.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col new">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <img src="assets/images/product/s328/product-11.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/product/s328/product-11-hover.jpg" alt="Product Image">
                                        </a>
                                        <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Electric Egg Blender</a></h6>
                                        <span class="price">
                                            $200.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Products End -->
                        <div class="text-center learts-mt-70">
                            <a href="#" class="btn btn-dark btn-outline-hover-dark"><i class="ti-plus"></i> More</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-12 learts-mb-10 order-lg-1">

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

                        <!-- Categories Start -->
                        <div class="single-widget learts-mb-40">
                            <h3 class="widget-title product-filter-widget-title">Product categories</h3>
                            <ul class="widget-list">
                                <li><a href="#">Gift ideas</a> <span class="count">16</span></li>
                                <li><a href="#">Home Decor</a> <span class="count">16</span></li>
                                <li><a href="#">Kids &amp; Babies</a> <span class="count">6</span></li>
                                <li><a href="#">Kitchen</a> <span class="count">15</span></li>
                                <li><a href="#">Kniting &amp; Sewing</a> <span class="count">4</span></li>
                                <li><a href="#">Pots</a> <span class="count">4</span></li>
                                <li><a href="#">Toys</a> <span class="count">6</span></li>
                            </ul>
                        </div>
                        <!-- Categories End -->

                        <!-- Price Range Start -->
                        <div class="single-widget learts-mb-40">
                            <h3 class="widget-title product-filter-widget-title">Filters by price</h3>
                            <div class="widget-price-range">
                                <input class="range-slider" type="text" data-min="0" data-max="350" data-from="0" data-to="350" />
                            </div>
                        </div>
                        <!-- Price Range End -->

                        <!-- List Product Widget Start -->
                        <div class="single-widget learts-mb-40">
                            <h3 class="widget-title product-filter-widget-title">Products</h3>
                            <ul class="widget-products">
                                <li class="product">
                                    <div class="thumbnail">
                                        <a href="product-details.html"><img src="assets/images/product/widget-1.jpg" alt="List product"></a>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="product-details.html">Walnut Cutting Board</a></h6>
                                        <span class="price">
                                            $100.00
                                        </span>
                                        <div class="ratting">
                                            <span class="rate" style="width: 80%;"></span>
                                        </div>
                                    </div>
                                </li>
                                <li class="product">
                                    <div class="thumbnail">
                                        <a href="product-details.html"><img src="assets/images/product/widget-2.jpg" alt="List product"></a>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="product-details.html">Decorative Christmas Fox</a></h6>
                                        <span class="price">
                                            $50.00
                                        </span>
                                        <div class="ratting">
                                            <span class="rate" style="width: 80%;"></span>
                                        </div>
                                    </div>
                                </li>
                                <li class="product">
                                    <div class="thumbnail">
                                        <a href="product-details.html"><img src="assets/images/product/widget-3.jpg" alt="List product"></a>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="product-details.html">Lucky Wooden Elephant</a></h6>
                                        <span class="price">
                                            $35.00
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- List Product Widget End -->

                        <!-- Tags Start -->
                        <div class="single-widget learts-mb-40">
                            <h3 class="widget-title product-filter-widget-title">Product Tags</h3>
                            <div class="widget-tags">
                                <a href="#">handmade</a>
                                <a href="#">learts</a>
                                <a href="#">mug</a>
                                <a href="#">product</a>
                                <a href="#">learts</a>
                            </div>
                        </div>
                        <!-- Tags End -->

                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- Shop Products Section End -->

    @endsection