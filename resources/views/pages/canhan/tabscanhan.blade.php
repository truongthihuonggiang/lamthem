@extends('layouts.master')
@section('content')
<style type="text/css">
.list-group-item p{
	color: #000;
}

}
</style>
<div class="container mb-5">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Tìm việc</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">Tuyển dụng</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content mt-5">
  <div class="tab-pane container active" id="home">
      @include('pages.canhan.timviec')
  </div>
  <div class="tab-pane container fade" id="menu1">
      @include('pages.canhan.tuyendung')
  </div>
</div>
</div>
@endsection