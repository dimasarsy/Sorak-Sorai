@extends('layouts.app')

@section('container')

<div id="myModalAdvert" class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="background-modal">

      <div class="advert">
        <div class="row">
          <div class="col-12 d-flex justify-content-end">
            <button type="button" id="closeBtn" class="btn-close-popup"><i class="fa fa-times" aria-hidden="true"></i></button>
          </div>
        </div>
        @foreach($schedules as $schedule)
        <div class="modal-image">
          <img src="{{ asset('storage/' . $schedule->image) }}" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="modal-footer">
          <a href="/scheduleDetail/{{ $schedule->id }}" class="btn modal-btn">Lihat Lebih Lanjut</a>
        </div>
        @endforeach
      </div>

    </div>
  </div>
</div>


<!-- --------------------------------------------------------------
  # HERO
  -------------------------------------------------------------- -->
<section class="hero-section" id="hero">

  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 hero-text-image">
        <div class="row">

          <div class="col-lg-8 text-center text-lg-start">
            <div class="text-header">
              <h2 data-aos="fade-right">Sorak-Sorai</h2>
              <h3 data-aos="fade-right" data-aos-delay="100">GEMERLAP FESTIVAL MAYA</h3>
              <p data-aos="fade-right" data-aos-delay="200">Yuk, cobain pengalaman festival di dunia virtual!</p>
              <div data-aos="fade-right" data-aos-delay="300">
                <a href="/schedule" class="btn btn-get-started scrollto text-decoration-none">Beli Tiket Sekarang</a>
              </div>
            </div>
          </div>

          <div data-aos="fade-left" class="col-lg-4 iphone-wrap">
            <img src="img/land night.png" alt="Image" class="phone-2 animated">
            <!-- <img src="img/object2.png" alt="Image" class="phone-1 animated2"> -->
          </div>

        </div>

      </div>
    </div>
  </div>
</section>

<!-- --------------------------------------------------------------
  # ABOUT
  -------------------------------------------------------------- -->

<section id="festival" class="about">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-8 col-md-7 col-lg-6">

        <div class="section-title">
          <h2 data-aos="fade-right">CERITA KAMI</h2>
          <p data-aos="fade-up">Seperti namanya, 'Sorak Sorai' yang menujukkan suatu kesenangan, kami berharap kamu bisa mendapatkan perasaan happy sesudah mengikuti aktivitas Konser, Pameran, hingga berbagai Booth Makanan di dunia virtual ini!</p>
          <div class="mt-5" data-aos="fade-up" data-aos-delay="100">
            <a href="/about" class="btn-get-started text-decoration-none">Lihat Lagi</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- --------------------------------------------------------------
  # VIDEO
  -------------------------------------------------------------- -->

<section id="video" class="video">
  <div class="container">
    <div class="section-title">
      <h2 data-aos="fade-left">CUPLIKAN</h2>
    </div>
    <video data-aos="fade-up" class="sty_video" controls="controls" type="video/mp4" preload="none">
      <source src="../video/teaser.mp4">Your browser does not support the video tag.
    </video>
  </div>
</section>

<!-- --------------------------------------------------------------
  # LINEUP
  -------------------------------------------------------------- -->

<section id="team" class="team">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2 data-aos="fade-right">PENAMPIL</h2>
      @if($lineups->count() )
      <div class="mt-5" data-aos-delay="600">
        <a href="/lineup" class="btn-get-started scrollto text-decoration-none">Lihat Lagi</a>
      </div>
    </div>


    <div class="homepage-featured-events">
      <div class="container ">

        @foreach($lineups as $lineup)
        <div class="row">
          <div class="col-12">
            <div class="featured-events-wrap flex flex-wrap justify-content-between">
              <div class="event-content-wrap positioning-event-{{ $loop->iteration }}">

                <figure>
                  <a href="#"><img class="border-gradient" src="{{ asset('storage/' . $lineup->image) }}" alt="{{ $lineup->name }}'s image"></a>
                </figure>

                <div class="product-content">
                  <h3 class="title">{{ $lineup->name }}</h3>
                </div>

              </div>
            </div>
          </div>
        </div>

        @endforeach

      </div>
      @else
      <section id="festival" class="about">
        <div class="container" data-aos="fade-up">
          <div class="row justify-content-center text-center">
            <div class="col-8 col-md-7 col-lg-6">

              <div class="section-penampil" data-aos="fade-up" data-aos-delay="200">
                <div class="fest-img d-flex justify-content-center pulse"><img src="img/no-performance.png"></div>
                <h5>Segera Hadir!</h5>
              </div>

            </div>
          </div>
        </div>
      </section>
      @endif
    </div>
</section>
<!-- --------------------------------------------------------------
  # SITE MAPS
  -------------------------------------------------------------- -->
<section class="section">
  <div class="row justify-content-center text-center mb-3">
    <div class="section-title">
      <h2 data-aos="fade-left">PETA MAYA</h2>
    </div>
  </div>

  <div class="row justify-content-center text-center">
    <div class="col-md-9 mx-auto d-blockz">

      <div id="testimonials" class="testimonials">

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="fullmaps">
                <div class="testimonial-item">
                  <!-- <a href="img/island.png" class="gallery-lightbox">
                      <img class="img-fluid testimonial-img" src="img/island.png" alt="">
                    </a> -->
                  <section id="maps" class="d-flex align-items-center">
                    <div class="container-fluid" data-aos="fade-up">
                      <div class="row">

                        <div class="col-4">
                          <div class="hero-img kkk pulse" data-aos="zoom-in" data-aos-delay="150">
                            <div class="desc-hover">
                              <img src="img/Kubah Kupu-Kupu.png" class="img-fluid" alt="" />
                              <div class="desc-land">
                                <div class="desc-kkk ">Kubah<br>Kupu-Kupu</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="hero-img lob pulse" data-aos="zoom-in" data-aos-delay="150">
                            <div class="desc-hover">
                              <img src="img/lobby.png" class="img-fluid" alt="" />
                              <div class="desc-land">
                                <div class="desc-lob">Lobby</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="hero-img tmj pulse" data-aos="zoom-in" data-aos-delay="150">
                            <div class="desc-hover">
                              <img src="img/Taman Merah Jambu.png" class="img-fluid" alt="" />
                              <div class="desc-land">
                                <div class="desc-tmj">Taman<br>Merah Jambu</div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-4">
                            <div class="hero-img bm pulse" data-aos="zoom-in" data-aos-delay="150">
                              <div class="desc-hover">
                                <img src="img/Bunga Matahari2.png" class="img-fluid" alt="" />
                                <div class="desc-land">
                                  <div class="desc-bm">Bunga Matahari x<br> Samudra Antariksa</div>
                                  <!-- <a href="#pagination" class="desc">Bunga Matahari x Samudra Antariksa</a> -->
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-4">
                            <div class="hero-img tb pulse" data-aos="zoom-in" data-aos-delay="150">
                              <div class="desc-hover">
                                <img src="img/Taman Bianglala.png" class="img-fluid" alt="" />
                                <div class="desc-land">
                                  <div class="desc-tbl">Taman<br>Bianglala</div>
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="col-4">
                            <div class="hero-img pm pulse" data-aos="zoom-in" data-aos-delay="150">
                              <div class="desc-hover">
                                <img src="img/Pasar Malam.png" class="img-fluid" alt="" />
                                <div class="desc-land">
                                  <div class="desc-pm">Pasar<br>Malam</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>

                    </div>
                  </section>

                  <script>
                    const kkk = document.querySelector(".kkk");
                    const lob = document.querySelector(".lob");
                    const tmj = document.querySelector(".tmj");
                    const bm = document.querySelector(".bm");
                    const tbl = document.querySelector(".tb");
                    const pm = document.querySelector(".pm");
                    kkk.onmouseover = () => {
                      lob.style.filter = "grayscale(80%)";
                      tmj.style.filter = "grayscale(80%)";
                      bm.style.filter = "grayscale(80%)";
                      tbl.style.filter = "grayscale(80%)";
                      pm.style.filter = "grayscale(80%)";
                    }
                    kkk.onmouseout = () => {
                      lob.style.filter = "grayscale(0%)";
                      tmj.style.filter = "grayscale(0%)";
                      bm.style.filter = "grayscale(0%)";
                      tbl.style.filter = "grayscale(0%)";
                      pm.style.filter = "grayscale(0%)";
                    }
                    lob.onmouseover = () => {
                      kkk.style.filter = "grayscale(80%)";
                      tmj.style.filter = "grayscale(80%)";
                      bm.style.filter = "grayscale(80%)";
                      tbl.style.filter = "grayscale(80%)";
                      pm.style.filter = "grayscale(80%)";
                    }
                    lob.onmouseout = () => {
                      kkk.style.filter = "grayscale(0%)";
                      tmj.style.filter = "grayscale(0%)";
                      bm.style.filter = "grayscale(0%)";
                      tbl.style.filter = "grayscale(0%)";
                      pm.style.filter = "grayscale(0%)";
                    }
                    tmj.onmouseover = () => {
                      kkk.style.filter = "grayscale(80%)";
                      lob.style.filter = "grayscale(80%)";
                      bm.style.filter = "grayscale(80%)";
                      tbl.style.filter = "grayscale(80%)";
                      pm.style.filter = "grayscale(80%)";
                    }
                    tmj.onmouseout = () => {
                      kkk.style.filter = "grayscale(0%)";
                      lob.style.filter = "grayscale(0%)";
                      bm.style.filter = "grayscale(0%)";
                      tbl.style.filter = "grayscale(0%)";
                      pm.style.filter = "grayscale(0%)";
                    }
                    bm.onmouseover = () => {
                      kkk.style.filter = "grayscale(80%)";
                      lob.style.filter = "grayscale(80%)";
                      tmj.style.filter = "grayscale(80%)";
                      tbl.style.filter = "grayscale(80%)";
                      pm.style.filter = "grayscale(80%)";
                    }
                    bm.onmouseout = () => {
                      kkk.style.filter = "grayscale(0%)";
                      lob.style.filter = "grayscale(0%)";
                      tmj.style.filter = "grayscale(0%)";
                      tbl.style.filter = "grayscale(0%)";
                      pm.style.filter = "grayscale(0%)";
                    }
                    tbl.onmouseover = () => {
                      kkk.style.filter = "grayscale(80%)";
                      lob.style.filter = "grayscale(80%)";
                      tmj.style.filter = "grayscale(80%)";
                      bm.style.filter = "grayscale(80%)";
                      pm.style.filter = "grayscale(80%)";
                    }
                    tbl.onmouseout = () => {
                      kkk.style.filter = "grayscale(0%)";
                      lob.style.filter = "grayscale(0%)";
                      tmj.style.filter = "grayscale(0%)";
                      bm.style.filter = "grayscale(0%)";
                      pm.style.filter = "grayscale(0%)";
                    }
                    pm.onmouseover = () => {
                      kkk.style.filter = "grayscale(80%)";
                      lob.style.filter = "grayscale(80%)";
                      tmj.style.filter = "grayscale(80%)";
                      bm.style.filter = "grayscale(80%)";
                      tbl.style.filter = "grayscale(80%)";
                    }
                    pm.onmouseout = () => {
                      kkk.style.filter = "grayscale(0%)";
                      lob.style.filter = "grayscale(0%)";
                      tmj.style.filter = "grayscale(0%)";
                      bm.style.filter = "grayscale(0%)";
                      tbl.style.filter = "grayscale(0%)";
                    }
                  </script>
                </div>
              </div><!-- End Maps item -->
            </div>




            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="container">

                  <h3 class="mt-5">Samudra Antariksa</h3>

                  <div class="row align-items-center">

                    <div class="col-6 col-sm-6 col-md-5" data-aos="fade-left">
                      <div class="land">
                        <img src="img/Samudra Antariksa.png" alt="Image" class="miniland img-fluid">
                      </div>
                    </div>

                    <div class="col-6 col-sm-6 col-md-7">
                      <div class="titlepage text_align_left"><br>
                        <p class="mb-4" data-aos="fade-left" data-aos-delay="400">Cuma di Samudera Antariksa kamu bisa after party di bawah laut sambil dengerin musik dari artis favorit kamu </p>
                      </div>
                    </div>

                  </div>

                </div>

              </div>
            </div><!-- End Land item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="container">
                  <h3 class="mt-5">Bunga Matahari</h3>
                  <div class="row align-items-center">

                    <div class="col-6 col-sm-6 col-md-5" data-aos="fade-left">
                      <div class="land">
                        <img src="img/Bunga Matahari.png" alt="Image" class="miniland img-fluid">
                      </div>
                    </div>

                    <div class="col-6 col-sm-6 col-md-7">
                      <div class="titlepage text_align_left"><br>
                        <p class="mb-4" data-aos="fade-left" data-aos-delay="400">Yuk nonton artis atau band favorit kamu tampil di atas Bunga Matahari! </p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div><!-- End Land item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="container">
                  <div class="text-panjang">
                    <h3 class="mt-5">Taman Merah Jambu</h3>
                    <div class="row align-items-center">

                      <div class="col-5 col-sm-6 col-md-5" data-aos="fade-left">
                        <div class="land">
                          <img src="img/Taman Merah Jambu.png" alt="Image" class="miniland img-fluid">
                        </div>
                      </div>

                      <div class="col-7 col-sm-6 col-md-7">
                        <div class="titlepage text_align_left"><br>
                          <p class="mb-4" data-aos="fade-left" data-aos-delay="400">Bukan marmut merah jambu aja yang bisa bikin kamu senang, taman merah jambu ini juga bisa bikin senang apalagi bareng teman-teman! </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Land item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="container">
                  <h3 class="mt-5">Taman Bianglala</h3>
                  <div class="row align-items-center">

                    <div class="col-6 col-sm-6 col-md-5" data-aos="fade-left">
                      <div class="land">
                        <img src="img/Taman Bianglala.png" alt="Image" class="miniland img-fluid">
                      </div>
                    </div>

                    <div class="col-6 col-sm-6 col-md-7">
                      <div class="titlepage text_align_left"><br>
                        <p class="mb-4" data-aos="fade-left" data-aos-delay="400">Main games bareng yuk di Taman Bianglala dan nikmati keseruannya!</p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div><!-- End Land item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="container">
                  <h3 class="mt-5">Kubah Kupu-Kupu</h3>
                  <div class="row align-items-center">

                    <div class="col-6 col-sm-6 col-md-5" data-aos="fade-left">
                      <div class="land">
                        <img src="img/Kubah Kupu-Kupu.png" alt="Image" class="miniland img-fluid">
                      </div>
                    </div>

                    <div class="col-6 col-6 col-sm-6 col-md-7">
                      <div class="titlepage text_align_left"><br>
                        <p class="mb-4" data-aos="fade-left" data-aos-delay="400">Kapan lagi kan bisa lihat pameran bareng kupu-kupu, pastinya berkesan banget dong! </p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div><!-- End Land item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="container">
                  <h3 class="mt-5">Pasar Malam</h3>
                  <div class="row align-items-center">

                    <div class="col-6 col-sm-6 col-md-5" data-aos="fade-left">
                      <div class="land">
                        <img src="img/Pasar Malam.png" alt="Image" class="miniland img-fluid">
                      </div>
                    </div>

                    <div class="col-6 col-sm-6 col-md-7">
                      <div class="titlepage text_align_left"><br>
                        <p class="mb-4" data-aos="fade-left" data-aos-delay="400">Nantikan asiknya belanja di Pasar Malam dengan berbagai pilihan sesukamu! </p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div><!-- End Land item -->

          </div>
          <div class="swiper-pagination-maps"></div>
        </div>
      </div>
    </div>
  </div>

</section>

<!-- --------------------------------------------------------------
  # SPONSOR
  -------------------------------------------------------------- -->

<section id="sponsor" class="sponsor">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2 data-aos="fade-left">SPONSOR</h2>
    </div>

    <div class="row">
      @foreach($sponsors as $sponsor)
      <div class="col-6 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
        <div class="member">
          <div class="member-img">
            <a href="{{ $sponsor->link }}">
              <img class="img-fluid" src="{{ asset('storage/' . $sponsor->image) }}" alt="{{ $sponsor->name }}'s image">
              <!-- <div class="social-team">
                    <h2>{{ $sponsor->name }}</h2>
                  </div> -->
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section>

<!-- --------------------------------------------------------------
  # MEDIA
  -------------------------------------------------------------- -->
<section id="clients" class="media">
  <div class="container" data-aos="zoom-in">

    <div class="section-title">
      <h4 data-aos="fade-left">MEDIA PARTNER</h4>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-10">
        <div class="clients-slider-media swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper d-flex align-items-center">
            @foreach($media as $media)
            <div class="swiper-slide"><img class="img-fluid" src="{{ asset('storage/' . $media->image) }}" alt="{{ $media->name }}'s image"></div>
            @endforeach
          </div>
          <!-- <div class="swiper-pagination"></div> -->
        </div>
      </div>
    </div>

  </div>
</section><!-- End Clients Section -->

<!-- --------------------------------------------------------------
  # JOIN VENDOR
  -------------------------------------------------------------- -->
@cannot('admin')
@cannot('vendor')
<section id="joinvendor" class="joinvendor mb-5">
  <div class="container" data-aos="zoom-in">

    <hr>
    <div class="row">
      <div class="col-md-6">
        <h1> Ingin Menjadi<br><span> Vendor?</span></h1>
      </div>
      <div class="col-md-5">
        <h2> Bawa brand anda ke Sorak Sorai!</h2>
        <p> Anda dapat berjualan dan mendapat pengalaman baru di dunia virtual bersama brand-brand besar lainnya!</p>
        <a href="/pengajuan/create" class="btn btn-get-started">Daftar Sekarang</a>
      </div>
    </div>

  </div>
</section><!-- End Clients Section -->
@endcannot
<!-- --------------------------------------------------------------
  # SUDAH JADI VENDOR
  -------------------------------------------------------------- -->
@can('vendor')
<section id="joinvendor" class="joinvendor mb-5">
  <div class="container" data-aos="zoom-in">
    <hr>
    <div class="row">
      <div class="col-md-6">
        <h1> Anda Adalah<br><span> Vendor</span></h1>
      </div>
      <div class="col-md-5">
        <h2> Bawa brand anda ke Sorak Sorai!</h2>
        <p> Selamat, Anda dapat berjualan dan mendapat pengalaman baru di dunia virtual bersama brand-brand besar lainnya!</p>
        <a href="/dashboard" class="btn btn-get-started">Dashboard Anda</a>
      </div>
    </div>

  </div>
</section><!-- End Clients Section -->
@endcan

@endcannot

<!-- --------------------------------------------------------------
  # FOOTER HOME
  -------------------------------------------------------------- -->
<footer id="footer" class="section-bg">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="footer-info">
          <div class="social-links mt-4 mb-3">
            <div class="d-flex justify-content-center justify-content-5">
              <a href="#" class="twitter"><i class='bx bxs-phone'></i></a>
              <a href="#" class="facebook"><i class='bx bx-envelope'></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>
        </div>


        <div class="copyright">
          <div class="mb-5">
            <div class="contact p-2">
              <div class="row d-flex justify-content-center">
                <div class="col-5 d-flex justify-content-end">
                  <a href="#">Kebijakan Privasi</a>
                </div>
                <div class="col-1 d-flex text-white justify-content-center">|</div>
                <div class="col-5 d-flex justify-content-start">
                  <a href="#">Contact Us</a>
                </div>
              </div>
              <!-- &emsp;&emsp; | &emsp;&emsp; -->
            </div>
          </div>
        </div>

        <!-- ======= Footer ======= -->
        <footer id="footer" class="mt-auto">
          <div class="container">
            <div class="copyright">
              <div class="d-flex justify-content-around mt-2 mb-1">
                <div class="p-2">
                  <h3>&copy; 2022 Sorak Sorai - Festivo | All right reserved</h3>
                </div>
              </div>
            </div>
          </div>
        </footer>

        <!-- End Footer -->
      </div>
    </div>
  </div>

</footer><!-- End Footer -->
@endsection