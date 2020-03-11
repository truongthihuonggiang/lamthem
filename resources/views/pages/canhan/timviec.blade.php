@if(isset($chitiettimviec))
@foreach($chitiettimviec as $row)
<div class="row"> 
	<div class="col-md-3">
		<div class="row">
			<img src="{{asset('images/grey_user.jpg')}}" class="rounded-circle img-thumbnail">
			<input type="file" name="">
		</div>
		<div class="row my-3">
			<ul class="col-md-12 list-group">
					<li class="list-group-item">
				  	<p>Tên : {{$row->ten}}</p>
				  	<p>Giới tính : @if($row->gioitinh>0) Nam @else Nữ @endif</p>
				  	</li>
			  <li class="list-group-item">
			  <p>Học vấn : {{$row->hocvan}}</p>
			  <p>Ngoại ngữ : {{$row->ngoaingu}}</p>
			  <p>Việc làm hiện tại : {{$row->congviechientai}}</p>
			  </li>
			  <li class="list-group-item">Thông tin thêm : {{$row->mota}}</li>
			  <li class="list-group-item">
			  	<p>Số điểm : {{$row->diem}}</p>
			  	<p>Số việc đã làm : {{$row->soviecxong}}</p>
			  	<p>Mức độ hài lòng : {{$row->soviechailong}}</p>
			  	<p>Số lần tố cáo : {{$row->soviectocao}}</p>
			  </li>
			  <li class="list-group-item">Nhận xét :</li>
			</ul>
		</div>
	</div>
	<div class="col-md-9">
  <ul class="nav nav-tabs" style="background: #f7f7f7;">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#dangkyviec">Danh sách đăng ký việc</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#hosotimviec">Hồ sơ tìm việc</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#caidat">Cài đặt</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
  	<!-- DS đăng ký việc -->
    <div id="dangkyviec" class="container tab-pane active"><br>
    	dang ký việc
    </div>
    <!--  DS đăng ký việc -->
    <!-- Hồ sơ tìm việc -->
    <div id="hosotimviec" class="container tab-pane fade"><br>
      <div class="card">
                    <div class="card-header">Hồ sơ tìm việc</div>
                    <div class="card-body">
                        <form action="{{route('save_dangtintuyendung')}}" method="post">
                        	{!! csrf_field() !!}
                        	<!-- loai viec -->
                        	<!-- Trình độ học vấn -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Trình độ học vấn </label>
                                <div class="col-md-6">
                                    <input type="text" id="trinhdo_hocvan" class="form-control" name="trinhdohocvan" required="" autofocus="" value="{{$row->hocvan}}">
                                </div>
                            </div>
                            <!-- Trình độ học vấn -->
                            <!-- Trình độ ngoại ngữ -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Trình độ ngoại ngữ </label>
                                <div class="col-md-6">
                                    <input type="text" id="trinhdo_ngoaingu" class="form-control" name="trinhdongoaingu" required="" autofocus="" value="{{$row->ngoaingu}}">
                                </div>
                            </div>
                            <!-- Trình độ ngoại ngữ -->
                            <!-- Công việc hiện tại -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Công việc hiện tại </label>
                                <div class="col-md-6">
                                    <input type="text" id="congviec_hientai" class="form-control" name="congviechientai" required="" autofocus="" value="{{$row->congviechientai}}">
                                </div>
                            </div>
                            <!--Địa chỉ -->
                        	<div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Địa chỉ </label>
                                <div class="col-md-6">
                                    <input type="text" id="dia_chi" class="form-control" name="diachi" required="" autofocus="" value="{{$row->diachi}}">
                                </div>
                            </div>
                            <!-- Địa chỉ -->
                            <!-- Thông tin khác -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Thông tin khác </label>
                                <div class="col-md-6">
                                    <textarea name="thongtinkhac" class="form-control">{{$row->mota}}</textarea>
                                </div>
                            </div>
                            <!-- Thông tin khác -->
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Đồng ý
                                </button>
                            </div>
                    </form>
                </div>   
                </div>
    </div>
    <!-- Hồ sơ tìm việc -->
    <div id="caidat" class="container tab-pane fade"><br>
    	<div class="card">
            <div class="card-header">Cài đặt</div>
            <div class="card-body">
                    <form action="{{route('save_dangtintuyendung')}}" method="post">
                        	{!! csrf_field() !!}
                        	<!-- loai viec -->
                        	<!-- Tên đơn vị -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Mật khẩu cũ</label>
                                <div class="col-md-6">
                                    <input type="text" id="matkhau_cu" class="form-control" name="matkhaucu" required="" autofocus="">
                                </div>
                            </div>
                            <!-- Tên đơn vị -->
                            <!--Địa chỉ -->
                        	<div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Mật khẩu mới </label>
                                <div class="col-md-6">
                                    <input type="text" id="matkhau_moi" class="form-control" name="matkhaumoi" required="" autofocus="">
                                </div>
                            </div>
                            <!-- Địa chỉ -->
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Đồng ý
                                </button>
                            </div>
                    </form>
            </div>   
        </div>
    </div>
  </div>
  </div>
  </div>
 @endforeach
 @endif