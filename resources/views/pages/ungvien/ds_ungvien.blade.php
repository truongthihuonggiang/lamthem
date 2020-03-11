<!--/ Emply List -->
@if(!empty($tb_ungvien))
@foreach($tb_ungvien as $row)                        
<div class="emply-resume-list row mb-3">
    <div class="col-md-9 emply-info">
        <div class="emply-img">
            @if(file_exists($row->url))
            <img src="images/team1.jpg" alt="" class="img-fluid">
            @else
            <img src="{{asset('images/no_image.png')}}" alt="" class="img-fluid">
            @endif
        </div>
            <div class="emply-resume-info">
            <h4><a href="candidates_single.html">{{$row->ten}}</a></h4>
            <h5 class="mt-2"><span>Công việc hiện tại : </span> {{$row->congviechientai}}</h5>
            <h5 class="mt-2"><span>Đã hoàn thành : </span> {{$row->soviecxong}}</h5>
            </div>
            <div class="clearfix"></div>
    </div>
</div>
@endforeach
@endif
<!--// Emply List -->
<div id="loadding"></div>
@if($limit <= $end_page)
<div class="row text-center xemthem">
    <input type="hidden" name="limit" value="{{$limit}}" id="page_limit">
    <a href="#loadding" class="text-center">Xem thêm...</a>
</div>
@endif