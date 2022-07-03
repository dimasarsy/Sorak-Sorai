@extends('dashboard.layouts.app')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-fw fa-user"></i> List of Vendors</h1>
    </div>

    @include('dashboard.layouts.popup')

    <div class="card shadow mb-4">
      
      <div class="card-header py-3">
      <a href="/dashboard/pengajuan-vendor" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class='fas fa-user-check'></i></span><span class="text">Vendor Request</span></a>
      </div>


      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" scope="col">ID</th>
                <th class="text-center" scope="col">Logo</th>
                <th class="text-center" scope="col">Username</th>
                <th class="text-center" scope="col">Market Name</th>
                <th class="text-center" scope="col">Cek Product</th>
                <th class="text-center" scope="col">Link Marketplace</th>
              </tr>
            </thead>

            <tbody>
            @foreach ($pengajuans as $k)
              <tr>
                <td class="text-center">{{ $k->id }}</td>
                <td class="text-center">      
                  <img class="img-responsive" style="height: 80px;;" src="{{ asset('storage/' . $k->foto) }}" alt="{{ $k->name }}'s logo">
                </td>
                <td class="text-center">{{ $k->uname }}</td>
                <td class="text-center">{{ $k->name }}</td>
                <td class="text-center"><a href="/vendor/{{ $k->uname }}" class="btn btn-warning btn-icon-split"><span class="icon text-white-50"><i class='fa fa-shopping-bag'></i></span></a></td>
                <td class="text-center"><a href="{{ $k->marketlink }}" class="btn btn-success btn-icon-split"><span class="icon text-white-50"><i class='fa fa-link'></i></span><span class="text">{{ $k->name }}</span></a>

              </tr>
            @endforeach
            </tbody>

          </table>
        </div>
      </div>

@endsection