@extends('layouts.master')
@section('content')
<!--/process-->
<script>
    window.onload = function(){
        $(document).on('click','.xemthem a',function(event){
            event.preventDefault();
            var limit = document.getElementById('page_limit').value;
            paginate_data(limit);
        });
    }
    function paginate_data(limit){
            if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            $.ajax({
                url : 'ungvien/page_limit?limit='+limit,
                type : 'GET',
                success : function(data){
                    $('#ds_ungvien').html(data);
                }
            });
        }
    function tenvieclam(idvieclam){
        document.getElementById(idvieclam).submit();
    }
</script>
    <section class="banner-bottom-wthree py-lg-5 py-md-5 py-3">
        <div class="container">
            <div class="inner-sec-w3ls py-lg-5  py-3">
			<!---728x90--->
                <h3 class="tittle text-center mb-lg-4 mb-3">Tất cả các ứng viên</h3>
					<!---728x90--->
                <div class="row choose-main mt-5">
                    <div class="col-lg-4 job_info_right">
                        <div class="widget_search">
                            <h3 class="j-b mb-3">TÌm kiếm</h3>
                            <div class="widget-content">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <label class="mb-2">I'm looking for a ...</label>

                                        <select class="form-control jb_1">
                                            <option value="0">Job</option>
                                            <option value="">Category1</option>
                                            <option value="">Category2</option>
                                            <option value="">Category3</option>
                                            <option value="">Category4</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-2">in</label>

                                        <input type="text" class="form-control jb_2" placeholder="Location" required="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control jb_2" placeholder="Industry / Role" required="">
                                    </div>
                                    <input type="submit" value="Search">
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-8 job_info_left" id="ds_ungvien">
                        @include('pages.ungvien.ds_ungvien')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//preocess-->
@endsection