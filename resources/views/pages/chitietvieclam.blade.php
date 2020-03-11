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
#noidung_binhluan{
    color: #145A32;
}
.qual-icon{
    width: 100%;
}
.qual-icon span,
.qual-icon i{
    font-size: 1.25em;
}

.anhvieclam img{
    width: 100%;
    height: 50%;
}
.emply-resume-info h4{
    padding-left: 0.5em;
}
.emply-resume-info h4 i{
    font-size: 1.5em;
    padding: 0 0.5em;
    color: #F39C12;
}
</style>
<?php
session_start();
if (isset($tb_vieclam)) {
	foreach ($tb_vieclam as $row) {
		
	?>

<section class="banner-bottom-wthree py-lg-5 py-md-5 py-3">
        <div class="container">
		<!---728x90--->
            <div class="inner-sec-w3ls">
                <div class="single-user-candidate">
                    <div class="user-detail-info">
                        <div class="user-content-info emply-resume-info">
                            <h4>
                                <i class="fas fa-briefcase"></i><a href="#">{{$row->tenvieclam}}</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <!--row -->
                <div class="row qualification-details mt-2">
                    <div class="row col-md-12">
                        <div class="col-md-3 anhvieclam">
                            @if(file_exists($row->url))
                            <img src="{{asset('$row->url')}}" >
                            @else
                            <img src="{{asset('images/no_image.png')}}">
                            @endif
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                <div class="qual-icon">
                                    <i class="far fa-building"></i><span class="col-md-3 ml-2">Người tuyển : {{$tendonvi}}</span>
                                </div>
                              </li>
                              <li class="list-group-item">
                                <div class="qual-icon">
                                    <i class="far fa-file-alt"></i><span class="col-md-3 ml-2">Mô tả : {{$row->mota}}</span>
                                </div>
                              </li>
                              <li class="list-group-item">
                                  <div class="qual-icon">
                                    <i class="fas fa-dollar-sign"></i>
                                    <span class="col-md-3 ml-2">Lương : 
                                        @if(!empty($row->luongtrongoi))
                                        {{$row->luongtrongoi}} trọn gói
                                        @else
                                        {{$row->luonggio}} theo giờ
                                        @endif

                                        </span>
                                        <i class="fas fa-user"></i>
                                        <?php 
                                        $chuadangky = $row->songuoi - $dadangky;
                                        if($dadangky>=$row->songuoi)
                                            {echo $row->songuoi." - Đã hoàn thành";}
                                            else{
                                                echo $row->songuoi."    Còn ".$chuadangky." người";
                                                }
                                        ?>
                                </div>
                              </li>
                              <li class="list-group-item">
                                  <div class="qual-icon">
                                    <i class="fas fa-map-marker-alt"></i><span class="col-md-3 ml-2">Địa điểm : {{$row->thanhpho}} {{$row->tinh}}</span>
                                </div>
                              </li>
                              <li class="list-group-item">
                                  <div class="qual-icon">
                                    <i class="far fa-clock"></i><span class="col-md-3 ml-2">Thời gian tuyển dụng : {{$row->ngaybatdau}} - {{$row->ngayketthuc}}</span>
                                </div>
                              </li>
                            </ul>
                            </div>
                            @if($chuadangky>0)
                            <form>
                                <button type="button" class="btn btn-success">Đăng ký</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- --------------------------- -->
                <!--row -->
				
                <!-- binh luan viec lam -->
                <div class="main_grid_contact emp-single-page mt-5">
                    <div class="form emp-single">
                        <h4 class="mb-4 text-left">Bình luận việc làm</h4>
                        <div class="col-lg-12">
                            <ul style="list-style: none;">
                                @if(isset($tb_binhluan))
                                @foreach($tb_binhluan as $row)
                                @if($row->congkhai==1)
                                <li class="mb-5" style="">
                                    <h6>
                                        {{$row->ten}}
                                    </h6>
                                    <p>{{$row->ngaydang}}</p>
                                    <i id="noidung_binhluan">{{$row->noidung}}</i>
                                </li>
                                @endif
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        @if(isset($_SESSION['login']))
                        <form action="#" method="post" class="row">
                            <div class="col-lg-6 emp-single-line">
                                <div class="form-group">
                                    <label>Nhập nhận xét</label>
                                    <textarea  required="required" placeholder="Nhận xét về công việc" wrap="hard" style="overflow-x: hidden; overflow-wrap: break-word; height: 58px; resize: vertical; "></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-primary" style="border: none; padding:0.3em 1.3em; outline: none; cursor: pointer;">Gửi</button>
                                </div>
                            </div>
                        </form>
                        @else
                        <div class="top-vl">
                        <div class="row">
                                <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fas fa-lock mr-2"></i>Đăng nhập để bình luận</a>
                        </div>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- //binh luan viec lam -->
                <!-- cong viec khac tu tac gia -->
                <div class="candidate-history-info mt-5">
                    <h5 class="j-b mb-5">Công việc tuyển dụng khác từ người tuyển</h5>
                    <div class="candidate-story-grid">
                        <!--/job1-->
                        @if(isset($tb_vieclam_tacgia)&&count($tb_vieclam_tacgia)>0)
                        @foreach($tb_vieclam_tacgia as $row)
                        <div class="job-post-main row my-3">
                            <div class="col-md-9 job-post-info text-left">
                                <div class="job-post-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="job-single-sec">
                                    <h4>
                                        <a href="{{'chitietvieclam/'.$row->idvieclam}}"><?php echo $row->tenvieclam?></a>
                                    </h4>
                                    <p class="my-2">{{$row->tendonvi}}</p>
                                    <ul class="job-list-info d-flex">
                                        <li>
                                            <i class="fas fa-user"></i><?php echo "so luong :".$row->songuoi?></li>
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i><?php echo $row->thanhpho."-".$row->tinh?></li>
                                        <li>
                                            <i class="fas fa-dollar-sign"></i> <?php echo $row->luongtrongoi?></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-3 job-single-time text-right">
                                <span class="job-time">
                                <i class="far fa-clock"></i> <?php echo $row->ngaydang?></span>
                                <a href="{{url('chitietvieclam/'.md5($row->idvieclam))}}" class="aply-btn" >Đăng ký</a>
                            </div>
                        </div>
                        @endforeach
                        @else
                            Không có thông tin nào khác từ tác giả
                        @endif
                        <!--//job1-->
                    </div>
                </div>
                <!--// cong viec khac tu tac gia -->
            </div>
        </div>

    </section>
<?php
	}
}
?>
@endsection