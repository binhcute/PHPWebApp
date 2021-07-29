@extends('layout_client')
@section('content')
@section('title','Giỏ Hàng')
<form action="{{ route('CheckOut.store')}}" method="post" name="formAdd" id="formAdd" enctype="multipart/form-data">
    @csrf
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

                @if(count($cart))
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
                    <tbody>

                        @foreach($cart as $item)
                        <tr>
                            <td><img src="{{URL::to('/') }}/server/assets/image/product/{{$item->options->image}}" class="img-thumbnail" width="90" height="100"></td>
                            <td class="name" name="name">{{$item->name}}</td>
                            <td class="price" name="price">{{number_format($item->price).' '.'VND'}}</td>
                            <td class="quantity">
                                <div class="product-quantity">
                                    <a class="qty-btn minus" href="{{url('cart?decrease')}}"><i class="ti-plus"></i></a>
                                    <input type="text" class="quantity-input text-center" name="quantity" value="{{$item->qty}}">
                                    <a class="qty-btn plus" href="{{url('cart?increment')}}"><i class="ti-plus"></i></a>
                                </div>

                            </td>
                            <td class="subtotal"><span>{{number_format($item->subtotal).' '.'VND'}}</span></td>
                            </td>
                            <td><a class="btn btn-light" onclick="removeProduct('${danhsach[i].id}')"><i class="fas fa-trash-alt"></i></a></td>

                        </tr>
                        @endforeach
                        @else
                        <p>You have no items in the shopping cart</p>
                        @endif

                    </tbody>
                </table>
                <div class="cart-totals mt-5">
                    <h2 class="title">Phiếu Hóa Đơn</h2>
                    <hr>
                    <table>
                        <tbody>
                            <tr class="subtotal">
                                <th>Tổng Số Lượng: </th>
                                <td><span>{{Cart::count()}} Sản Phẩm</span></td>
                            </tr>
                            <tr class="total">
                                <th>Thành Tiền:</th>
                                <td><strong><span class="amount"></span>{{Cart::total()}} VNĐ</strong></td>
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


                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label for="myName">Họ và tên</label>
                                <input type="name" class="form-control" name="firstName" placeholder="Họ" required value="{{ Auth::user()->firstName }}">
                            </div>
                            <div class="form-group">
                                <label for="myName">Họ và tên</label>
                                <input type="name" class="form-control" name="lastName" placeholder="Tên" required value="{{ Auth::user()->lastName }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="myEmail">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required value="{{ Auth::user()->email }}">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" required value="{{ Auth::user()->address }}">
                            </div>
                            <div class="form-group">
                                <label for="inputPhone">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" required value="{{ Auth::user()->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="inputNote">Ghi chú:</label>
                                <input type="textarea" class="form-control" name="note">
                            </div>

                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>

                    </div>
                </div>
                }
                @else{
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Thông tin khách hàng</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>

                    <div class="modal-body">
                        <fieldset>
                            <div class="form-group">
                                <label for="myName">Họ và tên</label>
                                <input type="name" class="form-control" name="fullname" placeholder="Họ và Tên" required>
                            </div>
                            <div class="form-group">
                                <label for="myEmail">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPhone">Số điện thoại</label>
                                <input type="text" name="tel" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="inputNote">Ghi chú:</label>
                                <input type="textarea" class="form-control" name="note">
                            </div>

                            <button class="btn btn-primary" onclick="onClear()" type="submit">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                </div>
                }
                @endif
            </div>
        </div>
        <!-- Shopping Cart Section End -->

    </div>
</form>
<script>
    function handleListCart() {
        let danhsach = JSON.parse(localStorage.getItem("cat"));
        if (danhsach && danhsach.length) {
            let phantu = "";
            let tongtien = 0
            let tongsoluong = 0
            for (let i = 0; i < danhsach.length; i++) {
                let sum = +danhsach[i].price * danhsach[i].quantity
                // console.log(danhsach[i].id);
                phantu += `<tr>
            <td><img src="${danhsach[i].img}" class="img-thumbnail" width="90" height="100"></td>
            <td class="name" name="name">${danhsach[i].name}</td>
            <td class="price" name="price">${danhsach[i].price}</td>
            <td class="price" name="price"><input type="text" name="product_id" value="${danhsach[i].id}"></td>
            <td class="quantity">
            <div class="product-quantity">
                <span class="qty-btn minus" onclick="minusProduct('${danhsach[i].id}')"><i class="ti-minus"></i></span>
                <input type="text" class="quantity-input text-center" name="quantity" onchange="changeQuantity('${danhsach[i].id}',this)" value="${danhsach[i].quantity}">
                <input type="hidden" class="id-product"  value="${danhsach[i].id}" />
                <span class="qty-btn plus" onclick="plusProduct('${danhsach[i].id}')"><i class="ti-plus"></i></span>
            </div>  
            </td>
            <td class="subtotal"><span id ="sum-${danhsach[i].id}">${sum}</span> </td>
            <td><a class="btn btn-light" onclick="removeProduct('${danhsach[i].id}')"><i class="fas fa-trash-alt"></i></a></td>
           
        </tr>`

                tongsoluong += +danhsach[i].quantity
                tongtien += sum
            }
            document.getElementById("tongsoluong").innerHTML = tongsoluong;
            document.getElementById("tongtien").innerHTML = tongtien
            document.getElementById("mang").innerHTML = phantu
        }
    }

    handleListCart();
</script>
@endsection