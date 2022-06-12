@extends('admin.master')
@section('title', 'Moonstore')
@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách sản phẩm</h1>   
    </div>
    <div class="row"> 
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">	
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th scope="col">STT</th>
					  <th scope="col" class="custom-col-16">Tên sản phẩm</th>
					  <th scope="col" class="custom-col-16">Loại sản phẩm</th>
					  <th scope="col"  class="custom-col-12">Thương hiệu</th>
					  <th scope="col">Hình ảnh</th>
					  <th scope="col">Giá</th>
					</tr>
				  </thead>
				  <tbody>
					@foreach ($product as $item)
						<tr>
							<td scope="row">{{$loop->iteration}}</td>
							<td>{{$item->title}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->brand}}</td>
							<td>
								<img src="{{asset('image/product/'.$item->image)}}" width="100px" height="100px">
							</td>
							<td>${{$item->price}}.00</td>
							<td>
								<a class="btn-order" href="{{route('route.admin.edit_product',['id' => $item->id])}}">Sửa</a>
								<a class="btn-order" href="{{route('route.admin.delete_product',['id' => $item->id])}}">Xóa</a>
							</td>
						</tr>
					@endforeach
				  </tbody>
				</table>	
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection