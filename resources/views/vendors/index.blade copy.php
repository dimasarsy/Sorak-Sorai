@extends('layouts.app-login')

@section('container')
<section class="login">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <div class="section-login">
            <h3 class="login" data-aos="fade-left">Daftar Sebagai Mitra</h3>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="mt-2">

                <div class="myLeftCtn">
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
                    <div class="alert alert-success alert-dismissible fade show col-4 d-flex justify-content-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if(session('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show col-4 d-flex justify-content-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form class="myForm text-center" action="/login" method="POST" novalidate>
                        
                        @csrf
                        <div class="form-group" >
                            <input id="name" placeholder="Nama Mitra" name="name" type="name" autofocus class="myInput" value="{{ old('name') }}" required>
                            @error('name')<div class="small-text">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group d-flex justify-content-center" >

                            <div class="form-image">
                                <h1 class="imgupload"><i class="fa fa-picture-o" aria-hidden="true"></i></h1>
                                <h1 class="imgupload ok"><i class="fa fa-check"></i></h1>
                                <h1 class="imgupload stop"><i class="fa fa-times"></i></h1>
                                
                                <!-- <input type="file" value="" name="fileup" id="fileup"> -->
                                <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" onchange="previewImage();">
                                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            
                                <p id="namefile">Lampirkan foto kamu disini, atau cari</p>
                                <p id="ukuranfile">Size maksimal 500kb</p>

                            </div>

                        </div>

                        <input type="submit" class="butt" value="DAFTAR">
                        
                    </form>
                </div>
            </div> 
        </div>
    </div>

</section>
@endsection


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - File Upload &amp; Image Preview</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="{{ asset('../css/style.css') }}">

</head>
<body>
<!-- partial:index.partial.html -->
<h2>File Upload & Image Preview</h2>
<p class="lead">No Plugins <b>Just Javascript</b></p>

<!-- Upload  -->
<form id="file-upload-form" class="uploader">
  <input id="file-upload" type="file" name="fileUpload" accept="image/*" />

  <label for="file-upload" id="file-drag">
    <img id="file-image" src="#" alt="Preview" class="hidden">
    <div id="start">
      <i class="fa fa-download" aria-hidden="true"></i>
      <div>Select a file or drag here</div>
      <div id="notimage" class="hidden">Please select an image</div>
      <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
    </div>
    <div id="response" class="hidden">
      <div id="messages"></div>
      <progress class="progress" id="file-progress" value="0">
        <span>0</span>%
      </progress>
    </div>
  </label>
</form>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script><script  src="../js/form.js"></script>

</body>
</html>