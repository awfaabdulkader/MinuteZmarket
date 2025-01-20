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
                <div class="row align-items-center">
                  <div class="col">
                    <h4 class="card-title">Edit Product</h4>
                  </div>
                </div>
              </div>
              
              <div class="card-body pt-0">
                @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="mb-3 row">
                        <label for="example-email-input" class="col-sm-2 col-form-label text-end">Marque</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="slug" type="text" value="{{ $product->slug }}" placeholder="Exemple : 'Nestlé'" />
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="example-number-input" class="col-sm-2 col-form-label text-end">Prix</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <span class="input-group-text"> €</span> 
                            <input 
                              class="form-control" 
                              name="prix" 
                              type="number" 
                              value="{{$product->prix}}"
                              placeholder="Exemple:'20'" 
                              id="example-number-input" 
                              step="0.01" 
                              min="0" 
                              required
                            />
                          </div>
                        </div>
                      </div>
                      

                      <div class="mb-3 row">
                        <label for="category_id" class="col-sm-2 col-form-label text-end">Category:</label>
                        <div class="col-sm-10">
                          <select name="category_id" class="form-select">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                              <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->getTranslation('fr')?->name ?? 
                                   $category->getTranslation('en')?->name ?? 
                                   $category->getTranslation('es')?->name ?? 
                                   'No translation available' }}
                              </option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                     <!-- English -->
<div class="translations-section">
  <div class="form-group">
      <label for="translations[en][name]">Name (English):</label>
      <input type="text" 
             class="form-control" 
             name="translations[en][name]" 
             value="{{ old('translations.en.name', 
                        optional($product->translations->firstWhere('language_code', 'en'))->name) }}">
      <input type="hidden" name="translations[en][language_code]" value="en">
  </div>

  <div class="form-group">
      <label for="translations[en][description]">Description (English):</label>
      <textarea class="form-control" 
                name="translations[en][description]" 
                rows="3">{{ old('translations.en.description', 
                           optional($product->translations->firstWhere('language_code', 'en'))->description) }}</textarea>
  </div>
</div>

<!-- French -->
<div class="translations-section">
  <div class="form-group">
      <label for="translations[fr][name]">Name (French):</label>
      <input type="text" 
             class="form-control" 
             name="translations[fr][name]" 
             value="{{ old('translations.fr.name', 
                        optional($product->translations->firstWhere('language_code', 'fr'))->name) }}">
      <input type="hidden" name="translations[fr][language_code]" value="fr">
  </div>

  <div class="form-group">
      <label for="translations[fr][description]">Description (French):</label>
      <textarea class="form-control" 
                name="translations[fr][description]" 
                rows="3">{{ old('translations.fr.description', 
                           optional($product->translations->firstWhere('language_code', 'fr'))->description) }}</textarea>
  </div>
</div>

<!-- Spanish -->
<div class="translations-section">
  <div class="form-group">
      <label for="translations[es][name]">Name (Spanish):</label>
      <input type="text" 
             class="form-control" 
             name="translations[es][name]" 
             value="{{ old('translations.es.name', 
                        optional($product->translations->firstWhere('language_code', 'es'))->name) }}">
      <input type="hidden" name="translations[es][language_code]" value="es">
  </div>

  <div class="form-group">
      <label for="translations[es][description]">Description (Spanish):</label>
      <textarea class="form-control" 
                name="translations[es][description]" 
                rows="3">{{ old('translations.es.description', 
                           optional($product->translations->firstWhere('language_code', 'es'))->description) }}</textarea>
  </div>
</div>
                      <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label text-end">Stock</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="stock" type="number" value="{{ $product->stock }}" />
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title">Current Image</h4>
                        </div>
                        <div class="card-body">
                          @if($product->image_url)
                          <img src="{{ Storage::url($product->image_url) }}" alt="Product Image" style="max-width: 200px;">
                          @endif
                          
                          <div class="d-grid">
                            <p class="text-muted">
                              Choose a new image (optional) - .jpg or .png between 100x100 and 500x500
                            </p>
                            <div class="preview-box d-block justify-content-center rounded border-dashed border-theme-color overflow-hidden p-3">
                            </div>
                            <input type="file" id="input-file" name="image_url" accept="image/*" onchange="{handleChange()}" hidden />
                            <label class="btn-upload btn btn-primary mt-3" for="input-file">Upload New Image</label>
                          </div>
                        </div>
                      </div>

                      <div class="row align-items-center mt-3">
                        <div class="col-sm-12">
                          <button type="submit" style="width: 100%" class="btn btn-primary">
                            Update Product
                          </button>
                        </div>
                      </div>
                    </div>
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