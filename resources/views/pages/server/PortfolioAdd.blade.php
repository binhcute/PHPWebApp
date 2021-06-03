@extends('layout_admin')
@section('title','Thêm Sản Phẩm')
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
  <form class="form theme-form" action="{{ route('SanPham.store')}}" method="post" enctype="multipart/form-data">
    @csrf
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
              <input class="form-control" type="text" placeholder="Nhập tên loại sản phẩm" name="name">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Loại Sản Phẩm</label>
            <div class="col-sm-9">
              <select class="form-select" required="" aria-label="select example" name="id_cate">
                <option value="">Open this select menu</option>
                @foreach($product_categories as $cate)
                <div class="hidden" name = "id_cate">{{ $cate->id}}</div>
                <option value="{{$cate->id}}">{{$cate->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="invalid-feedback">Example invalid select feedback</div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Number</label>
            <div class="col-sm-9">
              <input class="form-control digits" name="quantity" type="number" placeholder="Number" data-bs-original-title="" title="">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Gia</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" placeholder="Price" name="price">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label pt-0">Color picker</label>
            <div class="col-sm-9">
              <input class="form-control form-control-color" name="color" type="color" value="#563d7c" data-bs-original-title="" title="">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Từ Khóa</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" placeholder="Tối đa 10 ký tự" maxlength="10" name="keyword">
            </div>
          </div>
          <div class="row">
            <label class="col-sm-3 col-form-label">Chi Tiết</label>
            <div class="col-sm-9">
              <textarea class="form-control" rows="5" cols="5" placeholder="Nội dung chi tiết..." name="detail"></textarea>
            </div>
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Chọn ảnh</label>
          <div class="col-sm-9">
            <input class="form-control" type="file" name="img" data-bs-original-title="" title="">
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
    <div class="card-footer text-end">
      <div class="col-sm-9 offset-sm-3">
        <button class="btn btn-primary" type="submit">Submit</button>
        <input class="btn btn-light" type="reset" value="Cancel">
      </div>
    </div>
  </form>
</div>
@endsection