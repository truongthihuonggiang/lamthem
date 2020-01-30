 @extends('layouts.master')
 @section('content')
<style type="text/css">
#search_info_right,
#job_info_left{
	float: left;
}
#job_info_right{
	width: 100%;
}

</style>
<section class="banner-bottom-wthree py-lg-5 py-md-5 py-3">
        <div class="container">
		
            <div class="inner-sec-w3ls py-lg-5  py-3">
			<!---728x90--->
                <h3 class="tittle text-center mb-lg-4 mb-3">
                    Kết quả tìm kiếm</h3>
					<!---728x90--->
                <div class="row choose-main mt-5">
                    <div class="col-lg-12 job_info_right" id="job_info_right">
                        <div class="col-lg-4 widget_search" id="search_info_right">
                            <h3 class="j-b mb-3">Tìm kiếm</h3>
                            <div class="widget-content">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <label class="mb-2">Nghề nghiệp</label>

                                        <select class="form-control jb_1" name="tinh">
                                            <option value="all">Tất Cả</option>
                                            <?php
                                                foreach ($tb_tinh as $row) {
                                            ?>
                                            <option value="<?php echo $row->tinh?>"><?php echo $row->tinh?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-2">Tỉnh/Thành phố</label>

                                        <select class="form-control jb_2" name="idloaiviec">
                                            <option value="all">Tất Cả</option>
                                            <?php
                                                foreach ($tb_loaicongviec as $row) {
                                            ?>
                                            <option value="<?php echo $row->idloaiviec?>"><?php echo $row->tenloaiviec?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="submit" value="Search">
                                </form>
                            </div>
                        </div>
                       
                    <div class="col-lg-8 job_info_left" id="job_info_left">
                        <!--/ Emply List -->
                        <?php
                            if (isset($tb_timviec)) {
                                foreach ($tb_timviec as $row) {
                        ?>
                        <div class="emply-resume-list row mb-3">
                            <div class="col-md-9 emply-info">
                                <div class="emply-img">
                                    <img src="images/b1.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="emply-resume-info">
                                    <h4><a href="employer_single.html"><?php echo $row->tenvieclam?></a></h4>
                                    <h5 class="mt-2"><?php echo $row->idtacgia?></h5>
                                    <p><i class="fas fa-map-marker-alt"></i> <?php echo $row->nhaduong." ".$row->phuongxa." ".$row->tinh?></p>
                                    <ul class="links_bottom_emp mt-2">
                                        <li><a href="employer_single.html"><i class="far fa-envelope"></i> <span class="icon_text"> Email this Job</span></a></li>
                                        <li><a href="#"><i class="fas fa-eye"></i> <span class="icon_text"><?php echo $row->songuoi?></span></a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-3 emp_btn text-right">
                                <a href="#" title="">3 Open Position</a>
                            </div>
                        </div>
                        <?php
                                }
                            }
                        ?>
                        
                        <!--// Emply List -->
                    </div>
                </div>

            </div>
        </div>
</section>
@endsection