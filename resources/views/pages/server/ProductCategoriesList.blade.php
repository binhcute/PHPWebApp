@extends('layout_admin')
@section('title','Danh Sách Loại Sản Phẩm')
@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-header">
      <h5>Hoverable rows</h5><span>Use a class <code>table-hover</code> to enable a hover state on table rows within a <code>tbody</code>.</span>
    </div>
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
              @if($item->status=1)
                <span>Active</span>
              @else
                <span>Disable</span>
              @endif
            </td>
            <td>Admin</td>
            <td class="text-center">
              <a href="#" class="btn btn-primary">Chi Tiết</a>
              <a href="#" class="btn btn-primary">Chỉnh Sửa</a>
              <a href="#" class="btn btn-primary">Xóa</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection