
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- form-image -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="{{ asset('../css/style.css') }}">
  <link href="/css/dashboard.css" rel="stylesheet">

  <title>Sorak Sorai | {{ $title }}</title>

  <link rel="icon" href="../img/soraksorai.ico" sizes="2x5">

  <link href="../vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">

  <!-- Vendor CSS Files -->
  <link href="../vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


  <!-- trix-editor -->
  <link rel="stylesheet" type="text/css" href="{{ asset('../trix-editor/trix.css') }}">

  <!-- CSS only -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">



  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Lato');

    span[data-trix-button-group="file-tools"] {
      display: none;
    }

    .main-img {
      background: url('../img/background1.png');
      background-color: #080036;
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
      height: auto;
      width: 100%;
    }
  </style>
</head>

<body class="main-img">
  @include('partials.navbar-login')


  @yield('container')


  @include('partials.footer')


  <!-- trix-editor -->
  <script type="text/javascript" src="{{ asset('../trix-editor/trix.js') }}"></script>

  <script>
    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    })
  </script>

  <!-- Vendor JS Files -->
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../vendor/php-email-form/validate.js"></script>
  <script src="../vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Animate-->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>

<body>