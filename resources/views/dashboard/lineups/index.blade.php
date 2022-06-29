@extends('dashboard.layouts.app')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-fw fa-music"></i> Line Up</h1>
    </div>

      @include('dashboard.layouts.popup')

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
                  <th scope="col">Picture</th>
                  <th scope="col">Date</th>
                  <th scope="col">Time (WIB)</th>

                  <th scope="col">Action</th>
                </tr>
              </thead>

              <tbody>

                @foreach($lineups as $lineup)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $lineup->name }}</td>
                  <td>      
                    <img class="img-responsive" style="height:120px;" src="{{ asset('storage/' . $lineup->image) }}" alt="{{ $lineup->name }}'s image">
                  </td>
                  <td>{!! date('d M, Y', strtotime($lineup->date)) !!}</td>
                  <td>{{ $lineup->starttime }}-{{ $lineup->endtime }}</td>
                  <td>

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