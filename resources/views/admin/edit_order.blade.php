@extends('admin.master')
@section('title', 'Moonstore')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <h6>{{ $error }}</h6>
        @endforeach
    </div>
@endif

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa đơn hàng</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <form action="{{route('route.admin.update_order',['id' => $bill->bill_id])}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên khách hàng</label>
                            <input type="text" class="form-control" name="fullname" placeholder="Vui lòng nhập tên khách hàng"
                                value="{{old('fullname',$bill->fullname)}}">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" placeholder="Vui lòng nhập số điện thoại"
                                value="{{old('phone',$bill->phone)}}">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ giao hàng</label>
                            <input type="text" class="form-control" name="address"
                                placeholder="Vui lòng nhập địa chỉ giap hàng"
                                value="{{old('address',$bill->address)}}">
                        </div>
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <input type="text" class="form-control" name="note" placeholder="Thêm ghi chú"
                                value="{{old('note',$bill->note)}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
