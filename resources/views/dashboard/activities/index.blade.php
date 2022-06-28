@extends('dashboard.layouts.app')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-fw fa-list"></i> Festival's Activity</h1>
    </div>

    @include('dashboard.layouts.popup')

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="/dashboard/activities/create" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">New Activity</span></a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">desc</th>
                  <th scope="col">Image</th>

                  <th scope="col">Action</th>
                </tr>
              </thead>

              <tbody>
              
              @foreach($activities as $activity)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $activity->name }}</td>
                  <td>{!! $activity->desc !!}</td>
                  <td>      
                    <img class="img-responsive" style="height:150px;" src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->name }}'s image">
                  </td>

                  <td>

                    <a href="/dashboard/activities/{{ $activity->slug }}/edit" class="btn btn-info btn-circle btn-sm"><i class="fas fa-edit"></i></a>

                    <form action="/dashboard/activities/{{ $activity->slug }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure to delete this activity?')"><i class="fas fa-trash"></i></button>
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