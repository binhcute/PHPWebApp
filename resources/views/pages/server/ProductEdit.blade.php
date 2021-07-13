@extends('layout_admin')
@section('title','Chỉnh Sửa Sản Phẩm')
@section('content')
<div class="card">
  <div class="card-header">
    <h5>Chỉnh Sửa Sản Phẩm</h5>
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
  <form class="form theme-form" action="{{ route('SanPham.update',$product->id)}}" method="post" enctype="multipart/form-data">
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
              <input class="form-control" type="text" placeholder="Nhập tên loại sản phẩm" name="name" value="{{$product ->name}}">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Loại Sản Phẩm</label>
            <div class="col-sm-9">
              <select class="form-select" aria-label="select example" name="id_cate">
                <option value="">0.{{$cate}}</option>
                @foreach($product_categories as $cate)
                {{$i=0}}
                <div class="hidden" name = "id_cate">{{ $cate->id}}</div>
                <option value="{{$cate->id}}">{{++$i}}.{{$cate->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="invalid-feedback">Example invalid select feedback</div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Nhà Cung Cấp</label>
            <div class="col-sm-9">
              <select class="form-select" aria-label="select example" name="id_cate">
                <option value="">0.{{$port}}</option>
                @foreach($portfolio as $port)
                {{$i=0}}
                <div class="hidden" name = "id_portfolio">{{ $port->id}}</div>
                <option value="{{$port->id}}">{{++$i}}.{{$port->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="invalid-feedback">Example invalid select feedback</div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Number</label>
            <div class="col-sm-9">
              <input class="form-control digits" name="quantity" type="number" placeholder="Number" data-bs-original-title="" title="" value="{{$product->quantity}}">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Gia</label>
            <div class="col-sm-9">
              <input class="form-control" type="number" placeholder="Price" name="price" value="{{$product->price}}">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label pt-0">Số Hiệu</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" name="series"  placeholder="Series" value="{{$product->series}}">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Từ Khóa</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" placeholder="Tối đa 10 ký tự" maxlength="10" name="keyword" value="{{$product->keyword}}">
            </div>
          </div>
          <div class="row">
            <label class="col-sm-3 col-form-label">Chi Tiết</label>
            <div class="col-sm-9">
              <textarea class="form-control" rows="5" cols="5" placeholder="Nội dung chi tiết..." name="detail">{{$product->detail}}</textarea>
            </div>
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Chọn ảnh</label>
          <div class="col-sm-9">
            <label for="img">{{$product->img}}</label>
            <input class="form-control" value="{{$product->img}}" type="file" name="img" data-bs-original-title="" title="">
          </div>
          <img src="{{ URL::to('/') }}/server/assets/images/product/{{ $product->img }}">
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