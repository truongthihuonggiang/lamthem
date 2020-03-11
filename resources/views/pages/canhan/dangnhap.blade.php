@extends('layouts.master')
@section('content')
<style type="text/css">
#form_css{
	background: #f7f7f7;
}
@media (max-width: 767px){
#form-dangnhap{
    padding: 1em 5em;
}
}
@media (max-width: 568px){
    #form-dangnhap{
    padding: 1em 2em;
}
}
</style>
<div id="container">
<div class="row justify-content-center py-lg-3 px-lg-5 mb-5" id="form-dangnhap">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Đăng Nhập</div>
                    <div class="card-body">
                        <form action="{{route('kiemtradangnhap')}}" method="post">
                            {!! csrf_field() !!}
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
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Lưu mật khẩu
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-info">
                                  <a href="" class="card-link" style="color: #fff;"><i class="fab fa-facebook-f mr-1"></i> Đăng nhập với Facebook</a>
                                </button>
                            </div>
                            </div> -->
                            <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Đăng nhập
                                </button>
                                <a href="{{route('dangky')}}" class="px-3" style="color: #000;">Bạn chưa có tài khoản?</a>
                            </div>
                            
                            </div>
                    </form>
                </div>   
                </div>
            </div>
        </div>
    </div>
<!-- form -->
@endsection