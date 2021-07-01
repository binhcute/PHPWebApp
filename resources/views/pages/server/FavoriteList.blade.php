@extends('layout_admin')
@section('title','Danh Sách Yêu Thích')
@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-header">
      <h5>Danh Sách Yêu Thích</h5>
    </div>
    @if(count($favorite)!= 0)
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Username</th>
            <th scope="col">Role</th>
            <th scope="col">Country</th>
          </tr>
        </thead>
        <tbody>
        @foreach($favorite as $item)
          <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->name}}</td>
            <td><img src="server/assets/images/favorite/{{$item->img}}"></td>
            <td>
              @if($item->status==1)
                <span>Active</span>
              @else
                <span>Disable</span>
              @endif
            </td>
            <td>Admin</td>
            <td class="d-flex align-items-center justify-content-around">
              <form action="{{route('YeuThich.show',$item->id)}}" method="get">
                <button class="btn btn-sm btn-primary rounded-0">
                  Show
                </button>
              </form>
              <form action="{{route('YeuThich.edit',$item->id)}}" method="get">
                <button class="btn btn-sm btn-warning rounded-0">
                  Edit
                </button>
              </form>
              @if($item->status == 1)
              <form action="{{URL::to('/YeuThich/disabled/'.$item->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put" />
                <button class="btn btn-sm btn-danger rounded-0">
                  Disabled
                </button>
              </form>
              @else
              <form action="{{URL::to('/YeuThich/enabled/'.$item->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put" />
                <button class="btn btn-sm btn-danger rounded-0">
                  Enabled
                </button>
              </form>
              @endif
              <form action="{{route('YeuThich.destroy',$item->id)}}" method="post">
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
    <strong>DB NULL</strong>
    @endif
  </div>
</div>
@endsection