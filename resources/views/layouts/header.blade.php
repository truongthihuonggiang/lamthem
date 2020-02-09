<style type="text/css">
#demo-1{
    overflow: inherit;
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
.zs-enabled .zs-slideshow .zs-bullets .zs-bullet.active{
    background-color: #F39C12;
    border-color: #F39C12;
}
.ban-form button.btn1{
    background: #D35400;
}
.ban-form button.btn1:hover{
    background:#28B463;
}
.banner-info-w3layouts{
	padding-top: 0;
}	
#demo-1{
	min-height: 450px;
}
.view{
	min-height: 200px;
}
.category_grid i{
	margin-top: 0.5em; 
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
	border-top-right-radius: 5.5em;
	border-bottom-left-radius: 5.5em;
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
	border-top-left-radius: 5.5em;
	border-bottom-right-radius: 5.5em;
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
</style> 
    <!-- banner-inner -->
    <div id="demo-1" data-zs-src='["images/1.jpg", "images/2.jpg","images/3.jpg", "images/4.jpg"]' data-zs-overlay="dots">
        <div class="demo-inner-content">
            <div class="header-top">
                <header>
                    <div class="top-head ml-lg-auto text-center">
                        <div class="row">

                            <div class="col-md-4">
                                <span>Welcome Back!</span>
                            </div>
                            <div class="col-md-3 sign-btn">
                                <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fas fa-lock"></i> Đăng Nhập</a>
                            </div>
                            <div class="col-md-3 sign-btn">
                                <a href="{{route('dangky')}}" ><!--  data-toggle="modal" data-target="#exampleModalCenter2" -->
                                    <i class="far fa-user"></i> Đăng Ký</a>
                            </div>
                            <!-- <div class="search col-md-2">
                                <div class="mobile-nav-button">
                                    <button id="trigger-overlay" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                open/close
                                <div class="overlay overlay-door">
                                    <button type="button" class="overlay-close">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                    <form action="#" method="post" class="d-flex">
                                        <input class="form-control" type="search" placeholder="Search here..." required="">
                                        <button type="submit" class="btn btn-primary submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                                open/close
                            </div> -->
                        </div>
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
                                	if (isset($nav)) {
                                		foreach ($nav as $row) {
                                			if ($row['link']=='index') {
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
            <div class="banner-info-w3layouts text-center">

                <h3>
                    <span>Tìm kiếm việc làm tuyệt vời</span> .
                    <span>Ngay bây giờ.</span>
                </h3>
                <p>Hãy tìm kiếm và lựa chọn công việc.</p>

                <form action="{{route('timviec')}}" method="post" class="ban-form row" role="form">
                    {!! csrf_field() !!}
                    <div class="col-md-4 banf">
                        <select id="country12" class="form-control" name="tinh">
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

                    
                    <div class="col-md-4 banf">
                        <select id="country13" class="form-control" name="idloaiviec">
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
            <div class="inner-sec-w3ls py-lg-5  py-3">
               <!--  <h3 class="tittle text-center mb-lg-4 mb-3">
                    <span>TẠO HỒ SƠ</span>Hãy tạo một hồ sơ để nhà tuyển dụng/ứng viên dễ dàng tìm thấy bạn</h3> -->
                
                <div class="row col-12 justify-content-center">
                    <div class="col-md-4 category_grid">
                        <div class="view view4 view-tenth">
                        	<a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                            <div class="category_text_box">
                                <i class="fas fa-bullhorn"></i>
                                <h3>Đăng tin tuyển dụng </h3>
                                <p>Tiếp cận người tìm việc</p>
                            </div> 
                            </a>                     
                        </div>
                    </div>
                    <div class="col-md-4 category_grid">
                        <div class="view view5 view-tenth">
                        	<a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                            <div class="category_text_box">
                                <i class="fas fa-user"></i>
                                <h3>Tạo hồ sơ cá nhân </h3>
                                <p>Nhà tuyển dụng đang cần bạn</p>
                            </div>  
                            </a>                          
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </section>



   