@extends('dashboard.layouts.app')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class='fas fa-user-check'></i> Vendor Request</h1>
</div>
<div class="card shadow mb-4">
    <div class="col-lg-12">
        <div class="card-body">
            <div class="container">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Name</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Marketplace Link</th>

                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach ($pengajuans as $k)
                        <tr>
                            <td scope="row">{{ $k->id }}</td>
                            <td>{{ $k->uname }}</td>
                            <td>{{ $k->name }}</td>
                            <td>
                                <img class="img-responsive" style="width: 100px;" src="{{ asset('storage/' . $k->foto) }}" alt="{{ $k->name }}'s logo">
                            </td>
                            <td><a href="{{ $k->marketlink }}" class="btn btn-icon-split" style="width: 30px; height: 30px"><span class="icon text-white-75"><i class='fa fa-link'></i></span></a> {{ $k->marketlink }}</td>

                            <form action="{{ url('dashboard/pengajuan-vendor/update', $k->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <td style="width: 150px">

                                    <div class="col-auto my-1">
                                        <select name="status" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                            <option selected>{{ $k->status }}</option>
                                            <hr>
                                            <option value="Lolos">Lolos</option>
                                            <option value="Review">Review</option>
                                            <option value="Tidak Lolos">Tidak Lolos</option>
                                        </select>
                                    </div>


                                </td>
                                <td><button type="submit" class="btn btn-primary px-4">Edit</button></td>
                            </form>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection