@extends('layouts.master')
@section('content')
<style type="text/css">

</style>
<section class="banner-bottom-wthree pb-lg-5 pb-md-4 pb-3">
    <div class="container">
        <div class="inner-sec-w3ls py-3">
            <div class="main_grid_contact emp-single-page mt-5">
            	<h4 class="mb-4 text-left">Đăng ký thành viên</h4>
				<form action="/action_page.php" class="col-md-6">
				  <div class="form-group">
				    <label for="email">Họ Lót :</label>
				    <input type="text" class="form-control" placeholder="Enter email" required="" style="padding: 0.375rem 0.75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: 0.25rem;">
				  </div>
				  <div class="form-group">
				    <label for="email">Tên:</label>
				    <input type="text" class="form-control" placeholder="Enter email" required="" style="padding: 0.375rem 0.75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: 0.25rem;">
				  </div>
				  <div class="form-group">
				    <label for="email">Email:</label>
				    <input id="validationDefault01" type="email" class="form-control" placeholder="Enter email" required="" style="padding: 0.375rem 0.75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: 0.25rem;">
				  </div>
				  <div class="form-group">
				    <label for="email">Mật khẩu :</label>
				    <input type="password" class="form-control" placeholder="Enter email" required="">
				  </div>
				  <div class="form-group">
				    <label for="pwd">Xác nhận mật khẩu :</label>
				    <input type="password" class="form-control" placeholder="Enter password" required="">
				  </div>
				  <button type="submit" class="btn btn-primary">Đăng ký</button>
				</form>
			</div>
		</div>
	</div>
</section>

@endsection