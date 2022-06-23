@extends('layouts.app')

@section('container')

<!-- --------------------------------------------------------------
# PERFORMANCE
-------------------------------------------------------------- -->

@if($lineups->count() )
<section id="performance" class="performance mt-5">
  <div class="container" data-aos="fade-up">

    <div class="section-penampil mt-3 mb-5 d-flex justify-content-center">
      <h2 data-aos="fade-right">PENAMPIL</h2>
    </div>

    <div class="row">

      @foreach($lineups as $lineup)
      <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">

        <div class="member mt-5">
          <div class="member-img">
            <img class="img" src="{{ asset('storage/' . $lineup->image) }}" alt="{{ $lineup->name }}'s image">
            <div class="social-team">
              <h2>{{ $lineup->name }}</h2>
            </div>
            <!-- <div class="social-team">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-globe2"></i></a>
                </div> -->
          </div>
        </div>

      </div>
      @endforeach
    </div>

  </div>
</section>

@else
<section id="festival" class="about mt-5">
  <div class="container" data-aos="fade-up">
    <div class="row justify-content-center text-center">
      <div class="col-8 col-md-7 col-lg-6">

        <div class="section-penampil mt-5">
          <h2 data-aos="fade-up">PENAMPIL</h2>
          <div class="fest-img d-flex justify-content-center pulse"><img src="img/no-performance.png"></div>
          <h5>Tunggu kami di Sorak Sorai!</h5>
        </div>

      </div>
    </div>
  </div>
</section>
@endif

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"> <i class="bi bi-arrow-up-short"></i>
</a>
@endsection