@extends('layouts.master')
@section('content')
<style type="text/css">

</style>
<section class="banner-bottom-wthree pb-lg-5 pb-md-4 pb-3">
    <div id="container">
<div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Đăng Nhập</div>
                    <div class="card-body">
                        <form action="{{route('dangky_nguoidung')}}" method="post" id="dangky_nguoidung">
                            {!! csrf_field() !!}
                        	<div class="form-group row">
                        	<div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-info">
                                  <a href="" class="card-link" style="color: #fff;"><i class="fab fa-facebook-f mr-1"></i> Đăng nhập với Facebook</a>
                                </button>
                                <button type="button" class="btn btn-danger">
                                    <a href="" class="card-link" style="color: #fff;"><i class="fab fa-google-plus-g mr-1"></i>Đăng nhập với Google</a>
                                </button>
                            </div>
                        	</div>
                            @if(session('error'))
                            <div class="form-group row">
                                <div class="mx-auto col-md-8 alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Cảnh báo!</strong> {{session('error')}}.
                            </div>
                            </div>
                            
                            @endif
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail </label>
                                <div class="col-md-6">
                                    <input type="email" id="email_address" class="form-control" name="email" required="" autofocus="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="matkhau" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="re_password" class="col-md-4 col-form-label text-md-right" onfocus="focus();">Xác nhận mật khẩu</label>
                                <div class="col-md-6">
                                    <input type="password" id="re_password" class="form-control" name="re_matkhau" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="holot_nguoidung" class="col-md-4 col-form-label text-md-right">Họ tên</label>
                                <div class="col-md-6">
                                    <input type="text" id="holot_nguoidung" class="form-control" name="ten" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="holot_nguoidung" class="col-md-4 col-form-label text-md-right">Ngày sinh</label>
                                <div class="col-md-6">
                                    <input type="date" id="ngay_sinh" class="form-control" name="ngaysinh" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ten_nguoidung" class="col-md-4 col-form-label text-md-right">Giới tính</label>
                                <div class="col-md-6">
                                    <select name="gioitinh" class="form-control">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dienthoai_nguoidung" class="col-md-4 col-form-label text-md-right">Điện thoại</label>
                                <div class="col-md-6">
                                    <input type="tel" id="dienthoai_nguoidung" class="form-control" name="dienthoai" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                        	<div class="col-md-6 offset-md-4">
                                <p class="alert alert-danger" id="error">Vui lòng điền đầy đủ thông tin</p>
                        		<button type="submit" class="btn btn-primary" onclick="check_dangky(); return false;">
                                    Đăng ký
                                </button>
                            </div>
                        	</div>
                            
                    </form>
                </div>   
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function check_dangky(){
        var email=document.getElementById("email_address").value;
        var namemail = /^[0-9A-Za-z]+[0-9A-Za-z_]*@[\w\d.]+.\w{2,4}$/;
        var kq=namemail.test(email);
        if(kq == false){
            document.getElementById("user").focus();
            error.innerHTML="Sai dạng Email!";
            return false;
        }
        var matkhau = document.getElementById('password');
        if (matkhau.value=="" || matkhau.value.length < 8) {
            document.getElementById('password').focus();
            error.innerHTML="Mật khẩu không được để trống và phải có từ 8 ký tự";
            return false;
        }
        var re_matkhau = document.getElementById('re_password');
        if (matkhau.value!=re_matkhau.value) {
            document.getElementById('re_password').focus();
            error.innerHTML="Xác nhận mật khẩu không khớp";
            return false;
        }
        var holot_nguoidung=document.getElementById("holot_nguoidung").value;
        if(holot_nguoidung == ""){
            document.getElementById("holot_nguoidung").focus();
            error.innerHTML="Họ tên không được để trống";
            return false;
        }
        var ngay_sinh = document.getElementById('ngay_sinh');
        if (ngay_sinh.value=="" || ngay_sinh.value.length != 10) {
            document.getElementById('ngay_sinh').focus();
            error.innerHTML="Ngày sinh không phù hợp";
            return false;
        }
        var dienthoai_nguoidung = document.getElementById('dienthoai_nguoidung');
        if (dienthoai_nguoidung.value=="" || dienthoai_nguoidung.value.length < 10 || dienthoai_nguoidung.value[0] != '0') {
            document.getElementById('dienthoai_nguoidung').focus();
            error.innerHTML="Số điện thoại không hợp lệ";
            return false;
        }
        document.getElementById('dangky_nguoidung').submit();


    }
</script>
@endsection