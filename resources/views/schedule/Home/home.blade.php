@extends('layouts.app')

@section('container')


@if($schedules->count())


<section id="schedule" class="schedule">
    <div class="section-schedule mb-5 d-flex justify-content-center">
        <h2 data-aos="fade-right">Beli Ticket</h2>
    </div>



    <div class="schedule-search mb-5">

        <div class="row">
            <div class="input-group d-flex justify-content-center mb-3">
                <!-- SEARCH SHOP  -->
                <div class="col-6 d-flex justify-content-start">
                    <div class="searchshop-icon2">
                        <span class="fas fa-search"></span>
                    </div>
                    <div class="cancelshop-icon">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <div class="searchdate-icon">
                        <span class="fas fa-calendar-alt"></span>
                    </div>
                    <div class="canceldate-icon">
                        <span class="fas fa-times"></span>
                    </div>
                </div>


                <div class="searchname">
                    <form action="/schedule" method="GET">
                        <button type="submit" class="fas fa-search"></button>
                        <input type="text" name="searchName" id="search" class="search-name" placeholder="Nama Acara" value="{{ request('searchName') }}">
                    </form>
                </div>&emsp;&emsp;<br><br>
                <div class="searchdate">
                    <form action="/schedule" method="GET">
                        <input type="date" name="searchDate" id="searchDate" class="search-date" placeholder="Search Date" value="{{ request('searchDate') }}">
                        <button type="submit" class="fas fa-calendar-alt"></button>
                    </form>
                </div>

                <script>
                    const searchsdateBtn = document.querySelector(".searchdate-icon");
                    const searchshopBtn = document.querySelector(".searchshop-icon2");
                    const cancelshopBtn = document.querySelector(".cancelshop-icon");
                    const canceldateBtn = document.querySelector(".canceldate-icon");
                    const searchname = document.querySelector(".searchname form");
                    const searchdate = document.querySelector(".searchdate form");

                    cancelshopBtn.onclick = () => {
                        searchsdateBtn.classList.remove("hide");
                        searchshopBtn.classList.remove("hide");
                        cancelshopBtn.classList.remove("show");
                        searchname.classList.remove("active");
                        cancelshopBtn.style.color = "#ff3d00";
                    }
                    searchshopBtn.onclick = () => {
                        searchname.classList.add("active");
                        searchshopBtn.classList.add("hide");
                        searchsdateBtn.classList.add("hide");
                        cancelshopBtn.classList.add("show");
                    }

                    canceldateBtn.onclick = () => {
                        searchsdateBtn.classList.remove("hide");
                        searchshopBtn.classList.remove("hide");
                        canceldateBtn.classList.remove("show");
                        searchdate.classList.remove("active");
                        canceldateBtn.style.color = "#ff3d00";
                    }
                    searchsdateBtn.onclick = () => {
                        searchdate.classList.add("active");
                        searchsdateBtn.classList.add("hide");
                        searchshopBtn.classList.add("hide");
                        canceldateBtn.classList.add("show");
                    }
                </script>
                <br><br>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="row text-center">
                <div class="col-4">
                    <form action="/schedule" method="GET">
                        <button class="button-schedule-week {{ $activeFilter == 'thisWeek' ? 'active-button' : '' }}" type="submit" name="submit" value="thisWeek">
                            <a class="{{ $activeFilter == 'thisWeek' ? 'active-button' : '' }}">
                                Minggu ini
                            </a>
                        </button>
                    </form>
                </div>
                <div class="col-4">
                    <form action="/schedule" method="GET">
                        <button class="button-schedule-month" type="submit" name="submit" value="thisMonth">
                            <a class="{{ $activeFilter == 'thisMonth' ? 'active-button' : '' }}">
                                Bulan ini
                            </a>
                        </button>
                    </form>
                </div>
                <div class="col-4">
                    <form action="/schedule" method="GET">
                        <button class="button-schedule-year" type="submit" name="submit" value="thisYear">
                            <a class="{{ $activeFilter == 'thisYear' ? 'active-button' : '' }}">
                                Tahun ini
                            </a>
                        </button>
                    </form>
                </div>
            </div>
        </div>


    </div>


    <div class="row row-cols-2 row-cols-sm-1">
        @foreach ($schedules as $schedule)
        <a href="/scheduleDetail/{{ $schedule->id }}">
            <div class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <div class="bingkai">

                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3 d-flex justify-content-center">
                            <img src="{{ asset('storage/' . $schedule->image) }}" class="img-fluid rounded-start" alt="...">
                        </div>

                        <div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-9">

                            <div class="card-body">
                                <div class="row">
                                    <h5 class="card-title">{{ $schedule->name }}</h5>
                                </div>

                                <div class="row date-time">
                                    <div class="col-12 col-sm-7 col-lg-5">
                                        @if($schedule->enddate == $schedule->date)
                                        <p class="card-date"><i class="far fa-calendar-alt"></i>&nbsp; {!! date('d M, Y', strtotime($schedule->date)) !!}</p>
                                        @else
                                        <p class="card-date"><i class="far fa-calendar-alt"></i>&nbsp; {!! date('d M', strtotime($schedule->date)) !!} - {!! date('d M, Y', strtotime($schedule->enddate)) !!}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-sm-5 col-lg-7">
                                        <p class="card-time"><i class="far fa-clock"></i>&nbsp; {{ $schedule->starttime }} - {{ $schedule->endtime }}</p>
                                    </div>
                                </div>

                                <h5 class="card-price">Rp{{ number_format($schedule->price, 0, ',', '.') }}</h5>
                                <h5 class="card-desc">{!! \Illuminate\Support\Str::words($schedule->description, 25) !!}</h5>
                                
                                @if($schedule->vip == 1)
                                <h5 class="card-vip"><i class="fas fa-crown"></i>&nbsp;&nbsp; VIP</h5>
                                @endif
                                <div class="row mt-5">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </a>
        @endforeach

    </div>
</section>

<div class="d-flex justify-content-center">
    {{ $schedules->links() }}
</div>

@else

<section id="schedule" class="schedule mt-5">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center text-center">
            <div class="col-8 col-md-7 col-lg-6">

                <div class="section-schedule mt-5">
                    <h2 class="mb-5" data-aos="fade-up">Beli Ticket</h2>
                    @if(request())
                    <div class="mt-5" data-aos-delay="600">
                        <a href="/schedule" class="btn-get-started scrollto text-decoration-none">Semua Jadwal</a>
                    </div>
                    @endif
                    <div class="fest-img d-flex justify-content-center pulse"><img src="img/no-schedule.png"></div>
                    <h5>Tiket Belum Tersedia!</h5>
                </div>

            </div>
        </div>
    </div>
</section>

@endif
@endsection