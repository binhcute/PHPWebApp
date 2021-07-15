@extends('layout_admin')
@section('title','Danh Sách Màu Sắc')
@section('content')
<div class="col-sm-12">
<div class="page-title">
    <div class="row">
      <div class="col-6">
      <h3>Danh Sách Màu Sắc</h3>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Màu Sắc</li>
          <li class="breadcrumb-item active">Danh Sách Màu Sắc</li>
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
        @if(count($color)!= 0)
        <div class="card-body">
      <div class="table-responsive">
        <table class="display" id="basic-1">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên</th>
              <th scope="col">Trạng Thái</th>
              <th scope="col">Tác Vụ</th>
            </tr>
          </thead>
        <tbody>
        @foreach($color as $item)
          <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->name}}</td>
            <td>
                @if($item->status==1)

                <form action="{{URL::to('/MauSac/disabled/'.$item->id)}}" method="post">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-ui-check" style="font-size:20px;color:blue"></i></button> </button>
                  <p>Đang hiển thị</p>
                </form>
                @else
                <form action="{{URL::to('/MauSac/enabled/'.$item->id)}}" method="post">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-ui-close" style="font-size:20px;color:red"></i></button>
                  <p>Đang ẩn</p>
                </form>
                @endif
              </td>
            <td class="flex-column align-items-center justify-content-around">
                <a href="{{route('MauSac.show',$item->id)}}" method="get">
                  <i class="icofont icofont-paper" style="font-size:20px;color:green"></i>
                </a>
                <a href="{{route('MauSac.edit',$item->id)}}">
                  <i class="icofont icofont-pencil-alt-5" style="font-size:20px;color:blue"></i>
                </a>
                <a href="{{URL::to('/XoaMau',$item->id)}}" onclick="return confirm('Bạn muốn xóa danh mục này ?')">
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
              <th scope="col">Tên</th>
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