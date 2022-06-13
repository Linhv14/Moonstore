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
                <td class="cart-pic first-row"><img src="{{asset('image/product/'.$item['productInfo']->image)}}"
                        width="100x" alt=""></td>
                <td class="cart-title first-row">
                    <h3>{{$item['productInfo']->title}}</h3>
                </td>
                <td class="p-price first-row">${{$item['productInfo']->price}}.00</td>
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
                    <i class="fas fa-sync" onclick="updateCartItem({{$item['productInfo']->id}})"></i>
                </td>
                <td class="close-td first-row">
                    <i class="fas fa-times" onclick="deleteCart({{$item['productInfo']->id}})"></i>
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
                <li class="subtotal">Tổng số lượng <span>{{Session::get('Cart')->totalQuanty}}</span></li>
                <li class="subtotal">Thuế(0%) <span>$0.00</span></li>
                <li class="cart-total">Tổng giá <span>${{Session::get('Cart')->totalPrice}}.00</span></li>
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
<script type="text/javascript" src="{{asset('client-style/javascript/main.js')}}"></script>
