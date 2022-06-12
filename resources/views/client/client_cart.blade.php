@if (Session::has('Cart') != null)
<div class="cart-item">
    <li>
        <table class="table table-striped">
            <tbody>
                @foreach(Session::get('Cart')->products as $item)
                <tr>
                    <td class="text-center"><a href="#"><img class="img-thumbnail"
                                src="{{asset('image/product/'.$item['productInfo']->image)}}"></a>
                    </td>
                    <td class="text-left"><a href="#">
                            <h3>{{$item['productInfo']->title}}</h3>
                        </a></td>
                    <td class="text-right">
                        <h4>${{$item['productInfo']->price}}.00</h4>
                        <h4>x {{$item['quanty']}}</h4>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-danger btn-xs"
                            data-id="{{$item['productInfo']->id}}">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </li>
</div>
<div class="cart-total">
    <li>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="text-right"><strong>Thuế (0%)</strong></td>
                    <td class="text-right">$00.00</td>
                </tr>
                <tr>
                    <td class="text-right"><strong>Tổng tiền</strong></td>
                    <td class="text-right">${{Session::get('Cart')->totalPrice}}.00</td>
                </tr>
            </tbody>
        </table>
    </li>
</div>
@else
<div>
    <h2>
        <center class="empty-cart">Giỏ hàng đang trống, mua ngay!</center>
    </h2>
</div>
<div class="cart-total">
    <li>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="text-right"><strong>Thuế (0%)</strong></td>
                    <td class="text-right">$00.00</td>
                </tr>
                <tr>
                    <td class="text-right"><strong>Tổng tiền</strong></td>
                    <td class="text-right">$0.00</td>
                </tr>
            </tbody>
        </table>
    </li>
</div>
@endif
