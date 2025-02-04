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
              <a class="nav-link" href="{{ route('admin.products.bord') }}" role="button" aria-expanded="false"
                aria-controls="sidebarTableau de Bord">
                <i class="iconoir-home-simple menu-icon"></i>
                <span>Tableau de Bord</span>
              </a>
              <!--end startbarTableau de Bord-->
            </li>
            <!--end nav-item-->
            <li class="nav-item">
              <a class="nav-link"  href="{{route('admin.products.create')}}" role="button" aria-expanded="false"
                aria-controls="sidebarProduits">
                <i class="iconoir-view-grid menu-icon"></i>
                <span>Ajouter Produit et categorie</span>
              </a>
              <!--end startbarProduits-->
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="{{route('discounts.create')}}" role="button" aria-expanded="false"
                  aria-controls="sidebarProduits">
                  <i class="iconoir-view-grid menu-icon"></i>
                  <span>Ajouter Discounts</span>
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
                    <a class="nav-link" href="{{route('admin.products.index')}} ">Liste Produits </a>
                  </li><!--end nav-item-->
                  <li class="nav-item">
                    <a class="nav-link"  href="{{route('categories.index')}}">Liste Categorie</a>
                  </li><!--end nav-item-->
                  <li class="nav-item">
                    <a class="nav-link"  href="{{route('discounts.index')}}">Liste Discounts</a>
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