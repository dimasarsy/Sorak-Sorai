@extends('dashboard.layouts.app')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2"><i class="fas fa-fw fa-user"></i> List of All Users</h1>
</div>

@include('dashboard.layouts.popup')


<div class="card shadow mb-4">
  <div class="col-lg-12">
    <div class="card-body">
      <div class="container">

        <div class="card-header py-3">
          <a href="/dashboard/users/create" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">New User</span></a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
                  <th class="text-center" scope="col">Role</th>

                  <th class="text-center" scope="col">Action</th>
                </tr>
              </thead>

              <tbody>
                @foreach($users as $user)
                @if($user->role_id != 1)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->email }}</td>
                  <td>********</td>

                  <td class="text-center">
                    @if($user->role_id == 2)
                    <div class="badge border-2" style="background-color:cyan"><span class="text">User</span></div>
                    <!-- <div class="btn btn-success btn-icon-split btn-sm"><span class="text">User</span></div> -->
                    @elseif($user->role_id == 4)
                    <div class="badge bg-primary border-2"><span class="text">Vendor</span></div>
                    <!-- <div class="btn btn-success btn-icon-split btn-sm"><span class="text">Vendor</span></div> -->
                    @endif
                  </td>

                  <td class="text-center">

                    <a href="/dashboard/users/{{ $user->id }}/edit" class="btn btn-info btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                    <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure to delete this user?')"><i class="fas fa-trash"></i></button>
                    </form>

                  </td>
                </tr>
                @endif
                @endforeach


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection