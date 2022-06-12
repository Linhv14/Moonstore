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
        <h1 class="h3 mb-0 text-gray-800">Thêm bài viết</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <form action="{{route('route.admin.save_post')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" class="form-control" name="txtTitle" placeholder="Vui lòng nhập tiêu đề"
                                value="{{old('txtTitle')}}">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input type="text" class="form-control" name="txtDescription"
                                placeholder="Vui lòng nhập mô tả" value="{{old('txtDescription')}}">
                        </div>
                        <div class="form-group">
                            <label>Tác giả</label>
                            <input type="text" class="form-control" name="txtAuthor" placeholder="Vui lòng nhập tác giả"
                                value="{{old('txtAuthor')}}">
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <input class="form-control" name="txtContent" placeholder="Vui lòng nhập nội dung"
                                value="{{old('txtContent')}}">
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
