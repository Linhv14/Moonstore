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
                        <li><a href="{{route('route.client.forget_password')}}">Quên mật khẩu</a></li>
                        <li><a href="#">Tài khoản</a></li>               
                        <li><a href="#">Danh sách yêu thích</a></li>
                        <li><a href="#">Lịch sử đơn hàng</a></li>
                        <li><a href="#">Chính sách</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-9" id="content">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <h6>{{ $error }}</h6>
                @endforeach
            </div>
            @endif
            <p>Nếu đã có tài khoản, hãy đăng nhập <a
                    href="{{route('route.client.login_client')}}">tại đây</a>.</p>
            <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                action="{{route('route.client.save_client')}}">
                @csrf
                <fieldset id="account">
                    <legend>Thông tin cá nhân</legend>
                    <div class="form-group required">
                        <label for="input-name" class="col-sm-2 control-label">Tên</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{old('name')}}" class="form-control" placeholder="Tên" name="name">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-email" class="col-sm-2 control-label">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{old('email')}}" class="form-control" placeholder="E-Mail" name="email">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-telephone" class="col-sm-2 control-label">Điện thoại</label>
                        <div class="col-sm-10">
                            <input type="tel" value="{{old('phone')}}" class="form-control" placeholder="Telephone" name="phone">
                        </div>
                    </div>
                </fieldset>
                <fieldset id="address">
                    <legend>Địa chỉ cá nhân</legend>
                    <div class="form-group required">
                        <label for="input-address" class="col-sm-2 control-label">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{old('address')}}" class="form-control" placeholder="Địa chỉ" name="address">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-city" class="col-sm-2 control-label">Thành phố</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{old('city')}}" class="form-control" placeholder="Thành phố" name="city">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-country" class="col-sm-2 control-label">Quốc gia</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{old('country')}}" class="form-control" placeholder="Quốc gia" name="country">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Mật khẩu cá nhân</legend>
                    <div class="form-group required">
                        <label for="input-password" class="col-sm-2 control-label">Mật khẩu</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-confirm" class="col-sm-2 control-label">Xác nhận mật khẩu</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="Xác nhận mật khẩu" name="password_confirmation">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="buttons">
                        <div class="pull-right">Bạn cần đọc và đồng ý với <a class="agree" href="#"><b>chính sách</b></a>
                            <input type="checkbox" value="1" name="agree">
                            &nbsp;
                            <button type="submit" class="btn btn-primary">Đăng ký</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
