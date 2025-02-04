@extends('components.layout')
@section('content')
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

   @endsection