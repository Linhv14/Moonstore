@extends('admin.master')
@section('title', 'Moonstore')
@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách người dùng</h1>          
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
					
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th scope="col">STT</th>
					  <th scope="col">Tên</th>
					  <th scope="col">Email</th>
					  <th scope="col">Loại tài khoản</th>
					  <th scope="col">Số điện thoại</th>
					  <th scope="col">Địa chỉ</th>
					  <th scope="col">Thành phố</th>
					  <th scope="col">Quốc tịch</th>
                      <th scope="col">Ngày tạo</th>
					</tr>
				  </thead>
				  <tbody>
					@foreach ($data as $item)
						<tr>
							<td scope="row">{{$loop->iteration}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->email}}</td>
							<td>
                                <form action="/admin-update-type-user/{{$item->id}}" 
									method="post" enctype="multipart/form-data">
									@csrf	
									<select id="type_user" name="type_user">
										@if ($item->type_user == "Admin")
											<option class="option_type_user" value="Admin" selected>Quản trị</option>
											<option class="option_type_user" value="Staff">Nhân viên</option>
											<option class="option_type_user" value="Customer">Khách hàng</option>
										@elseif ($item->type_user == "Staff")
											<option class="option_type_user" value="Admin">Quản trị</option>
											<option class="option_type_user" value="Staff" selected>Nhân viên</option>
											<option class="option_type_user" value="Customer">Khách hàng</option>
										@else
										<option class="option_type_user" value="Admin">Quản trị</option>
											<option class="option_type_user" value="Staff">Nhân viên</option>
											<option class="option_type_user" value="Customer" selected>Khách hàng</option>
										@endif
									</select>
									<button class="update_user"><i class="fas fa-sync"></i></button>
								</form>
                            </td>
							<td>{{$item->phone}}</td>
							<td>{{$item->address}}</td>
							<td>{{$item->city}}</td>
							<td>{{$item->country}}</td>
                            <td>{{$item->created_at}}</td>
							<td>
								<a class="btn-order" 
									href="/admin-edit-user/{{$item->id}}">
									Sửa
								</a>
								<a class="btn-order" 
									href="/admin-delete-user/{{$item->id}}">
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