<div id="dsvieclam" class="inner-sec-w3ls py-3" >
    <div class="tabs">
                    <ul class="nav nav-pills pb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Tuyển dụng mới nhất</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="menu-grids">
                                <div class="row t-in">
                                    <div class="col-md-12 text-info-sec float-left" >
                                        <!--/job1-->
                                        @if(!empty($dsvieclam))
                                        @foreach($dsvieclam as $row)
                                            <div class="col-md-6 job-post-main row py-3 float-left">
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
                                        @endif
                                        <!-- phan trang -->
                                       

                                         <!-- phan trang -->
                                        <!--//job1-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</div>
<div class="row mx-auto">
	<a href="" class="col-md-12 mobile_pagination text-center">Xem tất cả...</a>
</div>

{{$dsvieclam->links()}}