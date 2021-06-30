@extends('layout_admin')
@section('title','Chỉnh Sửa Loại Sản Phẩm')
@section('content')
<div class="card">
  <div class="card-header">
    <h5>Basic HTML input control</h5>
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
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
  <form class="form theme-form" action="{{ route('LoaiSanPham.update',$product_categories->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="put" />
    <div class="card-body">
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label pt-0">Người nhập</label>
            <div class="col-sm-9">
              <div class="form-control-static">Tên admin</div>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Tên Loại Sản Phẩm</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" placeholder="Nhập tên loại sản phẩm" value="{{ $product_categories->name }}" name="name">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Từ Khóa</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" placeholder="Tối đa 10 ký tự" maxlength="10" name="keyword" value="{{$product_categories->keyword}}">
            </div>
          </div>
          <div class="row">
            <label class="col-sm-3 col-form-label">Chi Tiết</label>
            <div class="col-sm-9">
              <textarea class="form-control" rows="5" cols="5" placeholder="Nội dung chi tiết..." name="detail">{{$product_categories->detail}}</textarea>
            </div>
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Chọn ảnh</label>
          <div class="col-sm-9">
            <input class="form-control" type="file" name="img" data-bs-original-title="" title="" value="{{$product_categories->img}}">
          </div>
          <div class="col-sm-9">
            <img src="server/assets/images/productcategory/{{$product_categories->img}}" id="profile-img-tag" height="100" width="100">
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
@endsection