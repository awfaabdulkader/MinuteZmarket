<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <title>MinutZMarket Admin</title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta
      content="Premium Multipurpose Admin & Dashboard Template"
      name="description"
    />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" href="assets/libs/jsvectormap/css/jsvectormap.min.css">

    <link
      href="assets/css/bootstrap.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      rel="stylesheet"
      href="assets/libs/vanilla-datatables/vanilla-dataTables.min.css"
    />
    <link
      rel="stylesheet"
      href="assets/libs/vanilla-datatables-editable/datatable.editable.min.css"
    />
    <!-- App css -->

    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
  </head>

    
    <!-- Top Bar Start -->
    <body>
        <!-- Top Bar Start -->
        <div class="topbar d-print-none">
            <div class="container-xxl">
              <nav
                class="topbar-custom d-flex justify-content-between"
                id="topbar-custom"
              >
                <ul
                  class="topbar-item list-unstyled d-inline-flex align-items-center mb-0"
                >
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
                <ul
                  class="topbar-item list-unstyled d-inline-flex align-items-center mb-0"
                >
                  <li class="topbar-item">
                    <a
                      class="nav-link nav-icon"
                      href="javascript:void(0);"
                      id="light-dark-mode"
                    >
                      <i class="icofont-moon dark-mode"></i>
                      <i class="icofont-sun light-mode"></i>
                    </a>
                  </li>
      
                  <li class="dropdown topbar-item">
                    <a
                      class="nav-link dropdown-toggle arrow-none nav-icon"
                      data-bs-toggle="dropdown"
                      href="#"
                      role="button"
                      aria-haspopup="false"
                      aria-expanded="false"
                    >
                      <img
                        src="assets/images/users/avatar-1.png"
                        alt=""
                        class="thumb-lg rounded-circle"
                      />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end py-0">
                      <div
                        class="d-flex align-items-center dropdown-item py-2 bg-secondary-subtle"
                      >
                        <div class="flex-shrink-0">
                          <img
                            src="assets/images/users/avatar-1.png"
                            alt=""
                            class="thumb-md rounded-circle"
                          />
                        </div>
                        <div class="flex-grow-1 ms-2 text-truncate align-self-center">
                          <h6 class="my-0 fw-medium text-dark fs-13">Admin</h6>
                        </div>
                        <!--end media-body-->
                      </div>
                      <a class="dropdown-item text-danger" href="auth-login.html"
                        ><i class="las la-power-off fs-18 me-1 align-text-bottom"></i>
                        Se Deconnecter</a
                      >
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
                  <img
                    src="assets/images/logo-light.png"
                    alt="logo-large"
                    class="logo-lg logo-light"
                  />
                  <img
                    src="assets/images/logo-dark.png"
                    alt="logo-large"
                    class="logo-lg logo-dark"
                  />
                </span>
                <span>
                  <img
                    src="assets/images/logo-sm.png"
                    alt="logo-small"
                    class="logo-sm"
                  />
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
                      <a
                        class="nav-link"
                        href="index.html"
                        role="button"
                        aria-expanded="false"
                        aria-controls="sidebarTableau de Bord"
                      >
                        <i class="iconoir-home-simple menu-icon"></i>
                        <span>Tableau de Bord</span>
                      </a>
                      <!--end startbarTableau de Bord-->
                    </li>
                    <!--end nav-item-->
                    <li class="nav-item">
                      <a
                        class="nav-link"
                        href="add-product.html"
                        role="button"
                        aria-expanded="false"
                        aria-controls="sidebarProduits"
                      >
                        <i class="iconoir-view-grid menu-icon"></i>
                        <span>Ajouter Produit et categorie</span>
                      </a>
                      <!--end startbarProduits-->
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                          aria-expanded="false" aria-controls="sidebarForms">
                          <i class="iconoir-journal-page menu-icon"></i>
                          <span>Liste</span>
                      </a>
                      <div class="collapse " id="sidebarForms">
                          <ul class="nav flex-column">
                              <li class="nav-item">
                                  <a class="nav-link" href="products.html">Liste Produits </a>
                              </li><!--end nav-item-->
                              <li class="nav-item">
                                  <a class="nav-link" href="categories.html">Liste Categorie</a>
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
                    <div class="row">                        





                    </div><!--end row-->                                         
                </div><!-- container -->
                
                <!--Start Rightbar-->
                <!--Start Rightbar/offcanvas-->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                    <div class="offcanvas-header border-bottom justify-content-between">
                      <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                      <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">  
                        <h6>Account Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch1">
                                <label class="form-check-label" for="settings-switch1">Auto updates</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                                <label class="form-check-label" for="settings-switch2">Location Permission</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch3">
                                <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->
                        <h6>General Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch4">
                                <label class="form-check-label" for="settings-switch4">Show me Online</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                                <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch6">
                                <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->               
                    </div><!--end offcanvas-body-->
                </div>
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
                                
                                <span
                                  class="text-muted d-none d-sm-inline-block float-end"
                                >©
                                <script>
                                  document.write(new Date().getFullYear());
                                </script>
                                MinutZMarket</span
                                >
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
        
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/js/app.js"></script>
    </body>
    <!--end body-->
</html>