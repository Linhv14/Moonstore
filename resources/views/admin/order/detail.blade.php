@extends('admin.master')
@section('title', 'Moonstore')
@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách chi tiết đơn hàng</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Loại sản phẩm</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td>
                                    <img src="{{asset('image/product/'.$item->image)}}" width="100px" height="100px">
                                </td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->name}}</td>
                                <td>${{$item->price}}.00</td>
                                <td>{{$item->quantity}}</td>
                                <td>${{$item->quantity * $item->price}}.00</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <table>    
                        <tr>
                            <td class="total-detail-order"><strong>Thuế:</strong></td>
                            <td>$0.00</td>
                        </tr>            
                        <tr>
                            <td class="total-detail-order"><strong>Phí vận chuyển:</strong></td>
                            <td>$0.00</td>
                        </tr>                 
                        <tr>
                            <td class="total-detail-order"><strong>Tổng tiền:</strong></td>
                            <td class="highlight-blue">${{$totalPrice}}.00</td>
                        </tr>                 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
