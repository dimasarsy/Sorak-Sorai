@extends('layouts.app')

@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section id="order" class="order-detail mt-5">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-12">
                    <div class="bingkai">
                        <div class="row">

                            <div class="col-12 mt-5">
                                <img src="{{ asset('storage/' . $orders->schedule->image) }}" class="img-fluid rounded-start" alt="...">
                            </div>

                            <div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                <div class="card-body">
                                    <h5 class="card-title mt-3">{{ $orders->schedule->name }}</h5>

                                    <div class="container">
                                        <div class="row date-time">
                                            <div class="col-6 col-md-6 col-lg-4">
                                                <p class="card-date"><i class="far fa-calendar-alt"></i>&nbsp; {{ $orders->schedule->date }}</p>
                                            </div>
    
                                            <div class="col-6 col-md-6 col-lg-6">
                                                <p class="card-time"><i class="far fa-clock"></i>&nbsp; {{ $orders->schedule->starttime }} - {{ $orders->schedule->endtime }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="card-what">Apa Itu?</h4>
                                    <h5 class="card-desc">{{ $orders->schedule->description }}</h5>
                                </div>
                            </div>

                            <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5 bingkai-order mt-5">
                                <h3 class="card-title-order">Order Detail</h3>
                                <div class="card-info">
                                    <div class="row">
                                        <div class="col-4 col-md-4">
                                            <p>Status </p>
                                            <p>Date/Time  <br>
                                                Order ID  <br>
                                                TransactionID 
                                            </p>
                                        </div>
                                        <div class="col-8 col-md-8">
                                        @for ($i = 0; $i < $order_count; $i++)
                                            <?php if($responses[$i]['order_id'] == $orders->order_id){ ?>
                                                <?php if ($responses[$i]['transaction_status'] == 'settlement'){ ?>
                                                    <p style="color:#03ff31"> :&emsp;Completed </p>
                                                <?php } elseif ($responses[$i]['transaction_status'] == 'pending') { ?>
                                                    <p style="color:#fffb00"> :&emsp;Pending </p>
                                                <?php } else { ?>
                                                    <p style="color:#ff0000"> :&emsp;Expired </p>
                                            <?php } }?>
                                        @endfor
                                            <p> :&emsp;{{ $orders->created_at }} <br>
                                                :&emsp;{{ $orders->order_id }}  <br>
                                                :&emsp;{{ $orders->transaction_id }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>  

                        </div>
    
                    </div>
                    @for ($i = 0; $i < $order_count; $i++)
                    <?php if($responses[$i]['order_id'] == $orders->order_id){ ?>
                        <?php if ($responses[$i]['transaction_status'] == 'settlement'){ ?>
                            <a href="" class="btn card-btn">Masuk</a>
                        <?php } elseif ($responses[$i]['transaction_status'] == 'pending') { ?>
                            <a href="{{ $orders->pdf_url }}" class="btn card-btn">Selesaikan Pembayaran Anda</a>
                    <?php } }?>
                    @endfor
                </div>
            </div>


                <!-- <div class="col-12">
                    <img src="{{ asset('storage/' . $orders->schedule->image) }}" class="img-fluid rounded-start" alt="...">
                </div>
                
                <div class="col-12 col-sm-7 col-md-6 col-lg-7 col-xl-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $orders->schedule->name }}</h5>

                        <div class="row date-time">
                            <div class="col col-md-6 col-lg-6">
                                <p class="card-date"><i class="far fa-calendar-alt"></i>&nbsp; {{ $orders->schedule->date }}</p>
                            </div>

                            <div class="col col-md-6 col-lg-6">
                                <p class="card-time"><i class="far fa-clock"></i>&nbsp; {{ $orders->schedule->starttime }} - {{ $orders->schedule->endtime }}</p>
                            </div>
                        </div>

                        <h4 class="card-what">Apa Itu?</h4>
                        <h5 class="card-desc">{{ $orders->schedule->description }}</h5>
                    </div>
                </div>
                

                    <div class="col-12 col-sm-5 col-md-6 col-lg-5 col-xl-4 bingkai-order">
                        <h3 class="card-title-order mt-3">Order Detail</h3>
                        <div class="card-info">
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Status </p>
                                    <p>Date/Time  <br>
                                        Order ID  <br>
                                        TransactionID 
                                    </p>
                                </div>
                                <div class="col-md-8">
                                @for ($i = 0; $i < $order_count; $i++)
                                    <?php if($responses[$i]['order_id'] == $orders->order_id){ ?>
                                        <?php if ($responses[$i]['transaction_status'] == 'settlement'){ ?>
                                            <p style="color:#03ff31"> :&emsp;Completed </p>
                                        <?php } elseif ($responses[$i]['transaction_status'] == 'pending') { ?>
                                            <p style="color:#fffb00"> :&emsp;Pending </p>
                                        <?php } else { ?>
                                            <p style="color:#ff0000"> :&emsp;Expired </p>
                                    <?php } }?>
                                @endfor
                                    <p> :&emsp;{{ $orders->created_at }} <br>
                                        :&emsp;{{ $orders->order_id }}  <br>
                                        :&emsp;{{ $orders->transaction_id }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>    

                
                </div>
                @for ($i = 0; $i < $order_count; $i++)
                    <?php if($responses[$i]['order_id'] == $orders->order_id){ ?>
                        <?php if ($responses[$i]['transaction_status'] == 'settlement'){ ?>
                            <a href="" class="btn card-btn">Masuk</a>
                        <?php } elseif ($responses[$i]['transaction_status'] == 'pending') { ?>
                            <a href="{{ $orders->pdf_url }}" class="btn card-btn">Selesaikan Pembayaran Anda</a>
                    <?php } }?>
                @endfor -->
       
    </section>

            <section id="schedule-join" class="schedule-join">
                <div class="container" data-aos="fade-up">
                    
                </div>
            </section>
@endsection
