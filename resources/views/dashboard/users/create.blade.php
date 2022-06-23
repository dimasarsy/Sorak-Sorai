@extends('dashboard.layouts.app')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-fw fa-user"></i> Add New User</h1>
</div>
<div class="card shadow mb-4">
    <div class="col-lg-10">
        <div class="card-body">
            <form action="/dashboard/users" method="POST" novalidate enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
                    @error('name')<div class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input id="username" name="username" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('username') }}">
                    @error('username')<div class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-3">
                    <label for="email-address" class="form-label">Email address</label>
                    <input id="email-address" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')<div class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')<div class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
        
                <button type="submit" class="btn btn-primary mb-5 mt-4">Add New User</button>
            </form>
        </div>

    </div>
</div>

@endsection