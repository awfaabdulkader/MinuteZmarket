<!DOCTYPE html>
<html lang="fr" dir="ltr" data-startbar="light" data-bs-theme="light">

<head>
   <meta charset="utf-8" />
   <title>MinutZMarket Admin</title>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
   <meta content="" name="author" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 
   <!-- App favicon -->
   <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
   <link rel="stylesheet" href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" />
   <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="{{ asset('assets/libs/vanilla-datatables/vanilla-dataTables.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/libs/vanilla-datatables-editable/datatable.editable.min.css') }}" />
   <!-- App css -->
   <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
 </head>

 <body>

  @unless(isset($skipHeader))
      @include('components.header')
   @endunless

   @include('components.sidebar')

   @stack('scripts')
   <!-- Page Content -->
 <div class="page-wrapper">
   <div class="page-content">
     <div class="container-xxl">
       @yield('content')
     </div>
   </div>
 </div>



 
 <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
 <script src="{{ asset('assets/data/stock-prices.js') }}"></script>
 <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
 <script src="{{ asset('assets/libs/jsvectormap/maps/world.js') }}"></script>
 <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
 <script src="{{ asset('assets/libs/vanilla-datatables-editable/datatable.editable.min.js') }}"></script>
 <script src="{{ asset('assets/js/pages/editable.init.js') }}"></script>
 <script src="{{ asset('assets/js/app.js') }}"></script>
 <script src="{{ asset('assets/js/pages/index.init.js') }}"></script>

 <script src="{{ asset('assets/js/test.js') }}"></script>
 </body>