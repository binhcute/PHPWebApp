@extends('layout_admin')
@section('title','Chi Tiết Bài Viết')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('BaiViet.index')}}"><i class="fa fa-angle-double-left"></i> Quay Lại</a>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Bài Viết</li>
          <li class="breadcrumb-item active">Chi Tiết Bài Viết</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="product-page-details">

        <h3>Chi Tiết Bài Viết Số {{$article->id}}</h3>
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
              <td> <b>Id Bài Viết &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td class="txt-success">{{$article->id}}</td>
            </tr>
            <tr>
              <td> <b>Tên Bài Viết &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$article->name}}</td>
            </tr>
            <tr>
              <td> <b>Người Đăng &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td class="txt-success">{{$user}}</td>
            </tr>
            <tr>
              <td> <b>Từ Khóa &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$article->keyword}}</td>
            </tr>
            <tr>
              <td> <b>Thời Gian Tạo &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$article->created_at}}</td>
            </tr>
            <tr>
              <td> <b>Thời Gian Chỉnh Sửa &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
              <td>{{$article->updated_at}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <hr>
      <b>Nội dung chi tiết</b>
      <br>
      <p>{{ $article->detail}}</p>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <h6 class="product-title">Ảnh Sản Phẩm</h6>
        </div>
        <div class="col-md-6">
          <div class="product-icon">
            <img class="img-thumbnail" src="{{URL::to('/') }}/server/assets/images/article/{{ $article->img }}" alt="">
          </div>
        </div>
      </div>
      <hr>
      
  </div>
</div>
</div>
@endsection