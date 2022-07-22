<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Login</title>
<meta name="description" content="No aside layout examples" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<link href="{{ asset('theme/demo1/dist/assets/plugins/global/plugins.bundle1036.css?v=2.1.1') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle1036.css?v=2.1.1') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme/demo1/dist/assets/css/style.bundle1036.css?v=2.1.1') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme/demo1/dist/assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme/demo1/dist/assets/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme/demo1/dist/assets/css/themes/layout/brand/light.css') }}" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
<link rel="shortcut icon" href="{{ asset('img/ruang-talenta.png') }}" />
</head>

<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled page-loading">
    @include('sweetalert::alert')
    <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
        <div class="d-flex flex-column-fluid align-item-center">
            <div class="container">
                <div class="col d-flex justify-content-center">
                    <div class="col-md-5">
                        <div class="card card-custom mx-auto my-auto">
                            <form action="/login" method="post">
                                @csrf
                                <div class="card-body">
                                    <h3 class="my-3 text-center">Sign In</h3>
                                    <div class="form-group mt-5">
                                        <label>Username</label>
                                        <input name="email" type="text" class="form-control" placeholder="myemail@domain.com" value="{{old('email')}}" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required />
                                    </div>
                                    <button type="submit" class=" btn btn-success mr-2 col-md-12">Masuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('theme/demo1/dist/assets/plugins/global/plugins.bundle1036.js?v=2.1.1') }}"></script>
    <script src="{{ asset('theme/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle1036.js?v=2.1.1') }}"></script>
    <script src="{{ asset('theme/demo1/dist/assets/js/scripts.bundle1036.js?v=2.1.1') }}"></script>
</body>

</html>