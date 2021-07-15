@extends('layout_admin')
@section('title','Chi Tiết Loại Sản Phẩm')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('LoaiSanPham.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Loại Sản Phẩm</li>
          <li class="breadcrumb-item active">Chi Tiết Loại Sản Phẩm</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="product-page-details">

        <h3>Chi Tiết Loại Sản Phẩm Số {{$product_categories->id}}</h3>
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
              <td> <b>Id Loại Sản Phẩm &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td class="txt-success">{{$product_categories->id}}</td>
            </tr>
            <tr>
              <td> <b>Tên Loại Sản Phẩm &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product_categories->name}}</td>
            </tr>
            <tr>
              <td> <b>Người Đăng &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td class="txt-success">{{$user}}</td>
            </tr>
            <tr>
              <td> <b>Thời Gian Tạo &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product_categories->created_at}}</td>
            </tr>
            <tr>
              <td> <b>Thời Gian Chỉnh Sửa &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$product_categories->updated_at}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <hr>
      <b>Nội dung chi tiết</b>
      <br>
      <p>{{ $product_categories->detail}}</p>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <h6 class="product-title">Ảnh Sản Phẩm</h6>
        </div>
        <div class="col-md-6">
          <div class="product-icon">
            <img class="img-thumbnail" src="{{URL::to('/') }}/server/assets/images/productcategory/{{ $product_categories->img }}" alt="">
          </div>
        </div>
      </div>
      <hr>
      
  </div>
</div>
</div>
@endsection