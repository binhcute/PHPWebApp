@extends('layout_admin')
@section('title','Chi Tiết Loại Sản Phẩm')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('SanPham.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Sản Phẩm</li>
          <li class="breadcrumb-item active">Chi Tiết Sản Phẩm</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="product-page-details">

        <h3>Chi Tiết Sản Phẩm Số {{$product->id}}</h3>
      </div>
      <ul class="product-color">
        <li class="bg-primary"></li>
        <li class="bg-secondary"></li>
        <li class="bg-success"></li>
        <li class="bg-info"></li>
        <li class="bg-warning"></li>
      </ul>

      <hr>
      <div>
        <table class="product-page-width">
          <tbody>
            <tr>
            <tr>
              <td> <b>Id Sản Phẩm &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td class="txt-success">{{$product->id}}</td>
            </tr>
            <tr>
              <td> <b>Người Đăng &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td class="txt-success">{{$user}}</td>
            </tr>
            <tr>
              <td> <b>Tên Sản Phẩm &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product->name}}</td>
            </tr>
            <tr>
              <td> <b>Giá Sản Phẩm &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{number_format($product->price)}}</td>
            </tr>
            <tr>
            <td> <b>Nhà Cung Cấp &nbsp;&nbsp;&nbsp;:</b></td>
            <td>{{$portfolio}}</td>
            </tr>
            <tr>
              <td> <b>Loại Sản Phẩm &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product_categories}}</td>
            </tr>
            <tr>
              <td> <b>Màu &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$color}}</td>
            </tr>
            <tr>
              <td> <b>Số Series &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product->series}}</td>
            </tr>
            <tr>
              <td> <b>Ký hiệu &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product->keyword}}</td>
            </tr>
            <tr>
              <td> <b>Số Lượng &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product->quantity}}</td>
            </tr>
            <tr>
              <td> <b>Thời Gian Tạo &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product->created_at}}</td>
            </tr>
            <tr>
              <td> <b>Thời Gian Chỉnh Sửa &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product->updated_at}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <hr>
      <b>Nội dung chi tiết</b>
      <br>
      <p>{{ $product->detail}}</p>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <h6 class="product-title">Ảnh Sản Phẩm</h6>
        </div>
        <div class="col-md-6">
          <div class="product-icon">
            <img class="img-thumbnail" src="{{URL::to('/') }}/server/assets/images/product/{{ $product->img }}" alt="">
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <h6 class="product-title">Ảnh Chuyển Động</h6>
        </div>
        <div class="col-md-6">
          <div class="d-flex">
            <img class="img-thumbnail" src="{{URL::to('/') }}/server/assets/images/product/hover/{{ $product->img_hover }}" alt="">
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <h6 class="product-title">Ảnh Slide</h6>
        </div>
        <div class="col-md-6">
          <div class="d-flex">
            <img class="img-thumbnail" src="{{URL::to('/') }}/server/assets/images/product/slide/{{$product->slide_img}}" alt="">
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
@endsection