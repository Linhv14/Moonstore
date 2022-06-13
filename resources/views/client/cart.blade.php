@extends('client.master')
@section('title', 'Moonstore')
@section('content')

<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" id="list-cart">
                <div id="delete-item-cart">
                    @if (Session::has('Cart') != null)
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th class="p-name">Tên sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th>Cập nhật</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Session::get('Cart')->products as $item)
                                <tr>
                                    <td class="cart-pic first-row"><img
                                            src="{{asset('image/product/'.$item['productInfo']->image)}}" width="100x"
                                            alt=""></td>
                                    <td class="cart-title first-row">
                                        <h3>{{$item['productInfo']->title}}</h3>
                                    </td>
                                    <td class="p-price first-row">${{$item['productInfo']->price}}.00
                                    </td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input id="quanty-item-{{$item['productInfo']->id}}" type="text"
                                                    value="{{$item['quanty']}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">${{$item['price']}}.00</td>
                                    <td class="close-td first-row">
                                        <i class="fas fa-sync"
                                            onclick="updateCartItem({{$item['productInfo']->id}})"></i>
                                    </td>
                                    <td class="close-td first-row">
                                        <i class="fas fa-times"
                                            onclick="deleteCart({{$item['productInfo']->id}})"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-8 pull-left">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Tông số lượng <span>{{Session::get('Cart')->totalQuanty}}</span>
                                    </li>
                                    <li class="subtotal">Thuế(0%) <span>$0.00</span></li>
                                    <li class="cart-total">Tổng giá
                                        <span>${{Session::get('Cart')->totalPrice}}.00</span></li>
                                </ul>
                                <a href="/checkout" class="proceed-btn">Xử lý đơn hàng</a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="empty-cart">
                        <center class="empty-cart wrap">
                            <h2>Giỏ hàng trống</h2>
                            <div class="shopping-now">
                                <a href="/">Mua ngay!</a>
                            </div>
                        </center>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<div class="footer-top-cms parallax-container image-background-custom">
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

<div class="container">
    <div class="row">
        <div class="content col-sm-12">
        <div class="customtab">
            <h3 class="productblock-title">Sản phẩm nổi bật</h3>
            <h4 class="title-subline">Có gì đặc biệt? Khám phá ngay</h4>
            </div>
            <div id="" class="tab-content">
                <div id="special-slidertab" class="row owl-carousel product-slider">
                    @foreach ($product as $item)
                    <div class="item">
                        <div class="product-thumb list">
                            <div class="image product-imageblock"> <a href="#"> <img
                                        src="{{asset('image/product/'.$item->image)}}"
                                        class="img-responsive"/> <img
                                        src="{{asset('image/product/'.$item->image)}}"
                                        class="img-responsive"/> </a>
                                <ul class="button-group">
                                    <li>
                                        <button type="button" class="addtocart-btn">
                                            <a href="/product/{{$item->id}}">Xem chi tiết</a>
                                        </button>
                                        <button type="button" class="addtocart-btn" onclick="addCart({{$item->id}})">
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
        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('client-style/javascript/main.js')}}"></script>

@endsection
