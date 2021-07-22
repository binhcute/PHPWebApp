@extends('layout_client')
@section('content')
@section('title','Tài Khoản')

<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="{{asset('client/images/bg/page-title-1.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page-title">
                    <h1 class="title">Tài Khoản</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active">Tài Khoản </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Page Title/Header End -->

<!-- My Account Section Start -->
<div class="section section-padding">
    <div class="container">
        <div class="row learts-mb-n30">

            <!-- My Account Tab List Start -->
            <div class="col-lg-4 col-12 learts-mb-30">
                <div class="myaccount-tab-list nav">
                    <a href="#dashboad" class="active" data-toggle="tab">Dashboard <i class="far fa-home"></i></a>
                    <a href="#orders" data-toggle="tab">Orders <i class="far fa-file-alt"></i></a>
                    <a href="#download" data-toggle="tab">Download <i class="far fa-arrow-to-bottom"></i></a>
                    <a href="#address" data-toggle="tab">address <i class="far fa-map-marker-alt"></i></a>
                    <a href="#account-info" data-toggle="tab">Account Details <i class="far fa-user"></i></a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Đăng Xuất <i class="far fa-sign-out-alt"></i>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
            <!-- My Account Tab List End -->

            <!-- My Account Tab Content Start -->
            <div class="col-lg-8 col-12 learts-mb-30">
                <div class="tab-content">

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade show active" id="dashboad">
                        <div class="myaccount-content dashboad">
                            <p>Xin chào <strong>{{Auth::user()->username }}</strong> (nếu không phải <strong>{{Auth::user()->username }}</strong>?
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="log-in"> </i>Xin hãy đăng xuất.)
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></a></p>
                            <p>Từ trang tổng quan tài khoản, bạn có thể xem các <span>đơn đặt hàng gần đây</span>, quản lý <span>địa chỉ giao hàng và thanh toán</span>, cũng như <span>chỉnh sửa mật khẩu và chi tiết tài khoản của mình</span>.</p>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="orders">
                        <div class="myaccount-content order">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Aug 22, 2018</td>
                                            <td>Pending</td>
                                            <td>$3000</td>
                                            <td><a href="shopping-cart.html">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>July 22, 2018</td>
                                            <td>Approved</td>
                                            <td>$200</td>
                                            <td><a href="shopping-cart.html">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>June 12, 2017</td>
                                            <td>On Hold</td>
                                            <td>$990</td>
                                            <td><a href="shopping-cart.html">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="download">
                        <div class="myaccount-content download">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Date</th>
                                            <th>Expire</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Haven - Free Real Estate PSD Template</td>
                                            <td>Aug 22, 2018</td>
                                            <td>Yes</td>
                                            <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                        </tr>
                                        <tr>
                                            <td>HasTech - Profolio Business Template</td>
                                            <td>Sep 12, 2018</td>
                                            <td>Never</td>
                                            <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="address">
                        <div class="myaccount-content address">
                            <p>The following addresses will be used on the checkout page by default.</p>
                            <div class="row learts-mb-n30">
                                <div class="col-md-6 col-12 learts-mb-30">
                                    <h4 class="title">Billing Address <a href="#" class="edit-link">edit</a></h4>
                                    <address>
                                        <p><strong>Alex Tuntuni</strong></p>
                                        <p>1355 Market St, Suite 900 <br>
                                            San Francisco, CA 94103</p>
                                        <p>Mobile: (123) 456-7890</p>
                                    </address>
                                </div>
                                <div class="col-md-6 col-12 learts-mb-30">
                                    <h4 class="title">Shipping Address <a href="#" class="edit-link">edit</a></h4>
                                    <address>
                                        <p><strong>Alex Tuntuni</strong></p>
                                        <p>1355 Market St, Suite 900 <br>
                                            San Francisco, CA 94103</p>
                                        <p>Mobile: (123) 456-7890</p>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="account-info">
                        <div class="myaccount-content account-details">
                            <div class="account-details-form">
                                <form action="#">
                                    <div class="row learts-mb-n30">
                                        <div class="col-md-6 col-12 learts-mb-30">
                                            <div class="single-input-item">
                                                <label for="first-name">First Name <abbr class="required">*</abbr></label>
                                                <input type="text" id="first-name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 learts-mb-30">
                                            <div class="single-input-item">
                                                <label for="last-name">Last Name <abbr class="required">*</abbr></label>
                                                <input type="text" id="last-name">
                                            </div>
                                        </div>
                                        <div class="col-12 learts-mb-30">
                                            <label for="display-name">Display Name <abbr class="required">*</abbr></label>
                                            <input type="text" id="display-name" value="didiv91396">
                                            <p>This will be how your name will be displayed in the account section and in reviews</p>
                                        </div>
                                        <div class="col-12 learts-mb-30">
                                            <label for="email">Email Addres <abbr class="required">*</abbr></label>
                                            <input type="email" id="email" value="didiv91396@ismailgul.net">
                                        </div>
                                        <div class="col-12 learts-mb-30 learts-mt-30">
                                            <fieldset>
                                                <legend>Password change</legend>
                                                <div class="row learts-mb-n30">
                                                    <div class="col-12 learts-mb-30">
                                                        <label for="current-pwd">Current password (leave blank to leave unchanged)</label>
                                                        <input type="password" id="current-pwd">
                                                    </div>
                                                    <div class="col-12 learts-mb-30">
                                                        <label for="new-pwd">New password (leave blank to leave unchanged)</label>
                                                        <input type="password" id="new-pwd">
                                                    </div>
                                                    <div class="col-12 learts-mb-30">
                                                        <label for="confirm-pwd">Confirm new password</label>
                                                        <input type="password" id="confirm-pwd">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 learts-mb-30">
                                            <button class="btn btn-dark btn-outline-hover-dark">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- Single Tab Content End -->

                </div>
            </div> <!-- My Account Tab Content End -->
        </div>
    </div>
</div>
<!-- My Account Section End -->
@endsection