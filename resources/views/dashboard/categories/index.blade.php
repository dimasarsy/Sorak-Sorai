@extends('dashboard.layouts.app')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-fw fa-shopping-bag"></i> Seller categories</h1>
    </div>

    @include('dashboard.layouts.popup')

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="/dashboard/categories/create" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">New categories</span></a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">categories Name</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach($categories as $categories)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $categories->name }}</td>
                  <td>
                  
                    <a href="/dashboard/categories/{{ $categories->id }}/edit" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                    
                    <form action="/dashboard/categories/{{ $categories->id }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure to delete this categories?')"><i class="fas fa-trash"></i></button>
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