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
.chitietvieclam{
    border: none; 
    background: #fff;
    transition: all 0s ease-in-out;
    padding :0;
}
.chitietvieclam h4{
    text-transform: capitalize;
}
.chitietvieclam:focus{
    box-shadow: none;
}
.tenvieclam:hover{
    color: #F39C12;
}
.job-post-main:hover .chitietvieclam{
    background: #f5f5f5;
    transition: all 0.7s ease-in-out;
}
.job-single-sec .chitietvieclam h4{
    word-break: break-all;
}
.tenvieclam{
    cursor: pointer;
    text-transform: capitalize;
}
</style>
<script>
    function tenvieclam(idvieclam){
        document.getElementById(idvieclam).submit();
    }
</script>
<section class="banner-bottom-wthree pb-5">
        <div class="container">
		
            <div class="inner-sec-w3ls">
			<!---728x90--->
                <h3 class="tittle text-center mb-lg-4">
                    Kết quả tìm kiếm</h3>
					<!---728x90--->
                <div class="row choose-main mt-2">
                    <div class="col-lg-12 job_info_right" id="job_info_right">
                        <div class="col-lg-4 widget_search" id="search_info_right">
                            <h3 class="j-b mb-3">Tìm kiếm</h3>
                            <div class="widget-content">
                                <form action="{{route('timviec')}}" method="get">
                                    <div class="form-group">
                                        <label class="mb-2">Tỉnh/Thành phố</label>

                                        <select class="form-control jb_1" name="tinh">
                                            <option value="">Tất Cả</option>
                                            <?php
                                                foreach ($tb_tinh as $row) {
                                            ?>
                                            <option value="<?php echo $row->tinh?>"
                                            <?php 
                                                if (isset($_GET['tinh'])){
                                                    if ($_GET['tinh']==$row->tinh){
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
                                                if (isset($_GET['idloaiviec'])){
                                                    if ($_GET['idloaiviec']==$row->idloaiviec){
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
                       
                    <div class="col-lg-8 job_info_left" id="job_info_left">
                        <!--/ Emply List -->
                        @if (isset($tb_timviec)&&count($tb_timviec)>0)
                        @foreach ($tb_timviec as $row) 
                        <div class="col-md-12 job-post-main row py-3 float-left">
                                                <div class="col-md-3 anhtuyendung">
                                                @if(file_exists($row->url))
                                                    <img src="{{asset('$row->url')}}" >
                                                    @else
                                                    <img src="{{asset('images/no_image.png')}}">
                                                    @endif
                                                </div>
                                                <div class="col-md-9 job-post-info text-left">
                                                    <div class="job-single-sec">
                                                    <form action="{{route('chitietvieclam')}}" method="post" id="{{$row->idvieclam}}">
                                                        {!! csrf_field() !!}
                                                        <input type="hidden" name="idvieclam" value="{{$row->idvieclam}}">
                                                        <input type="hidden" name="tendonvi" value="{{$row->tendonvi}}">
                                                        <input type="hidden" name="dadangky" value="{{$row->dadangky}}">
                                                    </form>
                                                    <h4 class="tenvieclam" onclick="tenvieclam({{$row->idvieclam}});">{{$row->tenvieclam}}</h4>
                                                    <p style="color: #239B56; font-weight: bold;"><i class="far fa-clock"></i> {{$row->ngaydang}}</p>
                                                    <p>{{$row->tendonvi}}</p>
                                                    <ul class="job-list-info d-flex">
                                                        <li>
                                                            <i class="fas fa-user"></i><?php 
                                                            $chuadangky =$row->songuoi - $row->dadangky;
                                                            if($row->dadangky>=$row->songuoi)
                                                                {echo $row->songuoi." - Đã hoàn thành";}
                                                            else{
                                                                echo $row->songuoi." Còn : ".$chuadangky;
                                                            }
                                                             ?></li>
                                                        <li>
                                                            <i class="fas fa-map-marker-alt"></i>{{$row->tinh}}</li>
                                                        <li>
                                                            <i class="fas fa-dollar-sign"></i>
                                                            @if(!empty($row->luonggio))
                                                            {{$row->luonggio}} theo giờ
                                                            @else
                                                            {{$row->luongtrongoi}} trọn gói
                                                            @endif
                                                        </li>
                                                    </ul>
                                                    </div>
                                                <div class="clearfix"></div>
                                                </div>
                                        </div>
                                        @endforeach
                             <div class="row px-3 py-3">{{$tb_timviec->links()}}</div>   
                            @else
                            Không có dữ liệu
                            @endif
                        <!-- content -->
                        
                        <!--// Emply List -->
                    </div>
                </div>

            </div>
        </div>
</section>
@endsection