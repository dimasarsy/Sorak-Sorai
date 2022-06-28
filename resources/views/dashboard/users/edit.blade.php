@extends('dashboard.layouts.app')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-fw fa-user"></i> Edit User</h1>
</div>

<div class="card shadow mb-4">
    <div class="col-lg-10">
        <div class="card-body">
            <form action="/dashboard/users/{{ $user->id }}" method="POST" novalidate enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name', $user->name) }}" autofocus>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror"  value="{{ old('slug', $user->username) }}" autofocus>
                    @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="mb-3">
                    <label for="email-address" class="form-label">email</label>
                    <input id="email-address" name="email" type="text" class="form-control @error('email') is-invalid @enderror"  value="{{ old('slug', $user->email) }}" autofocus>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <label for="title">Role</label>
                <select class="form-control custom-select" id="exampleFormControlSelect1" name="role_id">
                    <option value="{{ old('role_id', $user->role_id) }}" selected>Choose...</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select><br><br>
            
                <button type="submit" class="btn btn-primary mb-5">Update User</button>
                <a href="/dashboard/users" class="btn btn-warning mb-5">Cancel</a>
            </form>
            
        </div>
    </div>
</div>

<script>

    const name = document.getElementById('name');
    const slug = document.getElementById('slug');

    name.addEventListener('change', async function() {
        const res = await fetch(`/dashboard/sponsors/slug?${
            new URLSearchParams({name: this.value})
            .toString()
        }`);
        const data = await res.json();
        slug.value = data.slug;
    });

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
@endsection