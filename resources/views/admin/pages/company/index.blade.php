@inject('request', 'Illuminate\Http\Request')
@component('admin.layouts.datatables')


@slot('tableID')
  ServicesTable
@endslot

@slot('ajax_url')
   /admin/company/companydatatable

@endslot


@section('breadcrumb')
	 
	<li class="active breadcrumb-item">Admin</li>
    <li class="active breadcrumb-item" aria-current="page">Company </li>


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

<button type="button"  class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".editcompany"
 onclick="companyfunction('new')"	>Add New Company</button>

@endsection
           
							
@section('columns')
	 



	<tr>
		<th class="filter-text" >Id				</th>
		<th class="filter-text" >Name			</th>
		<th class="filter-text" > Email			</th>
		<th class="filter-text" > website			</th>
		
		<th class="filter-text" >Action		</th>
		

	</tr>  
@endsection	

@section('cols')
	[
				{data: 'id'						, name:'id'												  },
				{data: 'name'					, name:'name'								,sortable:true},
				{data: 'email'					, name:'email'								,sortable:true},
				{data: 'website'				, name:'website'							,sortable:true},
				{data: 'action'					, name:'action'								,sortable:false},

				
	]
	
@endsection
					


@section('eduscripts')
@include('admin.pages.company.form')
	<script type="text/javascript">


			function eduScripts(){
			//$('#studentsTable').on('click','.openPopup',function(e){
					
					
			}
			$(function() {
				setTimeout(function() {
				  $(".alert-success").fadeOut().empty();
				}, 5000);

			});
			function companyfunction(btn){
				$.ajax({
					url: '/admin/company/getrow/'+btn,
					type: "GET",
					datatype: 'html',
					
				}).done( 

					function(data) 

					{
						
						$('.modal-body').html(data.html);
						
							}

						);

			}

		


	
</script>
@endsection

@endcomponent		