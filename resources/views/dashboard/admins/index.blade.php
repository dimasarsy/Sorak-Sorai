@extends('dashboard.layouts.app')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-fw fa-user"></i> List of Admin</h1>
    </div>

    @include('dashboard.layouts.popup')

    <div class="card shadow mb-4">
      <!-- <div class="card-header py-3">
        <a href="/dashboard/admins/create" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">New Admin</span></a>
      </div> -->
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

                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
              @if($user->role_id === 1)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>********</td>

                <td> 
                  <!-- <a href="/dashboard/users/{{ $user->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a> -->
                  
                  <form action="/dashboard/users/{{ $user->slug }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure to delete this post?')"><i class="fas fa-trash"></i></button>
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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

@endsection