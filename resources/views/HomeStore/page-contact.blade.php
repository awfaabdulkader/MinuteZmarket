<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Minut Z Market</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/store/imgs/theme/favicon-1.svg') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/store/css/main-2.css?v=6.0') }}">
    <!--leaflet map-->
    <link rel="stylesheet" href="{{ asset('assets/store/libs/leaflet@1.7.1/dist/leaflet.css') }}" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="">
    <script src="{{ asset('assets/store/libs/leaflet@1.7.1/dist/leaflet.js') }}" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXFAxSgXP7b5D25WEtjxkYqoWM2PjxaLg&callback=initMap&libraries=places" async defer></script>
        <style>
        #map-panes {
            width: 100%;
            height: 400px; /* Adjust height as needed */
            border-radius: 15px;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div
      class="modal fade custom-modal"
      id="quickViewModal"
      tabindex="-1"
      aria-labelledby="quickViewModalLabel"
      aria-hidden="true"
    >
    </div> 
            @include('components.store.header')

    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}"  rel="nofollow"><i class="fi-rs-home mr-5"></i>{{ __('contact.breadcrumb.home') }}</a>
                    <span></span> {{ __('contact.breadcrumb.page') }} <span></span> {{ __('contact.breadcrumb.contact') }}
                </div>
            </div>
        </div>
        <div class="page-content pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <section class="row align-items-end mb-50">
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="contact-from-area padding-20-row-col">
                                        <h5 class="text-brand mb-10">{{ __('contact.contact_us') }}</h5>
                                        <h2 class="mb-10">{{ __('contact.contact_us') }}</h2>
                                        <p class="text-muted mb-30 font-sm">{{ __('contact.contact_desc') }}</p>
                                        <form class="contact-form-style mt-30" id="contact-form" action="#" method="post">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="name" placeholder="{{ __('contact.first_name') }}" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="email" placeholder="{{ __('contact.email') }}" type="email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="telephone" placeholder="{{ __('contact.phone') }}" type="tel">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="subject" placeholder="{{ __('contact.subject') }}" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="textarea-style mb-30">
                                                        <textarea name="message" placeholder="{{ __('contact.message') }}"></textarea>
                                                    </div>
                                                    <button class="submit submit-auto-width" type="submit">{{ __('contact.send_message') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pl-50 d-lg-block d-none">
                                    <img class="border-radius-15 mt-50" src="{{ asset('assets/store/imgs/page/contact-2.jpg') }}" alt="">
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <section class="container mb-50 d-none d-md-block">
                <div class="border-radius-15 overflow-hidden">
                    <div id="map-panes"></div>
                </div>
            </section>
<!--             <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <section class="mb-50">
                            <div class="row mb-60">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <h4 class="mb-15 text-brand">Office</h4>
                                    205 North Michigan Avenue, Suite 810<br>
                                    Chicago, 60601, USA<br>
                                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br>
                                    <abbr title="Email">Email: </abbr>contact@Evara.com<br>
                                    <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>
                                </div>
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <h4 class="mb-15 text-brand">Studio</h4>
                                    205 North Michigan Avenue, Suite 810<br>
                                    Chicago, 60601, USA<br>
                                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br>
                                    <abbr title="Email">Email: </abbr>contact@Evara.com<br>
                                    <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="mb-15 text-brand">Shop</h4>
                                    205 North Michigan Avenue, Suite 810<br>
                                    Chicago, 60601, USA<br>
                                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br>
                                    <abbr title="Email">Email: </abbr>contact@Evara.com<br>
                                    <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>
                                </div>
                            </div>
                            
                        </section>
                    </div>
                </div>
            </div>
 -->        </div>
    </main>
    <footer class="main">
        <section class="section-padding footer-mid">
          <div class="container pt-15 pb-20">
            <div class="row">
              <div class="col">
                <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0">
                  <div class="logo mb-30">
                    <a href="index.html" class="mb-15"
                      ><img src="{{ asset('assets/store/imgs/theme/logo-1.svg') }}"
                      alt="logo"
                    /></a>
                    <p class="font-lg text-heading">
                      Awesome convenience store 
                    </p>
                  </div>
                  <ul class="contact-infor">
                    <li>
                      <img
                        src="assets/imgs/theme/icons/icon-location-1.svg"
                        alt=""
                      /><strong>{{__('home.address')}}: </strong>
                      <span
                        >5171 W Campbell Ave undefined Kent, Utah 53127 United
                        States</span
                      >
                    </li>
                    <li>
                      <img
                        src="assets/imgs/theme/icons/icon-contact-1.svg"
                        alt=""
                      /><strong>{{__('home.call_us')}} :</strong
                      ><span>(+91) - 540-025-124553</span>
                    </li>
                    <li>
                      <img
                        src="assets/imgs/theme/icons/icon-email-2-1.svg"
                        alt=""
                      /><strong>{{__('home.email')}} :</strong><span>sale@MinutZMarket.com</span>
                    </li>
                    <li>
                      <img
                        src="assets/imgs/theme/icons/icon-clock-1.svg"
                        alt=""
                      /><strong>{{__('home.hours')}} :</strong
                      ><span>08:00 - 20:00, Mon - Sat</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="container pb-30">
          <div class="row align-items-center">
            <div class="col-12 mb-30">
              <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
              <p class="font-sm mb-0">
                &copy; 2024, <strong class="text-brand">MinutZMarket</strong> -
                <br />All rights reserved
              </p>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
              <div class="mobile-social-icon">
                <h6>Follow Us</h6>
                <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"
                ><img
                  src="assets/imgs/theme/icons/icon-facebook-white-1.svg"
                  alt=""
              /></a>
              <a href="https://www.x.com" target="_blank" rel="noopener noreferrer"
                ><img
                  src="assets/imgs/theme/icons/icon-twitter-white-1.svg"
                  alt=""
              /></a>
              <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"
                ><img
                  src="assets/imgs/theme/icons/icon-instagram-white-1.svg"
                  alt=""
              /></a>
              <a href="https://www.tiktok.com" target="_blank" rel="noopener noreferrer"
                ><img
                  src="assets/imgs/theme/icons/icon-pinterest-white-1.svg"
                  alt=""
              /></a>
              <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer"
                ><img
                  src="assets/imgs/theme/icons/icon-youtube-white-1.svg"
                  alt=""
              /></a>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('assets/store/imgs/theme/loading-1.gif') }}"                    alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map-panes'), {
                center: { lat: 30.4278, lng: -9.5981 }, // Example: Agadir, Morocco
                zoom: 12
            });
        }
    </script>
    <script src="{{ asset('assets/store/js/vendor/modernizr-3.6.0.min-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/vendor/jquery-3.6.0.min-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/vendor/jquery-migrate-3.3.0.min-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/vendor/bootstrap.bundle.min-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/plugins/slick-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/plugins/jquery.syotimer.min-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/plugins/wow-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/plugins/perfect-scrollbar-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/plugins/magnific-popup-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/plugins/select2.min-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/plugins/waypoints-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/plugins/counterup-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/plugins/jquery.countdown.min-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/plugins/images-loaded-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/plugins/isotope-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/plugins/scrollup-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/plugins/jquery.vticker-min-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/plugins/jquery.theia.sticky-1.js') }}"></script>
    <script src="{{ asset('assets/store/js/plugins/leaflet.js') }}"></script>
    
    <!-- Template JS -->
    <script src="{{ asset('assets/store/js/main-1.js?v=6.0') }}"></script>
    <script src="{{ asset('assets/store/js/shop-1.js?v=6.0') }}"></script>
</body>

</html>