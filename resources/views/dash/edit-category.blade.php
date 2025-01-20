<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">

<head>
  <meta charset="utf-8" />
  <title>MinutZMarket Admin - Edit Product</title>
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
      </nav>
    </div>
  </div>

  <!-- Left Sidebar -->
  <div class="startbar d-print-none">
    <div class="brand">
      <a href="index.html" class="logo">
        <span>
          <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo-large" class="logo-lg logo-light" />
          <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark" />
        </span>
        <span>
          <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm" />
        </span>
      </a>
    </div>

    <div class="startbar-menu">
      <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
        <div class="d-flex align-items-start flex-column w-100">
          <ul class="navbar-nav mb-auto w-100">
            <li class="menu-label pt-0 mt-0">
              <span>Menu de Navigation</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('products.bord') }}">
                <i class="iconoir-home-simple menu-icon"></i>
                <span>Tableau de Bord</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('products.create')}}">
                <i class="iconoir-view-grid menu-icon"></i>
                <span>Ajouter Produit et categorie</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sidebarForms" data-bs-toggle="collapse" role="button" aria-expanded="false">
                <i class="iconoir-journal-page menu-icon"></i>
                <span>Liste</span>
              </a>
              <div class="collapse" id="sidebarForms">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('products.index')}}">Liste Produits</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('categories.index')}}">Liste Categorie</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="page-wrapper">
    <div class="page-content">
      <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update', $category->id) }}" 
                              method="POST" 
                              class="needs-validation" 
                              novalidate>
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" 
                                       class="form-control" 
                                       name="name" 
                                       id="name"
                                       value="{{ $category->name }}"
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
                                                       value="{{ $category->getTranslation('fr')?->name }}"
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
                                                       value="{{ $category->getTranslation('en')?->name }}"  
                                                       required>
                                                @error('translations.1.name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <!-- Spanish Translation -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-light">
                                            <h5 class="mb-0">Spanish Version</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="hidden" 
                                                   name="translations[2][language_code]" 
                                                   value="es">
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Name (Spanish)</label>
                                                <input type="text" 
                                                       class="form-control @error('translations.2.name') is-invalid @enderror" 
                                                       name="translations[2][name]"
                                                       value="{{ $category->getTranslation('es')?->name }}"  
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
                                    Update Category
                                </button>
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>

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
    </div>
  </div>

  <!-- Javascript  -->
  <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
  <script src="{{ asset('assets/libs/uppy/uppy.legacy.min.js') }}"></script>
  <script src="{{ asset('assets/js/pages/file-upload.init.js') }}"></script>
</body>

</html>