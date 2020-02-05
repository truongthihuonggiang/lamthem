<style type="text/css">
#toTop{

}
</style>
<footer class="footer-emp-w3layouts bg-dark dotts py-lg-5 py-3">
        <div class="container-fluid px-lg-5 px-3">
            <div class="row footer-top">
                <div class="col-lg-3 footer-grid-wthree-w3ls">
                    <div class="footer-title">
                        <h3>Liên hệ với chúng tôi</h3>
                    </div>
                    <div class="footer-text">
                        <p>Luôn sẵn sàng phản hồi ý kiến, đóng góp của các bạn. Xin vui lòng liên hệ với chúng tôi :</p>
                        <ul class="footer-social text-left mt-lg-4 mt-3">

                            <li class="mx-2">
                                <a href="#">
                                    <span class="fab fa-facebook-f"></span>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#">
                                    <span class="fab fa-twitter"></span>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#">
                                    <span class="fab fa-google-plus-g"></span>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#">
                                    <span class="fab fa-linkedin-in"></span>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#">
                                    <span class="fas fa-rss"></span>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#">
                                    <span class="fab fa-vk"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 footer-grid-wthree-w3ls">
                    <div class="footer-title">
                        <h3>Liên hệ</h3>
                    </div>
                    <div class="contact-info">
                        <h4>Vị trí :</h4>
                        <p>567 Lê Duẩn, Buôn Ma Thuột, Đăk Lăk.</p>
                        <div class="phone">
                            <h4>Liên lạc :</h4>
                            <p>Điện thoại : +84 326699393</p>
                            <p>Email :
                                <a href="mailto:info@example.com">hainguyenduy3498@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 footer-grid-wthree-w3ls">
                    <div class="footer-title">
                        <h3>Đường dẫn nhanh</h3>
                    </div>
                    <ul class="links">
                        @if(isset($nav))
                        @foreach($nav as $row)
                        <li>
                            <a href="{{route($row->link)}}">{{$row->name}}</a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                    <ul class="links">
                        <li>
                            <a href="how.html">Cá nhân</a>
                        </li>
                    </ul>

                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-3 footer-grid-wthree-w3ls">
                    <div class="footer-title">
                        <h3>Đăng ký để nhận ưu đãi</h3>
                    </div>
                    <div class="footer-text">
                        <p>Nhập email để luôn nhận được thông tin cập nhất mới nhất từ chúng tôi.</p>
                        <form action="#" method="post">
                            <input class="form-control" type="email" name="Email" placeholder="Nhập email..." required="">
                            <button class="btn2">
                                <i class="far fa-envelope" aria-hidden="true"></i>
                            </button>
                            <div class="clearfix"> </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright mt-4">
                <p class="copy-right text-center ">&copy; 2018 Làm thêm | Thiết kế bởi
                    <a href="#"> NDH </a>
                </p>
            </div>
        </div>
    </footer>
    <!-- //footer -->

    <!--model-forms-->
    <!--/Login-->

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="login px-4 mx-auto mw-100">
                        <h5 class="text-center mb-4">Đăng Nhập</h5>
                        <form action="{{route('login')}}" method="post" role="form">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="mb-2">Email</label>
                                <input type="email" class="form-control" name="email_user" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required="required">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="pass_user" placeholder="" required="required">
                            </div>
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Lưu mật khẩu</label>
                            </div>
                            <button type="submit" class="btn btn-primary submit mb-4">Đăng nhập</button>
                            <p class="text-center pb-4">
                                <a href="#" data-toggle="modal" data-target="#exampleModalCenter2"> Bạn không có tài khoản?</a>
                            </p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--//Login-->
    <!--/Register-->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="login px-4 mx-auto mw-100">
                        <h5 class="text-center mb-4">Đăng Ký Ngay</h5>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label>Họ</label>

                                <input type="text" class="form-control" id="validationDefault01" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" class="form-control" id="validationDefault02" placeholder="" required="">
                            </div>

                            <div class="form-group">
                                <label class="mb-2">Mật khẩu</label>
                                <input type="password" class="form-control" id="password1" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Xác nhận mật khẩu</label>
                                <input type="password" class="form-control" id="password2" placeholder="" required="">
                            </div>

                            <button type="submit" class="btn btn-primary submit mb-4">Đăng ký</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
