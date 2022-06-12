@extends('client.master')
@section('title', 'Moonstore')
@section('content')

<div class="container content-login">
    <div class="row">
        <div class="col-sm-3 hidden-xs column-left" id="column-left">
            <div class="Categories left-sidebar-widget">
                <div class="columnblock-title">Tài khoản</div>
                <div class="category_block">
                    <ul class="box-category">
                        <li><a href="{{route('route.client.login_client')}}">Đăng nhập</a></li>
                        <li><a href="{{route('route.client.register_client')}}">Đăng ký</a></li>
                        <li><a href="#">Quên mật khẩu</a></li>
                        <li><a href="#">Tài khoản</a></li>
                        <li><a href="#">Địa chỉ</a></li>
                        <li><a href="#">Danh sách yêu thích</a></li>
                        <li><a href="#">Lịch sử</a></li>
                        <li><a href="#">Điểm thưởng</a></li>
                        <li><a href="#">Giao dịch</a></li>
                        <li><a href="#">Thư</a></li>
                        <li><a href="#">Thanh toán</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-9" id="content">
            <div class="row">
                <form action="{{route('route.client.redirect')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-6">
                        <h2>Khách hàng mới</h2>
                        <p>Lựa chọn thủ tục:</p>
                        <div class="radio">
                            <label>
                                <input type="radio" id="register" name="account" value="register" checked="checked">
                                Đăng ký tài khoản</label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" id="guest" name="account" value="guest">
                                Tài khoản khách</label>
                        </div>
                        <p>Bằng cách tạo tài khoản, bạn sẽ có thể mua sắm nhanh hơn, cập nhật trạng thái đơn hàng và theo dõi các đơn hàng bạn đã thực hiện trước đó.</p>
                        <button type="submit" class="btn btn-primary">Tiếp tục</button>
                    </div>
                </form>
                <form action="{{route('route.login_client_process')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-6">
                    @if ($errors->any())
                        <div class="alert alert-danger">                        
                            @foreach ($errors->all() as $error)
                                <h4>{{ $error }}</h4>
                            @endforeach                          
                        </div>
                    @endif
                        <h2>Đăng nhập với tư cách khách hàng</h2>
                        <p>Chào mừng trở lại</p>
                        <div class="form-group">
                            <label class="control-label" for="input-email">E-Mail</label>
                            <input type="text" name="email" placeholder="E-Mail" value="{{old('email')}}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="input-password">Mật khẩu</label>
                            <input type="password" name="password" placeholder="Mật khẩu"
                                class="form-control">
                            <a href="{{route('route.client.forget_password')}}" class="forgot">Quên mật khẩu?</a></div>
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
