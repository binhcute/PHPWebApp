@extends('layout_admin')
@section('title','Hóa Đơn')
@section('content')
<div class="col-sm-12">
  <div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>Danh Sách Hóa Đơn</h3>
      </div>
      <div class="col-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Hóa Đơn</li>
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
    @if(count($order)!=0)
    <div class="card-body">
      <div class="table-responsive">
        <table class="display" id="basic-1">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Người Mua</th>
              <th scope="col">Ngày Mua</th>
              <th scope="col">Trạng Thái</th>
              <th scope="col">Tác Vụ</th>
            </tr>
          </thead>
          <tbody>
            @foreach($order as $item)
            <tr>
              <th scope="row">{{ $item->order_id }}</th>
              <td>{{ $item->username}}</td>
              <td>{{ $item->updated_at }}</td>
              <td>
                @switch($item->status)
                @case(0)
                <strong style="color:#00c3da">Đang vận chuyển</strong>
                @break
                @case(1)
                <strong style="color:greenyellow">Đang chờ xử lý</strong>
                @break
                @case(2)
                <strong style="color:dodgerblue">Giao hàng thành công</strong>
                @break
                @case(3)
                <strong style="color:orangered">Đơn hàng đã bị hủy</strong>
                @break
                @endswitch
              </td>
              <td class="d-flex align-items-center justify-content-around">
                <form action="{{route('HoaDon.show',$item->order_id)}}" method="get">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-paper" style="font-size:20px;color:green"></i></i></button>
                </form>
                @if($item->status==0)
                <form method="post" action="{{URL::to('/HoaDon/xuly/'.$item->order_id)}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit"><i class="icofont-clock-time" style="font-size:20px;color:violet"></i></button>
                </form>
                <form method="post" action="{{URL::to('/HoaDon/huy/'.$item->order_id)}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-ui-close" style="font-size:20px;color:red"></i></button>
                </form>
                <form method="post" action="{{URL::to('/HoaDon/thanhcong/'.$item->order_id)}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-ui-check" style="font-size:20px;color:blue"></i></button>
                </form>
                @endif
                @if($item->status==1)
                <form method="post" action="{{URL::to('/HoaDon/danggiao/'.$item->order_id)}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit"><i class="icofont-motor-biker" style="font-size:20px;color:#00c3da"></i></button>
                </form>
                <form method="post" action="{{URL::to('/HoaDon/huy/'.$item->order_id)}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-ui-close" style="font-size:20px;color:red"></i></button>
                </form>
                <form method="post" action="{{URL::to('/HoaDon/thanhcong/'.$item->order_id)}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit"><i class="icofont icofont-ui-check" style="font-size:20px;color:blue"></i></button>
                </form>
                @endif
                @if($item->status==2)
                <form method="post" action="{{URL::to('/HoaDon/danggiao/'.$item->order_id)}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit" onclick="return confirm('Đơn hàng đã giao thành công, bạn muốn kích hoạt lại ?')">
                    <i class="icofont-motor-biker" style="font-size:20px;color:#00c3da"></i>
                  </button>
                </form>
                <form method="post" action="{{URL::to('/HoaDon/huy/'.$item->order_id)}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit" onclick="return confirm('Đơn hàng đã giao thành công, bạn muốn kích hoạt lại ?')">
                    <i class="icofont icofont-ui-close" style="font-size:20px;color:red"></i>
                  </button>
                </form>
                <form method="post" action="{{URL::to('/HoaDon/xuly/'.$item->order_id)}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit" onclick="return confirm('Đơn hàng đã giao thành công, bạn muốn kích hoạt lại ?')">
                    <i class="icofont-clock-time" style="font-size:20px;color:violet"></i>
                  </button>
                </form>
                @endif
                @if($item->status==3)
                <form method="post" action="{{URL::to('/HoaDon/danggiao/'.$item->order_id)}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit" onclick="return confirm('Đơn hàng đã bị hủy, bạn muốn kích hoạt lại ?')">
                    <i class="icofont-motor-biker" style="font-size:20px;color:#00c3da"></i>
                  </button>
                </form>
                <form method="post" action="{{URL::to('/HoaDon/xuly/'.$item->order_id)}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit" onclick="return confirm('Đơn hàng đã bị hủy, bạn muốn kích hoạt lại ?')">
                    <i class="icofont-clock-time" style="font-size:20px;color:violet"></i>
                  </button>
                </form>
                <form method="post" action="{{URL::to('/HoaDon/thanhcong/'.$item->order_id)}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="put" />
                  <button class="btn btn-outline-light" type="submit" onclick="return confirm('Đơn hàng đã bị hủy, bạn muốn kích hoạt lại ?')">
                    <i class="icofont icofont-ui-check" style="font-size:20px;color:blue"></i>
                  </button>
                </form>
                @endif
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