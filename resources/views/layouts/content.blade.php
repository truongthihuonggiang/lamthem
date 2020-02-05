@extends('layouts.master')
@section('content')
<!--/process-->
<style type="text/css">
    .nav-pills .nav-link.active{
        background: #239B56;
    }
</style>
 <section class="banner-bottom-wthree pb-lg-5 pb-md-4 pb-3">
        <div class="container">
            <div class="inner-sec-w3ls py-3">
			<!---728x90--->
					<!---728x90--->
                <div class="tabs">
                    <ul class="nav nav-pills my-4" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Tuyển dụng mới nhất</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Việc làm thêm</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="menu-grids mt-4">
                                <div class="row t-in">
                                    <div class="col-lg-8 text-info-sec">
                                        <!--/job1-->
                                        <?php
                                            $noidung = $tb_vieclam;
                                            if (count($noidung)>0) {
                                            foreach ($noidung as $row)
                                            {
                                                ?>
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
                                                <?php
                                                }
                                            }
                                        ?>
                                        
                                        <!--//job1-->
                                    </div>
                                    <div class="col-lg-4 text-info-sec">
                                        <img src="images/job-1.jpg" alt=" " class="img-fluid" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Viec lam them -->
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="menu-grids mt-4">
                                <div class="row t-in">
                                    <div class="col-lg-4 text-info-sec">
                                        <img src="images/job-2.jpg" alt=" " class="img-fluid" />
                                    </div>
                                    <div class="col-lg-8 text-info-sec">
                                        <!--/job1-->
                                        @if(isset($tb_vieclamthem))
                                        @foreach($tb_vieclamthem as $row)
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
                                        @endif
                                        <!--//job1-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Viec lam them -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//Register-->
    <!--job -->
    <section class="banner-bottom-wthree mid py-lg-5 py-3">
        <div class="container">
            <div class="inner-sec-w3ls py-lg-5  py-3">
                <div class="mid-info text-center pt-3">
                    <h3 class="tittle text-center cen mb-lg-5 mb-3">
                        <span>Nhà Tuyển Dụng Cần Bạn</span>Đăng ký đơn giản - nhanh chóng!</h3>
                    <p></p>
                    <div class="resume">
                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter2">
                            <i class="far fa-user"></i> Tạo hồ sơ</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--//job -->
    @endsection