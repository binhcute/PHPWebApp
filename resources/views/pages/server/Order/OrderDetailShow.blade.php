@extends('layout_admin')
@section('title','Chi Tiết Loại Sản Phẩm')
@section('content')
<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Chi tiết sản phẩm số {{$order->id}}</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">ECommerce</li>
                    <li class="breadcrumb-item active">order Page</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div>
              <div class="row order-page-main p-0">
                <div class="col-xl-4 xl-cs-65 box-col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="order-slider owl-carousel owl-theme">
                        
                        <div class="item"><img src="../server/assets/images/order/{{$order->img}}" alt=""></div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-xl-5 xl-100 box-col-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="order-page-details">
                        <h3>{{$order->name}}</h3>
                      </div>
                      <div class="order-price">$26.00  
                        <del>$350.00 </del>
                      </div>
                      <ul class="order-color">
                        <li class="bg-primary"></li>
                        <li class="bg-secondary"></li>
                        <li class="bg-success"></li>
                        <li class="bg-info"></li>
                        <li class="bg-warning"></li>
                      </ul>
                      <hr>
                        <p>{{ $order->detail}}</p>
                      <hr>
                      <div>
                        <table class="order-page-width">
                          <tbody>
                            <tr>
                              <td> <b>Brand &nbsp;&nbsp;&nbsp;:</b></td>
                              <td>{{$order->id_cate}}</td>
                            </tr>
                            <tr>
                              <td> <b>Availability &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                              <td class="txt-success">In stock</td>
                            </tr>
                            <tr>
                              <td> <b>Seller &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                              <td>ABC</td>
                            </tr>
                            <tr>
                              <td> <b>Fabric &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                              <td>Cotton</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-6">
                          <h6 class="order-title">share it</h6>
                        </div>
                        <div class="col-md-6">
                          <div class="order-icon">
                            <ul class="order-social">
                              <li class="d-inline-block"><a href="#"><i class="fa fa-facebook"></i></a></li>
                              <li class="d-inline-block"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                              <li class="d-inline-block"><a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li class="d-inline-block"><a href="#"><i class="fa fa-instagram"></i></a></li>
                              <li class="d-inline-block"><a href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                            <form class="d-inline-block f-right"></form>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-6">
                          <h6 class="order-title">Rate Now</h6>
                        </div>
                        <div class="col-md-6">
                          <div class="d-flex">
                            <select id="u-rating-fontawesome" name="rating" autocomplete="off">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select><span>(250 review)</span>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="m-t-15">
                        <button class="btn btn-primary m-r-10" type="button" title=""> <i class="fa fa-shopping-basket me-1"></i>Add To Cart</button>
                        <button class="btn btn-success m-r-10" type="button" title=""> <i class="fa fa-shopping-cart me-1"></i>Buy Now</button><a class="btn btn-secondary" href="#"> <i class="fa fa-heart me-1"></i>Add To WishList</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 xl-cs-35 box-col-6">
                  <div class="card">
                    <div class="card-body">
                      <!-- side-bar colleps block stat-->
                      <div class="filter-block">
                        <h4>Brand</h4>
                        <ul>
                          <li>Clothing</li>
                          <li>Bags</li>
                          <li>Footwear</li>
                          <li>Watches</li>
                          <li>ACCESSORIES</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <div class="collection-filter-block">
                        <ul class="pro-services">
                          <li>
                            <div class="media"><i data-feather="truck"></i>
                              <div class="media-body">
                                <h5>Free Shipping                                    </h5>
                                <p>Free Shipping World Wide</p>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="media"><i data-feather="clock"></i>
                              <div class="media-body">
                                <h5>24 X 7 Service                                    </h5>
                                <p>Online Service For New Customer</p>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="media"><i data-feather="gift"></i>
                              <div class="media-body">
                                <h5>Festival Offer                                 </h5>
                                <p>New Online Special Festival</p>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="media"><i data-feather="credit-card"></i>
                              <div class="media-body">
                                <h5>Online Payment                                  </h5>
                                <p>Contrary To Popular Belief.                                   </p>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- silde-bar colleps block end here-->
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="row order-page-main">
                <div class="col-sm-12">
                  <ul class="nav nav-tabs border-tab mb-0" id="top-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="false">Febric</a>
                      <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Video</a>
                      <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="true">Details</a>
                      <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="brand-top-tab" data-bs-toggle="tab" href="#top-brand" role="tab" aria-controls="top-brand" aria-selected="true">Brand</a>
                      <div class="material-border"></div>
                    </li>
                  </ul>
                  <div class="tab-content" id="top-tabContent">
                    <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                      <p class="mb-0 m-t-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                      <p class="mb-0 m-t-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                    </div>
                    <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                      <p class="mb-0 m-t-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    </div>
                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                      <p class="mb-0 m-t-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    </div>
                    <div class="tab-pane fade" id="top-brand" role="tabpanel" aria-labelledby="brand-top-tab">
                      <p class="mb-0 m-t-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
@endsection