@inject('request', 'Illuminate\Http\Request')


@extends('admin.layouts.admintheme')
@section('content')
<style>
.sprow{
	margin-right: 0px;
    margin-left: 0px;
}
.avatar-icon-xxl,.text-left{
	width:120px;
	display:inline-flex
}
#teacherimgwizerd2{
	border-radius:50%;
	    height: 120px;

}
#teacher_pic2{
	margin:30px;
}


</style>
<div class="container">
 @if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li style="color:red;">{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
@if(Session::has('msg'))
	<div class="alert alert-success" style="    
	width: 50%;
	text-align: center;
	position: fixed;
    z-index: 255;
    top: 16%;
    left: 32%;" role="alert">
	 <?php echo Session::get('msg'); ?>
	</div>
	
@endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
		          <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/admin/profile" enctype="multipart/form-data">
                        {{ csrf_field() }}
						<div class="menu-header-content display-flex p-0 widget-content  pl-2 pr-2">
                                 <div class="avatar-icon-wrapper btn-hover-shine mb-2  p-0 avatar-icon-xxl widget-content-left " >
                                    <div class="avatar-icon rounded">
										<?php if(isset(Auth::user()->images)&&!is_null(Auth::user()->images)){
											?>
											<img src="{{asset('images/'.Auth::user()->images)}}" class="picture-src img-responsive" id="teacherimgwizerd2" title="" />

											<?php
											
										}else{ ?> 
										<img src="{{asset('images/uploads/default.jpg')}}" class="picture-src img-responsive" id="teacherimgwizerd2" title="" />
										<?php } ?>
									</div>
                                 </div>
                                 <div class="widget-content-left   text-left">
                                   
                                    <input type="file" name="admin_image" accept=".jpg,.gif,.png,.jpeg" id="teacher_pic2"   >
                                 </div>
						</div>

                        <div class="row sprow"style="margin-right:0px;margin-left:0px">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-lg-12">
                                    <label>Username</label>
                                <input id="name" type="text" class="form-control" name="name" value="<?php if(old('name')){echo old('name');}else{if(isset(Auth::user()->name)){echo Auth::user()->name;}}?>" required autofocus>

									@if ($errors->has('name'))
										<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
                                </div>
								<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }} col-lg-12">
                                    <label>Mobile</label>
									<input id="mobile" type="number" class="form-control" name="mobile" value="<?php if(old('mobile')){echo old('mobile');}else{if(isset(Auth::user()->mobile)){echo Auth::user()->mobile;}}?>" required >

									@if ($errors->has('mobile'))
										<span class="help-block">
											<strong>{{ $errors->first('mobile') }}</strong>
										</span>
									@endif
                                </div>
								 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-lg-12">
                                    <label>Email Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="<?php if(old('email')){echo old('email');}else{if(isset(Auth::user()->email)){echo Auth::user()->email;}}?>" required>

									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
                                </div>
                              <input  type="hidden"  name="userid" value="<?php if(isset(Auth::user()->id)){echo Auth::user()->id;}?>" required>

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("javascript")
<script>
function readteacherimg2(input) {

					if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function(e) {
					  $('#teacherimgwizerd2').attr('src', e.target.result);
					  $('#teacherimgwizerd2').EZView();
					}

					reader.readAsDataURL(input.files[0]);
					}
				}

				$("#teacher_pic2").change(function() {
					
				  readteacherimg2(this);
				  
				});
</script>
@endsection