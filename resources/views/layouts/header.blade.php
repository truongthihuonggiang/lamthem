<style type="text/css">
#demo-1{
    overflow: visible;
    min-height: 240px;
}
.logo i{
    color: #F39C12;
}
.navbar-light .navbar-brand:hover{
    color: #F39C12;
}
li.nav-item.active {
    background-color: #F39C12;
}
.zs-enabled .zs-slideshow .zs-bullets {
    bottom: 0;
}
.zs-enabled .zs-slideshow .zs-bullets .zs-bullet.active{
    background-color: #F39C12;
    border-color: #F39C12;
}
form.ban-form{
    margin: 0 auto;
}
.ban-form button.btn1{
    background: #D35400;
}
.ban-form button.btn1:hover{
    background:#28B463;
}
.banner-info-w3layouts{
    padding-top: 8em;
} 
.view{
    min-height: 200px;
}
.category_text_box h3 {
    font-size: 18px;
}
.category_grid i{
    margin-top: 0.5em; 
}
.view{
     min-height: 120px;
}
.view img{
    width: 100%;
    height: 100%;
}
.mask{
    width: 100%;
    height: 100%;
}
.view4{
    border-top-right-radius: 2em;
    border-bottom-left-radius: 2em;
    border:0.5em solid #F39C12;
    background: #F39C12;
}
.view4:hover{
    background-color: white;
    border:0.5em solid #F39C12;
    color: #F39C12;
    transition: 0.4s;
}
.view4:hover i,
.view4:hover h3{
    color: #F39C12;
}
.view5{
    border-top-left-radius: 2em;
    border-bottom-right-radius: 2em;
    border:0.5em solid #239B56;
    background: #239B56;
}
.view5:hover{
    background-color: white;
    border:0.5em solid 239B56;
    color: #239B56;
    transition: 0.6s;
}
.view5:hover i,
.view5:hover h3{
    color: #239B56;
}
.nav-item:hover{
    /*background: #F39C12;*/
    text-decoration: underline;
}
@media (max-width: 1366px){
.top-head {
    width: 60%;
}
}
}
@media (max-width: 384px){

.category_grid{
    display: none;
}
}
@media (max-width: 568px){
    .category_grid{
    display: none;
}
.zs-bullets{
    display: none;
}
}
@media (max-width: 991px){
    .top-head {
    width: 100%;
}
#navbarSupportedContent{
    border: 1px solid grey;
}
}
</style> 
<?php 

?>
    <!-- banner-inner -->
    <div id="demo-1" data-zs-src='["{{asset('images/1.jpg')}}","{{asset('images/2.jpg')}}","{{asset('images/3.jpg')}}","{{asset('images/4.jpg')}}"]' data-zs-overlay="dots">
        <div class="demo-inner-content">
            <div class="header-top">
                <header>
                    <div class="top-head ml-lg-auto text-center">                        
                            @if(isset($_SESSION['login']))
                            <div class="row col-md-6 float-right">
                            <div class="px-5">
                                <a href="{{url('canhan')}}"><span>{{$_SESSION['ten']}}</span></a>
                            </div>
                            <div class="sign-btn">
                                <a href="{{route('dangxuat')}}" ><!-- data-toggle="modal" data-target="#exampleModalCenter" -->
                                    <i class="fas fa-lock"></i> Đăng Xuất</a>
                            </div>
                            </div>
                            @else
                            <div class="row">
                            <div class="col-md-4">
                                <span>Welcome Back!</span>
                            </div>
                            <div class="col-md-3 sign-btn">
                                <a href="{{route('dangnhap')}}" ><!-- data-toggle="modal" data-target="#exampleModalCenter" -->
                                    <i class="fas fa-lock"></i> Đăng Nhập</a>
                            </div>
                            <div class="col-md-3 sign-btn">
                                <a href="{{route('dangky')}}" ><!--  data-toggle="modal" data-target="#exampleModalCenter2" -->
                                    <i class="far fa-user"></i> Đăng Ký</a>
                            </div>
                            </div>
                            @endif
                    </div>
                    <div class="clearfix"></div>
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="logo">
                            <h1>
                                <a class="navbar-brand" href="{{route('index')}}">
                                    <i class="fab fa-codepen"></i> Làm thêm</a>
                            </h1>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i class="fas fa-bars"></i>
                            </span>

                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav m-lg-auto text-center">
                                <?php
                                    $nav_active = isset($active)? $active : "index";
                                	if (isset($nav)) {
                                		foreach ($nav as $row) {
                                			if ($row['link']==$nav_active) {
                                				?>
                                					<li class="nav-item active">
                                    					<a class="nav-link" href="<?php echo url($row['link'])?>"><?php echo $row['name']?></a>
                                					</li>


                                				<?php
                                			}
                                			else{
                                				?>
                                					<li class="nav-item">
                                    					<a class="nav-link" href="<?php echo url($row['link'])?>"><?php echo $row['name']?>
                                        				<span class="sr-only">(current)</span>
                                    					</a>
                                					</li>


                                				<?php
                                			}
                                		}
                                	}

                                ?>
                            </ul>

                        </div>
                    </nav>
                </header>
            </div>
            <!--/banner-info-w3layouts-->
            <div class="banner-info-w3layouts text-center py-0">

                <!-- <h3>
                    <span>Tìm kiếm việc làm tuyệt vời</span> .
                    <span>Ngay bây giờ.</span>
                </h3>
                <p>Hãy tìm kiếm và lựa chọn công việc.</p> -->

                <form action="{{route('timviec')}}" method="get" class="ban-form row" role="form">
                    <div class="col-md-4 banf">
                        <select id="country12" class="form-control" name="tinh">
                            <option value="">Tất Cả</option>
                            <?php
                                foreach ($tb_tinh as $row) {
                                    ?>
                                        <option value="<?php echo $row->tinh?>"><?php echo $row->tinh?></option>
                                    <?php
                                }
                            ?>
                        </select>

                    </div>

                    
                    <div class="col-md-4 banf">
                        <select id="country13" class="form-control" name="idloaiviec">
                            <option value="">Tất Cả</option>
                            <?php
                                foreach ($tb_loaicongviec as $row) {
                                    ?>
                                        <option value="<?php echo $row->idloaiviec?>"><?php echo $row->tenloaiviec?></option>
                                    <?php
                                }
                            ?>
                        </select>

                    </div>
                    <div class="col-md-4 banf">
                        <button class="btn1" type="submit">TÌM KIẾM
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    
                </form>
            </div>
            <!--//banner-info-w3layouts-->
        </div>
    </div>
    <section class="banner-bottom-wthree">
        <div class="container">
            <div class="inner-sec-w3ls py-lg-4 py-3">
               <!--  <h3 class="tittle text-center mb-lg-4 mb-3">
                    <span>TẠO HỒ SƠ</span>Hãy tạo một hồ sơ để nhà tuyển dụng/ứng viên dễ dàng tìm thấy bạn</h3> -->
                
                <div class="row col-12 justify-content-center">
                    <div class="col-md-6 category_grid">
                        <div class="view view4 view-tenth" style="width: 80%; float: right;">
                            @if(isset($_SESSION['user']))
                            <a href="{{route('login')}}">
                            @else    
                        	<a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                            @endif
                            <div class="row category_text_box">
                                <div class="col-md-3"><i class="fas fa-bullhorn"></i></div>
                                <div class="col-md-9">
                                    <h3>Đăng tin tuyển dụng </h3>
                                <p>Tiếp cận người tìm việc</p>
                                </div>
                                
                            </div> 
                            </a>                     
                        </div>
                    </div>
                    <div class="col-md-6 category_grid">
                        <div class="view view5 view-tenth" style="width: 80%; float: left;">
                            @if(isset($_SESSION['user']))
                            <a href="{{route('login')}}">
                            @else    
                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                            @endif
                            <div class="row category_text_box">
                                <div class="col-md-3"><i class="fas fa-user"></i></div>
                                <div class="col-md-9">
                                     <h3>Tạo hồ sơ cá nhân </h3>
                                    <p>Nhà tuyển dụng cần bạn</p>
                                </div>
                            </div>  
                            </a>                          
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </section>




   