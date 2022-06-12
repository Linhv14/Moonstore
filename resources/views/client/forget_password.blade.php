@extends('client.master')
@section('title', 'Moonstore')
@section('content')

<div class="container collection-page">
  <div class="row">
    <div class="col-sm-3 hidden-xs column-left" id="column-right">
      <div class="recentpost left-sidebar-widget">
        <div class="columnblock-title">Dịch vụ</div>
        <div class="category_block">
          <ul class="box-category">
            <li><a href="{{route('route.client.login_client')}}">Đăng nhập</a></li>
            <li><a href="{{route('route.client.register_client')}}">Đăng ký</a></li>
            <li><a href="#">Tài khoản</a></li>
            <li><a href="#">Phương thức thanh toán</a></li>
            <li><a href="#">Chi nhánh</a></li>
            <li><a href="#">Giao dịch</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div id="content" class="col-sm-9">
      <h1>Quên mật khẩu?</h1>
      <p>Nhập địa chỉ e-mail được liên kết với tài khoản của bạn. Bấm gửi để mật khẩu của bạn được gửi qua e-mail cho bạn</p>
      <form action="#" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
          <legend>E-Mail liên kết</legend>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email">Địa chỉ E-Mail</label>
            <div class="col-sm-10">
              <input type="text" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control" />
            </div>
          </div>
        </fieldset>
        <div class="buttons clearfix">
          <div class="pull-left"><a href="{{ url()->previous() }}" class="btn btn-defaultt">Quay lại</a></div>
          <div class="pull-right">
            <input type="submit" value="Continue" class="btn btn-primary" />
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="footer-top-cms parallax-container image-background-custom">
    <div class="container">
        <div class="row">
            <div class="newslatter">
                <form>
                    <h5>ĐĂNG KÝ ĐỂ NHẬN NGAY ƯU ĐÃI!!</h5>
                    <h4 class="title-subline">Theo dõi để cập nhật những thông tin khuyến mãi mới nhất!
                    </h4>
                    <div class="input-group">
                        <input type="text" class=" form-control" placeholder="Your-email@website.com">
                        <button type="submit" value="Sign up" class="btn btn-large btn-primary">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
