@extends('client.master')
@section('title', 'Moonstore')
@section('content')

<div class="mainbanner">
    <div id="main-banner" class="owl-carousel home-slider">
        @foreach ($banner as $item)
        <div class="item">
            <a href="#">
                <img src="{{asset('image/banner/'.$item->image)}}" class="img-responsive" />
            </a>
        </div>
        @endforeach
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="cms_banner">
            <div class="col-xs-12 col-md-6">
                <div id="subbanner1" class="banner sub-hover">
                    <a href="#"><img src="{{asset('client-style/image/banners/subbanner1.jpg')}}"
                            class="img-responsive"></a>
                    <div class="bannertext">
                        <h2>Đồ nữ</h2>
                        <p>Mua sắm quần áo mùa mới</p>
                        <button class="btn">Mua ngay</button>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div id="subbanner2" class="banner sub-hover">
                    <a href="#"><img src="{{asset('client-style/image/banners/subbanner2.jpg')}}"
                            class="img-responsive"></a>
                    <div class="bannertext">
                        <h2>Trang sức </h2>
                        <p>Lựa chọn sản phẩm chất lượng</p>
                        <button class="btn">Mua ngay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div id="column-left" class="col-sm-3 hidden-xs column-left">
            <div class="Categories left-sidebar-widget">
            </div>

            <div class="latest left-sidebar-widget">
                <div class="columnblock-title">Sản phẩm mới</div>
                <ul class="row ">
                    @foreach ($product_limit as $item)
                    <li class="product-layout">
                        <div class="product-list col-xs-4">
                            <div class="product-thumb">
                                <div class="image product-imageblock">
                                    <img class="img-responsive"
                                        src="{{asset('image/product/'.$item->image)}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="caption product-detail">
                                <h4 class="product-name">
                                    <a class="latest-checkout"
                                        href="/product/{{$item->id}}">
                                        {{$product[0]->title}}
                                    </a>
                                </h4>
                                <p class="price product-price">${{$item->price}}.00</p>
                                <div class="addto-cart">
                                    <a class="latest-checkout" 
                                        href="/product/{{$item->id}}">
                                        Xem ngay
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @if ($carts != null)
        <div class="col-sm-9" id="content">      
                <div class="Categories left-sidebar-widget">
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <h4>{{ $error }}</h4>
                    @endforeach
                </div>
                @endif
            <form action="/order-confirm" method="post">
                @csrf
                <div id="accordion" class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a class="accordion">
                                    Xác nhận địa chỉ</a></h4>
                        </div> 
                        @if ($bill != null) 
                        <div class="checkout-info">
                            <label for="fullname">Tên đầy đủ</label>
                            <input type="text" name="fullname" value="{{$bill->fullname}}" id="fullname">
                        </div>
                        <div class="checkout-info">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" name="phone" value="{{$bill->phone}}" id="phone">
                        </div>
                        <div class="checkout-info">
                            <label for="address">Địa chỉ giao hàng</label>
                            <input type="text" name="address" value="{{$bill->address}}" id="address">
                        </div>
                        <div class="checkout-info">
                            <label for="note">Ghi chú</label>
                            <input type="text" name="note" id="note">
                        </div>                           
                        @else 
                        <div class="checkout-info">
                            <label for="fullname">Tên đầy đủ</label>
                            <input type="text" name="fullname" value="{{old('fullname')}}" id="fullname">
                        </div>
                        <div class="checkout-info">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" name="phone" value="{{old('phone')}}" id="phone">
                        </div>
                        <div class="checkout-info">
                            <label for="address">Địa chỉ giao hàng</label>
                            <input type="text" name="address" value="{{old('address')}}" id="address">
                        </div>
                        <div class="checkout-info">
                            <label for="note">Ghi chú</label>
                            <input type="text" name="note" value="{{old('note')}}" id="note">
                        </div>
                        @endif
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion">Xác nhận đơn hàng</a>
                            </h4>
                        </div>
                        <div id="collapse-checkout-confirm">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <td class="text-left">Tên</td>
                                                <td class="text-left">Loại sản phẩm</td>
                                                <td class="text-right">Số lượng</td>
                                                <td class="text-right">Đơn giá</td>
                                                <td class="text-right">Thành tiền</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Session::get('Cart')->products as $item)
                                            <tr>
                                                <td class="text-left">
                                                    <a href="/product/{{$item['productInfo']->id}}">{{$item['productInfo']->title}}</a>
                                                </td>
                                                <td class="text-left">{{$category[$item['productInfo']->category]}}</td>
                                                <td class="text-right">{{$item['quanty']}}</td>
                                                <td class="text-right">${{$item['productInfo']->price}}.00</td>
                                                <td class="text-right">${{$item['price']}}.00</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="text-right" colspan="4"><strong>Thuế:</strong></td>
                                                <td class="text-right">$0.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" colspan="4"><strong>Phí vận chuyển:</strong></td>
                                                <td class="text-right">$0.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" colspan="4">
                                                    <strong>Tổng tiền:</strong>
                                                </td>
                                                <td class="text-right highlight-blue">
                                                    ${{Session::get('Cart')->totalPrice}}.00
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <h4>Lưu ý: Thanh toán khi nhận hàng</h4>
                                </div>
                                <div class="buttons">
                                    <div class="pull-right">
                                        <button class="btn btn-primary" id="button-confirm">Xác nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @else
        <div class="col-sm-9 empty-order" id="content">
            <center>
                <h1 class="empty-order-title">Bạn không có đơn hàng nào</h1>
                <div class="empty-order-btn"><a href="/">Mua hàng ngay</a></div>
            </center>         
        </div> 
        @endif
    </div>
</div>
<div class="footer-top-cms parallax-container image-background pro-detail">
    <div class="container">
        <div class="row">
            <div class="newslatter">
                <form>
                    <h5>ĐĂNG KÝ ĐỂ NHẬN NGAY ƯU ĐÃI!</h5>
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
