<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">


    <title>Sorak Sorai | {{ $title }}</title>

    <link rel="icon" href="../img/soraksorai2.png">
    <!-- <link rel="icon" href="../img/soraksorai.svg" sizes="any" type="image/svg+xml"> -->

    <link href="../vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">

    <!-- Vendor CSS Files -->
    <link href="../vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    

    <!-- CSS only -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-D6lVjVW2cG8BbsNt"></script>

    <!-- trix-editor -->
    <link rel="stylesheet" type="text/css" href="{{ asset('../trix-editor/trix.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
        @import url('https://fonts.googleapis.com/css?family=Lato');

        span[data-trix-button-group="file-tools"] {
            display: none;
        }

        .main-img {
            background: url('../img/background1.png');
            background-color: #080036;
            background-position: top center;
            background-repeat: no-repeat;
            background-size: cover;
            height: auto;
            width: 100%;
        }
    </style>
</head>

<body class="main-img d-flex flex-column min-vh-100">
    @include('partials.navbar')

    @yield('container')

    @if(Session::has('requireAuth'))
    @include('auth.verification')
    @endif

    @if($title != "Home")
    @include('partials.footer')
    @endif

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
    <!-- <script src="../vendor/php-email-form/validate.js"></script> -->
    <script src="../vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="../js/main.js"></script>
    <script src="../js/popup.js"></script>
    <script src="../js/form.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!-- Animate-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>



<body>