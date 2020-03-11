
<div class="row"> 
	<div class="col-md-3">
		<div class="row">
			<img src="{{asset('images/grey_user.jpg')}}" class="rounded-circle img-thumbnail" id="hinhanh_tuyendung">
			<input type="file" name="" id="anhtuyendung">
		</div>
		<div class="row my-3">
			<ul class="col-md-12 list-group">
			  <li class="list-group-item">
			  <p>Tên :</p>
			  <p>Địa chỉ : </p>
			  </li>
			  <li class="list-group-item">Thông tin thêm : </li>
			  <li class="list-group-item">
			  	<p>Số điểm :</p>
			  	<p>Số ciệc đã làm : </p>
			  	<p>Mức độ hài lòng : </p>
			  	<p>Số lần tố cáo</p>
			  </li>
			  <li class="list-group-item">Nhận xét :</li>
			</ul>
		</div>
	</div>
	<div class="col-md-9">
  <ul class="nav nav-tabs" style="background: #f7f7f7;">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#danhsachtuyendung">Danh sách tuyển dụng</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" href="#themtintuyendung">Thêm tin tuyển dụng</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#hosotuyendung">Hồ sơ tuyển dụng</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <div id="danhsachtuyendung" class="container tab-pane active"><br>
      
    </div>
  	<!-- Thêm tin tuyển dụng -->
    <div id="themtintuyendung" class="container tab-pane fade"><br>
      <div class="card">
                    <div class="card-header">Thêm Tin Tuyển Dụng</div>
                    <div class="card-body">
                        <form action="{{route('save_dangtintuyendung')}}" method="post">
                        	{!! csrf_field() !!}
                        	<!-- loai viec -->
                        	<div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Loại công việc </label>
                                <div class="col-md-6">
                                    <select class="col-md-12 form-control text-center py-2" name="idloaiviec" id="id_loaiviec">
                                    	@foreach($tb_loaicongviec as $row)
                                    	<option value="{{$row->idloaiviec}}">{{$row->tenloaiviec}}</option>
                                    	@endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- loai viec -->
                            <!-- tieu de -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Tiêu đề </label>
                                <div class="col-md-6">
                                    <input type="text" id="tieu_de" class="form-control" name="tieude" required="" autofocus="">
                                </div>
                            </div>
                            <!-- tieu de -->
                            <!-- so luong tuyen dung -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Số lượng tuyển dụng </label>
                                <div class="col-md-6">
                                    <input type="text" id="soluong_tuyendung" class="form-control" name="soluong" required="" autofocus="">
                                </div>
                            </div>
                            <!-- so luong tuyen dung -->
                            <!-- muc luong -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Mức lương </label>
                                <div class="col-md-6">
                                    <input type="text" id="muc_luong" class="form-control" name="mucluong" required="" autofocus="">
                                </div>
                            </div>
                            <!-- muc luong -->
                            <!-- thoi gian bat dau -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Thời gian bắt đầu </label>
                                <div class="col-md-6">
                                    <input type="datetime-local" id="thoigian_batdau" class="form-control" name="thoigianbatdau" required="" autofocus="" >
                                </div>
                            </div>
                            <!-- thoi gian bat dau -->
                            <!-- thoi gian ket thuc -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Thời gian kết thúc </label>
                                <div class="col-md-6">
                                    <input type="text" id="thoigian_ketthuc" class="form-control" name="thoigianketthuc" required="" autofocus="">
                                </div>
                            </div>
                            <!-- thoi gian ket thuc -->
                            <!-- so nha va duong -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Số nhà và đường </label>
                                <div class="col-md-6">
                                    <input type="text" id="sonha_vaduong" class="form-control" name="sonha" required="" autofocus="">
                                </div>
                            </div>
                            <!-- so nha va duong -->
                            <!-- tinh -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Tỉnh </label>
                                <div class="col-md-6">
                                    <input type="text" id="tentinh" class="form-control" name="tinh" required="" autofocus="">
                                </div>
                            </div>
                            <!-- tinh -->
                            <!-- thanh pho(quan,huyen) -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Thành phố(quận, huyện) </label>
                                <div class="col-md-6">
                                    <input type="text" id="tenthanhpho" class="form-control" name="thanhpho" required="" autofocus="">
                                </div>
                            </div>
                            <!-- thanh pho(quan,huyen) -->
                            <!-- phuong(xa) -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Phường(Xã) </label>
                                <div class="col-md-6">
                                    <input type="text" id="tenphuong" class="form-control" name="phuong" required="" autofocus="">
                                </div>
                            </div>
                            <!-- phuong(xa) -->
                            <!-- hinh anh -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Hình ảnh </label>
                                <div class="col-md-6">
                                    <input type="text" id="hinh_anh" class="form-control" name="hinhanh" required="" autofocus="">
                                </div>
                            </div>
                            <!-- hinh anh -->
                            <!-- mo ta -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Mô tả </label>
                                <div class="col-md-6">
                                    <textarea name="mota" class="form-control"></textarea>
                                </div>
                            </div>
                            <!-- mo ta -->

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Đăng tin
                                </button>
                            </div>
                    </form>
                </div>   
                </div>
    </div>
    <!-- Thêm tin tuyển dụng -->
    <!-- Hồ sơ tìm việc -->
    <!-- Hồ sơ tìm việc -->
    <div id="hosotuyendung" class="container tab-pane fade"><br>
      <div class="card">
                    <div class="card-header">Hồ sơ tuyển dụng</div>
                    <div class="card-body">
                        <form action="{{route('save_dangtintuyendung')}}" method="post">
                        	{!! csrf_field() !!}
                        	<!-- loai viec -->
                        	<!-- Tên đơn vị -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Tên đơn vị</label>
                                <div class="col-md-6">
                                    <input type="text" id="ten_donvi" class="form-control" name="tendonvi" required="" autofocus="">
                                </div>
                            </div>
                            <!-- Tên đơn vị -->
                            <!--Địa chỉ -->
                        	<div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Địa chỉ </label>
                                <div class="col-md-6">
                                    <input type="text" id="diachi_tuyendung" class="form-control" name="diachi" required="" autofocus="">
                                </div>
                            </div>
                            <!-- Địa chỉ -->
                            <!-- Mô tả -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Mô tả </label>
                                <div class="col-md-6">
                                    <textarea name="mota" class="form-control"></textarea>
                                </div>
                            </div>
                            <!-- mô tả -->
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