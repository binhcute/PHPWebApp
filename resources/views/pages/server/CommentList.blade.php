@extends('layout_admin')
@section('title','Danh Sách Sản Phẩm')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
    <div class="col-6">
        <h3>Trang chủ</h3>
    </div>
    <div class="col-6">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">                                       <i data-feather="home"></i></a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item active">Trang chủ</li>
        </ol>
    </div>
    </div>
</div><div class="card">
    @if(count($product)!= 0)
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Mã Số</th>
            <th scope="col">Tên</th>
            <th scope="col">Hình Ảnh</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Người Đăng</th>
            <th scope="col">Tác Vụ</th>
          </tr>
        </thead>
        <tbody>
        @foreach($product as $item)
          <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->name}}</td>
            <td><img src="server/assets/images/product/{{$item->img}}"></td>
            <td>
              @if($item->status==1)
                <span><strong>Active</strong></span>
              @else
                <span><strong>Disable</strong></span>
              @endif
            </td>
            <td>Admin</td>
            <td class="flex-column align-items-center justify-content-around">
              <form action="{{route('SanPham.show',$item->id)}}" method="get">
                <button class="btn btn-pill btn-outline-info-2x btn-air-info" style="font-weight: bold; width: 135px; height: auto; margin-bottom: 10px"	>
                  Chi Tiết
                </button>
              </form>
              <form action="{{route('SanPham.edit',$item->id)}}" method="get">
                <button class="btn btn-pill btn-outline-primary-2x btn-air-primary" style="font-weight: bold; width: 135px; height: auto; margin-bottom: 10px"	>
                  Chỉnh Sửa
                </button>
              </form>
              @if($item->status == 1)
              <form action="{{URL::to('/SanPham/disabled/'.$item->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put" />
                <button class="btn btn-pill btn-outline-warning-2x btn-air-warning" style="font-weight: bold; width: 135px; height: auto; margin-bottom: 10px"	>
                  Vô Hiệu
                </button>
              </form>
              @else
              <form action="{{URL::to('/SanPham/enabled/'.$item->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put" />
                <button class="btn btn-pill btn-outline-success-2x btn-air-success" style="font-weight: bold; width: 135px; height: auto; margin-bottom: 10px"	>
                  Kích Hoạt
                </button>
              </form>
              @endif
              <form action="{{route('SanPham.destroy',$item->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-pill btn-outline-danger-2x btn-air-danger" style="font-weight: bold; width: 135px; height: auto; margin-bottom: 10px"	>
                  Xóa
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @else
    <strong>Danh Sách Rỗng <a href="{{route('SanPham.create')}}">Thêm Mới?</a></strong>
    @endif
  </div>
</div>
@endsection