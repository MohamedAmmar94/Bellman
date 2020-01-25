<form class="form-horizontal" method="POST" action="/admin/users/form" enctype="multipart/form-data">
                        {{ csrf_field() }}
						<div class="menu-header-content display-flex p-0 widget-content  pl-2 pr-2">
                                 <div class="avatar-icon-wrapper btn-hover-shine mb-2  p-0 avatar-icon-xxl widget-content-left " >
                                    <div class="avatar-icon rounded">
										<?php if(isset($user->images)&&!is_null($user->images)){
											?>
											<img src="{{asset('images/'.$user->images)}}" class="picture-src img-responsive" id="teacherimgwizerd2" title="" />

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

                        <div class="row"style="margin-right:0px;margin-left:0px">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-lg-12">
                                    <label>Username</label>
                                <input id="name" type="text" class="form-control" name="name" value="<?php if(old('name')){echo old('name');}else{if(isset($user->name)){echo $user->name;}}?>" required autofocus>

									@if ($errors->has('name'))
										<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
                                </div>
								<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }} col-lg-12">
                                    <label>Mobile</label>
									<input id="mobile" type="number" class="form-control" name="mobile" value="<?php if(old('mobile')){echo old('mobile');}else{if(isset($user->mobile)){echo $user->mobile;}}?>" required >

									@if ($errors->has('mobile'))
										<span class="help-block">
											<strong>{{ $errors->first('mobile') }}</strong>
										</span>
									@endif
                                </div>
								 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-lg-12">
                                    <label>Email Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="<?php if(old('email')){echo old('email');}else{if(isset($user->email)){echo $user->email;}}?>" required>

									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-lg-12">
                                    <label>Password</label>
									<?php if(isset($user->password)){echo "************";}else{?>
                                    <input id="password" type="password" class="form-control" name="password" required>
									<?php } ?>
									@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Status</label><br>
									<input type="radio" name="status" value="1" <?php if(old('status')&&old('status')==1){echo "checked";} {if(isset($user->status)&&$user->status==1){echo "checked";}} ?>> Active
									<input type="radio" name="status" value="0" <?php if(old('status')&&old('status')==0){echo "checked";} {if(isset($user->status)&&$user->status==0){echo "checked";}} ?>> Disactive<br>
									
                                </div>
                               
                                <input type="hidden" name="userid" value="<?php if(isset($user->id)){echo $user->id;}else{echo "new";} ?>">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                    </form>
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
