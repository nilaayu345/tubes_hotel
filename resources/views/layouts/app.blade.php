<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="icon" href="{{ asset('image/favicon.png') }}" type="image/png">
   <title>@yield('title') | Welcome To Royal Hotel</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{ asset('css/frontend/bootstrap.css') }}">
   <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
   <link rel="stylesheet" href="{{ asset('css/frontend/font-awesome.min.css') }}">
   <link rel="stylesheet" href="{{ asset('vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css') }}">
   {{-- <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}"> --}}
   <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
   <link rel="stylesheet" href="{{ asset('vendors/lightbox/simpleLightbox.css') }}">
   <!-- main css -->
   <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
   <link rel="stylesheet" href="{{ asset('css/frontend/responsive.css') }}">

   @stack('css')
</head>
<body class="layout-top-nav" style="height: auto;">
   @include('layouts.header')

   @yield('breadcrumb')
   
   <div class="container">
      @yield('content')
   </div>

   @include('layouts.footer')

   <script src="{{ asset('js/frontend/jquery-3.2.1.min.js') }}"></script>
   <script src="{{ asset('js/frontend/popper.js') }}"></script>
   <script src="{{ asset('js/frontend/bootstrap.min.js') }}"></script>
   <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
   <script src="{{ asset('js/frontend/jquery.ajaxchimp.min.js') }}"></script>
   <script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js') }}"></script>
   <script src="{{ asset('vendors/nice-select/js/jquery.nice-select.js') }}"></script>
   <script src="{{ asset('js/frontend/mail-script.js') }}"></script>
   <script src="{{ asset('js/frontend/stellar.js') }}"></script>
   <script src="{{ asset('vendors/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
   <script src="{{ asset('vendors/isotope/isotope-min.js') }}"></script>
   <script src="{{ asset('vendors/lightbox/simpleLightbox.min.js') }}"></script>
   <script src="{{ asset('js/frontend/custom.js') }}"></script>
   
   @stack('js')
</body>
</html>