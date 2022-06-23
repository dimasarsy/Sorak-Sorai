@extends('dashboard.layouts.app')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-fw fa-music"></i> Line Up</h1>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>

      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
          {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if(session('deleted'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          {{ session('deleted') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="/dashboard/lineups/create" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">New Lineup</span></a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Date</th>
                  <th scope="col">Time</th>

                  <th scope="col">Action</th>
                </tr>
              </thead>

              <tbody>

                @foreach($lineups as $lineup)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $lineup->name }}</td>
                  <td>{{ $lineup->date }}</td>
                  <td>{{ $lineup->time }}</td>
                  <td>
                  
                  <!-- <a href="/dashboard/lineups/{{ $lineup->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                  <a href="/dashboard/lineups/{{ $lineup->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    
                    <form action="/dashboard/lineups/{{ $lineup->slug }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure to delete this post?')"><span data-feather="x-circle"></span></button>
                    </form> -->

                    <a href="/dashboard/lineups/{{ $lineup->slug }}" class="btn btn-success btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                    <a href="/dashboard/lineups/{{ $lineup->slug }}/edit" class="btn btn-info btn-circle btn-sm"><i class="fas fa-edit"></i></a>

                    <form action="/dashboard/lineups/{{ $lineup->slug }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure to delete this lineup?')"><i class="fas fa-trash"></i></button>
                    </form>
                    
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>

@endsection