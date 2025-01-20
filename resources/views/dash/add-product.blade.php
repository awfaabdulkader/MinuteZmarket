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
  <link rel="stylesheet" href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" />
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ asset('assets/libs/vanilla-datatables/vanilla-dataTables.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/libs/vanilla-datatables-editable/datatable.editable.min.css') }}" />
  <!-- App css -->
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
              <a class="nav-link"  href="{{route('products.create')}}" role="button" aria-expanded="false"
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
                    <a class="nav-link" href="{{route('products.index')}} ">Liste Produits </a>
                  </li><!--end nav-item-->
                  <li class="nav-item">
                    <a class="nav-link"  href="{{route('categories.index')}}">Liste Categorie</a>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <h4 class="card-title">Textual Inputs</h4>
                  </div>
                  <!--end col-->
                </div>
                <!--end row-->
              </div>
              <!--end card-header-->
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3 row align-items-center">
                      <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                                          </div>



                    <div class="mb-3  row">
                      <label for="example-email-input" class="col-sm-2 col-form-label text-end">Marque</label>
                      <div class="mb-3 col-sm-10">
                        <input class="form-control"  name="slug" type="text" placeholder="Exemple : 'Nestlé'"
                          id="example-email-input" />
                      </div>

                      <div class="mb-3 row">
                        <label for="example-number-input" class="col-sm-2 col-form-label text-end">Prix</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <span class="input-group-text">€</span> <!-- Add the currency symbol here -->
                            <input 
                              class="form-control" 
                              name="prix" 
                              type="number" 
                              placeholder="Exemple : '20'" 
                              id="example-number-input" 
                              step="0.01" 
                              min="0" 
                              required
                            />
                          </div>
                        </div>
                      </div>
                      
                      
                    </div>
                    <div class="mb-3 row">
                      <label for="category_id" class="col-sm-2 col-form-label text-end">Category:</label>
                      <div class="col-sm-10">
                        <select name="category_id"
                          class="form-select border border-gray-300 text-gray-700 p-2 rounded-md"
                          aria-label="Category Select">
                          <option value="">Select Category</option>
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                              {{ $category->getTranslation('fr')?->name ?? 
                                 $category->getTranslation('en')?->name ?? 
                                 $category->getTranslation('es')?->name ?? 
                                 'No translation available' }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row">
                     <!-- English Translation -->
<input type="hidden" name="translations[en][language_code]" value="en">
<div class="mb-3 row">
  <label for="translations[en][name]" class="col-sm-2 col-form-label text-end">Name (EN)</label>
  <div class="col-sm-10">
    <input class="form-control" type="text" name="translations[en][name]" placeholder="Name in English" required>
  </div>
</div>
<div class="mb-3 row">
  <label for="translations[en][description]" class="col-sm-2 col-form-label text-end">Description (EN)</label>
  <div class="col-sm-10">
    <textarea class="form-control" name="translations[en][description]" placeholder="Description in English"></textarea>
  </div>
</div>

<!-- French Translation -->
<input type="hidden" name="translations[fr][language_code]" value="fr">
<div class="mb-3 row">
  <label for="translations[fr][name]" class="col-sm-2 col-form-label text-end">Name (FR)</label>
  <div class="col-sm-10">
    <input class="form-control" type="text" name="translations[fr][name]" placeholder="Nom en Français" required>
  </div>
</div>
<div class="mb-3 row">
  <label for="translations[fr][description]" class="col-sm-2 col-form-label text-end">Description (FR)</label>
  <div class="col-sm-10">
    <textarea class="form-control" name="translations[fr][description]" placeholder="Description en Français"></textarea>
  </div>
</div>

<!-- Spanish Translation -->
<input type="hidden" name="translations[es][language_code]" value="es">
<div class="mb-3 row">
  <label for="translations[es][name]" class="col-sm-2 col-form-label text-end">Name (ES)</label>
  <div class="col-sm-10">
    <input class="form-control" type="text" name="translations[es][name]" placeholder="Nombre en Español" required>
  </div>
</div>
<div class="mb-3 row">
  <label for="translations[es][description]" class="col-sm-2 col-form-label text-end">Description (ES)</label>
  <div class="col-sm-10">
    <textarea class="form-control" name="translations[es][description]" placeholder="Descripción en Español"></textarea>
  </div>
</div>
                  </div>
                  <!--end col-->
                  <div class="mb-3 row">
                    <label for="example-number-input" class="col-sm-2 col-form-label text-end">Quantité en Stock
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" name="stock" type="number" placeholder="Exemple : '42'"
                        id="example-number-input" />
                    </div>
                  </div>
                </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="card">
                      <div class="card-header">
                        <div class="row align-items-center">
                          <div class="col">
                            <h4 class="card-title">Choisir la Photo Produit </h4>
                          </div>
                          <!--end col-->


                        </div>
                        <!--end row-->
                      </div>
                      <!--end card-header-->
                      <div class="card-body pt-0">
                        <div class="d-grid">
                          <p class="text-muted">
                            Veuillez choisir une image de votre produit .jpg ou .png entre 100x100 et 500x500
                          </p>
                          <div
                            class="preview-box d-block justify-content-center rounded border-dashed border-theme-color overflow-hidden p-3">
                          </div>
                          <input type="file" id="input-file" name="image_url" accept="image/*"
                            onchange="{handleChange()}" hidden />
                          <label class="btn-upload btn btn-primary mt-3"   for="input-file">Upload Image</label>
                        </div>
                      </div>
                      <!--end card-body-->
                    </div>
                    <!--end card-->
                    <div class="row align-items-center ">
                      <div class="col-sm-12">
                        <button type="submit" style="width: 100%" class="btn btn-primary">
                          Ajouter
                        </button>
                      </form>
                      </div>
                    </div>
                  </div>
                  <!--end col-->
                </div>
                  <!--end col-->
                </div>
                <!--end row-->
              </div>
              <!--end card-body-->
            </div>
            <!--end card-->
         
          <!--end col-->
        
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create category </h4>
                </div>
                <div class="card-body">
                    <form action="{{route('categories.store') }}" 
                          method="POST" 
                          class="needs-validation" 
                          novalidate>
                        @csrf
                    

                      
                          
                          <div class="mb-3">
                              <label for="name" class="form-label">Name </label>
                              <input type="text" 
                                     class="form-control " 
                                     name="name" 
                                      id="name"
                                     required>
                            
                          </div>

                        <div class="row">
                            <!-- French Translation -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0">French Version</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" 
                                               name="translations[0][language_code]" 
                                               value="fr">
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Name (French)</label>
                                            <input type="text" 
                                                   class="form-control @error('translations.0.name') is-invalid @enderror" 
                                                   name="translations[0][name]" 
                                                  
                                                   required>
                                            @error('translations.0.name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- English Translation -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0">English Version</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" 
                                               name="translations[1][language_code]" 
                                               value="en">
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Name (English)</label>
                                            <input type="text" 
                                                   class="form-control @error('translations.1.name') is-invalid @enderror" 
                                                   name="translations[1][name]"  
                                                   required>
                                            @error('translations.1.name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                       
                                    </div>

                                    <!-- spanish Translation -->
                            <div class="col-md-6">
                              <div class="card">
                                  <div class="card-header bg-light">
                                      <h5 class="mb-0">Es Version</h5>
                                  </div>
                                  <div class="card-body">
                                      <input type="hidden" 
                                             name="translations[2][language_code]" 
                                             value="es">
                                      
                                      <div class="mb-3">
                                          <label class="form-label">Name (es)</label>
                                          <input type="text" 
                                                 class="form-control @error('translations.2.name') is-invalid @enderror" 
                                                 name="translations[2][name]"  
                                                 required>
                                          @error('translations.2.name')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                      </div>

                                     
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                  Create Category
                            </button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            </div>
                  <!--end col-->
                </div>
                <!--end row-->
              </div>
              <!--end card-body-->
            </div>
            <!--end card-->
          </div>
          <!--end col-->
        </div>
        <!--end row-->
      </div>
      <!-- container -->

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

  <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
  <script src="{{ asset('assets/libs/uppy/uppy.legacy.min.js') }}"></script>
  <script src="{{ asset('assets/js/pages/file-upload.init.js') }}"></script>
</body>
<!--end body-->

</html>