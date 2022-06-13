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
                                <h4 class="product-name"><a class="latest-checkout"
                                        href="/product/{{$item->id}}">{{$item->title}}</a>
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
        <div class="col-sm-9 empty-order" id="content">
                <center>
                    <h1 class="empty-order-title">Bạn không có đơn hàng nào</h1>
                    <div class="empty-order-btn"><a href="/">Mua hàng ngay</a></div>
                </center>
        </div>
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
