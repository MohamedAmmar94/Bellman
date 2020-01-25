@inject('request', 'Illuminate\Http\Request')
@section("style")
<style>
.sprow{
	margin-right: 0px;
    margin-left: 0px;
}
.avatar-icon-xxl,.text-left{
	width:120px;
	display:inline-flex
}
#teacherimgwizerd{
	border-radius:50%;
	    height: 120px;

}
#teacher_pic{
	margin:30px;
}
</style>
@endsection
@extends('admin.layouts.admintheme')
@section('content')
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
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/admin/users/form" enctype="multipart/form-data">
                        {{ csrf_field() }}
						<div class="menu-header-content display-flex p-0 widget-content  pl-2 pr-2">
                                 <div class="avatar-icon-wrapper btn-hover-shine mb-2  p-0 avatar-icon-xxl widget-content-left " >
                                    <div class="avatar-icon rounded">
										<img src="{{asset('images/uploads/default.jpg')}}" class="picture-src img-responsive" id="teacherimgwizerd" title="" />
									</div>
                                 </div>
                                 <div class="widget-content-left   text-left">
                                   
                                    <input type="file" name="admin_image" accept=".jpg,.gif,.png,.jpeg" id="teacher_pic"   >
                                 </div>
						</div>

                        <div class="row sprow">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-lg-12">
                                    <label>Username</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

									@if ($errors->has('name'))
										<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
                                </div>
								<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }} col-lg-12">
                                    <label>Mobile</label>
									<input id="mobile" type="number" class="form-control" name="mobile" value="{{ old('mobile') }}" required autofocus>

									@if ($errors->has('mobile'))
										<span class="help-block">
											<strong>{{ $errors->first('mobile') }}</strong>
										</span>
									@endif
                                </div>
								 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-lg-12">
                                    <label>Email Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-lg-12">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>

									@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Status</label><br>
									<input type="radio" name="status" value="1" checked> Active
									<input type="radio" name="status" value="0" > Disactive<br>
									
                                </div>
                               
                                
                            </div>
							   <input type="hidden" name="userid" value="new">

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("javascript")
<script>
function readteacherimg(input) {

					if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function(e) {
					  $('#teacherimgwizerd').attr('src', e.target.result);
					  $('#teacherimgwizerd').EZView();
					}

					reader.readAsDataURL(input.files[0]);
					}
				}

				$("#teacher_pic").change(function() {
					
				  readteacherimg(this);
				  
				});
</script>
@endsection