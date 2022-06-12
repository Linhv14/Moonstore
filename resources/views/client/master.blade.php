<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="{{asset('client-style/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('client-style/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('client-style/css/stylesheet.css')}}" rel="stylesheet">
    <link href="{{asset('client-style/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('client-style/javascript/owl-carousel/owl.carousel.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('client-style/javascript/owl-carousel/owl.transitions.css')}}" type="text/css" rel="stylesheet">

    <script src="{{asset('client-style/javascript/jquery-2.1.1.min.js')}}"></script>
    <script src="{{asset('client-style/javascript/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('client-style/javascript/template_js/template.js')}}"></script>
    <script src="{{asset('client-style/javascript/global.js')}}"></script>
    <script src="{{asset('client-style/javascript/ajax.js')}}"></script>
    <script src="{{asset('client-style/javascript/owl-carousel/owl.carousel.min.js')}}"></script>
</head>

<body class="index">
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="top-left pull-left">
                            <div class="language">
                                <form id="language">
                                    <div class="btn-group">
                                        <button class="btn btn-link dropdown-toggle" data-toggle="dropdown"> Việt Nam
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="javascript:" onclick="showMsg()"> Việt Nam</a></li>
                                            <li><a href="javascript:" onclick="showMsg()"> English</a></li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                            <div class="wel-come-msg">Chào mừng đến với cửa hàng! </div>
                        </div>
                        <div class="top-right pull-right">
                            <div id="top-links" class="nav pull-right">
                                <ul class="list-inline">
                                    <li class="dropdown"><a class="dropdown-toggle" href="javascript:" data-toggle="dropdown"><i
                                                onclick="showMsg()" aria-hidden="true"></i><span>Tài khoản</span>
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            @if (Auth::check())
                                            <li><a><b>Xin chào {{Auth::user()->name}},</b></a></li>
                                            <br>
                                            <li><a href="javascript:" onclick="showMsg()">Hồ sơ</a></li>
                                            <li><a href="javascript:" onclick="showMsg()">Tài khoản</a></li>
                                            <li><a href="javascript:" onclick="showMsg()">Khuyến mãi</a></li>
                                            <li><a href="javascript:" onclick="showMsg()">Chính sách</a></li>
                                            <li><a href="{{route('route.client.order')}}">Đơn hàng</a></li>
                                            <li><a href="{{route('route.client.history_order')}}">Lịch sử mua hàng</a>
                                            </li>
                                            <li><a href="{{route('route.logout_client')}}">Đăng xuất</a></li>
                                            @else
                                            <li><a href="{{route('route.client.login_client')}}">Đăng nhập</a></li>
                                            <li><a href="{{route('route.client.register_client')}}">Đăng ký</a></li>
                                            @endif
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="header-inner">
                <div class="col-sm-3 col-xs-3 header-left">
                    <div id="logo">
                        <a href="{{route('route.client.index')}}">
                            <img src="{{asset('client-style/image/logo.png')}}" class="img-responsive" />
                        </a>
                    </div>
                </div>
                <div class="col-sm-9 col-xs-9 header-right">
                    <form action="/search" method="get">
                        @csrf
                        <div id="search" class="input-group">
                            <input type="text" name="search" placeholder="Nhập từ khóa ..."
                                class="form-control input-lg input-text" />
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default btn-lg">
                                    <span>Tìm kiếm</span>
                                </button>
                            </span>
                        </div>
                    </form>
                    @if (Request::path() != 'cart')
                    <div id="cart" class="btn-group btn-block"> 
                        <button type="button"
                            class="btn btn-inverse btn-block btn-lg dropdown-toggle cart-dropdown-button"> 
                            <span id="cart-total">
                                <span>Giỏ hàng</span>
                                <br> Thuế (0%)
                            </span>
                        </button>
                        <ul class="dropdown-menu pull-right cart-dropdown-menu">
                            <div id="change-item-cart"> 
                                @if (Session::has('Cart') != null) 
                                <div class="cart-item">
                                    <li>
                                        <table class="table table-striped">
                                            <tbody> 
                                                @foreach(Session::get('Cart')->products as $item) <tr>
                                                    <td class="text-center">
                                                        <a>
                                                            <img class="img-thumbnail"
                                                                src="{{asset('image/product/'.$item['productInfo']->image)}}">
                                                        </a>
                                                    </td>
                                                    <td class="text-left">
                                                        <a>
                                                            <h3>
                                                                {{$item['productInfo']->title}}
                                                            </h3>
                                                        </a>
                                                    </td>
                                                    <td class="text-right">
                                                        <h4>
                                                            ${{$item['productInfo']->price}}.00
                                                        </h4>
                                                        <h4>x {{$item['quanty']}}</h4>
                                                    </td>
                                                    <td class="text-center">
                                                    <td class="text-center">
                                                        <button class="btn btn-danger btn-xs"
                                                            data-id="{{$item['productInfo']->id}}">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </li>
                                </div>
                                <div class="cart-total">
                                    <li>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="text-right">
                                                        <strong>Thuế (0%)</strong>
                                                    </td>
                                                    <td class="text-right">$00.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">
                                                        <strong>Tổng tiền</strong>
                                                    </td>
                                                    <td class="text-right">
                                                        ${{Session::get('Cart')->totalPrice}}.00
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                </div> 
                                @else 
                                <div>
                                    <h2>
                                        <center class="empty-cart">
                                            Giỏ hàng đang trống, mua ngay!
                                        </center>
                                    </h2>
                                </div>
                                <div class="cart-total">
                                    <li>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="text-right">
                                                        <strong>Thuế (0%)</strong>
                                                    </td>
                                                    <td class="text-right">$00.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">
                                                        <strong>Tổng tiền</strong>
                                                    </td>
                                                    <td class="text-right">$0.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                </div>
                                @endif
                            </div>
                            <div class="cart-btn">
                                <li>
                                    <p class="text-right">
                                        <span class="btn-viewcart">
                                            <a href="{{route('route.client.cart')}}">
                                                <strong>
                                                    <i class="fas fa-shopping-cart"></i> 
                                                    Xem giỏ hàng
                                                </strong>
                                            </a>
                                        </span>
                                        <span class="btn-checkout">
                                            <a href="{{route('route.client.checkout')}}">
                                                <strong>
                                                    <i class="fas fa-share"></i>
                                                    Thanh toán
                                                </strong>
                                            </a>
                                        </span>
                                    </p>
                                </li>
                            </div>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <nav id="menu" class="navbar">
        <div class="nav-inner">
            <div class="navbar-header">
                <span id="category" class="visible-xs">Danh mục</span>
                <button type="button" class="btn btn-navbar navbar-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="navbar-collapse">
                <ul class="main-navigation">
                    <li>
                        <a href="{{route('route.client.index')}}" class="parent">Trang chủ</a>
                    </li>
                    <li>
                        <a href="/category/all" class="parent">Bộ sưu tập</a>
                        <ul>
                            <li>
                                <a href="/category/new">Sản phẩm mới</a>
                            </li>
                            <li>
                                <a href="/category/6">Áo sơ mi</a>
                            </li>
                            <li>
                                <a href="javascript:" onclick="showMsg(this)">Bán chạy nhất</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/category/women" class="parent">Phụ nữ</a></li>
                    <li><a href="/category/men" class="parent">Nam giới</a></li>
                    <li>
                        <a href="javascript:" onclick="showMsg()" class="parent">Trang</a>
                        <ul>
                            <li><a href="{{route('route.client.cart')}}">Giỏ hàng</a></li>
                            <li><a href="{{route('route.client.order')}}">Đơn hàng</a></li>
                            <li><a href="{{route('route.client.checkout')}}">Thanh toán</a></li>
                            <li><a href="javascript:" onclick="showMsg()">Bài viết</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:" class="parent" onclick="showMsg()">Thêm</a>
                        <ul>
                            <li><a href="javascript:" onclick="showMsg()">Thông tin</a></li>
                            <li><a href="javascript:" onclick="showMsg()">Liên hệ</a> </li>
                            <li><a href="{{route('route.client.forget_password')}}">Quên mật khẩu</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="container">
        <h3 class="client-title">Thương hiệu yêu thích</h3>
        <h4 class="title-subline">Sản phẩm chất lượng cao</h4>
        <div id="brand_carouse" class="owl-carousel brand-logo">
            <div class="item text-center">
                <a>
                    <img src="{{asset('client-style/image/brand/brand1.png')}}"
                        class="img-responsive"
                    />   
                </a>
            </div>
            <div class="item text-center">
                <a>
                    <img src="{{asset('client-style/image/brand/brand2.png')}}"
                        class="img-responsive"
                    />
                </a>
            </div>
            <div class="item text-center">
                <a>
                    <img src="{{asset('client-style/image/brand/brand3.png')}}"
                        class="img-responsive"
                    />
                </a>
            </div>
            <div class="item text-center">
                <a>
                    <img src="{{asset('client-style/image/brand/brand5.png')}}"
                        class="img-responsive"/>
                    </a>
                </div>
            <div class="item text-center">
                <a>
                    <img src="{{asset('client-style/image/brand/brand6.png')}}"
                        class="img-responsive"
                    />
                </a>
            </div>
            <div class="item text-center">
                <a>
                    <img src="{{asset('client-style/image/brand/brand7.png')}}"
                        class="img-responsive" 
                    />
                </a> 
            </div>
            <div class="item text-center">
                <a>
                    <img src="{{asset('client-style/image/brand/brand8.png')}}"
                        class="img-responsive"
                    />
                </a>
            </div>
            <div class="item text-center">
                <a>
                    <img src="{{asset('client-style/image/brand/brand9.png')}}"
                        class="img-responsive"
                        />
                </a>
            </div>
            <div class="item text-center">
                <a>
                    <img src="{{asset('client-style/image/brand/brand5.png')}}"
                        class="img-responsive"
                    />
                </a>
            </div>
        </div>
    </div>
    <footer>
        <div class="cms_searvice">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 ">
                        <div class="cms-block1 z-depth-5">
                            <h4>Miễn phí vận chuyển</h4>
                            <p>Đơn hàng trên $1500</p>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="cms-block2">
                            <h4>30 Ngày đổi trả</h4>
                            <p>Đảm bảo hoàn tiền</p>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="cms-block3">
                            <h4>Hỗ trợ 24/7</h4>
                            <p>Miễn phí liên hệ</p>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="cms-block4">
                            <h4>Thanh toán trực tuyến</h4>
                            <p>Tiết kiệm hơn 70%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-3 footer-block">
                    <h5 class="footer-title">Thông tin</h5>
                    <ul class="list-unstyled ul-wrapper">
                        <li><a href="javascript:" onclick="showMsg()">Liên hệ</a></li>
                        <li><a href="javascript:" onclick="showMsg()">Sứ mệnh</a></li>
                        <li><a href="javascript:" onclick="showMsg()">Bài viết liên quan</a></li>
                        <li><a href="javascript:" onclick="showMsg()">Hướng phát triển</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 footer-block">
                    <h5 class="footer-title">Tài khoản</h5>
                    <ul class="list-unstyled ul-wrapper">
                        <li><a href="javascript:" onclick="showMsg()">Hồ sơ</a></li>
                        <li><a href="javascript:" onclick="showMsg()">Tài khoản</a></li>
                        <li>
                            <a href="{{route('route.client.forget_password')}}">Quên mật khẩu</a>
                        </li>
                        <li><a href="{{route('route.client.register_client')}}">Đăng ký</a></li>
                        <li><a href="javascript:" onclick="showMsg()">Đổi mật khẩu</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 footer-block">
                    <h5 class="footer-title">Bổ sung</h5>
                    <ul class="list-unstyled ul-wrapper">
                        <li><a href="javascript:" onclick="showMsg()">Chính sách</a></li>
                        <li><a href="javascript:" onclick="showMsg()">Nhà phân phối</a></li>
                        <li><a href="javascript:" onclick="showMsg()">Thu hồi</a></li>
                        <li><a href="javascript:" onclick="showMsg()">Trợ giúp & FAQs</a></li>
                        <li><a href="javascript:" onclick="showMsg()">Khuyến mãi</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 footer-block">
                    <h5 class="contact-title footer-title">Liên hệ</h5>
                    <ul class="ul-wrapper">
                        <li>
                            <span class="location2">
                                Trụ sở:<br>
                                504, Bình Chuẩn<br>
                                Thuận An, Bình Dương
                            </span>
                        </li>
                        <li><span class="mail2">Info@gmail.com<br>
                        <li><span class="phone2">+84 365-365-365<br></span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div id="bottom-footer">
                <ul class="footer-link">
                    <li><a href="{{route('route.client.index')}}">Trang chủ</a></li>
                    <li><a href="javascript:" onclick="showMsg()">Thông tin</a></li>
                    <li><a href="javascript:" onclick="showMsg()">Công việc</a></li>
                    <li><a href="javascript:" onclick="showMsg()">Đội ngũ</a></li>
                    <li><a href="javascript:" onclick="showMsg()">Chính sách</a></li>
                    <li><a href="javascript:" onclick="showMsg()">Tuyển dụng</a></li>
                    <li><a href="javascript:" onclick="showMsg()">Liên hệ</a></li>
                </ul>
                <div class="copyright"> Copyright -
                    <a class="yourstore">
                        Created by Group8 Team &copy; 2021
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
</body>

</html>