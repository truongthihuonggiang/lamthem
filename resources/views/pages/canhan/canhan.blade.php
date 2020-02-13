@extends('layouts.master')
@section('content')
<!-- plans -->
<style type="text/css">
.serve-grid{
	border-radius: 5%;
	padding: 2%;
}
</style>
    <section class="banner-bottom-wthree py-3">
        <div class="container">
            <div class="inner-sec-w3ls py-3">
                <div class="row">
                    <div class="serve-grid col-md-4 col-sm-6 mt-lg-5 text-center">
                    	<a href="">
                        <i class="fas fa-address-card"></i>
                        <h4 class="my-lg-4 my-3">Ho so tim viec</h4>
                    	</a>
                    </div>
                    <div class="serve-grid col-md-4 col-sm-6 mt-lg-5 text-center">
                        <i class="far fa-address-book"></i>
                        <h4 class="my-lg-4 my-3">Danh sach viec</h4>
                    </div>
                    <div class="serve-grid col-md-4 col-sm-6 mt-lg-5 text-center">
                        <i class="fas fa-plus"></i>
                        <h4 class="my-lg-4 my-3">Them tin tuyen dung</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="serve-grid col-md-4 col-sm-6 mt-lg-5 text-center">
                        <i class="far fa-list-alt"></i>
                        <h4 class="my-lg-4 my-3">Tuyen dung</h4>
                    </div>
                    <div class="serve-grid col-md-4 col-sm-6 mt-lg-5 text-center">
                        <i class="fas fa-users"></i>
                        <h4 class="my-lg-4 my-3">Nhom</h4>
                    </div>
                    <div class="serve-grid col-md-4 col-sm-6 mt-lg-5 text-center">
                        <i class="far fa-money-bill-alt"></i>
                        <h4 class="my-lg-4 my-3">Loi nhuan</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //plans -->
@endsection
