@inject('request', 'Illuminate\Http\Request')
@extends('admin.layouts.admintheme')
@section('style')
<link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,800' rel='stylesheet'
  type='text/css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href={{asset("css/main.css")}} rel="stylesheet">
<link href={{asset("css/custom.css")}} rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
 .dropdown-menu{
	 min-width: 8rem;
 }
.ui-autocomplete{
	    z-index: 30000;
}
.pagination > li {
    display: inline;
}

table.dataTable tfoot th input{
	min-width:100px;
	max-width:100px;
}
.dataTables_wrapper > .row:first-child {

margin-left: 0 !important;
margin-top: 15px !important;
}
.row{
	clear:both !important;
	width: 100% !important;
	display: table !important;
}.dataTables_filter{
	display:inline !important;
}
table.dataTable tbody{
font-size: 14.0833px;
}
.pagination > li.active a{
	background-color: #1c1e20 !important;
border-color: #161718 !important;
}
table.dataTable tr th.select-checkbox.selected::after {
    content: "✔";
    margin-top: -11px;
    margin-left: -4px;
    text-align: center;
    text-shadow: rgb(176, 190, 217) 1px 1px, rgb(176, 190, 217) -1px -1px, rgb(176, 190, 217) 1px -1px, rgb(176, 190, 217) -1px 1px;
}
.commenttxt{
	margin:3px 0px 3px 25px;
}
.profile-img{
	width:110px;
	height:115px;
	border-radius:50%;
	
}
#loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;

}   
 
 
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

</style>

@endsection
@section('content')

	<!-- start breadcrumb -->
	<nav class="" aria-label="breadcrumb">
	  <ol class="breadcrumb">
	  <li class="breadcrumb-item">
		<a href="javascript:void(0);">
		<i class="fa fa-home"></i>
		</a>
	 </li>
		@yield('breadcrumb')
	  </ol>
	</nav>
	<!-- end breadcrumb -->
	@yield('msg')
	@yield('filter')
	
	
	<div class="tabs">
    
		<div class="tab-content">
			<div class="tab-pane active" id="demo">
				 <div class="table-custom-style">
					<div class="page-title-actions mb-3  display-flex">
						<div class="col-md-6">
						
						</div>
						<div class="col-md-6 <?php if(app()->getLocale()=="ar"){echo 'text-left';}else{echo 'text-right';} ?>">
							@yield('createbutton')
						</div>
   
					</div>
					<div class="js-stools clearfix">
					   <div class="clearfix">
						  <div class="js-stools-container-bar">
							 <label for="filter_search" class="element-invisible">
							 {{ __('messages.Search') }}					</label>
							 <div class="btn-wrapper input-append">
								<input type="text" name="filter[search]" class="filter_search" id="filter_search"  value=""      placeholder="Search"         />
								<button type="button" class="btn hasTooltip" title="Search" aria-label="Search">
								<i class="fas fa-search"></i>
								</button>
							 </div>
							 <div class="btn-wrapper hidden-phone">
								<button type="button" data-toggle="collapse" href=".js-stools-users-filters" class="btn hasTooltip js-stools-btn-filter" title="Filter the list items.">
								  {{ __('messages.Search_Tools') }} <span class="caret"></span>
								</button>
							 </div>
							 <div class="btn-wrapper">
								<button type="button" class="btn hasTooltip js-stools-btn-clear" title="Clear">
								 {{ __('messages.Clear') }}			</button>
							 </div>
						  </div>
					   </div>
													<!-- Filters div -->
						<div class="js-stools-container-filters js-stools-users-filters collapse clearfix show"></div>
					</div>
				</div>
				<div class="table-responsive">
					<div class="react-bootstrap-table ReactTable">

						<table    class="responsive table table-hover table-striped text-center" id="{{$tableID}}">
							<thead>
								<tr>
									@yield('columns')
									
								</tr>
							</thead>
							
						</table>
					</div>
				</div>
			</div>
	
		</div>
	</div>
					

@endsection


@section('javascript') 
<!-- Ajax --------------->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatables.bootstrap.js') }}"></script>
		<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>

		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript">

	$(function() {
		
		$('.filter_search').keyup(function(){
			oTable = $(this).parents(".table-custom-style").next(".table-responsive").find('#{{$tableID}}').DataTable(); oTable.search($(this).val()).draw() ;
			//oTable.settings()[0].jqXHR.abort();
			
			})
			var set = $('.filter-text');
var lngth = set.length;
		var count=0;
		$("#{{$tableID}} thead th.filter-text").each(function(){
			count=count+1;
			if(count != lngth){
			//console.log(lngth);
	$(this).parents(".table-responsive").prev(".table-custom-style")
	.find(".js-stools-container-filters")
	.append('<div class="js-stools-field-filter index_' +$(this).index()+'"><input type="text" class="filter text-filter form-control" placeholder="Search '+$(this).text()+'" /></div>')
			}});
		
		$(".js-stools-btn-clear").click(function(){
			$(".js-stools-container-filters select").val("").trigger("liszt:updated").trigger("change");
			$(".js-stools-container-filters input").val("").trigger("change");
			$(".filter_search").val("").trigger("keyup").trigger("change");
		
		});
		
		$('#{{$tableID}}').DataTable({
                
			processing: true,
			serverSide: true,
			stateSave: true,
			order: [[0, 'desc']],
			buttons: [
				'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
			],
			ajax: {
						url:'{{$ajax_url}}',
						
			},
			oLanguage: {sProcessing: "<div id='loader'></div>"},

			columns: @yield('cols'),initComplete: function () {
				
				eduScripts();
				
	
			}
	
		});
			
		//search by filter columns
		var table=$("#{{$tableID}}").DataTable();
		table.on('page.dt', function(e, settings, json) {
		 
			eduScripts();
		});

		table.columns().every(function(){
			
			
			var e=$(this);
			
			var by = $(this.header()).parents(".table-responsive").prev(".table-custom-style").find(".js-stools-container-filters");
			$("input",".js-stools-container-filters").on("keyup change",function(){
				//console.log("s");
				table = $("#{{$tableID}}").DataTable();
				e = table.column($(this).parents(".js-stools-field-filter").attr("class").replace("js-stools-field-filter index_",""));
				e.search()!==this.value&&e.search(this.value).draw();
			}); 
		});
		
	
	
	

	});
	

</script>
@yield('eduscripts')
@endsection	
	



	