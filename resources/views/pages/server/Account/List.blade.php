@extends('layout_admin')
@section('title','Tài Khoản')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>Danh Sách Tài Khoản</h3>
        <a style="margin-left:50px" class="btn btn-success" href="{{route('TaiKhoan.create')}}"><i class="fa fa-plus"></i> Thêm Mới</a>
        </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Tài Khoản</li>
          <li class="breadcrumb-item active">Danh Sách</li>
        </ol>
      </div>
    </div>
  </div>
  @if ($message = Session::get('message'))
  <div class="alert alert-success alert-block">
    <strong>{{ $message }}</strong>
    <?php
    Session::put('message', null);
    ?>
  </div>
  @endif
  @if ($destroy = Session::get('destroy'))
  <div class="alert alert-danger alert-block">
    <strong>{{ $destroy }}</strong>
    <?php
    Session::put('destroy', null);
    ?>
  </div>
  @endif
  @if ($info = Session::get('info'))
  <div class="alert alert-primary alert-block">
    <strong>{{ $info }}</strong>
    <?php
    Session::put('info', null);
    ?>
  </div>
  @endif
  <div class="card">
    @if(count($account)!=0)
    <div class="card-body">
      <div class="table-responsive">
        <table class="display" id="basic-1">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tài Khoản</th>
              <th scope="col">Họ Tên</th>
              <th scope="col">Trạng Thái</th>
              <th scope="col">Tác Vụ</th>
            </tr>
          </thead>
          <tbody>
            @foreach($account as $item)
            <tr>
              <th scope="row">{{ $item->id }}</th>
              <td>{{ $item->username }}</td>
              <td>{{ $item->firstName}} {{ $item->lastName}}</td>
              <td>
                @switch($item->level)
                @case(0)
                <strong style="color:#00c3da">Tài Khoản Khách</strong>
                @break
                @case(1)
                <strong style="color:greenyellow">Tài Khoản Admin</strong>
                @break
                @endswitch
              </td>
              <td class="flex-column align-items-center justify-content-around">
                <a href="{{route('TaiKhoan.show',$item->id)}}" method="get">
                  <i class="icofont icofont-paper" style="font-size:20px;color:green"></i>
                </a>
                <a href="{{route('TaiKhoan.edit',$item->id)}}">
                  <i class="icofont icofont-pencil-alt-5" style="font-size:20px;color:blue"></i>
                </a>
                <a href="{{URL::to('/XoaTaiKhoan',$item->id)}}" onclick="return confirm('Bạn muốn xóa danh mục này ?')">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="delete">
                  <i class="icofont icofont-trash" style="font-size:20px;color:red"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
            <th scope="col">#</th>
              <th scope="col">Tài Khoản</th>
              <th scope="col">Họ Tên</th>
              <th scope="col">Trạng Thái</th>
              <th scope="col">Tác Vụ</th> 
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  @else
  <strong class="text-center">Danh Sách Trống</strong>
  @endif
</div>
</div>
@endsection