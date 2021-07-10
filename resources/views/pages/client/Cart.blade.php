@extends('layout_client')
@section('content')
@section('title','Giỏ Hàng')

    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="{{asset('client/images/bg/page-title-1.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Cart</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Shopping Cart Section Start -->
    <div class="section section-padding">
        <div class="container">
            <form class="cart-form" method="post" name="formType" id="formType">
                <table class="cart-wishlist-table table">
                    <thead>
                        <tr>
                            <th class="avatar">Hình Ảnh</th>
                            <th class="name">Tên Sản Phẩm</th>
                            <th class="price">Giá</th>
                            <th class="quantity">Số Lượng</th>
                            <th class="subtotal">Tổng Tiền</th>
                            <th class="remove">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody id="mang">
                    </tbody>
                </table>
            <div class="cart-totals mt-5">
                <h2 class="title">Phiếu Hóa Đơn</h2>
                <hr>
                <table>
                    <tbody>
                        <tr class="subtotal">
                            <th>Tổng Số Lượng: </th>
                            <td><span id="tongsoluong"></span><span> Sản Phẩm</span></td>
                        </tr>
                        <tr class="total">
                            <th>Thành Tiền:</th>
                            <td><strong><span class="amount" id="tongtien"></span> VNĐ</strong></td>
                        </tr>
                    </tbody>
                </table>
                </div>                          
                <div class="row justify-content-between mb-n3">
                    <div class="col-auto mb-3">
                    </div>
                    <div class="col-auto">
                        <a data-toggle="modal" data-target="#myModal" class="btn btn-light btn-hover-dark mr-3 mb-3" href="#">Đặt Hàng Ngay</a>
                    </div>
                </div>
            
            </form>
        </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        @if(Auth::check()){
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thông tin khách hàng</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
            
            <form action="{{ route('DonHang.store')}}" method="post" name="formAdd" id="formAdd" enctype="multipart/form-data" >
            @csrf
            <div class="modal-body">
                <fieldset>
                <div class="form-group">
                    <label for="myName">Họ và tên</label>
                    <input type="name" class="form-control"
                        name="name" placeholder="Họ và Tên" required value="{{ Auth::user()->fullname }}">
                </div>
                <div class="form-group">
                <label for="myEmail">Email</label>
                <input type="email" class="form-control"
                    name="email" placeholder="Email" required value="{{ Auth::user()->email }}">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Địa chỉ</label>
                    <input type="text" class="form-control"
                        name="address" required value="{{ Auth::user()->address }}">
                    </div>
                    <div class="form-group">
                        <label for="inputPhone">Số điện thoại</label>
                        <input type="text" name="tel" class="form-control" required value="{{ Auth::user()->tel }}">
                        </div>
                <div class="form-group">
                    <label for="inputNote">Ghi chú:</label>
                    <input type="textarea" class="form-control"
                        name="note">
                    </div>
            
        </div>
        <div class="modal-footer">
            <a type="submit" class="btn btn-info" onclick="onClear()">Đặt hàng <i class="fas fa-angle-double-right"></i> </a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        </div></form>
        </div>
        }
        @else{
            <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thông tin khách hàng</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
            </div>
            
            <form action="{{ route('DonHang.store')}}" method="post" name="formAdd" id="formAdd" enctype="multipart/form-data" >
            @csrf
            <div class="modal-body">
                <fieldset>
                <div class="form-group">
                    <label for="myName">Họ và tên</label>
                    <input type="name" class="form-control"
                        name="fullname" placeholder="Họ và Tên" required>
                </div>
                <div class="form-group">
                <label for="myEmail">Email</label>
                <input type="email" class="form-control"
                    name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Địa chỉ</label>
                    <input type="text" class="form-control"
                        name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPhone">Số điện thoại</label>
                        <input type="text" name="tel" class="form-control" required>
                        </div>
                <div class="form-group">
                    <label for="inputNote">Ghi chú:</label>
                    <input type="textarea" class="form-control"
                        name="note">
                    </div>
            
            <button class="btn btn-primary" onclick="onClear()" type="submit">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        </div>
        </form>
        </div>
        }
        @endif
    </div>
    </div>
    <!-- Shopping Cart Section End -->

    </div>
    @endsection