@extends('layouts.app')

@section('container')
<section id="hero">
    <div class="container mt-1">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
</section>

<section id="services" class="status-pengajuan">
    <div class="container">
        <div class="section-pengajuan mb-5 d-flex justify-content-center">
            <h2 data-aos="fade-right">Permintaan anda sedang dalam proses.</h2>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row bingkai">
            @foreach ($pengajuans as $k)

            <div class="col-12">
                <div class="card-body">
                    <h3 class="card-title-pengajuan">Pengajuan Mitra</h3><br>
                    @if ($k->status == 'Review')
                    <p>Status&emsp;:<span>&emsp;{{ $k->status }}</span></p><br>
                    <p>Diajukan Pada:</p>
                    <h5>{{ $k->created_at }}</h5>
                    @elseif($k->status == 'Tidak Lolos')
                    <p>Status&emsp;:<span>&emsp;{{ $k->status }}</span></p><br>
                    <p>Diajukan Pada:</p>
                    <h5>{{ $k->created_at }}</h5>
                    @else
                    <p>Status&emsp;:<span>&emsp;{{ $k->status }}</span></p><br>
                    <p>Diajukan Pada:</p>
                    <h5>{{ $k->created_at }}</h5>
                    @endif
                </div>
            </div>
            @endforeach
        </div>


    </div>
</section>

@endsection