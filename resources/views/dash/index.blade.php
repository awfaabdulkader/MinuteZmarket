<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">

<head>
  <meta charset="utf-8" />
  <title>MinutZMarket Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- App favicon -->
   <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    
   <!-- CSS files -->
   <link rel="stylesheet" href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}">
   <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="{{ asset('assets/libs/vanilla-datatables/vanilla-dataTables.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/libs/vanilla-datatables-editable/datatable.editable.min.css') }}" />
   <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<!-- Top Bar Start -->

<body>
  <!-- Top Bar Start -->
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
                <img src={{asset("assets/images/users/avatar-1.png")}} alt="" class="thumb-lg rounded-circle" />
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0">
                <div class="d-flex align-items-center py-2 bg-secondary-subtle px-3">
                    <div class="flex-shrink-0">
                        <img src="assets/images/users/avatar-1.png" alt="" class="thumb-md rounded-circle" />
                    </div>
                    <div class="flex-grow-1 ms-2 text-truncate align-self-center">
                        <h6 class="my-0 fw-medium text-dark fs-13">Admin</h6>
                    </div>
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
            </div>
        </li>
        </ul>
        <!--end topbar-nav-->
      </nav>
      <!-- end navbar-->
    </div>
  </div>
  <!-- Top Bar End -->
  <!-- leftbar-tab-menu -->
  <div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
      <a href="index.html" class="logo">
        <span class="">
          <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo-large" class="logo-lg logo-light" />
          <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark" />
        </span>
        <span>
          
          <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm" />
        </span>
      </a>
    </div>
    <!--end brand-->
    <!--start startbar-menu-->
    <div class="startbar-menu">
      <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
        <div class="d-flex align-items-start flex-column w-100">
          <!-- Navigation -->
          <ul class="navbar-nav mb-auto w-100">
            <li class="menu-label pt-0 mt-0">
              <!-- <small class="label-border">
                                          <div class="border_left hidden-xs"></div>
                                          <div class="border_right"></div>
                                      </small> -->
              <span>Menu de Navigation</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('products.bord') }}" role="button" aria-expanded="false"
                aria-controls="sidebarTableau de Bord">
                <i class="iconoir-home-simple menu-icon"></i>
                <span>Tableau de Bord</span>
              </a>
              <!--end startbarTableau de Bord-->
            </li>
            <!--end nav-item-->
            <li class="nav-item">
              <a class="nav-link" href="{{route('products.create')}}" role="button" aria-expanded="false"
                aria-controls="sidebarProduits">
                <i class="iconoir-view-grid menu-icon"></i>
                <span>Ajouter Produit et categorie</span>
              </a>
              <!--end startbarProduits-->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sidebarForms" data-bs-toggle="collapse" role="button" aria-expanded="false"
                aria-controls="sidebarForms">
                <i class="iconoir-journal-page menu-icon"></i>
                <span>Liste</span>
              </a>
              <div class="collapse " id="sidebarForms">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('products.index')}}">Liste Produits </a>
                  </li><!--end nav-item-->
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('categories.index')}}">Liste Categorie</a>
                  </li><!--end nav-item-->

                </ul><!--end nav-->
              </div><!--end startbarForms-->
            </li><!--end nav-item-->

            <!--end nav-item-->
          </ul>
          <!--end navbar-nav--->
        </div>
      </div>
      <!--end startbar-collapse-->
    </div>
    <!--end startbar-menu-->
  </div>
  <div class="startbar-overlay d-print-none"></div>
  <!-- end leftbar-tab-menu-->

  <div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
      <div class="container-xxl">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                  <div class="col-9">
                    <p class="text-dark mb-0 fw-semibold fs-14">Visiteurs</p>
                    <h3 class="mt-2 mb-0 fw-bold">535</h3>
                  </div>
                  <!--end col-->
                  <div class="col-3 align-self-center">
                    <div
                      class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                      <i class="iconoir-hexagon-dice h1 align-self-center mb-0 text-secondary"></i>
                    </div>
                  </div>
                  <!--end col-->
                </div>
                <!--end row-->
                <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">+ 8.5%</span>
                  Par rapport a hier</p>
              </div>
              <!--end card-body-->
            </div>
            <!--end card-->
          </div>
          <!--end col-->
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                  <div class="col-9">
                    <p class="text-dark mb-0 fw-semibold fs-14">Moy.Visites</p>
                    <h3 class="mt-2 mb-0 fw-bold">03:18</h3>
                  </div>
                  <!--end col-->
                  <div class="col-3 align-self-center">
                    <div
                      class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                      <i class="iconoir-clock h1 align-self-center mb-0 text-secondary"></i>
                    </div>
                  </div>
                  <!--end col-->
                </div>
                <!--end row-->
                <p class="mb-0 text-truncate text-muted mt-3"><span class="text-success">+ 1.5%</span>
                  Moy. mensuelle visites</p>
              </div>
              <!--end card-body-->
            </div>
            <!--end card-->
          </div>
          <!--end col-->
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                  <div class="col-9">
                    <p class="text-dark mb-0 fw-semibold fs-14">Consultation du catalogue</p>
                    <h3 class="mt-2 mb-0 fw-bold">36.45%</h3>
                  </div>
                  <!--end col-->
                  <div class="col-3 align-self-center">
                    <div
                      class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                      <i class="iconoir-percentage-circle h1 align-self-center mb-0 text-secondary"></i>
                    </div>
                  </div>
                  <!--end col-->
                </div>
                <!--end row-->
                <p class="mb-0 text-truncate text-muted mt-3"><span class="text-danger">- 8%</span>
                  Par rapport à a la semaine derniére</p>
              </div>
              <!--end card-body-->
            </div>
            <!--end card-->
          </div>
          <!--end col-->
        </div>
        <!--end row-->
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-8">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <h4 class="card-title">Visites par rapport au consulation du catalogue</h4>
                  </div>
                  <!--end col-->
                  <div class="col-auto">
                    <div class="dropdown">
                      <a href="#" class="btn bt btn-light dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="icofont-calendar fs-5 me-1"></i>
                        Cette Semaine<i class="las la-angle-down ms-1"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Aujourdui</a>
                        <a class="dropdown-item" href="#">Semaine derniére </a>
                        <a class="dropdown-item" href="#">Mois dernier</a>
                        <a class="dropdown-item" href="#">Année derniére</a>
                      </div>
                    </div>
                  </div>
                  <!--end col-->
                </div>
                <!--end row-->
              </div>
              <!--end card-header-->
              <div class="card-body pt-0">
                <div id="audience_overview" class="apex-charts"></div>
              </div>
              <!--end card-body-->
            </div>
            <!--end card-->
          </div>
          <!--end col-->
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <p class="text-dark mb-0 fw-semibold fs-14">Nouveau Visiteur</p>
                    <h2 class="mt-0 mb-0 fw-bold">535</h2>
                  </div>
                  <!--end col-->
                  <!--end col-->
                </div>
                <!--end row-->
                <div id="visitors_report" class="apex-charts mb-2"></div>
                <button type="button" disabled="true" class="btn btn-primary w-100 btn-lg fs-14">More
                  Detail <i class="fa-solid fa-arrow-right-long"></i>
                </button>
              </div>
              <!--end card-body-->
            </div>
            <!--end card-->
          </div>
          <!--end col-->
        </div>
        <!--end row-->

        <!--end row-->
      </div><!-- container -->
      <!-- container -->

      <!--Start Rightbar-->
      <!--Start Rightbar/offcanvas-->
      <!--end Rightbar/offcanvas-->
      <!--end Rightbar-->
      <!--Start Footer-->

      <footer class="footer text-center text-sm-start d-print-none">
        <div class="container-xxl">
          <div class="row">
            <div class="col-12">
              <div class="card mb-0 rounded-bottom-0">
                <div class="card-body">
                  <p class="text-muted mb-0">

                    <span class="text-muted d-none d-sm-inline-block float-end">©
                      <script>
                        document.write(new Date().getFullYear());
                      </script>
                      MinutZMarket
                    </span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>

      <!--end footer-->
    </div>
    <!-- end page content -->
  </div>
  <!-- end page-wrapper -->

  <!-- Javascript  -->
  <!-- vendor js -->

  <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/data/stock-prices.js') }}"></script>
  <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
  <script src="{{ asset('assets/libs/jsvectormap/maps/world.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/libs/vanilla-datatables/vanilla-dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/libs/vanilla-datatables-editable/datatable.editable.min.js') }}"></script>
  <script src="{{ asset('assets/js/pages/editable.init.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
  <script src="{{ asset('assets/js/pages/index.init.js') }}"></script>

</body>
<!--end body-->

</html>