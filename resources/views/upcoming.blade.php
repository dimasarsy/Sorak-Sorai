@extends('layouts.app')

@section('container')

<!-- --------------------------------------------------------------
# PERFORMANCE
-------------------------------------------------------------- -->
@if($schedules->count())
<section id="order" class="schedule-coming mt-5">
  <div class="container" data-aos="fade-up">

    <div class="section-penampil mt-3 d-flex justify-content-center">
      <h2 data-aos="fade-right">YANG AKAN DATANG</h2>
    </div>

    @foreach ($schedules as $schedule)
    <div class="row d-flex justify-content-center">
      <div class="col-12">
        <div class="bingkai">

          <div class="col-12 mt-5">
            <img src="{{ asset('storage/' . $schedule->image) }}" class="img-fluid rounded-start" alt="...">
            <h5 class="card-title mt-3">{{ $schedule->name }}</h5>
          </div>

          <div class="card-body">
            <h5 class="card-date"><i class="far fa-calendar-alt"></i>&nbsp; {!! date('d M, Y', strtotime($schedule->date)) !!}</h5>
            <h5 class="card-desc">{!! \Illuminate\Support\Str::words($schedule->description, 72) !!}</h5>
          </div>

        </div>
      </div>
    </div>
    @endforeach

  </div>
</section>

<div class="d-flex justify-content-center">
  {{ $schedules->links() }}
</div>



@else
<section id="order" class="schedule-coming mt-5">
  <div class="container" data-aos="fade-up">

    <div class="section-penampil mt-3 d-flex justify-content-center">
      <h2 data-aos="fade-right">YANG AKAN DATANG</h2>
    </div>

    <div class="section-schedule">
      <div class="fest-img d-flex justify-content-center pulse"><img src="img/no-schedule.png"></div>
      <h5 class="mb-5">Tunggu kami di Sorak Sorai!</h5>
    </div>

  </div>
</section>
@endif

@endsection