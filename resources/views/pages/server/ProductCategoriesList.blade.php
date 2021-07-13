@extends('layout_admin')
@section('title','Danh Sách Loại Sản Phẩm')
@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-header">
      <h5>Danh Sách Loại Sản Phẩm</h5>
      <?php
                $message = Session::get('message');
                if($message){
                  echo '<p style="color:blue">'.$message.'</p>';
                  Session::put('message',null);
                }
              ?>
    </div>
    @if(count($product_category)!=0)
    <div class="table-responsive">
      <table class="display" id="basic-1">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Hình Ảnh</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Người Đăng</th>
            <th scope="col">Tác Vụ</th>
          </tr>
        </thead>
        <tbody>
        @foreach($product_category as $item)
          <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->name}}</td>
            <td><img class="img-fluid" src="server/assets/images/productcategory/{{$item->img}}"></td>
            <td>
              @if($item->status==1)
                <span><strong>Active</strong></span>
              @else
                <span><strong>Disable</strong></span>
              @endif
            </td>
            <td>Admin</td>
            <td class="flex-column align-items-center justify-content-around">
              <form action="{{route('LoaiSanPham.show',$item->id)}}" method="get">
                <button class="btn btn-info-gradien" style="font-weight: bold; width: 135px; height: auto; margin-bottom: 10px"	>
                  Chi Tiết
                </button>
              </form>
              <form action="{{route('LoaiSanPham.edit',$item->id)}}" method="get">
                <button class="btn btn-primary-gradien" style="font-weight: bold; width: 135px; height: auto; margin-bottom: 10px"	>
                  Chỉnh Sửa
                </button>
              </form>
              @if($item->status == 1)
              <form action="{{URL::to('/LoaiSanPham/disabled/'.$item->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put" />
                <button class="btn btn-warning-gradien" style="font-weight: bold; width: 135px; height: auto; margin-bottom: 10px"	>
                  Vô Hiệu
                </button>
              </form>
              @else
              <form action="{{URL::to('/LoaiSanPham/enabled/'.$item->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put" />
                <button class="btn btn-success-gradien" style="font-weight: bold; width: 135px; height: auto; margin-bottom: 10px"	>
                  Kích Hoạt
                </button>
              </form>
              @endif
              <form action="{{route('LoaiSanPham.destroy',$item->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-danger-gradien" style="font-weight: bold; width: 135px; height: auto; margin-bottom: 10px"	>
                  Xóa
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
          <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Hình Ảnh</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Người Đăng</th>
            <th scope="col">Tác Vụ</th>
          </tr>
        </tfoot>
      </table>
    </div>
    @else
    <strong class="text-center">Danh Sách Trống</strong>
    @endif
  </div>
</div>
@endsection