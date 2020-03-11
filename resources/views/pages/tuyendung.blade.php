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
.emply-info{
    text-transform: capitalize;
}
.emply-resume-info h4 a{
    color: #000;
}
.emply-info h4 a{
    transition: none;
    
}
.emply-info:hover h4 a{
    color:#F39C12;
}
.emply-resume-list{
    transition: none;
}
#job_info_right{
    position: relative;
}
.sticky{
    position: fixed;
    top: 20px;
    width: 370px;
    z-index: 100;
    background: #fff;
}
#job_info_left{
    float: right;
}
</style>

<section class="banner-bottom-wthree py-lg-5 py-md-5 py-3">
        <div class="container">
            <div class="inner-sec-w3ls">
                <h3 class="tittle text-center mb-lg-4 mb-3">Danh sách nhà tuyển dụng</h3>
            <!---728x90--->
                <div class="row choose-main mt-5">
                    <div class="col-lg-12 job_info_right" id="job_info_right">
                        <!-- form tìm kiếm -->
                        <div class="col-lg-4 widget_search sticky-top" id="search_info_right">
                            <h3 class="j-b mb-3">Tìm kiếm</h3>
                            <div class="widget-content">
                                <form action="{{route('timviec')}}" method="post">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label class="mb-2">Tỉnh/Thành phố</label>
                                        <select class="form-control jb_1" name="tinh">
                                            <option value="">Tất Cả</option>
                                            <?php
                                                foreach ($tb_tinh as $row) {
                                            ?>
                                            <option value="<?php echo $row->tinh?>"
                                            <?php 
                                                if (isset($_POST['tinh'])){
                                                    if ($_POST['tinh']==$row->tinh){
                                                        echo "selected='selected'";
                                                    }
                                                   
                                                }
                                            ?> >
                                            <?php echo $row->tinh?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-2">Nghề nghiệp</label>

                                        <select class="form-control jb_2" name="idloaiviec">
                                            <option value="">Tất Cả</option>
                                            <?php
                                                foreach ($tb_loaicongviec as $row) {
                                            ?>
                                            <option value="<?php echo $row->idloaiviec?>" 
                                            <?php 
                                                if (isset($_POST['idloaiviec'])){
                                                    if ($_POST['idloaiviec']==$row->idloaiviec){
                                                        echo "selected='selected'";
                                                    }
                                                   
                                                }
                                            ?> >
                                            <?php echo $row->tenloaiviec?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="submit" value="Tìm kiếm">
                                </form>
                            </div>
                        </div>
                    <!-- form tìm kiếm -->
                    <div class="col-lg-8 job_info_left" id="job_info_left">
                        <!--/ Emply List -->
                        <!-- danh sách nhà tuyển dụng -->
                        <?php
                            $soviecxong = isset($tb_soviecxong)? $tb_soviecxong : 0;
                            $soviecchuaxong = isset($tb_soviecchuaxong)? $tb_soviecchuaxong : 0;
                            if (isset($tb_nguoidung_tuyendung)&&count($tb_nguoidung_tuyendung)>0) {
                                foreach ($tb_nguoidung_tuyendung as $row) {
                        ?>
                        <div class="emply-resume-list row mb-3">
                            <div class="col-md-12 emply-info">
                                <div class="col-md-3 emply-img">
                                    <img src="images/b1.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="col-md-9 emply-resume-info">
                                    <h4><a href="employer_single.html"><?php echo $row->tendonvi?></a></h4>
                                    <p>{{$row->mota}}</p>
                                    <p></p>
                                    <ul class="list-group links_bottom_emp mt-2">
                                        <li><i class="fas fa-map-marker-alt mx-2"></i> <?php echo $row->diachi.", ".$row->tinh?></li>
                                        <span class="icon_text">
                                            {{$row->ngaydang}}
                                        </span>
                                        </li>
                                        <li>
                                            @foreach($soviecxong as $row1)
                                            @if($row->idnguoidung==$row1->idtacgia)
                                            Số việc xong :  {{$row1->soviecxong}}
                                            @endif
                                            @endforeach
                                        </li>
                                        <li>
                                            @foreach($soviecchuaxong as $row1)
                                            @if($row->idnguoidung==$row1->idtacgia)
                                            Số việc chưa xong :{{ $row1->soviecchuaxong}}
                                            @endif
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <?php
                                }
                            }
                            else{
                                $tinh="";
                                $tenloaiviec="";
                                if (isset($_POST['tinh'])&&isset($_POST['idloaiviec'])) {
                                    foreach ($tb_tinh as $row) {
                                        if ($row->tinh==$_POST['tinh']) {
                                            $tinh = " ở ".$row->tinh;
                                        }
                                    }
                                    foreach ($tb_loaicongviec as $row) {
                                        if ($row->idloaiviec==$_POST['idloaiviec']) {
                                            $tenloaiviec = $row->tenloaiviec;
                                        }
                                    }
                                }
                                echo "Không tìm thấy công việc ".$tenloaiviec.$tinh;
                            }
                        ?>
                        @if(isset($tb_nguoidung_tuyendung))
                        {{$tb_nguoidung_tuyendung->links()}}
                        @endif
                        <!--// Emply List -->
                        <!-- //danh sách nhà tuyển dụng -->
                    </div>
                </div>

            </div>
        </div>
</section>
<div class="banner-bottom-wthree py-lg-5 py-md-5 py-3">
    <div class="container">
    @foreach($tb_nguoidung_tuyendung as $row)
<ul class="list-group list-group-flush">
  <li class="list-group-item">{{$row->tendonvi}}</li>
</ul>
@endforeach
</div>
</div>
@endsection