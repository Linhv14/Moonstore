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
        <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa người dùng</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <form action="/admin-update-user/{{$data->id}}" 
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control" name="name" 
                                placeholder="Vui lòng nhập tên"
                                value="{{old('name',$data->name)}}">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" 
                                placeholder="Vui lòng nhập số điện thoại"
                                value="{{old('phone',$data->phone)}}">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address" 
                                placeholder="Vui lòng nhập địa chỉ"
                                value="{{old('address',$data->address)}}">
                        </div>
                        <div class="form-group">
                            <label>Thành phố</label>
                            <input type="text" class="form-control" name="city" 
                                placeholder="Vui lòng nhập thành phố"
                                value="{{old('city',$data->city)}}">
                        </div>
                        <div class="form-group">
                            <label>Quốc tịch</label>
                            <input type="text" class="form-control" name="country"  
                                placeholder="Vui lòng nhập quốc tịch"
                                value="{{old('country',$data->country)}}">
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
