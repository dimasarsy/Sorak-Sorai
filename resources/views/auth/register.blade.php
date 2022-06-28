@extends('layouts.app-login')

@section('container')
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