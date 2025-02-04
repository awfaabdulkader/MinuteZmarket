<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <title>Rizz | Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Admin & Dashboard Template" name="description" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="container-xxl">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <!-- Header Section -->
                                <div class="card-body p-0 bg-black auth-header-box rounded-top">
                                    <div class="text-center p-3">
                                        <a href="{{ route('admin.products.bord') }}" class="logo logo-admin">
                                            <img src="{{ asset('assets/images/logo-sm.png') }}" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Bienvenue, veuillez vous connecter</h4>   
                                        <p class="text-muted fw-medium mb-0">Page réservée aux administrateurs.</p>  
                                    </div>
                                </div>

                                <!-- Form Section -->
                                <div class="card-body pt-0">
                                    <form method="POST" action="{{ route('admin.login.post') }}">                                        @csrf
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="email">Nom D'Utilisateur</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Entrez votre email">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="password">Mot de Passe</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                                        </div>

                                        <div class="form-group row mt-3">
                                            <div class="col-sm-6">
                                                <div class="form-check form-switch form-switch-success">
                                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                                    <label class="form-check-label" for="remember">Se rappeler de moi</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-primary" type="submit">Se Connecter <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($errors->any())
                                            <div class="alert alert-danger mt-3">
                                                <ul class="mb-0">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                                        
    </div>
</body>
</html>
