@extends('admin.master')
@section('title', 'Moonstore')
@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách băng rôn</h1>          
	</div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">				
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th scope="col">STT</th>
					  <th scope="col">Tiêu đề</th>
					  <th scope="col">Mô tả</th>
					  <th scope="col">Hình ảnh</th>
					</tr>
				  </thead>
				  <tbody>
					@foreach ($banner as $item)
						<tr>
							<td scope="row">{{$loop->iteration}}</td>
							<td>{{$item->title}}</td>
							<td>{{$item->description}}</td>
							<td>
								<img src="{{asset('image/banner/'.$item->image)}}" width="200px" height="100px">
							</td>
							<td>
								<a 
									class="btn-order" 
									href="/admin-edit-banner/{{$item->id}}">
									Sửa
								</a>
								<a 
									class="btn-order" 
									href="/admin-delete-banner/{{$item->id}}">
									Xóa
								</a>
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