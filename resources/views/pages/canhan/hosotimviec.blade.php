@extends('layouts.master')
@section('content')
<style type="text/css">
#form_css{
	background: #f7f7f7;
}
#id_loaiviec{

}
</style>
<div id="container">
<div class="row justify-content-center mb-5">
            <div class="col-md-8">
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
                                    <input type="text" id="trinhdo_hocvan" class="form-control" name="trinhdohocvan" required="" autofocus="">
                                </div>
                            </div>
                            <!-- Trình độ học vấn -->
                            <!-- Trình độ ngoại ngữ -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Trình độ ngoại ngữ </label>
                                <div class="col-md-6">
                                    <input type="text" id="trinhdo_ngoaingu" class="form-control" name="trinhdongoaingu" required="" autofocus="">
                                </div>
                            </div>
                            <!-- Trình độ ngoại ngữ -->
                            <!-- Công việc hiện tại -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Công việc hiện tại </label>
                                <div class="col-md-6">
                                    <input type="text" id="congviec_hientai" class="form-control" name="congviechientai" required="" autofocus="">
                                </div>
                            </div>
                            <!--Địa chỉ -->
                        	<div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Địa chỉ </label>
                                <div class="col-md-6">
                                    <input type="text" id="dia_chi" class="form-control" name="diachi" required="" autofocus="">
                                </div>
                            </div>
                            <!-- Địa chỉ -->
                            <!-- Thông tin khác -->
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Thông tin khác </label>
                                <div class="col-md-6">
                                    <textarea name="thongtinkhac" class="form-control"></textarea>
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
        </div>
    </div>
<!-- form -->
@endsection