<div class="topbar d-print-none">
    <div class="container-xxl">
      <nav class="topbar-custom d-flex justify-content-between" id="topbar-custom">
        <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
          <li>
            <button class="nav-link mobile-menu-btn nav-icon" id="togglemenu">
              <i class="iconoir-menu-scale"></i>
            </button>
          </li>
          <li class="mx-3 welcome-text">
            <h3 class="mb-0 fw-bold text-truncate">JUST 1 MINUTZ</h3>
            <!-- <h6 class="mb-0 fw-normal text-muted text-truncate fs-14">Here's your overview this week.</h6> -->
          </li>
        </ul>

         <!-- Language Switcher (Conditional) -->
         @if(isset($showLanguageSwitcher) && $showLanguageSwitcher)
        <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
            <!-- Language Switcher -->
            <li>
              <form action="{{ route('products.language', ['languageCode' => 'en']) }}" method="GET" style="display:inline;">
                <button type="submit" class="btn btn-link">English</button>
              </form>
              <form action="{{ route('products.language', ['languageCode' => 'fr']) }}" method="GET" style="display:inline;">
                <button type="submit" class="btn btn-link">Français</button>
              </form>
              <form action="{{ route('products.language', ['languageCode' => 'es']) }}" method="GET" style="display:inline;">
                <button type="submit" class="btn btn-link">Español</button>
              </form>
            </li>
          </ul>
          @endif
        <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
          <li class="topbar-item">
            <a class="nav-link nav-icon" href="javascript:void(0);" id="light-dark-mode">
              <i class="icofont-moon dark-mode"></i>
              <i class="icofont-sun light-mode"></i>
            </a>
          </li>

          <li class="dropdown topbar-item">
            <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
              aria-haspopup="false" aria-expanded="false">
              <img src="{{ asset('assets/images/users/avatar-1.png') }}" alt="" class="thumb-lg rounded-circle" />

            </a>
            <div class="dropdown-menu dropdown-menu-end py-0">
              <div class="d-flex align-items-center dropdown-item py-2 bg-secondary-subtle">
                <div class="flex-shrink-0">
                  <img src="{{ asset('assets/images/users/avatar-1.png') }}" alt="" class="thumb-md rounded-circle" />

                </div>
                <div class="flex-grow-1 ms-2 text-truncate align-self-center">
                  <h6 class="my-0 fw-medium text-dark fs-13">Admin</h6>
                </div>
                <!--end media-body-->
              </div>
              <div class="px-3 py-2">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link text-danger p-0 w-100 text-start">
                        <i class="las la-power-off fs-18 me-1 align-text-bottom"></i>
                        Se Deconnecter
                    </button>
                </form>
            </div>
            
          </li>

        </ul>
        <!--end topbar-nav-->
      </nav>
      <!-- end navbar-->
    </div>
  </div>
  