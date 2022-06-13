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
                    @foreach ($product_limit as $product)
                    <li class="product-layout">
                        <div class="product-list col-xs-4">
                            <div class="product-thumb">
                                <div class="image product-imageblock">
                                    <img class="img-responsive"
                                        src="{{asset('image/product/'.$product->image)}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="caption product-detail">
                                <h4 class="product-name">
                                    <a class="latest-checkout">{{$product->title}}</a>
                                </h4>
                                <p class="price product-price">${{$product->price}}.00</p>
                                <div class="addto-cart">
                                    <a class="latest-checkout" 
                                        href="/product/{{$product->id}}">
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
        <div class="col-sm-9" id="content">   
            <div class="Categories left-sidebar-widget">
            </div>     
            @for ($i = 0; $i < count($bills); $i++)
            <h1>Đơn hàng {{$i+1}}</h1>
            <p>Thời gian đặt: {{\Carbon\Carbon::parse($bills[$i]->created_at)->format('H:i d/m/Y ')}}</p>
            <div class="panel panel-default">           
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion">Thông tin khách hàng</a>
                    </h4>
                </div>
                <div id="collapse-checkout-confirm"> 
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="text-left">Tên đầy đủ</td>
                                    <td class="text-left">Số điện thoại</td>
                                    <td class="text-left">Địa chỉ giao hàng</td>
                                    <td class="text-right">Ghi chú</td>
                                    <td class="text-right">Trạng thái đơn hàng</td>
                                    @if ($bills[$i]->staff != null)
                                    <td class="text-right">Nhân viên xác nhận</td>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-left">{{$bills[$i]->fullname}}</td>
                                    <td class="text-left">{{$bills[$i]->phone}}</td>
                                    <td class="text-left">{{$bills[$i]->address}}</td>
                                    <td class="text-right">{{$bills[$i]->note}}</td>
                                    <td class="text-right highlight-blue">{{$bills[$i]->status}}</td>
                                    @if ($bills[$i]->staff != null)
                                    <td class="text-right">{{$bills[$i]->staff}}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </div>    
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion">Thông tin đơn hàng</a>
                    </h4>
                </div>
                <div id="collapse-checkout-confirm">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="text-left">Tên sản phẩm</td>
                                    <td class="text-left">Loại sản phẩm</td>
                                    <td class="text-right">Số lượng</td>
                                    <td class="text-right">Đơn giá</td>
                                    <td class="text-right">Thành tiền</td>
                                    
                                </tr>
                            </thead>
                            <tbody>                            
                                @for ($j = 0; $j < count($data[$i]['orders']); $j++)
                                @php
                                    $item = $data[$i]['orders'][$j]
                                @endphp
                                <tr>
                                    <td class="text-left">
                                        <a href="/product/{{$item->id}}">
                                            {{$item->title}}
                                        </a>
                                    </td>
                                    <td class="text-left">{{$item->name}}</td>
                                    <td class="text-right">{{$item->quantity}}</td>
                                    <td class="text-right">${{$item->price}}.00</td>
                                    <td class="text-right">${{$item->quantity * $item->price}}.00</td>
                                </tr>
                                @endfor
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
                                    <td class="text-right" colspan="4"><strong>Tổng tiền:</strong></td>
                                    <td class="text-right highlight-blue">${{$data[$i]['totalPrice']}}.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div> 
            <hr class="horizol-order">
            @endfor
        </div>
    </div>
</div>
<div class="footer-top-cms image-background pro-detail">
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
