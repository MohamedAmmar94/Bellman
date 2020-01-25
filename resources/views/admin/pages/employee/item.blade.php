<style>
#logo-alert
{
		display:none;
		color:red;
}
</style>
<form action="/admin/employee/form" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
	<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				
				<div class="form-group">
					<label> First Name : </label>
					<input type="text" name="first_name" value="<?php if(!empty($employee)){ echo $employee->first_name;}?> " class="form-control" required>
					
				</div>
				<div class="form-group">
					<label> Last Name : </label>
					<input type="text" name="last_name" value="<?php if(!empty($employee)){ echo $employee->last_name;}?> " class="form-control" required>
					
				</div>
				<div class="form-group">
					<label> Email : </label>
					<input type="email" name="email" value="<?php if(!empty($employee)){echo $employee->email ;}?>" class="form-control" >
					
				</div>
				
				<div class="form-group">
					<label> phone : </label>
					<input type="number" name="phone" value="<?php if(!empty($employee)){echo $employee->phone; }?>" class="form-control" >
					
				</div>
				<div class="form-group">
					<label> Company : </label>
						<select name="company" class="form-control" style="margin:0px;" >
							<option value="0" >-- Select Company --</option>
							<?php if(isset($companies) && count($companies)>0){
										foreach($companies as $c){?>
										<option value="{{$c->id}}" <?php if(!empty($employee)&&$employee->company==$c->id){echo "selected";} ?>>{{$c->name}}</option>
							<?php  }} ?>
						</select>
				</div>
				
			</div>
	</div>		
	<div class="row">
			<div class="col-lg-12">
				<div class="payment-adress">
				<input name="employee_id" value="<?php if(!empty($employee)){ echo $employee->id ;}else{echo "new";}?>" type="hidden" required>
					<button type="submit" class="btn btn-primary waves-effect waves-light" style="margin: 0px 0px 82px 0px;    background: #8a6d3b;
					border-color: #c8a07f;" id="btnSubmit">Submit</button>
				</div>
			</div>
		</div>	
</form>				
<script>
$(document).ready(function(){
	//console.log("start");
	

	var _URL = window.URL || window.webkitURL;

$("#employee-logo").change(function(e) {
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