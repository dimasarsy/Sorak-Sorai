@extends('layouts.app')

@section('container')

<!-- --------------------------------------------------------------
# HALAMAN ABOUT
-------------------------------------------------------------- -->

<section id="festival" class="about mt-5">
  <div class="container" data-aos="fade-up">
    <div class="row justify-content-center text-center">
      <div class="col-8 col-md-7 col-lg-6">

        <div class="section-about mt-5">
          <h2 data-aos="fade-up">CERITA KAMI</h2>
          <p data-aos="fade-right" data-aos-delay="100" class="mt-4">Sorak Sorai adalah suatu tempat di dunia virtual yang menjadi tempat untuk mengadakan berbagai acara. Seperti namanya, 'Sorak Sorai' yang menujukkan suatu kesenangan, kami berharap kamu bisa mendapatkan perasaan happy sesudah mengikuti aktivitas di Sorak Sorai mulai dari Konser, Pameran, hingga berbagai Booth Makanan di dunia virtual ini!</p>
          <div class="fest-img d-flex justify-content-center animated"><img src="img/land night.png"></div>
          <p>Ada berbagai hal yang menyenangkan dan seru untuk kamu lakukan, dan tentunya akan lebih seru lagi bila dilakukan bersama teman-temanmu! Jadi tunggu apa lagi? Ayo masuk ke dunia Sorak Sorai dan ajak semua para bestiemu!</p>
        </div>

      </div>
    </div>
  </div>
</section>


<!-- --------------------------------------------------------------
# ACTIVITY
-------------------------------------------------------------- -->
<section id="activity" class="activity">
  <div class="container" data-aos="fade-up">

    <div class="events-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">

        @foreach($activities as $activity)
        <div class="swiper-slide">
          <div class="event-item">
            <div class="container">

              <div class="justify-content-center text-center mb-2">
                <div class="section-title">
                  <h3 data-aos="fade-left">{{ $activity->name }}</h3>
                </div>
              </div>

              <div class="row align-items-center">

                <div class="col-md-6 col-lg-5 col-xl-6 d-flex justify-content-center" data-aos="fade-left">
                  <div class="activity-img">
                    <img class="img-fluid" src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->name }}'s image">
                  </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-5" data-aos="fade-left" data-aos-delay="400">
                  <div class="desc-activity">
                    <h5>{!! $activity->desc !!}</h5>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div><!-- End testimonial item -->
        @endforeach

      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <!-- <div class="swiper-pagination"></div> -->
    </div>

  </div>
</section>
<!-- --------------------------------------------------------------
# GALLERY
-------------------------------------------------------------- -->
<section id="gallery" class="gallery">
  <div data-aos="zoom-in">

    <div class="section-galllery">
      <h3 data-aos="fade-left"></h3>
    </div>

    <div class="clients-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper align-items-center">
        @foreach($galleries as $gallery)
        <div class="swiper-slide">
          <a href="{{ asset('storage/' . $gallery->image) }}" class="gallery-lightbox">
            <img class="img-fluid" src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->name }}'s image">
          </a>
        </div>
        @endforeach
      </div>
      <!-- <div class="swiper-pagination"></div> -->
    </div>

  </div>
</section>
@endsection