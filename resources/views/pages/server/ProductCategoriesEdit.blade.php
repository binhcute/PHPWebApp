@extends('layout_admin')
@section('title','Chỉnh Sửa Loại Sản Phẩm')
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
          <li class="breadcrumb-item active">Chỉnh Sửa Loại Sản Phẩm</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h5>Chỉnh Sửa Loại Sản Phẩm</h5>
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
    <form class="form theme-form" action="{{ route('LoaiSanPham.update',$product_categories->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" value="put" />
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
              <label class="col-sm-3 col-form-label">Tên Loại Sản Phẩm</label>
              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Nhập tên loại sản phẩm" value="{{ $product_categories->name }}" name="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Chi Tiết</label>
              <div class="col-sm-9">
                <!-- <textarea id="ckeditor"></textarea>
              <script>
                var editor = CKEDITOR.replace('ckeditor');
              </script> -->
                <textarea class="form-control" rows="5" cols="5" placeholder="Nội dung chi tiết..." name="detail">{{$product_categories->detail}}</textarea>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-sm-3 col-form-label">Chọn ảnh</label>
              <div class="col-sm-9">
                <input class="form-control" type="file" name="img" data-bs-original-title="" title="" value="{{ URL::to('/') }}/server/assets/images/productcategory/{{ $product_categories->img }}">
                <img src="{{URL::to('/') }}/server/assets/images/productcategory/{{ $product_categories->img }}" width="100" height="100" alt="">
                <label for="img">{{$product_categories->img}}</label>
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