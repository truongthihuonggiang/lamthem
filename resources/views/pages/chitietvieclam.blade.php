@extends('layouts.master')
@section('content')
<style type="text/css">
.qual-icon i{
	color: #F39C12;
}
.qual-icon span,
.qual-icon i{
	font-size: 1.5em;
}
.emply-resume-info h4 a{
	color: #145A32;
}
</style>
<?php
if (isset($tb_vieclam)) {
	foreach ($tb_vieclam as $row) {
		
	?>

<section class="banner-bottom-wthree py-lg-5 py-md-5 py-3">
        <div class="container">
		<!---728x90--->
            <div class="inner-sec-w3ls">
                <div class="single-user-candidate">
                    <div class="user-detail-info">
                        <div class="user-content-info emply-resume-info mt-4">
                            <h4>
                                <a href="#">{{$row->tenvieclam}}</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <!--row -->
                <div class="row qualification-details mt-2">
                    <div class="col-md-12 qual-grid mt-2">
                        <div class=" col-md-3 qual-icon">
                            <i class="fas fa-eye"></i><span class="ml-2">Luong theo gio</span>
                        </div>
                        <div class="qual-info">
                            <h4>Viewed</h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 qual-grid mt-2">
                        <div class="col-md-3 qual-icon">
                            <i class="far fa-file-alt"></i>
                        </div>
                        <div class="qual-info">
                            <h4>Posted Jobs</h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 qual-grid mt-2">
                        <div class="col-md-3 qual-icon ">
                            <i class="fas fa-bars"></i>
                        </div>
                        <div class="qual-info">
                            <h4>Categories</h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 qual-grid mt-2">
                        <div class="col-md-3 qual-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="qual-info">
                            <h4>Team Size</h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 qual-grid mt-2">
                        <div class="col-md-3 qual-icon">
                        <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="qual-info">
                            <h4>Team Size</h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!--row -->
				<!---728x90--->
                <!--/about -->
                <div class="candidate-ab-info mt-5">
                    <h5 class="j-b mb-3">Mo ta cong viec</h5>
                    <p>{{$row->mota}}</p>
                </div>
                <!--// about -->
				<!---728x90--->
                <!--/history -->
                <div class="candidate-history-info mt-5">
                    <h5 class="j-b mb-5">Jobs from Business Network</h5>
                    <div class="candidate-story-grid">

                        <!--/job1-->

                        <div class="job-post-main row">
                            <div class="col-md-9 job-post-info text-left">
                                <div class="job-post-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="job-single-sec">
                                    <h4>
                                        <a href="#">User Interface Project Manager</a>
                                    </h4>
                                    <p class="my-2">Technology Management Consulting</p>
                                    <ul class="job-list-info d-flex">
                                        <li>
                                            <i class="fas fa-briefcase"></i> Comera</li>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> California</li>
                                        <li>
                                            <i class="fas fa-dollar-sign"></i> 300000 - 500000 / Annum</li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-3 job-single-time text-right">
                                <span class="job-time">
                                    <i class="far fa-heart"></i> Full Time</span>
                                <a href="#" class="aply-btn ">Appy Now</a>
                            </div>
                        </div>
                        <!--//job1-->
                        <!--/job2-->

                        <div class="job-post-main row my-3">
                            <div class="col-md-9 job-post-info text-left">
                                <div class="job-post-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="job-single-sec">
                                    <h4>
                                        <a href="#">
                                            Regional Sales Manager</a>
                                    </h4>
                                    <p class="my-2">Company Name goes here</p>
                                    <ul class="job-list-info d-flex">
                                        <li>
                                            <i class="fas fa-briefcase"></i> Comera</li>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> California</li>
                                        <li>
                                            <i class="fas fa-dollar-sign"></i> 300000 - 500000 / Annum</li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-3 job-single-time text-right">
                                <span class="job-time">
                                    <i class="far fa-heart"></i> Part Time</span>
                                <a href="#" class="aply-btn ">Appy Now</a>
                            </div>
                        </div>
                        <!--//job2-->
                        <!--/job3-->

                        <div class="job-post-main row">
                            <div class="col-md-9 job-post-info text-left">
                                <div class="job-post-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="job-single-sec">
                                    <h4>
                                        <a href="#">
                                            Web Designer / Developer</a>
                                    </h4>
                                    <p class="my-2">Company Name goes here</p>
                                    <ul class="job-list-info d-flex">
                                        <li>
                                            <i class="fas fa-briefcase"></i> Chicago</li>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> California</li>
                                        <li>
                                            <i class="fas fa-dollar-sign"></i> 300000 - 500000 / Annum</li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-3 job-single-time text-right">
                                <span class="job-time">
                                    <i class="far fa-heart"></i> Full Time</span>
                                <a href="#" class="aply-btn ">Appy Now</a>
                            </div>
                        </div>
                        <!--//job3-->
                        <!--/job4-->

                        <div class="job-post-main row mt-3">
                            <div class="col-md-9 job-post-info text-left">
                                <div class="job-post-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="job-single-sec">
                                    <h4>
                                        <a href="#">
                                            Marketing Director</a>
                                    </h4>
                                    <p class="my-2">Technology Management Consulting</p>
                                    <ul class="job-list-info d-flex">
                                        <li>
                                            <i class="fas fa-briefcase"></i> Rennes</li>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> France</li>
                                        <li>
                                            <i class="fas fa-dollar-sign"></i> 300000 - 500000 / Annum</li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-3 job-single-time text-right">
                                <span class="job-time">
                                    <i class="far fa-heart"></i> Full Time</span>
                                <a href="#" class="aply-btn ">Appy Now</a>
                            </div>
                        </div>
                        <!--//job4-->
                        <!--/job1-->

                        <div class="job-post-main row mt-3">
                            <div class="col-md-9 job-post-info text-left">
                                <div class="job-post-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="job-single-sec">
                                    <h4>
                                        <a href="#">Developer for Site Maintenance </a>
                                    </h4>
                                    <p class="my-2">Company nName gose here</p>
                                    <ul class="job-list-info d-flex">
                                        <li>
                                            <i class="fas fa-briefcase"></i> Comera</li>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> California</li>
                                        <li>
                                            <i class="fas fa-dollar-sign"></i> 300000 - 500000 / Annum</li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-3 job-single-time text-right">
                                <span class="job-time">
                                    <i class="far fa-heart"></i> Part Time</span>
                                <a href="#" class="aply-btn ">Appy Now</a>
                            </div>
                        </div>
                        <!--//job1-->
                        <!--/job2-->

                        <div class="job-post-main row my-3">
                            <div class="col-md-9 job-post-info text-left">
                                <div class="job-post-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="job-single-sec">
                                    <h4>
                                        <a href="#">
                                            Content Writer and Speaker</a>
                                    </h4>
                                    <p class="my-2">Company Name goes here</p>
                                    <ul class="job-list-info d-flex">
                                        <li>
                                            <i class="fas fa-briefcase"></i> Comera</li>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> California</li>
                                        <li>
                                            <i class="fas fa-dollar-sign"></i> 200000 - 100000 / Annum</li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-3 job-single-time text-right">
                                <span class="job-time">
                                    <i class="far fa-heart"></i> Part Time</span>
                                <a href="#" class="aply-btn ">Appy Now</a>
                            </div>
                        </div>
                        <!--//job2-->
                        <!--/job3-->

                        <div class="job-post-main row">
                            <div class="col-md-9 job-post-info text-left">
                                <div class="job-post-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="job-single-sec">
                                    <h4>
                                        <a href="#">
                                            Web Designer / Developer</a>
                                    </h4>
                                    <p class="my-2">Company Name goes here</p>
                                    <ul class="job-list-info d-flex">
                                        <li>
                                            <i class="fas fa-briefcase"></i> Chicago</li>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> California</li>
                                        <li>
                                            <i class="fas fa-dollar-sign"></i> 300000 - 500000 / Annum</li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-3 job-single-time text-right">
                                <span class="job-time">
                                    <i class="far fa-heart"></i> Full Time</span>
                                <a href="#" class="aply-btn ">Appy Now</a>
                            </div>
                        </div>
                        <!--//job3-->
                        <!--/job4-->

                        <div class="job-post-main row mt-3">
                            <div class="col-md-9 job-post-info text-left">
                                <div class="job-post-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="job-single-sec">
                                    <h4>
                                        <a href="#">
                                            Marketing Director</a>
                                    </h4>
                                    <p class="my-2">Technology Management Consulting</p>
                                    <ul class="job-list-info d-flex">
                                        <li>
                                            <i class="fas fa-briefcase"></i> Rennes</li>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> France</li>
                                        <li>
                                            <i class="fas fa-dollar-sign"></i> 300000 - 500000 / Annum</li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-3 job-single-time text-right">
                                <span class="job-time">
                                    <i class="far fa-heart"></i> Full Time</span>
                                <a href="#" class="aply-btn ">Appy Now</a>
                            </div>
                        </div>
                        <!--//job4-->
                    </div>
                    <!---//network-->
                </div>
                <div class="main_grid_contact emp-single-page mt-5">
                    <div class="form emp-single">
                        <h4 class="mb-4 text-left">Contact Business Network</h4>
                        <form action="#" method="post" class="row">
                            <div class="col-lg-6 emp-single-line">
                                <div class="form-group">
                                    <label class="my-2">Name</label>
                                    <input class="form-control" type="text" name="Name" placeholder="" required="">
                                </div>
                                <div class="form-group">
                                    <label class="my-2">Phone Number</label>
                                    <input class="form-control" type="text" name="Phone" placeholder="" required="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="Email" placeholder="" required="">
                                </div>

                            </div>
                            <div class="col-lg-6 emp-single-line">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea id="textarea" placeholder=""></textarea>
                                </div>
                                <div class="input-group1">
                                    <input class="form-control" type="submit" value="Submit Mail">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
<?php
	}
}
?>
@endsection