<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Technotest - Login</title>

    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg mt-25">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h2 text-gray-900 mb-4">Tizimga Kirish</h1>
                        </div>
                        <form class="user" action="{{ route('admin.login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                       id="exampleInputPhone" aria-describedby="phoneHelp"
                                       name="phone" placeholder="Telefon raqam...">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user"
                                       id="exampleInputPassword" name="password"
                                       placeholder="Parol">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input"
                                           name="remember" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Eslab
                                        qolish</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Kirish
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
