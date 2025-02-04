<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <title>Nest - Multipurpose eCommerce HTML Template</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <!-- Favicon -->
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/store/imgs/theme/favicon-1.svg')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/store/css/plugins/slider-range.css')}}">
  <link rel="stylesheet" href="{{asset('assets/store/css/main-2.css?v=6.0')}}">
</head>

<body>
  @include('components.store.header')

  <main class="main">
    <div class="page-header mt-30 mb-50">
      <div class="container">
                    <div class="archive-header">
                        <div class="row align-items-center">
                            <div class="col-xl-3">
                                @if(isset($currentCategory))
                                <h1 class="mb-15">
                                    {{ $currentCategory->translations->where('language_code', $languageCode)->first()->name ?? 'Shop' }}
                                </h1>
                            @else
                                <h1 class="mb-15">Shop</h1>
                            @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

              <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container mb-30">
      <div class="row">
        <div class="col-lg-4-5">
          <div class="shop-product-fillter">
            <div class="totall-product">
              <p> {{__('shop.items_found')}} <strong class="text-brand">{{ $products->count() }}</strong> {{__('shop.found')}} </p>
            </div>
            <div class="sort-by-product-area">
            
              
              <div class="sort-by-cover">
                <div class="sort-by-product-wrap">
                  <div class="sort-by">
                    <span><i class="fi-rs-apps-sort"></i>{{__('shop.sort_by')}}:</span>
                  </div>
                  <div class="sort-by-dropdown-wrap">
                    <span>
                        @switch($selectedSort)
                            @case('featured')
                          {{__('shop.featured')}}
                                @break
                            @case('price_asc')
                                {{__('shop.price_low_high')}}
                                @break
                            @case('price_desc')
                            {{__('shop.price_high_low')}}
                                @break
                            @case('release_date')
                            {{__('shop.release_date')}}
                                @break
                           
                        @endswitch
                        <i class="fi-rs-angle-small-down"></i>
                    </span>
                </div>
                </div>
                 <div class="sort-by-dropdown">
                  <ul>
                      @php 
                          $sortOptions = [
                              'featured' => __('shop.featured'),
                              'price_desc' => __('shop.price_low_high'),
                              'price_asc' => __('shop.price_high_low'),
                              'release_date' => __('shop.release_date'),
                          ];
                      @endphp

                    
                  </ul>
              </div>
              </div>
            </div>
          </div>


          <div class="row product-grid">
            @foreach($products as $product)
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="shop-product-right">
                                    <img class="default-img" src="{{ asset('storage/' . $product->image_url) }}" alt="">                  
                                    <img class="hover-img" src="{{ asset('storage/' . $product->image_url) }}"  alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist">
                                    <i class="fi-rs-heart"></i>
                                </a>
                                <a aria-label="Compare" class="action-btn" href="shop-compare">
                                    <i class="fi-rs-shuffle"></i>
                                </a>
                                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fi-rs-eye"></i>
                                </a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="{{ route('store.category', $product->category_id) }}">
                                    {{ $product->category->translations->where('language_code', $languageCode)->first()->name ?? $product->category->name }}
                                </a>
                            </div>
                            <h2>
                                <a href="shop-product-right">
                                    {{ $product->translations->where('language_code', $languageCode)->first()->name ?? $product->name }}
                                </a>
                            </h2>
        
                            <?php 
                                // Force recalculation of discount
                                $product->calculateDiscountedPrice();
                            ?>
        
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    @if($product->sale_price)
                                        <del class="text-muted">€{{ number_format($product->base_price, 2) }}</del>
                                        <br>
                                        <span class="text-danger">€{{ number_format($product->sale_price, 2) }}</span>
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
                    </div> <!-- Closing product-cart-wrap -->
                </div> <!-- Closing product column -->
            @endforeach
        </div> <!-- Closing row -->
        

          <!--product grid-->
        <!--product grid-->
        <div class="pagination-area mt-20 mb-20 text-center">
          <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                  {{ $products->links('vendor.pagination.bootstrap-4') }}
              </ul>
          </nav>
      </div>
          <!--End Deals-->
        </div>
        <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
          <div class="sidebar-widget widget-category-2 mb-30">
            <h5 class="section-title style-1 mb-30">{{__('header.categories')}}</h5>
            <ul>
              @foreach($categories as $category)
              <li>
                <a  href="{{ route('store.category', $category->id) }}"> 
                  @if($category->image)
                  <img src="{{ asset('storage/' . $category->image) }}" alt="">
              @endif
              {{ $category->translations->where('language_code', $languageCode)->first()->name ?? $category->name }}
                </a>
                <span class="count">{{ $category->product_count }}</span>
              </li>
              @endforeach
            </ul>
          </div>

                    <!-- div -->

          <!-- Fillter By Price
          <div class="sidebar-widget price_range range mb-30">
            <h5 class="section-title style-1 mb-30">Fill by price</h5>
            <div class="price-filter">
              <div class="price-filter-inner">
                <div id="slider-range" class="mb-20"></div>
                <div class="d-flex justify-content-between">
                  <div class="caption">From: <strong id="slider-range-value1" class="text-brand">{{ $minPrice ?? 0 }}</strong></div>
                  <div class="caption">To: <strong id="slider-range-value2" class="text-brand">{{ $maxPrice ?? 0 }}</strong></div>
                </div>
              </div>
            </div>
            
              <i class="fi-rs-filter mr-5"></i> Filter
          </a>
                    </div>
                     -->

          <!-- Product sidebar Widget -->
          
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
                <a href="index.htm" class="mb-15"><img src="{{asset('assets/store/imgs/theme/logo-1.svg')}}" alt="logo" /></a>
                <p class="font-lg text-heading">
                 {{__('home.awesome_grocery')}}
                </p>
              </div>
              <ul class="contact-infor">
                <li>
                  <img src="{{ asset('assets/store/imgs/theme/icons/icon-location-1.svg') }}" alt="" /><strong>{{__('home.address')}}</strong>
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
          <img src="{{asset('assets/store/imgs/theme/loading-1.gif')}}" alt="">
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
  <!-- Template JS -->
  <script src="{{ asset('assets/store/js/main-1.js?v=6.0') }}"></script>
  <script src="{{ asset('assets/store/js/shop-1.js?v=6.0') }}"></script>
  @section('scripts')
  <script src="{{ asset('assets/store/js/category-filter.js') }}"></script>
  @endsection
</body>

</html>