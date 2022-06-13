<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng nhập</title>
    <link href="{{asset('admin-style/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700"
        rel="stylesheet">
    <link href="{{asset('admin-style/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin-style/css/style.css')}}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container container-login">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row row-login">
                    <div class="col-lg-6 content-login">
                        <div class="p-5">
                        <div class="text-center">
                                <h1 class="h1 logo-login">MOONSTORE</h1>
                            </div>
                            <div class="text-center">
                                <h2 class="h4 text-gray-900 mb-4">Chào mừng!</h2>
                            </div>
                            <form class="user" method="POST" action="login-admin">
                                @csrf
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    <h6>{{ $error }}</h6>
                                    @endforeach
                                </div>
                                @endif
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" value="{{old('email')}}"
                                        placeholder="Nhập Email..." name="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Mật khẩu" name="password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Nhớ mật khẩu</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block">Đăng nhập</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{asset('admin-style/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin-style/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin-style/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('admin-style/js/sb-admin-2.min.js')}}"></script>

</html>
