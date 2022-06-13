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
        <h1 class="h3 mb-0 text-gray-800">Thêm sản phẩm</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <form action="/admin-save-product" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="txtTitle" placeholder="Vui lòng nhập tên sản phẩm"
                                value="{{old('txtTitle')}}">
                        </div>
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <select id="type_user" name="category" class="ml-2">
                                @foreach($category as $item)
									<option class="option_category" value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
							</select>
                        </div>
                        <div class="form-group">
                            <label>Thương hiệu</label>
                            <input type="text" class="form-control" 
                                name="txtBrand" 
                                placeholder="Vui lòng nhập thương hiệu"
                                value="{{old('txtBrand')}}">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input type="text" class="form-control" 
                                name="txtDescription"
                                placeholder="Vui lòng nhập mô tả" 
                                value="{{old('txtDescription')}}"
                            >
                        </div>
                        <label>Giá</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" class="form-control" name="txtPrice" placeholder="Vui lòng nhập giá"
                                value="{{old('txtPrice')}}">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Chèn hình ảnh</label>
                            <input type="file" class="form-control-file" name="fileImg">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
