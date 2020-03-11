@extends('layouts.master')
@section('content')
<!--/process-->
<style type="text/css">
.nav-pills .nav-link.active{
    background: #239B56;
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
.chitietvieclam:hover h4{
    color: #F39C12;
}
.job-post-main:hover .chitietvieclam{
    background: #f5f5f5;
    transition: all 0.7s ease-in-out;
}
.job-single-sec{
    width: 100%;
    text-transform: capitalize;
}

.job-post-main{
    padding: 0.5em;
    border:none;
    box-shadow: none;
    font-size: 90%;
}
.job-post-main img{
    width: 100%;
    height: 100%;
}
.anhtuyendung{
    padding: 0;
}
.mobile_pagination{
    display: none;
}
.tenvieclam:hover{
    color: #F39C12;
}
.tenvieclam{
    cursor: pointer;
    text-transform: capitalize;
}
@media (min-width: 768px){
.col-md-5{
    max-width: 45%;
    margin-right: 1em;
}
}
@media (max-width: 384px){
#index_pagination nav{
   display:none;
}
.mobile_pagination{
    display: block;
}
}
@media (max-width: 568px){
.anhtuyendung{
    height: 8em;
}
}
</style>
<script>
    window.onload = function(){
        $(document).on('click','.pagination a',function(event){
            event.preventDefault();
            var page = new String(this.getAttribute('href')).split('page=')[1];
            paginate_data(page);
        });
    }
    function paginate_data(page){
            if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            $.ajax({
                url : 'index/pagination?page='+page,
                type : 'GET',
                success : function(data){
                    $('#index_pagination').html(data);
                }
            });
        }
    function tenvieclam(idvieclam){
        document.getElementById(idvieclam).submit();
    }
</script>
<section class="banner-bottom-wthree">
    <!--  ds vieclam -->
    <div class="container" id="index_pagination">
       @include('layouts.dsvieclam_pagination')     
    </div>
    <!-- ds vieclam -->
        <!-- viec lam them -->
    <div class="container">
        <div class="inner-sec-w3ls py-lg-5  py-3">
            <h3 class="tittle text-center mb-lg-5 mb-3">Nhà Tuyển Dụng Hàng Đầu</h3>
        <div class="row mt-5">
            <div class="card-deck">
            @if(isset($top3_tuyendung))
            @foreach($top3_tuyendung as $row)
            <div class="card">
                    <img src="images/g1.jpg" alt="Card image cap" class="img-fluid card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{$row->tendonvi}}</h5>
                    <p class="card-text">{{$row->mota}}</p>
                    <p class="card-text"><i class="fas fa-map-marker-alt"></i>{{$row->diachi.", ".$row->tinh}}</p>
                </div>
                <div class="card-footer">
                    <a href=""><small class="text-muted">Chi tiết tuyển dụng</small></a>
                </div>
            </div>
            @endforeach
            @endif
            </div>
        </div>
        <div class="row mx-auto">
            <a href="{{url('tuyendung')}}" class="mx-auto text-center mt-5">Xem tất cả...</a>
        </div>
        </div>
    </div>
    <!-- viec lam them -->
</section>
    <!--job -->
<section class="banner-bottom-wthree mid py-lg-5 py-3">
    <div class="container">
        <div class="inner-sec-w3ls py-lg-5  py-3">
            <div class="mid-info text-center pt-3">
                <h3 class="tittle text-center cen mb-lg-5 mb-3">
                    <span>Nhà Tuyển Dụng Cần Bạn</span>Đăng ký đơn giản - nhanh chóng!</h3>
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