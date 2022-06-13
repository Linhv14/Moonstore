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
                    <a href="#"><img src="{{asset('image/category/'.$category[0]->image)}}" class="img-responsive"></a>
                    <div class="bannertext">
                        <h2>{{$category[0]->name}}</h2>
                        <p>Mua sắm quần áo mùa mới</p>
                        <a href="#" class="btn">Xem ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div id="subbanner2" class="banner sub-hover">
                    <a href="#"><img src="{{asset('image/category/'.$category[1]->image)}}" class="img-responsive"></a>
                    <div class="bannertext">
                        <h2>{{$category[1]->name}}</h2>
                        <p>Lựa chọn sản phẩm chất lượng</p>
                        <a href="#" class="btn">Xem ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container product-detail-page">
    <div class="row">
        <div class="content col-sm-12">
            <div class="row">
                <div class="col-sm-5">
                    <div class="thumbnails">
                        <div><a class="thumbnail fancybox"><img
                                    src="{{asset('image/product/'.$detail->image)}}"/></a></div>
                        <div id="product-thumbnail" class="owl-carousel">

                            @foreach ($product as $item)
                                @if ($item != $detail)
                                <div class="item">
                                <div class="image-additional">
                                    <a class="thumbnail fancybox" href="/product/{{$item->id}}"> 
                                        <img src="{{asset('image/product/'.$item->image)}}"/>
                                    </a>
                                </div>
                            </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 prodetail">
                    <h1 class="productpage-title">{{$detail->title}}</h1>
                    <div class="rating">
                        <span class="fas fa-stack">
                            <i class="fas fa-star"></i>
                        </span>
                        <span class="fas fa-stack">
                            <i class="fas fa-star"></i>
                        </span> <span class="fas fa-stack">
                            <i class="fas fa-star"></i>
                        </span> <span class="fas fa-stack">
                            <i class="fas fa-star"></i>
                        </span> <span class="fas fa-stack">
                            <i class="fas fa-star"></i>
                        </span>
                        <span class="riview"><a href="#">1 đánh giá</a> / <a href>Viết đánh giá</a></span> </div>
                    <ul class="list-unstyled productinfo-details-top">
                        <li>
                            <h2 class="productpage-price">${{$detail->price}}.00</h2>
                        </li>             
                    </ul>
                    <hr>
                    <ul class="list-unstyled product_info">
                        <li>
                            <label>Thương hiệu:</label>
                            <span> <a href="javascript:">{{$detail->brand}}</a></span></li>
                        <li>
                            <label>Loại sản phẩm:</label>
                            <span> {{$category_detail}}</span></li>
                        <li>
                            <label>Trạng thái:</label>
                            <span> Còn hàng</span></li>
                    </ul>
                    <hr>
                    <p class="product-desc"> {{$detail->description}}</p>
                    <div id="product">
                        <div class="form-group">
                            <div class="row">
                                <div class="Sort-by col-md-6">
                                    <label>Size</label>
                                    <select id="select-by-size" class="selectpicker form-control">
                                        <option value="#" selected="selected">M</option>
                                        <option value="#">L</option>
                                        <option value="#">XL</option>
                                    </select>
                                </div>
                                <div class="Color col-md-6">
                                    <label>Màu</label>
                                    <select id="select-by-color" class="selectpicker form-control">
                                        <option value="#" selected="selected">Xanh</option>
                                        <option value="#">Đỏ</option>
                                        <option value="#">Cam</option>
                                        <option value="#">Trắng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="qty">
                                <ul class="button-group list-btn product-detail-addcart">
                                    <li>
                                        <button type="button" class="addtocart-btn" 
                                                onclick="addCart({{$detail->id}})">
                                            <a href="javascript:">Thêm vào giỏ hàng</a>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="productinfo-tab">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-description" data-toggle="tab">Mô tả</a></li>
                    <li><a href="#tab-review" data-toggle="tab">Đánh giá </a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-description">
                        <div class="cpt_product_description ">
                            <div>
                                <p>{{$detail->description}}</p>
                            </div>
                        </div>
                        <!-- cpt_container_end -->
                    </div>
                    <div class="tab-pane" id="tab-review">
                        <form class="form-horizontal">
                            <div id="review"></div>
                            <h2>Đánh giá</h2>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label class="control-label" for="input-name">Email</label>
                                    <input type="email" name="name" value="" id="input-name" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label class="control-label" for="input-review">Ý kiến của bạn</label>
                                    <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>                   
                                </div>
                            </div>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label class="control-label">Đánh giá</label>
                                    &nbsp;&nbsp;&nbsp; Tệ&nbsp;
                                    <input type="radio" name="rating" value="1" />
                                    &nbsp;
                                    <input type="radio" name="rating" value="2" />
                                    &nbsp;
                                    <input type="radio" name="rating" value="3" />
                                    &nbsp;
                                    <input type="radio" name="rating" value="4" />
                                    &nbsp;
                                    <input type="radio" name="rating" value="5" />
                                    &nbsp;Tốt</div>
                            </div>
                            <div class="buttons clearfix">
                                <div class="pull-right">
                                    <button type="button" id="button-review" data-loading-text="Loading..."
                                        class="btn btn-primary">Tiếp tục</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <h3 class="productblock-title">Sản phẩm mới nhất</h3>
            <h4 class="title-subline">Có gì đặc biệt? Khám phá ngay</h4>
            <div class="box">
                <div id="related-slidertab" class="row owl-carousel product-slider">
                    @foreach($product as $item)
                    <div class="item">
                        <div class="product-thumb transition">
                            <div class="image product-imageblock"> <a href="/product/{{$item->id}}">
                                    <img src="{{asset('image/product/'.$item->image)}}" class="img-responsive" />
                                    <img src="{{asset('image/product/'.$item->image)}}" class="img-responsive" />
                                </a>
                                <ul class="button-group">
                                    <li>
                                        <button class="addtocart-btn">
                                            <a href="/product/{{$item->id}}">Xem chi tiết</a>
                                        </button>
                                        <button class="addtocart-btn" 
                                            onclick="addCart({{$item->id}})">
                                            <a href="javascript:">Thêm vào giỏ hàng</a>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-detail">
                                <h4 class="product-name"><a href="#">{{$item->title}}</a></h4>
                                <p class="price product-price">${{$item->price}}<span class="price-tax">Ex Tax:
                                        $0.00</span></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
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
