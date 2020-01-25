@inject('request', 'Illuminate\Http\Request')
@component('admin.layouts.datatables')


@slot('tableID')
  UserTable
@endslot

@slot('ajax_url')
   /admin/users/usersdatatable
@endslot


@section('breadcrumb')
	 
	<li class="breadcrumb-item"><a href="/admin/users/index/Users">Admin</a></li>
    <li class="active breadcrumb-item" aria-current="page">User </li>


@endsection
 @section('msg')
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
@endsection
@section('createbutton')
	 
<button type="button"  class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".edituser"
 onclick="userfunction('new')"	>Quick Add</button>
@endsection
           
							
@section('columns')
	 



	<tr>
		<th class="filter-text" >Id				</th>
		<th class="filter-text" >Name			</th>
		<th class="filter-text" >email			</th>
		<th class="filter-text" >mobile				</th>
		<th class="filter-text" >status			</th>
		
		<th class="filter-text" >Action		</th>
		

	</tr>  
@endsection	

@section('cols')
	[
				{data: 'id'						, name:'id'											 		  },
				{data: 'name'					, name:'name'											,sortable:true},
				{data: 'email'					, name:'email'										,sortable:true},
				{data: 'mobile'					, name:'mobile'										,sortable:true},
				{data: 'status'					, name:'status'									,sortable:true},
				
				{data: 'action'					, name:'action'										,sortable:false},

				
	]
	
@endsection
					


@section('eduscripts')
@include('admin.pages.user.popup')


	<script type="text/javascript">


			function eduScripts(){
			//$('#studentsTable').on('click','.openPopup',function(e){
					
					
			}
			$(function() {
				setTimeout(function() {
				  $(".alert-success").fadeOut().empty();
				}, 5000);

			});

			
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

@endcomponent		