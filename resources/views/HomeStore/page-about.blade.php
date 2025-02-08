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
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/store/imgs/theme/favicon-1.svg')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/store/css/main-2.css?v=6.0')}}">
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
  @include('components.store.header' )


        <div class="page-content pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <section class="row align-items-center mb-50">
                            <div class="col-lg-6">
                                <img src="{{asset('assets/store/imgs/page/about-1.png')}}" alt="" class="border-radius-15 mb-md-3 mb-lg-0 mb-sm-4">
                            </div>
                            <div class="col-lg-6">
                                <div class="pl-25">
                                    <h2 class="mb-30">{{ __('about.title') }}</h2>
                                    <p class="mb-25">{{ __('about.welcome_text') }}.</p>
                                    <p class="mb-25">{{ __('about.mission_text') }}</p>
                                    <p class="mb-50">{{ __('about.belief_text') }}</p>

                                    <div class="carausel-3-columns-cover position-relative">
                                        <div id="carausel-3-columns-arrows"></div>
                                        <div class="carausel-3-columns" id="carausel-3-columns">
                                            <img src="{{asset('assets/store/imgs/page/about-2.jpg')}}" alt="">
                                            <img src="{{asset('assets/store/imgs/page/about-3.jpg')}}" alt="">
                                            <img src="{{asset('assets/store/imgs/page/about-4.jpg')}}" alt="">
                                            <img src="{{asset('assets/store/imgs/page/about-6.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="text-center mb-50">
                            <h2 class="title style-3 mb-40">{{ __('about.what_we_provide') }}</h2>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="{{asset('assets/store/imgs/theme/icons/icon-1-1.svg')}}" alt="">
                                        <h4>{{ __('about.features.best_prices.title') }}</h4>
                                        <p>{{ __('about.features.best_prices.description') }}</p>
                                        <a href="#">{{ __('about.read_more') }}</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="{{asset('assets/store/imgs/theme/icons/icon-2-1.svg')}}" alt="">
                                        <h4>{{ __('about.features.wide_assortment.title') }}</h4>
                                        <p>{{ __('about.features.wide_assortment.description') }}</p>
                                        <a href="#">{{ __('about.read_more') }}</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="{{asset('assets/store/imgs/theme/icons/icon-3-1.svg')}}" alt="">
                                        <h4>{{ __('about.features.free_delivery.title') }}</h4>
                                        <p>{{ __('about.features.free_delivery.description') }}</p>
                                        <a href="#">{{ __('about.read_more') }}</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="{{asset('assets/store/imgs/theme/icons/icon-4-1.svg')}}" alt="">
                                        <h4>{{ __('about.features.easy_returns.title') }}</h4>
                                        <p>{{ __('about.features.easy_returns.description') }}</p>
                                        <a href="#">{{ __('about.read_more') }}</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="{{asset('assets/store/imgs/theme/icons/icon-5-1.svg')}}" alt="">
                                        <h4>{{ __('about.features.satisfaction.title') }}</h4>
                                        <p>{{ __('about.features.satisfaction.description') }}</p>
                                        <a href="#">{{ __('about.read_more') }}</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="{{asset('assets/store/imgs/theme/icons/icon-6-1.svg')}}" alt="">
                                        <h4>{{ __('about.features.easy_returns.title') }}</h4>
                                        <p>{{ __('about.features.easy_returns.description') }}</p>
                                        <a href="#">{{ __('about.read_more') }}+</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="main">
      <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
          <div class="row">
            <div class="col">
              <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0">
                <div class="logo mb-30">
                  <a href="index.html" class="mb-15"
                    ><img src="{{asset('assets/store/imgs/theme/logo-1.svg')}}" alt="logo"
                  /></a>
                  <p class="font-lg text-heading">
                    {{__('home.awesome_grocery')}}
                  </p>
                </div>
                <ul class="contact-infor">
                  <li>
                    <img
                      src="{{asset('assets/store/imgs/theme/icons/icon-email-2-1.svg')}}"
                      alt=""
                    /><strong>{{__('home.email')}} :</strong><span>sale@MinutZMarket.com</span>
                  </li>
                  <li>
                    <img
                      src="{{asset('assets/store/imgs/theme/icons/icon-clock-1.svg')}}"
                      alt=""
                    /><strong>{{__('home.call_us')}}</strong
                    ><span>07:00 - 20:00, Mon - Sat</span>
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
              <h6>{{__('home.follow_us')}}</h6>
              <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><img
                  src="{{asset('assets/store/imgs/theme/icons/icon-facebook-white-1.svg')}}" alt="" /></a>
              <a href="https://www.x.com" target="_blank" rel="noopener noreferrer"><img
                  src="{{asset('assets/store/imgs/theme/icons/icon-twitter-white-1.svg')}}" alt="" /></a>
              <a href="https://www.instagram.com/minutzmarket?igsh=NXd4ZGlkZXJ5OWh5&utm_source=qr" target="_blank" rel="noopener noreferrer"><img
                  src="{{asset('assets/store/imgs/theme/icons/icon-instagram-white-1.svg')}}" alt="" /></a>
              <a href="https://www.tiktok.com/@minutzmarket?_t=ZN-8tVRiUY7ev0&_r=1" target="_blank" rel="noopener noreferrer"><img
                  src="{{asset('assets/store/imgs/theme/icons/icon-pinterest-white-1.svg')}}" alt="" /></a>
              <a href=" https://youtube.com/@minutzmarkets?si=GNZM8F8ZDaeQOtFt " target="_blank" rel="noopener noreferrer"><img
                  src="{{asset('assets/store/imgs/theme/icons/icon-youtube-white-1.svg')}}" alt="" /></a>
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
                    <img src="{{asset('assets/store/imgs/theme/loading-1.gif')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{asset('assets/store/js/vendor/modernizr-3.6.0.min-1.js')}}"></script>
    <script src="{{asset('assets/store/js/vendor/jquery-3.6.0.min-1.js')}}"></script>
    <script src="{{asset('assets/store/js/vendor/jquery-migrate-3.3.0.min-1.js')}}"></script>
    <script src="{{asset('assets/store/js/plugins/wow-1.js')}}"></script>
    <script src="{{asset('assets/store/js/plugins/slick-1.js')}}"></script>

    <script src="{{asset('assets/store/js/vendor/bootstrap.bundle.min-1.js')}}" ></script>
    <script src="{{asset('assets/store/js/plugins/jquery.syotimer.min-1.js')}}" ></script>
    <script src="{{asset('assets/store/js/plugins/perfect-scrollbar-1.js ')}}"></script>
    <script src="{{asset('assets/store/js/plugins/magnific-popup-1.js ')}}" ></script>
    <script src="{{asset('assets/store/js/plugins/select2.min-1.js')}}"></script>
    <script src="{{asset('assets/store/js/plugins/waypoints-1.js')}}"></script>
    <script src="{{asset('assets/store/js/plugins/counterup-1.js')}}"></script>
    <script src="{{asset('assets/store/js/plugins/jquery.countdown.min-1.js')}}"></script>
    <script src="{{asset('assets/store/js/plugins/images-loaded-1.js ')}}"></script>
    <script src="{{asset('assets/store/js/plugins/isotope-1.js')}} "></script>
    <script src="{{asset('assets/store/js/plugins/scrollup-1.js')}} " ></script>
    <script src="{{asset('assets/store/js/plugins/jquery.vticker-min-1.js')}} " ></script>
    <script src="{{asset('assets/store/js/plugins/jquery.theia.sticky-1.js')}}" ></script>
    <script src="{{asset('assets/store/js/plugins/jquery.elevatezoom-1.js')}}" ></script>
    <!-- Template  JS -->
    <script src="{{asset('assets/store/js/main-1.js?v=6.0')}}"></script>
    <script src="{{asset('assets/store/js/shop-1.js?v=6.0')}}"></script>
</body>

</html>