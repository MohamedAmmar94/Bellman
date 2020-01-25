<style>
#logo-alert
{
		display:none;
		color:red;
}
</style>
<form action="/admin/company/form" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
	<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				
				<div class="form-group">
					<label> {{ __('messages.Name') }}  : </label>
					<input type="text" name="name" value="<?php if(!empty($company)){ echo $company->name;}?> " class="form-control" required>
					
				</div>
				<div class="form-group">
					<label> {{ __('messages.Email') }}  : </label>
					<input type="email" name="email" value="<?php if(!empty($company)){echo $company->email ;}?>" class="form-control" >
					
				</div>
				<div class="form-group " id="images-div">
				 <?php if(!empty($company)&&!empty($company->logo)){
						 ?>
							  <img id="logo-id" style="width:100px;height:100px" src="<?php echo asset("storage/$company->logo")?>">
							  <?php
						  }
					 ?>
				</div>

				<div class="form-group" style="    margin: 24px 0px;
">
					<label>
						{{ __('messages.Logo') }} 
					</label>
					<input name="logo" type="file" class="form-control" accept="image/*" id="company-logo"  >
					<label id="logo-alert"> Logo width and height must be at least 100 px   </label>
				</div>
				<div class="form-group">
					<label> {{ __('messages.Website') }}  : </label>
					<input type="text" name="website" value="<?php if(!empty($company)){echo $company->website; }?>" class="form-control" >
					
				</div>
				
			</div>
	</div>		
	<div class="row">
			<div class="col-lg-12">
				<div class="payment-adress">
				<input name="company_id" value="<?php if(!empty($company)){ echo $company->id ;}else{echo "new";}?>" type="hidden" required>
					<button type="submit" class="btn btn-primary waves-effect waves-light" style="margin: 0px 0px 82px 0px;    background: #8a6d3b;
					border-color: #c8a07f;" id="btnSubmit">{{ __('messages.Submit') }} </button>
				</div>
			</div>
		</div>	
</form>				
<script>
$(document).ready(function(){
	//console.log("start");
	

	var _URL = window.URL || window.webkitURL;

$("#company-logo").change(function(e) {
    var file, img;
	var width=100;
	var height=100;

    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
			$("#btnSubmit").attr("disabled", true);
			if(width <= this.width && height <= this.height){
				$("#btnSubmit").attr("disabled", false);
				$("#logo-alert").css("display", "none");
				
			} else{
				$("#btnSubmit").attr("disabled", true);
				$("#logo-alert").css("display", "block");
			}
           // alert(this.width + " " + this.height);
        };
        img.onerror = function() {
            alert( "not a valid file: " + file.type);
        };
        img.src = _URL.createObjectURL(file);


    }

});
});
</script>