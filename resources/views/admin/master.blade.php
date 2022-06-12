<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link href="{{asset('admin-style/css/style.css')}}" rel="stylesheet" >
    <link href="{{asset('admin-style/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin-style/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,600i,700,700i,800"
        rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="{{route('route.admin.index')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-shopify"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Moonstore</div>
            </a>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseZoro">
                    <i class="fas fa-shopping-bag fa-fw text-white"></i>
                    <span class="font-weight-bold text-white right-menu">Danh mục</span>
                </a>
                <div id="collapseZoro" class="collapse">
                    <div class="bg-white py-2 collapse-inner rounded">              
                        <a class="collapse-item" href="{{route('route.admin.list_category')}}">Danh sách các danh mục</a>
                        <a class="collapse-item" href="{{route('route.admin.add_category')}}">Thêm danh mục</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne">
                    <i class="fas fa-tshirt fa-fw text-white"></i>
                    <span class="font-weight-bold text-white right-menu">Sản phẩm</span>
                </a>
                <div id="collapseOne" class="collapse">
                    <div class="bg-white py-2 collapse-inner rounded">              
                        <a class="collapse-item" href="{{route('route.admin.list_product')}}">Danh sách sản phẩm</a>
                        <a class="collapse-item" href="{{route('route.admin.add_product')}}">Thêm sản phẩm</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo">
                    <i class="fas fa-flag fa-fw text-white"></i>
                    <span class="font-weight-bold text-white right-menu">Băng rôn</span>
                </a>
                <div id="collapseTwo" class="collapse">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('route.admin.list_banner')}}">Danh sách băng rôn</a>
                        <a class="collapse-item" href="{{route('route.admin.add_banner')}}">Thêm băng rôn</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThird">
                    <i class="fas fa-comments fa-fw text-white"></i>
                    <span class="font-weight-bold text-white right-menu">Bài đăng</span>
                </a>
                <div id="collapseThird" class="collapse">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('route.admin.list_post')}}">Danh sách bài đăng</a>
                        <a class="collapse-item" href="{{route('route.admin.add_post')}}">Thêm bài đăng</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour">
                    <i class="fas fa-sticky-note fa-fw text-white"></i>
                    <span class="font-weight-bold text-white right-menu">Đơn hàng</span>
                </a>
                <div id="collapseFour" class="collapse">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('route.admin.list_order')}}">Duyệt đơn hàng</a>
                        <a class="collapse-item" href="{{route('route.admin.list_deliver')}}">Đơn hàng đang giao</a>
                        <a class="collapse-item" href="{{route('route.admin.history_order')}}">Lịch sử đơn hàng</a>
                    </div>
                </div>
            </li>

            @if (Auth::user()->type_user == "Admin")
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive">
                    <i class="fas fa-users fa-fw text-white"></i>
                    <span class="font-weight-bold text-white right-menu">Người dùng</span>
                </a>
                <div id="collapseFive" class="collapse">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('route.admin.list_user')}}">Danh sách người dùng</a>                     
                    </div>
                </div>
            </li>
            @endif

        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
                                <i class="fas fa-bell fa-fw fa-2x"></i>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">Thông báo</h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">30/10/2021</div>
                                        <span class="font-weight-bold">Báo cáo hàng tháng mới đã sẵn sàng để tải xuống!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">15/10/2021</div>
                                        $290,29 đã được gửi vào tài khoản của bạn!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">25/09/2021</div>
                                        Cảnh báo về Chi tiêu: Chúng tôi đã nhận thấy chi tiêu cao bất thường cho tài khoản của bạn.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Xem tất cả tông báo</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
                                <i class="fas fa-envelope fa-fw fa-2x"></i>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">Tin nhắn</h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle"
                                            src="{{asset('admin-style/img/undraw_profile_1.svg')}}">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Chào bạn! Tôi đang tự hỏi nếu bạn có thể giúp tôi với
                                            vấn đề tôi đang gặp phải.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58 phút</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle"
                                            src="{{asset('admin-style/img/undraw_profile_2.svg')}}" alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Tôi có những bức ảnh mà bạn đã đặt hàng vào tháng trước, làm thế nào
                                             để gửi cho bạn?</div>
                                        <div class="small text-gray-500">Jae Chun · 1 ngày</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle"
                                            src="{{asset('admin-style/img/undraw_profile_3.svg')}}" alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Báo cáo của tháng trước rất tốt, tôi rất hài lòng với
                                             tiến độ cho đến nay, tiếp tục công việc tốt!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2 ngày</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Mặt hàng này còn không?</div>
                                        <div class="small text-gray-500">Chicge · 2 tuần</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Đọc thêm</a>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-toggle="dropdown">
                                <span class="mr-4 d-none d-lg-inline text-gray-900">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('admin-style/img/undraw_profile.svg')}}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Hồ sơ
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cài đặt
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Thống kê
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                @yield('content')
        
                <footer class="sticky-footer bg-white">
                    <div class="container">
                        <div class="copyright text-center my-auto">
                            <span>
                            Copyright - Created by Group8 Team &copy; 2021
                            </span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lưu ý</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Chọn "tiếp tục" nếu bạn muốn đăng xuất hoặc thay đổi tài khoản</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                        <a class="btn btn-primary" href="{{route('route.admin.logout_admin')}}">Tiếp tục</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="{{asset('admin-style/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin-style/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin-style/js/sb-admin-2.min.js')}}"></script>
</html>
