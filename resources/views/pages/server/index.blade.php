@extends('layout_admin')
@section('title','Trang Chủ')
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Trang chủ</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Trang chủ</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row second-chart-list third-news-update">
        <div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12">
            <div class="card o-hidden profile-greeting">
                <div class="card-body">
                    <div class="media">
                        <div class="badge-groups w-100">
                            <div class="badge f-12"><i class="me-1" data-feather="clock"></i><span id="txt"></span></div>
                            <div class="badge f-12"><i class="fa fa-spin fa-cog f-14"></i></div>
                        </div>
                    </div>
                    <div class="greeting-user text-center">
                        <div class="profile-vector"><img class="img-fluid" src="{{asset('server/assets/images/dashboard/welcome.png')}}" alt=""></div>
                        <h4 class="f-w-600"><span id="greeting">Chào Buổi Sáng</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                        <p><span id="greeting-detail">Sợ rằng em biết anh còn yêu em</span></p>
                        <div class="whatsnew-btn"><a class="btn btn-primary">Dù sao thời gian vẫn trôi bạn nhé!</a></div>
                        <div class="left-icon"><i class="fa fa-bell"> </i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-9 xl-100 chart_data_left box-col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row m-0 chart-main">
                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                            <div class="media align-items-center">
                                <div class="hospital-small-chart">
                                    <div class="small-bar">
                                        <div class="small-chart flot-chart-container"></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="right-chart-content">
                                        <h4>{{count($product)}}</h4><span>Tổng sản phẩm </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                            <div class="media align-items-center">
                                <div class="hospital-small-chart">
                                    <div class="small-bar">
                                        <div class="small-chart1 flot-chart-container"></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="right-chart-content">
                                        <h4>{{count($category)}}</h4><span>Tổng loại sản phẩm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                            <div class="media align-items-center">
                                <div class="hospital-small-chart">
                                    <div class="small-bar">
                                        <div class="small-chart2 flot-chart-container"></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="right-chart-content">
                                        <h4>{{count($account)}}</h4><span>Tổng tài khoản</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                            <div class="media border-none align-items-center">
                                <div class="hospital-small-chart">
                                    <div class="small-bar">
                                        <div class="small-chart3 flot-chart-container"></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="right-chart-content">
                                        <h4>{{count($order)}}</h4><span>Tổng hóa đơn</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-xl-4 col-lg-12 xl-50 calendar-sec box-col-6">
            <div class="card gradient-primary o-hidden">
                <div class="card-body">
                    <div class="setting-dot">
                        <div class="setting-bg-primary date-picker-setting position-set pull-right"><i class="fa fa-spin fa-cog"></i></div>
                    </div>
                    <div class="default-datepicker">
                        <div class="datepicker-here" data-language="en"></div>
                    </div><span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small"> </span></span></span>
                </div>
            </div>
        </div>
        <div class="col-xl-4 box-col-6">
            <div class="card custom-card">
                <div class="card-header"><img class="img-fluid" src="{{asset('server/assets/images/user-card/3.jpg')}}" alt=""></div>
                <div class="card-profile"><img class="rounded-circle" src="{{URL::to('/')}}/server/assets/image/account/{{Auth::user()->avatar}}" alt=""></div>
                <ul class="card-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
                <div class="text-center profile-details">
                    <h4>{{Auth::user()->username}}</h4>
                    <h6>Manager</h6>
                </div>
                <div class="card-footer row">
                    <div class="col-4 col-sm-4">
                        <h6>Cấp Bậc Tài Khoản</h6>
                        <h3 class="counter">9564</h3>
                    </div>
                    <div class="col-4 col-sm-4">
                        <h6>Bài Viết Đã Đăng</h6>
                        <h3><span class="counter">49</span>K</h3>
                    </div>
                    <div class="col-4 col-sm-4">
                        <h6>Sản Phẩm Đã Đăng</h6>
                        <h3><span class="counter">96</span>M</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="best-seller-table responsive-tbl">
                          <div class="item">
                            <div class="table-responsive product-list">
                              <table class="table table-bordernone">
                                <thead>
                                  <tr>
                                    <th class="f-22">
                                       Best Seller</th>
                                    <th>Date</th>
                                    <th>Product</th>
                                    <th>Country</th>
                                    <th>Total</th>
                                    <th class="text-end">Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                      <div class="d-inline-block align-middle"><img class="img-40 m-r-15 rounded-circle align-top" src="../assets/images/avtar/7.jpg" alt="">
                                        <div class="status-circle bg-primary"></div>
                                        <div class="d-inline-block"><span>John keter</span>
                                          <p class="font-roboto">2019</p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>06 August</td>
                                    <td>CAP</td>
                                    <td><i class="flag-icon flag-icon-gb"></i></td>
                                    <td> <span class="label">$5,08,652</span></td>
                                    <td class="text-end"><i class="fa fa-check-circle"></i>Done</td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="d-inline-block align-middle"><img class="img-40 m-r-15 rounded-circle align-top" src="../assets/images/avtar/4.jpg" alt="">
                                        <div class="status-circle bg-primary"></div>
                                        <div class="d-inline-block"><span>Herry Venter</span>
                                          <p class="font-roboto">2020</p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>21 March</td>
                                    <td>Branded Shoes</td>
                                    <td><i class="flag-icon flag-icon-us"></i></td>
                                    <td> <span class="label">$59,105</span></td>
                                    <td class="text-end"><i class="fa fa-check-circle"></i>Pending</td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="d-inline-block align-middle"><img class="img-40 m-r-15 rounded-circle align-top" src="../assets/images/avtar/16.jpg" alt="">
                                        <div class="status-circle bg-primary"></div>
                                        <div class="d-inline-block"><span>loain deo</span>
                                          <p class="font-roboto">2020</p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>09 March</td>
                                    <td>Headphone</td>
                                    <td><i class="flag-icon flag-icon-za"></i></td>
                                    <td> <span class="label">$10,155</span></td>
                                    <td class="text-end"><i class="fa fa-check-circle"></i>Success</td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="d-inline-block align-middle"><img class="img-40 m-r-15 rounded-circle align-top" src="../assets/images/avtar/11.jpg" alt="">
                                        <div class="status-circle bg-primary"></div>
                                        <div class="d-inline-block"><span>Horen Hors</span>
                                          <p class="font-roboto">2020</p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>14 February</td>
                                    <td>Cell Phone</td>
                                    <td><i class="flag-icon flag-icon-at"></i></td>
                                    <td> <span class="label">$90,568</span></td>
                                    <td class="text-end"> <i class="fa fa-check-circle"></i>In process</td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="d-inline-block align-middle"><img class="img-40 m-r-15 rounded-circle align-top" src="../assets/images/avtar/3.jpg" alt="">
                                        <div class="status-circle bg-primary"></div>
                                        <div class="d-inline-block"><span>fenter Jessy</span>
                                          <p class="font-roboto">2021</p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>12 January</td>
                                    <td>Earings</td>
                                    <td><i class="flag-icon flag-icon-br"></i></td>
                                    <td> <span class="label">$10,652</span></td>
                                    <td class="text-end"><i class="fa fa-check-circle"></i>Pending</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection