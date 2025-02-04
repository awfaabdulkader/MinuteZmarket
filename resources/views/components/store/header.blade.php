<header class="header-area header-style-1 header-height-2">
    <div style="background-color: #00897b" class="header-top header-top-ptb-1 d-none d-lg-block">
      <div class="container">
        <div class="row align-items-center" style="color: white">
          <div class="col-xl-3 col-lg-4"></div>
          <div class="col-xl-6 col-lg-4"></div>
          <div class="col-xl-3 col-lg-4">
            <div class="header-info header-info-right">
              <ul>
                <li>
                    {{ __('header.help_text') }}
                  <strong class=""> 06-666-74596</strong>
                </li>
                
                 

<!-- Language Dropdown -->
@if (@isset($languageSwitcher) && $languageSwitcher)
    
<div class="dropdown">
    <button class="btn btn-teal dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        {{ strtoupper(session('user_language', 'fr')) }}
    </button>
    <div class="dropdown-menu" aria-labelledby="languageDropdown">
        <a class="dropdown-item py-2 px-4" href="{{ route('home.language', ['languageCode' => 'fr']) }}">
          <img src="{{ asset('assets/store/imgs/flag-fr.png') }}" alt="Spanish flag" class="flag-icon me-2">

            Français
        </a>
        <a class="dropdown-item py-2 px-4" href="{{ route('home.language', ['languageCode' => 'es']) }}">
            <img src="{{ asset('assets/store/imgs/theme/flag-es.png') }}" alt="Spanish flag" class="flag-icon me-2">
            Español
        </a>
        <a class="dropdown-item py-2 px-4" href="{{ route('home.language', ['languageCode' => 'en']) }}">
          <img src="{{ asset('assets/store/imgs/theme/flag-en.png') }}" alt="Spanish flag" class="flag-icon me-2">

            English
        </a>
    </div>
</div>
    
@endif


<!-- Add this custom CSS -->
<style>
.btn-teal {
    background-color: #00897b;
    color: white;
    border: none;
    padding: 8px 16px;
}

.btn-teal:hover,
.btn-teal:focus {
    background-color: #007267;
    color: white;
}

.dropdown-menu {
    border-radius: 4px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    border: none;
    min-width: 160px;
}

.dropdown-item {
    display: flex;
    align-items: center;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
}

.flag-icon {
    width: 20px;
    height: 15px;
    object-fit: cover;
}
</style>


              </li>
              
              
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
      <div class="container">
        <div class="header-wrap header-space-between position-relative"
          style="display: flex; justify-content: center; align-items: center">
          <!-- Logo for both PC and mobile -->
          <div class="logo logo-width-1" style="position: sticky;">
            <a href="{{ route('home') }}">
              <img src="{{ asset('assets/store/imgs/theme/logo-1.svg') }}" alt="logo" />
            </a>
          </div>
          <div class="header-nav d-none d-lg-flex">
            <div class="main-menu main-menu-padding-1 main-menu-lh-2 font-heading">
              <nav>
                <ul>

                  <li>
                    <a class="active" href="{{ route('home') }}">{{ __('header.home') }} </a>
                  </li>
                  <li class="position-static">
                    <a href="#">{{ __('header.categories') }}  <i class="fi-rs-angle-down"></i></a>
                    <ul class="mega-menu">
                        <li class="sub-mega-menu sub-mega-menu-width-20">
                            <a class="menu-title" href="#">{{ __('header.our_categories') }}</a>
                            <ul>
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('store.category', $category->id) }}">
                                            {{ $category->translations->where('language_code', $languageCode)->first()->name ?? $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                
                      
                
                    </ul>
                </li>
                

                  <li>
                    <a href="page-about.html">{{ __('header.about') }}</a>
                  </li>
                  <li>
                    <a href="page-contact.html">{{ __('header.contact') }}</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="header-action-icon-2 d-block d-lg-none">
            <div class="burger-icon burger-icon-white">
              <span class="burger-icon-top"></span>
              <span class="burger-icon-mid"></span>
              <span class="burger-icon-bottom"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
      <div class="mobile-header-top">
        <div class="mobile-header-logo">
          <a href="{{ route('home') }}"><img src="{{asset('assets/store/imgs/theme/logo-1.svg')}}" alt="logo" /></a>
        </div>
        <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
          <button class="close-style search-close">
            <i class="icon-top"></i>
            <i class="icon-bottom"></i>
          </button>
        </div>
      </div>
      <div class="mobile-header-content-area">

        <div class="mobile-menu-wrap mobile-header-border">
          <!-- mobile menu start -->
          <nav>
            <ul class="mobile-menu font-heading">
              <li class="">
                <a href="{{ route('home') }}">{{ __('header.home') }}</a>
              </li>
              <li class="">
                <a href="about.html">{{ __('header.about') }}</a>
              </li>
              <li class="menu-item-has-children">
                <a href="#">{{ __('header.categories') }}</a>
                <ul class="dropdown">
                    @foreach($categories as $category)
                    <li>
                        <a href="{{ route('store.category', $category->id) }}">
                            {{ $category->translations->where('language_code', $languageCode)->first()->name ?? $category->name }}
                        </a>
                    </li>
                @endforeach
                </ul>
              </li>
              <li class="">
                <a href="index.html">{{ __('header.contact') }}</a>
              </li>
              @if (@isset($languageSwitcher) && $languageSwitcher)

              <li class="menu-item-has-children">
                <a href="#">Language</a>
                <ul class="dropdown">
    
                      
                            <a class="dropdown-item py-2 px-4" href="{{ route('home.language', ['languageCode' => 'fr']) }}">
                                Français
                            </a>
                            <a class="dropdown-item py-2 px-4" href="{{ route('home.language', ['languageCode' => 'es']) }}">
                                Español
                            </a>
                            <a class="dropdown-item py-2 px-4" href="{{ route('home.language', ['languageCode' => 'en']) }}">
                                English
                            </a>
                        </div>
                    </div>
                        
                  
                </ul>
              </li>
              @endif
            </ul>
          </nav>
          <!-- mobile menu end -->
        </div>
        <div class="mobile-header-info-wrap">
          <div class="single-mobile-header-info">
            <a href="page-contact"><i class="fi-rs-marker"></i> {{ __('header.our_location') }}
            </a>
          </div>

          <div class="single-mobile-header-info">
            <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789
            </a>
          </div>
        </div>
        <div class="mobile-social-icon mb-50">
          <h6 class="mb-15">{{ __('header.follow_us') }}</h6>
          <a href="#"><img src="{{asset('assets/store/imgs/theme/icons/icon-facebook-white-1.svg')}}" alt="" /></a>
          <a href="#"><img src="{{asset('assets/store/imgs/theme/icons/icon-twitter-white-1.svg')}}" alt="" /></a>
          <a href="https://www.instagram.com/minutzmarket" target="_blank" rel="noopener noreferrer"><img src="{{asset('assets/store/imgs/theme/icons/icon-instagram-white-1.svg')}} "   alt="" /></a>
          <a href="https://www.tiktok.com/@minutzmarket" target="_blank" rel="noopener noreferrer"><img src="{{asset('assets/store/imgs/theme/icons/icon-pinterest-white-1.svg')}} "   alt="" /></a>
          <a href=" https://youtube.com/@minutzmarkets " target="_blank" rel="noopener noreferrer"><img src="{{asset('assets/store/imgs/theme/icons/icon-youtube-white-1.svg ')}} "   alt="" /></a>
        </div>

      </div>
    </div>
  </div>
  <!--End header-->