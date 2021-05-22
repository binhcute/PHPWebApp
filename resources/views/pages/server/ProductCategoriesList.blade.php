@extends('layout_admin')
@section('title','Danh Sách Loại Sản Phẩm')
@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-header">
      <h5>Danh Sách Loại Sản Phẩm</h5>
    </div>
    @if(count($product_category)!=0)
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th >Mã Số</th>
            <th >Tên Loại</th>
            <th  class="text-center">Ảnh Đại Diện</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Role</th>
            <th scope="col" class="text-center">Chức Năng</th>
          </tr>
        </thead>
        <tbody>
        @foreach($product_category as $item)
          <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->name}}</td>
            <td><img src="server/assets/images/productcategory/{{$item->img}}"></td>
            <td>
              @if($item->status==1)
                <span>Active</span>
              @else
                <span>Disable</span>
              @endif
            </td>
            <td>Admin</td>
            <td class="d-flex align-items-center justify-content-around">
              <form action="{{route('LoaiSanPham.show',$item->id)}}" method="get">
                <button class="btn btn-sm btn-primary rounded-0">
                  Show
                </button>
              </form>
              <form action="{{route('LoaiSanPham.edit',$item->id)}}" method="get">
                <button class="btn btn-sm btn-warning rounded-0">
                  Edit
                </button>
              </form>
              @if($item->status == 1)
              <form action="{{URL::to('/LoaiSanPham/disabled/'.$item->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put" />
                <button class="btn btn-sm btn-danger rounded-0">
                  Disabled
                </button>
              </form>
              @else
              <form action="{{URL::to('/LoaiSanPham/enabled/'.$item->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put" />
                <button class="btn btn-sm btn-danger rounded-0">
                  Enabled
                </button>
              </form>
              @endif
              <form action="{{route('LoaiSanPham.destroy',$item->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-sm btn-danger rounded-0">
                  Delete
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @else
    <strong class="text-center">Danh Sách Trống</strong>
    @endif
  </div>
</div>
@endsection