@extends('layout_client')
@section('content')
@section('title','Local Brands')

    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="{{asset('client/images/bg/page-title-1.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Portfolio</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
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

                @foreach ($portfolio as $item)
                <div class="col learts-mb-30">
                    <div class="portfolio">
                        <div class="thumbnail"><img src="server/assets/images/portfolio/{{$item->img}}" alt=""></div>
                        <div class="content">
                            <h4 class="title"><a href="portfolio-details.html">{{ $item->name}}</a></h4>
                            <div class="desc">
                                <p>{{$item->detail}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>

    </div>
    <!-- Portfolio Section End -->

    @endsection