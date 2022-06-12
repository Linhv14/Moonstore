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
        <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa băng rôn</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <form action="{{route('route.admin.update_banner',['id' => $data->id])}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" class="form-control" name="txtTitle" placeholder="Vui lòng nhập tiêu đề"
                                value="{{old('txtTitle',$data->title)}}">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input type="text" class="form-control" name="txtDescription"
                                placeholder="Vui lòng nhập mô tả"
                                value="{{old('txtDescription',$data->description)}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Chèn hình ảnh</label>
                            <input type="file" class="form-control-file" name="fileImg">
                            <img class="mt-3" src="{{asset('image/banner/'.$data->image)}}" width="200px" height="100px">
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
