@extends('layout_admin')
@section('title','Danh Sách Sản Phẩm')
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
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Username</th>
            <th scope="col">Role</th>
            <th scope="col">Country</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Alexander</td>
            <td>Orton</td>
            <td>@mdorton</td>
            <td>Admin</td>
            <td>USA</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection