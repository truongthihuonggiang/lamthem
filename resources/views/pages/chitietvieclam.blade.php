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
                            <h4>
                            <?php
                            	if (isset($tb_oc_nguoidung)) {
                            		foreach ($tb_oc_nguoidung as $row1) {
                            			if ($row1->idnguoidung==$row->idtacgia) {
                            				if (!empty($row1->ten)) {
                                               $tacgia = $row1->ten;
                                            }
                                            
                            			}
                            		}
                                    if (isset($tacgia)) {
                                        echo $tacgia;
                                    }
                                    else{
                                        echo "Không có thông tin";
                                    }
                            	}
                            	else
                            	{
                            		echo "Không có thông tin";
                            	}
                            ?>	
                            </h4>
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
                                    @if(isset($tb_oc_nguoidung))
                                    @foreach($tb_oc_nguoidung as $row1)
                                    @if($row1->idnguoidung==$row->idnguoidung)
                                        @if(!empty($row1->ten))
                                        <?php $nguoidung_binhluan = $row1->ten?>
                                        @endif
                                    @endif
                                    @endforeach
                                    @endif
                                    <h6>
                                        @if(isset($nguoidung_binhluan))
                                        {{$nguoidung_binhluan}}
                                        @else
                                        Không có thông tin
                                        @endif
                                    </h6>
                                    <p>{{$row->ngaydang}}</p>
                                    <i id="noidung_binhluan">{{$row->noidung}}</i>
                                </li>
                                @endif
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        @if(isset($_SESSION['login'])&&$_SESSION['login']==1)
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
                        <div class="col-md-3 sign-btn">
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
                                    <p class="my-2">
                                    <?php 
                                        foreach ($tb_oc_nguoidung as $row1) {
                                        if ($row1->idnguoidung==$row->idtacgia) {
                                            echo $row1->ten;
                                            }
                                        }
                                    ?>
                                    </p>
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
                                <a href="{{'chitietvieclam/'.md5($row->idvieclam)}}" class="aply-btn" >Đăng ký</a>
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