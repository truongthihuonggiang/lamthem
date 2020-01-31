<style type="text/css">
#demo-1{
	min-height: 300px;
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
</style> 
   <!-- banner-inner -->
    <div id="demo-1" class="page-content">
        <div class="dotts">
            <div class="header-top">
                <header>
                    <div class="top-head ml-lg-auto text-center">
                        <div class="row top-vl">

                            <div class="col-md-4">
                                <span>Welcome Back!</span>
                            </div>
                            <div class="col-md-3 sign-btn">
                                <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                        <i class="fas fa-lock"></i> Sign In</a>
                            </div>
                            <div class="col-md-3 sign-btn">
                                <a href="#" data-toggle="modal" data-target="#exampleModalCenter2">
                                        <i class="far fa-user"></i> Register</a>
                            </div>
                            <div class="search col-md-2">
                                <div class="mobile-nav-button">
                                    <button id="trigger-overlay" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                <!-- open/close -->
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
                                <!-- open/close -->
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="logo">
                            <h1>
                                <a class="navbar-brand" href="index">
                                    <i class="fab fa-codepen"></i> Làm thêm</a>
                            </h1>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                    <i class="fas fa-bars"></i>
                                </span>
            
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-lg-auto text-center">
                                <?php
                                	if (isset($nav)&&isset($page)) {
                                		foreach ($nav as $row) {
                                			if ($row['link']==$page) {
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
            </div>
            <!--//banner-info-w3layouts-->
        </div>
    </div>
    <ol class="breadcrumb justify-content-left">
        <li class="breadcrumb-item">
            <a href="{{route('index')}}">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">
        <?php
        	foreach ($nav as $row) {
        		if ($row['link']==$page) {
        			echo $row['name'];
        		}
        	}
        ?>
        </li>
    </ol>