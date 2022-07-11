@extends('layouts.app')

@section('container')
<!-- =================================
# SCHEDULE DETAIL
=================================  -->
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<section id="schedule" class="schedule-detail">
    <div class="container" data-aos="fade-up">
        <div class="section-about mt-5 mb-5 d-flex justify-content-center">
            <h2 data-aos="fade-right"></h2>
        </div>

        <div class="row mt-5 ">
            <p class="card-title">
                {{ $schedule->name }}
            </p>
            @if($schedule->enddate == $schedule->date)
            <p class="card-date"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;{!! date('d F, Y', strtotime($schedule->date)) !!}</p>
            @else
            <p class="card-date"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;{!! date('d F', strtotime($schedule->date)) !!} - {!! date('d F, Y', strtotime($schedule->enddate)) !!}</p>
            @endif

            <div class="col-12">
                <div class="row">

                    <div class="bingkai col-md-4 col-lg-6 ">
                        <img src="{{ asset('storage/' . $schedule->image) }}" alt="Schedule Image" class="img-fluid rounded-start">
                    </div>



                    <div class="col-md-8 col-lg-9">
                        <div class="card-body">

                            <p class="card-time">Show Time:</p>
                            <p class="card-time">{{ $schedule->starttime }} - {{ $schedule->endtime }} WIB</p>


                            <div class="row price-buy">
                                <div class="col-6 col-md-5 col-lg-4">
                                    <h5 class="card-price">Rp. {{ number_format($schedule->price, 0, ',', '.') }},-</h5>
                                </div>

                                <div class="col-6 col-md-7 col-lg-8 d-flex justify-content-start">
                                    <button class="btn card-btn" id="pay-button">Beli Sekarang</button>
                                    <form action="" id="submit_form" method="POST">
                                        @csrf
                                        <input type="hidden" name="json" id="json_callback">
                                    </form>
                                </div>
                            </div>

                            <div class="card-desc">
                                <p class="card-desc">{!! $schedule->description !!}</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            @if($schedule->vip == 1)
            <h5 class="card-vip"><i class="fas fa-crown"></i>&nbsp;&nbsp; VIP</h5>
            <h5 class="card-vip-info">
                ●&nbsp;&nbsp; Akses ke Meet & Greet<br>
                ●&nbsp;&nbsp; Ke Samudera Antariksa
            </h5>
            @endif

        </div>

    </div>

</section>

<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">

        <div class="verif">

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <h5>Setelah Menikmati Konser? Sambut Kehangatan Bareng Idola Kalian di Samudra Antariksa</h5>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>

    </div>
</div>


@include('layouts.script-midtrans')

@endsection