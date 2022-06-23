@extends('layouts.app-login')

@section('container')
<!-- <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Register your account</h2>
        </div>
        <form class="mt-8 space-y-6" action="" method="POST" novalidate>
            @csrf
            <div class="rounded-md shadow-sm">
                <div class="mb-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                    <input id="name" name="name" type="text" autocomplete="username" class="focus:ring-indigo-500 focus:border-indigo-500 p-3 flex-1 block w-full rounded-md sm:text-sm border-gray-300 border" value="{{ old('name') }}" autofocus>
                    @error('name')<small class="text-red-600 font-medium block my-2">{{ $message }}</small>@enderror
                </div>
                <div class="mb-2">
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <input id="username" name="username" type="text" autocomplete="username" class="focus:ring-indigo-500 focus:border-indigo-500 p-3 flex-1 block w-full rounded-md sm:text-sm border-gray-300 border" value="{{ old('username') }}">
                    @error('username')<small class="text-red-600 font-medium block my-2">{{ $message }}</small>@enderror
                </div>
                <div class="mb-2">
                    <label for="email-address" class="block text-sm font-medium text-gray-700 mb-2">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" class="focus:ring-indigo-500 focus:border-indigo-500 p-3 flex-1 block w-full rounded-md sm:text-sm border-gray-300 border" value="{{ old('email') }}">
                    @error('email')<small class="text-red-600 font-medium block my-2">{{ $message }}</small>@enderror
                </div>
                <div class="mb-2">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input id="password" name="password" type="password" autocomplete="password" class="focus:ring-indigo-500 focus:border-indigo-500 p-3 flex-1 block w-full rounded-md sm:text-sm border-gray-300 border">
                    @error('password')<small class="text-red-600 font-medium block my-2">{{ $message }}</small>@enderror
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Register
                </button>
            </div>

            <div class="w-full text-center">
                <a href="/login" class="font-medium text-sm my-5 text-indigo-600 hover:text-indigo-500">Already have an account?, Log in now!</a>
            </div>
        </form>
    </div>
</div> -->

<section class="login">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <div class="section-login">
            <h3 class="login" data-aos="fade-left">Daftar</h3>
        </div>
    </div>
    <div class="container">
            <div class="row">
                    <div class="myLeftCtn">
                        <form class="myForm text-center" action="" method="POST" novalidate>
                        
                            @csrf
                            <div class="form-group" >
                                <i class="fas fa-user"></i>
                                <input id="name" placeholder="Nama" name="name" type="text" autofocus class="myInput" value="{{ old('name') }}" required>
                                @error('name')<div class="small-text">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <input id="username" name="username" type="text" placeholder="Username" autocomplete="username" class="myInput" value="{{ old('username') }}" required>
                                @error('username')<div class="small-text">{{ $message }}</div>@enderror
                            </div>
                            
                            <div class="form-group">
                                <i class="fas fa-envelope"></i>
                                <input id="email-address" name="email" type="email" placeholder="E-mail" autocomplete="email" class="myInput" value="{{ old('email') }}" required>
                                @error('email')<div class="small-text">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input id="password" name="password" type="password" placeholder="Kata Sandi" autocomplete="password" class="myInput" required>
                                @error('password')<div class="small-text">{{ $message }}</div>@enderror

                            </div>

                            <input type="submit" class="butt" value="DAFTAR">

                            <p>Sudah punya akun? <a href="/login">Masuk </a></p>
                            
                        </form>
                    </div>
                </div> 
            </div>
    </div>

</section>
@endsection