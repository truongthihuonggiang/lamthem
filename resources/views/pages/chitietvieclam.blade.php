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
.qual-info h4{
	line-height: 2em;
}
.emply-resume-info h4 a{
	color: #145A32;
	font-size: 2em;
}
.qual-info{
	border-bottom: 1px solid grey;
}
.qual-info h4 a{
	color: #145A32;
}
.qual-info h4 a:hover{
	color: #F39C12;
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
                        <div class=" col-md-4 qual-icon">
                            <i class="far fa-building"></i><span class="col-md-3 ml-2">Người tuyển</span>
                        </div>
                        <div class="qual-info">
                            <h4><a href="">
                            <?php
                            	if (isset($tb_oc_nguoidung)) {
                            		foreach ($tb_oc_nguoidung as $row1) {
                            			if ($row1->idnguoidung==$row->idtacgia) {
                            				echo $row1->ten;
                            			}
                            		}
                            	}
                            	else
                            	{
                            		echo "Không có thông tin";
                            	}
                            ?>	
                            </a></h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 qual-grid mt-2">
                        <div class="col-md-4 qual-icon">
                            <i class="far fa-file-alt"></i><span class="col-md-3 ml-2">Mô tả </span>
                        </div>
                        <div class="qual-info">
                            <h4>
                                @if(!empty($row->mota))
                                    {{$row->mota}}
                                @else
                                    Không có thông tin
                                @endif
                            </h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 qual-grid mt-2">
                        <div class="col-md-4 qual-icon ">
                            <i class="fas fa-dollar-sign"></i><span class="col-md-3 ml-2">Lương trọn gói </span>
                        </div>
                        <div class="qual-info">
                            <h4>
                                @if(!empty($row->luongtrongoi))
                                    {{$row->luongtrongoi}}
                                @else
                                    Không có thông tin
                                @endif
                            </h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                     <div class="col-md-12 qual-grid mt-2">
                        <div class="col-md-4 qual-icon">
                        <i class="fas fa-map-marker-alt"></i><span class="col-md-3 ml-2">Địa điểm </span>
                        </div>
                        <div class="qual-info">
                            <h4>
                                @if(!empty($row->tinh))
                                    {{$row->phuongxa.' '.$row->thanhpho.', '.$row->tinh}}
                                @else
                                    Không có thông tin
                                @endif
                            </h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 qual-grid mt-2" style="border-bottom: none;">
                        <div class="col-md-4 qual-icon">
                            <i class="far fa-clock"></i><span class="col-md-3 ml-2">Thời gian tuyển dụng</span>
                        </div>
                        <div class="qual-info" style="border-bottom: none;">
                            <h4>
                                @if(!empty($row->ngaybatdau)||!empty($row->ngayketthuc))
                                    {{$row->ngaybatdau.' - '.$row->ngayketthuc}}
                                @else
                                    Không có thông tin
                                @endif
                            </h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 qual-grid mt-5">
                        <a href="" class="aply-btn" style=" margin-left: 40%; padding: 0.5em 3em; background: #145A32;">Đăng ký</a> 
                    </div>
                </div>
                <!--row -->
				<!---728x90--->
                <!--/about -->
                <!-- <div class="candidate-ab-info mt-5">
                    <h5 class="j-b mb-3">Mo ta cong viec</h5>
                    <p>{{$row->mota}}</p>
                </div> -->
                <!--// about -->
				<!---728x90--->
                <!--/history -->
                <div class="candidate-history-info mt-5">
                    <h5 class="j-b mb-5">Công việc tuyển dụng khác từ người tuyển</h5>
                    <div class="candidate-story-grid">

                        <!--/job1-->
                        @if(isset($tb_vieclam_tacgia)&&count($tb_vieclam_tacgia)>0)
                        @foreach($tb_vieclam_tacgia as $row)
                        <div class="job-post-main row mt-2">
                            <div class="col-md-9 job-post-info text-left">
                                <div class="job-post-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="job-single-sec">
                                    <h4>
                                        <a href="#">{{$row->tenvieclam}}</a>
                                    </h4>
                                    <p class="my-2">{{$row->idtacgia}}</p>
                                    <ul class="job-list-info d-flex">
                                        <li>
                                            <i class="fas fa-briefcase"></i> Comera</li>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> California</li>
                                        <li>
                                            <i class="fas fa-dollar-sign"></i> {{$row->luongtrongoi}}</li>
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
                        @endforeach
                        @else
                            Không có thông tin nào khác từ tác giả
                        @endif
                        <!--//job1-->
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