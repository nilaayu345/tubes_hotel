<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="icon" href="image/favicon.png" type="image/png">
   <title>@yield('title') | Royal Hotel</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/frontend/bootstrap.css">
   <link rel="stylesheet" href="vendors/linericon/style.css">
   <link rel="stylesheet" href="css/frontend/font-awesome.min.css">
   <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
   <link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
   <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
   <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
   <!-- main css -->
   <link rel="stylesheet" href="css/frontend/style.css">
   <link rel="stylesheet" href="css/frontend/responsive.css">

   @stack('css')
</head>
<body class="layout-top-nav" style="height: auto;">

   <div class="container">
      @yield('content')
   </div>
   
   <script src="js/frontend/jquery-3.2.1.min.js"></script>
   <script src="js/frontend/popper.js"></script>
   <script src="js/frontend/bootstrap.min.js"></script>
   <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
   <script src="js/frontend/jquery.ajaxchimp.min.js"></script>
   <script src="js/frontend/mail-script.js"></script>
   <script src="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
   <script src="vendors/nice-select/js/jquery.nice-select.js"></script>
   <script src="js/frontend/mail-script.js"></script>
   <script src="js/frontend/stellar.js"></script>
   <script src="vendors/lightbox/simpleLightbox.min.js"></script>
   <script src="js/frontend/custom.js"></script>
   @stack('js')
</body>
</html>