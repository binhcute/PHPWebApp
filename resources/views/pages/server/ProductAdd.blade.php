@extends('layout_admin')
@section('title','Thêm Sản Phẩm')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <a class="btn btn-primary" href="{{route('SanPham.index')}}"><i class="fa fa-angle-double-left"></i>  Quay Lại</a>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Sản Phẩm</li>
          <li class="breadcrumb-item active">Thêm Sản Phẩm</li>
        </ol>
      </div>
    </div>
  </div>
<div class="card">
  <div class="card-header">
    <h5>Thêm Sản Phẩm</h5>
  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  <img src="images/{{ Session::get('image') }}">
  @endif

  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> Có một vài lỗi trong quá trình nhập liệu.
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form class="form theme-form" action="{{ route('SanPham.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label pt-0">Người nhập</label>
            <div class="col-sm-9">            
              <div class="form-control-static">{{ Auth::user()->name }}</div>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Tên Sản Phẩm</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" placeholder="Nhập tên sản phẩm" name="name">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Loại Sản Phẩm</label>
            <div class="col-sm-9">
              <select class="form-select" required="" aria-label="select example" name="id_cate">
                <option value="">---Chọn---</option>
                @foreach($product_categories as $cate)
                <option value="{{$cate->id}}">{{$cate->name}}</option>
                @endforeach
              </select>
            </div>
            </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Nhà Cung Cấp</label>
            <div class="col-sm-9">
              <select class="form-select" required="" aria-label="select example" name="id_portfolio">
                <option value="">---Chọn---</option>
                @foreach($portfolio as $port)
                <option value="{{$port->id}}">{{$port->name}}</option>
                @endforeach
              </select>
            </div>
            </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Màu Sắc</label>
            <div class="col-sm-9">
              <select class="form-select" required="" aria-label="select example" name="id_color">
                <option value="">---Chọn---</option>
                @foreach($color as $color)
                <option value="{{$color->id}}">{{$color->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Số Lượng</label>
            <div class="col-sm-9">
              <input class="form-control digits" name="quantity" type="number" placeholder="Number" data-bs-original-title="" title="">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Giá</label>
            <div class="col-sm-9">
              <input class="form-control" type="number" placeholder="Price" name="price">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label pt-0">Số Hiệu</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" name="series"  placeholder="Số độc nhất sản phẩm">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Từ Khóa</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" placeholder="Tối đa 10 ký tự" maxlength="10" name="keyword">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Chi Tiết</label>
            <div class="col-sm-9">
              <textarea class="form-control" rows="5" cols="5" placeholder="Nội dung chi tiết..." name="detail"></textarea>
            </div>
          </div>
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Trạng Thái</label>
            <div class="col-sm-9">
            <select class="form-select" name="status" required="" aria-label="select example">
              <option value="">Open this select menu</option>
              <option value="1">Hiển Thị</option>
              <option value="0">Ẩn</option>
            </select>
            </div>
          </div>
        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Chọn ảnh</label>
          <div class="col-sm-9">
            <input class="form-control" type="file" name="img" data-bs-original-title="" title="">
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Chọn ảnh chuyển</label>
          <div class="col-sm-9">
            <input class="form-control" type="file" name="img_hover" data-bs-original-title="" title="">
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Chọn slide ảnh</label>
          <div class="col-sm-9">
            <input class="form-control" type="file" name="slide_img[]" multiple="" data-bs-original-title="" title="">
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="card-footer text-end">
      <div class="col-sm-9 offset-sm-3">
        <button class="btn btn-primary" type="submit">Submit</button>
        <input class="btn btn-light" type="reset" value="Cancel">
      </div>
    </div>
  </form>
</div>
</div>
@endsection