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
        <h1 class="h3 mb-0 text-gray-800">Thêm danh mục</h1>
    </div>
    
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <form action="/admin-save-category" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" class="form-control" name="name" 
                                placeholder="Vui lòng nhập tên danh mục"
                                value="{{old('name')}}">
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
