@extends('layouts.app')

@section('container')

<section id="schedule" class="schedule-riwayat">
    <div class="container" data-aos="fade-up">

        <div class="section-schedule mb-5 d-flex justify-content-center">
            <h2 data-aos="fade-right">Riwayat Ticket</h2>
        </div>
        <a href="/orders" class="btn btn-ticket-history d-flex justify-content-center"><span class="iconify" data-icon="fa6-solid:clock-rotate-left"></span>&emsp;Kembali ke Tiket Saya</a>

        @if($orders->count())

        <div class="row row-cols-1">
            @foreach ($orders as $k)
            @for ($i = 0; $i < $order_count; $i++) <?php if ($responses[$i]['order_id'] == $k->order_id) { ?> <?php if ($responses[$i]['transaction_status'] == 'settlement' ) { ?>
                
            @if($k->uname == auth()->user()->username)

            <div class="bingkai">
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-3">
                        <img src="{{ asset('storage/' . $k->image) }}" class="img-fluid rounded-start" alt="...">
                    </div>
    
                    <div class="col-12 col-sm-6 col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">{{ $k->name }}
                                @if($k->vip == 1)
                                <span><i class="fas fa-crown"></i> VIP</span>
                                @endif
                            </h5>
    
                            <div class="row date-time">
                                <div class="col col-sm-6 col-md-6">
                                    <p class="card-date"><i class="far fa-calendar-alt"></i>&nbsp; {!! date('d M, Y', strtotime($k->date)) !!}</p>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <p class="card-time"><i class="far fa-clock"></i>&nbsp; {{ $k->starttime }} - {{ $k->endtime }}</p>
                                </div>
                            </div>
                            <h5 class="card-desc">{!! \Illuminate\Support\Str::words($k->description, 28) !!}</h5>
                        
                        </div>
                    </div>
    
                    <div class="col-12 col-sm-2 col-md-2">
                        <div class="card-btn-success"><span>Selesai<br><i class="fas fa-check-circle"></i></span></div>
                    </div>
                </div>
            </div>
            
            @endif

            <?php } } ?>
            @endfor
            
            @endforeach
        </div>

    </div>
<!-- </section> -->
<div class="d-flex justify-content-center">
    {{ $orders->links() }}
</div>

@else
<!-- <section id="schedule" class="schedule mt-5"> -->
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center text-center">
            <div class="col-8 col-md-7 col-lg-6">

                <div class="section-schedule">
                    <div class="fest-img-ticket d-flex justify-content-center pulse"><img src="../img/no-ticket.png"></div>
                    <h5>Maaf, Tidak Ada Riwayat Tiket Disini!</h5>
                    <p>Segera <a href="/schedule"> beli tiket</a> anda, dan nikmatilah keseruan bersama Sorak Sorai</p>
                </div>
            </div>
        </div>
    </div>
@endif
</section>

{{-- @include('layout.script-midtrans') --}}
@endsection