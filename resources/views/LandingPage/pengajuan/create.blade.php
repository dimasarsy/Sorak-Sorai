@extends('layouts.app-login')

@section('container')

<section class="login">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <div class="section-login">
            <h3 class="login" data-aos="fade-left">Daftar Sebagai Mitra</h3>
        </div>
    </div>


    <div class="mt-2">
        <div class="myLeftCtn-vendor">

            <form action="{{ url('pengajuan/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group d-flex justify-content-center">
                    <input id="name" placeholder="Nama Mitra" name="name" type="name" autofocus class="myInput" value="{{ old('name') }}" required>
                    @error('name')<div class="small-text">{{ $message }}</div>@enderror
                </div>

                <div id="file-upload-form" class="uploader">
                    <input id="file-upload" type="file" name="foto" accept="image/*" />

                    <label for="file-upload" id="file-drag">
                        <img id="file-image" src="#" alt="Preview" class="hidden">
                        <div id="start">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                            <div id="namefile">Lampirkan foto kamu disini, atau cari</div>
                            <div id="ukuranfile">Size maksimal 500kb</div>
                            <div id="notimage" class="hidden">Please select an image</div>
                        </div>


                        <div id="response" class="hidden">
                            <div id="messages"></div>
                            <progress class="progress" id="file-progress" value="0">
                                <span>0</span>%
                            </progress>
                        </div>
                    </label>
                </div>

                <div class="form-group mt-4  d-flex justify-content-center">
                    <input id="marketlink " placeholder="Link Marketplace" name="marketlink" type="marketlink" autofocus class="myInput" value="{{ old('marketlink') }}" required>
                    @error('marketlink')<div class="small-text">{{ $message }}</div>@enderror
                </div>


                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
                <script src="../js/form.js"></script>
                <input type="submit" class="butt" value="DAFTAR">
            </form>
        </div>

    </div>

    @if (count($errors) > 0)
    <script>
        document.querySelector('.bg-add-modal').style.display = 'flex';
        document.querySelector('.bg-add-modal').style.top = '40px';
        document.querySelector('.add-modal-content').style.height = '725px';
        document.querySelector('.button-add-modal').className = 'button-add-modal text-center mt-3';
        document.querySelector('body').style.overflow = "hidden";
    </script>
    @else
    <script>
        document.querySelector('.bg-add-modal').style.display = 'none';
        document.querySelector('body').style.overflow = "auto";
    </script>
    @endif

    <script>
        document.getElementById('addButton').addEventListener('click', function() {
            document.querySelector('.bg-add-modal').style.display = 'flex';
            document.querySelector('body').style.overflow = "hidden";
        });

        document.querySelector('.close').addEventListener('click', function() {
            document.querySelector('.bg-add-modal').style.display = 'none';
            document.querySelector('body').style.overflow = "auto";
        });
    </script>

</section>

<script src="../js/form.js"></script>

@endsection