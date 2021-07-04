@extends('layout_client')
@section('content')
@section('title','Local Brands')

    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="assets/images/bg/page-title-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Portfolio</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Portfolio</li>
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
            <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1 learts-mb-n30">

                <div class="col learts-mb-30">
                    <div class="portfolio">
                        <div class="thumbnail"><img src="assets/images/portfolio/portfolio-1.jpg" alt=""></div>
                        <div class="content">
                            <h4 class="title"><a href="portfolio-details.html">Fresh Fruit Keeper</a></h4>
                            <div class="desc">
                                <p>I made this out of brushed stainless steel. It has…</p>
                            </div>
                            <div class="link"><a href="portfolio-details.html">Read more</a></div>
                        </div>
                    </div>
                </div>

                <div class="col learts-mb-30">
                    <div class="portfolio">
                        <div class="thumbnail"><img src="assets/images/portfolio/portfolio-2.jpg" alt=""></div>
                        <div class="content">
                            <h4 class="title"><a href="portfolio-details.html">Wooden Cutting Board</a></h4>
                            <div class="desc">
                                <p>My personalized Walnut or Maple Cutting Board makes a wonderful…</p>
                            </div>
                            <div class="link"><a href="portfolio-details.html">Read more</a></div>
                        </div>
                    </div>
                </div>

                <div class="col learts-mb-30">
                    <div class="portfolio">
                        <div class="thumbnail"><img src="assets/images/portfolio/portfolio-3.jpg" alt=""></div>
                        <div class="content">
                            <h4 class="title"><a href="portfolio-details.html">Elegant Kitchen Utensils</a></h4>
                            <div class="desc">
                                <p>This is made of porcelain, lead free and stain resistant.…</p>
                            </div>
                            <div class="link"><a href="portfolio-details.html">Read more</a></div>
                        </div>
                    </div>
                </div>

                <div class="col learts-mb-30">
                    <div class="portfolio">
                        <div class="thumbnail"><img src="assets/images/portfolio/portfolio-4.jpg" alt=""></div>
                        <div class="content">
                            <h4 class="title"><a href="portfolio-details.html">Square RoseWood Box</a></h4>
                            <div class="desc">
                                <p>Dashing and colorful. Swirling colors ranging from reddish-tan to deep…</p>
                            </div>
                            <div class="link"><a href="portfolio-details.html">Read more</a></div>
                        </div>
                    </div>
                </div>

                <div class="col learts-mb-30">
                    <div class="portfolio">
                        <div class="thumbnail"><img src="assets/images/portfolio/portfolio-5.jpg" alt=""></div>
                        <div class="content">
                            <h4 class="title"><a href="portfolio-details.html">Knitted Table Placemats</a></h4>
                            <div class="desc">
                                <p>These gorgeous hand knit cloths are perfect for so many…</p>
                            </div>
                            <div class="link"><a href="portfolio-details.html">Read more</a></div>
                        </div>
                    </div>
                </div>

                <div class="col learts-mb-30">
                    <div class="portfolio">
                        <div class="thumbnail"><img src="assets/images/portfolio/portfolio-6.jpg" alt=""></div>
                        <div class="content">
                            <h4 class="title"><a href="portfolio-details.html">Ceramic Handmade Pot</a></h4>
                            <div class="desc">
                                <p>This vessel is a unique piece of art. It is…</p>
                            </div>
                            <div class="link"><a href="portfolio-details.html">Read more</a></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row learts-mt-50">
                <div class="col text-center">
                    <a href="#" class="btn btn-dark btn-outline-hover-dark">Load More</a>
                </div>
            </div>
        </div>

    </div>
    <!-- Portfolio Section End -->

    @endsection