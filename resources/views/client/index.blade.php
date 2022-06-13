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
                    <a href="#">
                        <img src="{{asset('client-style/image/banners/subbanner1.jpg')}}" class="img-responsive">
                    </a>
                    <div class="bannertext">
                        <h2>Đồ nữ</h2>
                        <p>Mua sắm quần áo mùa mới</p>
                        <a href="#" class="btn">Xem ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div id="subbanner2" class="banner sub-hover">
                    <a href="#">
                        <img src="{{asset('client-style/image/banners/subbanner2.jpg')}}" class="img-responsive">
                    </a>
                    <div class="bannertext">
                        <h2>Trang sức </h2>
                        <p>Lựa chọn sản phẩm chất lượng</p>
                        <a href="#" class="btn">Xem ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="center">
    <div class="container">
        <div class="row">
            <div class="content col-sm-12">
                <div class="customtab">
                    <div class="customtab">
                        <h3 class="productblock-title">SẢN PHẨM DÀNH CHO BẠN</h3>
                        <h4 class="title-subline">Chọn phong cách, chọn lối sống!</h4>
                    </div>
                </div>
                <div class="tab-content mt-5">
                    <div class="row">
                        @foreach ($product as $item)
                        <div class="product-layout  product-grid  col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="item">
                                <div class="product-thumb list">
                                    <div class="image product-imageblock">
                                        <a href="/product/{{$item->id}}">
                                            <img
                                                src="{{asset('image/product/'.$item->image)}}" class="img-responsive"
                                            />
                                            <img 
                                                src="{{asset('image/product/'.$item->image)}}" class="img-responsive"
                                            />
                                        </a>
                                        <ul class="button-group">
                                            <li>
                                                <button type="button" class="addtocart-btn">
                                                    <a href="/product/{{$item->id}}">
                                                        Xem chi tiết
                                                    </a>
                                                </button>
                                                <button 
                                                    type="button" 
                                                    class="addtocart-btn" 
                                                    onclick="addCart({{$item->id}})">
                                                    <a href="javascript:">Thêm vào giỏ hàng</a>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="caption product-detail center">
                                        <h4 class="product-name">
                                            <a href="/product/{{$item->id}}">{{$item->title}}</a>
                                        </h4>
                                        <p class="price product-price">${{$item->price}}.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="viewmore">
                            <div class="btn">Xem thêm sản phẩm</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-top-cms parallax-container image-background pro-detail">
    <div class="container">
        <div class="row">
            <div class="newslatter">
                <form action="" method="GET">
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
<div class="container">
    <div class="row">
        <div class="content col-sm-12">
            <div class="customtab">
            <h3 class="productblock-title">Sản phẩm nổi bật</h3>
            <h4 class="title-subline">Có gì đặc biệt? Khám phá ngay</h4>
            </div>
            <div class="tab-content">
                <div id="special-slidertab" class="row owl-carousel product-slider">
                    @foreach ($product as $item)
                    <div class="item">
                        <div class="product-thumb">
                            <div class="image product-imageblock"> 
                                <a href="/product/{{$item->id}}">
                                    <img
                                        src="{{asset('image/product/'.$item->image)}}"
                                        class="img-responsive"
                                    />
                                    <img
                                        src="{{asset('image/product/'.$item->image)}}"
                                        class="img-responsive"
                                    /> 
                                </a>
                                <ul class="button-group">
                                    <li>
                                        <button type="button" class="addtocart-btn">
                                            <a href="/product/{{$item->id}}">Xem chi tiết</a>
                                        </button>
                                        <button type="button" class="addtocart-btn"
                                            onclick="addCart({{$item->id}})">
                                            <a href="javascript:">Thêm vào giỏ hàng</a>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="caption product-detail center">
                                <h4 class="product-name"></h4><a href="#">{{$item->title}}</a></h4>
                                <p class="price product-price">${{$item->price}}.00</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="content col-sm-12">
                <div class="blog">
                    <div class="blog-heading">
                        <h3>Tin tức mới nhất</h3>
                        <h4 class="title-subline">Tìm hiểu ý tưởng, cảm hứng và tin tức.</h4>
                    </div>
                    <div class="blog-inner box">
                        <ul class="list-unstyled blog-wrapper" id="latest-blog">
                            @foreach ($post as $item)
                                <li class="item blog-slider-item">
                                    <div class="blog1 blog">
                                        <div class="blog-image">
                                            <a href="#" class="blog-image link">
                                                <img src="{{asset('image/post/'.$item->image)}}" alt="#">
                                            </a>
                                            <span class="blog-hover"></span>
                                            <span class="blog-readmore-outer"></span>
                                        </div>
                                        <div class="blog-content">
                                            <h2 class="blog-name"><a href="#">{{$item->title}}</a></h2>
                                            <span class="blog-author">Đăng bởi: 
                                                <a href="#">{{$item->author}}</a>
                                            </span>
                                            <span class="blog-date">{{$item->updated_at}} </span>
                                            <a href="#" class="blog-readmore">Đọc thêm</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
