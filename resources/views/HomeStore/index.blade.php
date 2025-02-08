<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <title>Minut Z Market</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta property="og:title" content="" />
  <meta property="og:type" content="" />
  <meta property="og:url" content="" />
  <meta property="og:image" content="" />
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/store/imgs/theme/favicon-1.svg') }}" />
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/store/css/plugins/slider-range.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/store/css/main-2.css?v=6.0') }}" />

</head>

<body>
  <!-- Quick view -->
  <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
    aria-hidden="true">
  </div>
@include('components.store.header' ,['languageSwitcher'=>true])


  <main class="main">
    <section class="home-slider position-relative mb-30">
      <div class="home-slide-cover">
        <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
          <div class="single-hero-slider rectangle single-animation-wrap"
            style="background-image: url({{ asset('assets/store/imgs/slider/slider-5.png') }})">
            <div class="slider-content">
              <h1 class="display-2 mb-40">
                <br />
              </h1>
              <p class="mb-65"></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="container mb-25">
      <div class="row flex-row-reverse">
        
        <div class="col-12">
          <section class="home-slider position-relative mb-30">
            <div class="home-slide-cover mt-30">
              <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                <div class="single-hero-slider single-animation-wrap" style="
                      background-image: url({{ asset('assets/store/imgs/slider/slider-1.png') }});
                    ">
                  <div class="slider-content">
                    <h1 class="display-2 mb-40">
                      {{ __('home.amazing_deals')}}<br />
                      {{ __('home.followamazing_deals')}}
                    </h1>
                    <p class="mb-65">{{__('home.newsletter_signup')}}</p>
                    <form class="form-subcriber d-flex">
                      <a href="{{ route('products.all' )}}">
                       <button class="btn" type="submit">{{__('home.go_to_shop')}}</button>
                      </a>
                    </form>
                  </div>
                </div>
                <div class="single-hero-slider single-animation-wrap" style="
                      background-image: url({{ asset('assets/store/imgs/slider/slider-2.png') }});
                    ">
                  <div class="slider-content">
                    <h1 class="display-2 mb-40">
                      {{__('home.fresh')}}<br />
                      {{__('home.Quality')}}
                    </h1>
                    <p class="mb-65">
                      {{__('home.visit')}}
                    </p>
                    <form class="form-subcriber d-flex">
                      <a href="{{ route('products.all' )}}">
                        <button class="btn" type="submit">{{__('home.go_to_shop')}}</button>
                       </a>
                        </form>
                  </div>
                </div>
              </div>
              <div class="slider-arrow hero-slider-1-arrow"></div>
            </div>
          </section>

          <!--End hero-->
          <section class="popular-categories section-padding">
            <div class="container">
              <div class="section-title">
                <div class="title">
                  <h3>{{__('home.shop_by_categories')}}</h3>
                  <a class="show-all"  href="{{ route('products.all' )}}">
                    {{__('home.all_categories')}}
                    <i class="fi-rs-angle-right"></i>
                  </a>
                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-8-columns-arrow"
                  id="carausel-8-columns-arrows"></div>
              </div>
              <div class="carausel-8-columns-cover position-relative">
                <div class="carausel-8-columns" id="carausel-8-columns">
                  @foreach ($categories as $category )
                  <div class="card-1">
                    <figure class="img-hover-scale overflow-hidden">
                      <a  href="{{ route('store.category', $category->id) }} "><img src="{{ asset('storage/' . $category->image) }}" alt="" /></a>
                    </figure>
                    <h6>
                      {{ $category->translations->where('language_code', $languageCode)->first()->name ?? $category->name }}
                    </a>
                    </h6>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </section>
         
          <section class="banners mb-25">
            <div class="container">
              <div class="section-title mb-25 ">
                <div class="col-lg-3 col-md-12">
                  <h3 class="">{{__('home.our_socials')}} </h3>
                                          
                </div>
                <div class="col-lg-2 col-md-12">
                  <div class="mobile-social-icon">
                    <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer">
                      <img src="{{ asset('assets/store/imgs/theme/icons/icon-facebook-white-1.svg') }}" alt="Facebook" />
                    </a>
                    <a href="https://www.x.com" target="_blank" rel="noopener noreferrer">
                      <img src="{{ asset('assets/store/imgs/theme/icons/icon-twitter-white-1.svg') }}" alt="Twitter" />
                    </a>
                    <a href="https://www.instagram.com/minutzmarket" target="_blank" rel="noopener noreferrer">
                      <img src="{{ asset('assets/store/imgs/theme/icons/icon-instagram-white-1.svg') }}" alt="Instagram" />
                    </a>
                    <a href="https://www.tiktok.com/@minutzmarket" target="_blank" rel="noopener noreferrer">
                      <img src="{{ asset('assets/store/imgs/theme/icons/icon-pinterest-white-1.svg') }}" alt="Pinterest" />
                    </a>
                    <a href=" https://youtube.com/@minutzmarkets " target="_blank" rel="noopener noreferrer">
                      <img src="{{ asset('assets/store/imgs/theme/icons/icon-youtube-white-1.svg') }}" alt="YouTube" />
                    </a>
                  </div>
                
  
                </div>
  
  
              </div>
  
              <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                  <a href="https://youtube.com/@minutzmarkets" target="_blank" rel="noopener noreferrer">
                    <div class="banner-img">
                      <img src="{{asset('assets/store/imgs/banner/banner-1.png')}}" alt="">
                      <div class="banner-text">
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-4 col-md-6">
                  <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer">
                    <div class="banner-img">
                      <img src="{{ asset('assets/store/imgs/banner/banner-2.png') }}" alt="">
                      <div class="banner-text">
  
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                  <a href="https://www.x.com" target="_blank" rel="noopener noreferrer">
                    <div class="banner-img">
                      <img src="{{ asset('assets/store/imgs/banner/banner-3.png') }}" alt="">
                      <div class="banner-text">
                      </div>
                  </a>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <a href="https://www.instagram.com/minutzmarket" target="_blank" rel="noopener noreferrer">
                  <div class="banner-img">
                    <img src="{{ asset('assets/store/imgs/banner/banner-111.png') }}" alt="">
  
                  </div>
                </a>
              </div>
              <div class="col-lg-6 col-md-6">
                <a href="https://www.tiktok.com/@minutzmarket" target="_blank" rel="noopener noreferrer">
                  <div class="banner-img">
                    <img src="{{ asset('assets/store/imgs/banner/banner-20.png') }}" alt="">
  
                  </div>
                </a>
              </div>
  
            </div>
        </div>
        </section>

        <section class="section-padding pb-5">
          <div class="container">
            <div class="section-title">
              <h3 class="">{{__('home.daily_best_sell')}} </h3>
            </div>
            <div class="row">
              <div class="col-lg-3 d-none d-lg-flex">
                <div class="banner-img style-2">
                  <div class="banner-text"></div>
                </div>
              </div>
              <div class="col-lg-9 col-md-12">
                <div class="tab-content" id="myTabContent-1">
                  <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                    <div class="carausel-4-columns-cover arrow-center position-relative">
                      <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                      <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                        @foreach($products as $product)
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{route('products.show', $product->id)}}l">
                                        <img class="default-img" 
                                        src="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('assets/store/imgs/shop/product-placeholder.jpg') }}" 
                                        alt="{{ $product->translations->where('language_code', $languageCode)->first()?->name ?? 'Product' }}">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal" data-product-id="{{ $product->id }}"><i class="fi-rs-eye"></i></a>
                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                </div>
                                @if ($product->discounts && $product->discounts->isNotEmpty() )
                                @foreach ($product->discounts as $discount )
                                @if ($discount->is_active && $discount->percentage > 0 && now()->between($discount->start_date,$discount->end_date))
                                  <div class="product-badges product-badges-position product-badges-mrg">
                                  <span class="hot">{{__('home.save')}} {{ $product->discounts->first()->percentage }}%</span>
                              </div>
                              @break
                                @endif
                                @endforeach  
                            @endif
                            
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">
                                        {{ $product->category?->translations->where('language_code', $languageCode)->first()?->name ?? 'Uncategorized' }}
                                    </a>
                                </div>
                                <h2>
                                    <a href="shop-grid-right.html">
                                        {{ $product->translations->where('language_code', $languageCode)->first()?->name ?? 'Product Name' }}
                                    </a>
                                </h2>
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 80%"></div>
                                </div>
                                <div class="product-price mt-10">
                                  <?php
                                 $product->calculateDiscountedPrice();
                                  ?>
                                   @if ($product->sale_price)
                                   <span class="text-danger">€{{ number_format($product->sale_price, 2) }}</span>
                                   <span class="old-price">€ {{ number_format($product->base_price, 2) }}</span>
                                    @foreach($product->discounts as $discount)
                                      @if($discount->is_active && now()->between($discount->start_date, $discount->end_date))
                                          <br>
                                          <small class="text-success">
                                              -{{ $discount->percentage }}% OFF
                                          </small>
                                          @break
                                      @endif
                                  @endforeach
                              @else
                                  €{{ number_format($product->base_price, 2) }}
                              @endif
                                  
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Col-lg-9 -->
            </div>
          </div>
        </section>
        

        <!--Products Tabs-->
        <!--End Deals-->
        <section class="banners mt-3">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="banner-img">
                <img src="{{asset('assets/store/imgs/banner/banner-1-1.png')}}" alt="" />
                <div class="banner-text">
                  <h4>
                     {{__('home.everyday_fresh')}} <br />{{__('home.everyday')}}<br />
                   
                  </h4>

                  <a href="{{ route('products.all' )}}" class="btn btn-xs">{{__('home.go_to_shop')}}<i class="fi-rs-arrow-small-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="banner-img">
                <img src="{{asset('assets/store/imgs/banner/banner-2-1.png')}}" alt="" />
                <div class="banner-text">
                  <h4>
                    {{__('home.healthy_breakfast')}}<br />
                    {{__('home.healthy')}}
                  </h4>
                  <a  href="{{ route('products.all' )}}"class="btn btn-xs">{{__('home.go_to_shop')}} <i class="fi-rs-arrow-small-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 d-md-none d-lg-flex">
              <div class="banner-img mb-sm-0">
                <img src="{{asset('assets/store/imgs/banner/banner-3-1.png')}}" alt="" />
                <div class="banner-text">
                  <h4>{{__('home.best_organic')}} <br />{{__('home.best')}} </h4>
                  <a  href="{{ route('products.all' )}}" class="btn btn-xs">{{__('home.go_to_shop')}} <i class="fi-rs-arrow-small-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </section>

     
      

        <section class="hero-3 position-relative align-items">

        </section>
        <!--End banners-->
      </div>
    </div>
    </div>


    <!--End category slider-->
    <!--End 4 columns-->
  </main>


  <footer class="main">
    <section class="section-padding footer-mid">
      <div class="container pt-15 pb-20">
        <div class="row">
          <div class="col">
            <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0">
              <div class="logo mb-30">
                <a href="index.htm" class="mb-15"><img src="{{asset('assets/store/imgs/theme/logo-1.svg')}}" alt="logo" /></a>
                <p class="font-lg text-heading">
                 {{__('home.awesome_grocery')}}
                </p>
              </div>
              <ul class="contact-infor">
                <li>
                  <img src="{{ asset('assets/store/imgs/theme/icons/icon-location-1.svg') }}" alt="" /><strong>Address: </strong>
                  <span>{{__('home.address')}}</span>
                </li>
                <li>
                  <img src="{{ asset('assets/store/imgs/theme/icons/icon-contact-1.svg') }}" alt="" />
                  <strong>{{__('home.call_us')}} </strong>
                  <span>(+91) -
                    540-025-124553</span>
                </li>
                <li>
                  <img src="{{ asset('assets/store/imgs/theme/icons/icon-email-2-1.svg') }}" alt="" />
                  <strong>{{__('home.email')}}:</strong><span>sale@MinutZMarket.com</span>
                </li>
                <li>
                  <img src="{{ asset('assets/store/imgs/theme/icons/icon-clock-1.svg') }}" alt="" />
                  <strong>{{__('home.hours')}}:</strong><span>10:00 -
                    18:00, Mon - Sat</span>
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
          <img src="{{('assets/store/imgs/theme/loading-1.gif')}}" alt="" />
        </div>
      </div>
    </div>
  </div>
  <!-- Vendor JS-->
  <script src="{{ asset('assets/store/js/vendor/modernizr-3.6.0.min-1.js') }}"></script>
  <script src="{{ asset('assets/store/js/vendor/jquery-3.6.0.min-1.js') }}"></script>
  <script src="{{ asset('assets/store/js/vendor/jquery-migrate-3.3.0.min-1.js') }}"></script>
<script src="{{ asset('assets/store/js/vendor/bootstrap.bundle.min-1.js') }}"></script>
<script src="{{ asset('assets/store/js/plugins/slick-1.js') }}"></script>
<script src="{{ asset('assets/store/js/plugins/jquery.syotimer.min-1.js') }}"></script>
<script src="{{ asset('assets/store/js/plugins/wow-1.js') }}"></script>
<script src="{{ asset('assets/store/js/plugins/slider-range.js') }}"></script>
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
<script src="{{ asset('assets/store/js/plugins/jquery.elevatezoom-1.js') }}"></script>
<!-- Template  JS -->
<script src="{{ asset('assets/store/js/main-1.js?v=6.0') }}"></script>
<script src="{{ asset('assets/store/js/shop-1.js?v=6.0') }}"></script>
</body>

</html>