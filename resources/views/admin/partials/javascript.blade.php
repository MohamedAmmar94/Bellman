 <!-- jquery
		============================================ -->
    
	<script src='{{asset("admintmpl/js/vendor/jquery-1.12.4.min.js"						)}}'></script>

	<!-- bootstrap JS    
		======================================== -->
    <script src='{{asset("admintmpl/js/bootstrap.min.js"								)}}'></script>
    <!-- wow JS          
		======================================== -->
    <script src='{{asset("admintmpl/js/wow.min.js"									)}}'></script>
    <!-- price-slider JS 
		======================================== -->
    <script src='{{asset("admintmpl/js/jquery-price-slider.js"						)}}'></script>
    <!-- meanmenu JS     
		======================================== -->
    <script src='{{asset("admintmpl/js/jquery.meanmenu.js"							)}}'></script>
    <!--owl.carousel JS  
		======================================== -->
    <script src='{{asset("admintmpl/js/owl.carousel.min.js"							)}}'></script>
    <!-- sticky JS       
		======================================== -->
    <script src='{{asset("admintmpl/js/jquery.sticky.js"								)}}'></script>
    <!-- scrollUp JS     
		======================================== -->
    <script src='{{asset("admintmpl/js/jquery.scrollUp.min.js"						)}}'></script>
    <!-- counterup JS    
		======================================== -->
    <script src='{{asset("admintmpl/js/counterup/jquery.counterup.min.js"					)}}'></script>
    <script src='{{asset("admintmpl/js/counterup/waypoints.min.js"						)}}'></script>
    <script src='{{asset("admintmpl/js/counterup/counterup-active.js"						)}}'></script>
    <!-- mCustomScrollbar JS
		======================================== -->
    <script src='{{asset("admintmpl/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"	)}}'></script>
    <script src='{{asset("admintmpl/js/scrollbar/mCustomScrollbar-active.js"				)}}'></script>
    <!-- metisMenu JS	 		
		======================================== -->			
    <script src='{{asset("admintmpl/js/metisMenu/metisMenu.min.js"					)}}'></script>
    <script src='{{asset("admintmpl/js/metisMenu/metisMenu-active.js"					)}}'></script>
    <!-- morrisjs JS	 		
		======================================== -->			
    <script src='{{asset("admintmpl/js/morrisjs/raphael-min.js"						)}}'></script>
    <script src='{{asset("admintmpl/js/morrisjs/morris.js"							)}}'></script>
    <script src='{{asset("admintmpl/js/morrisjs/morris-active.js"						)}}'></script>
    <!-- morrisjs JS	 		
		======================================== -->			
    <script src='{{asset("admintmpl/js/sparkline/jquery.sparkline.min.js"					)}}'></script>
    <script src='{{asset("admintmpl/js/sparkline/jquery.charts-sparkline.js"				)}}'></script>
    <script src='{{asset("admintmpl/js/sparkline/sparkline-active.js"						)}}'></script>
    <!-- calendar JS	 		
		======================================== -->			
    <script src='{{asset("admintmpl/js/calendar/moment.min.js"						)}}'></script>
    <script src='{{asset("admintmpl/js/calendar/fullcalendar.min.js"					)}}'></script>
    <script src='{{asset("admintmpl/js/calendar/fullcalendar-active.js"				)}}'></script>
    <!-- plugins JS		 	
		======================================== -->			
    <script src='{{asset("admintmpl/js/plugins.js"									)}}'></script>
    <!-- main JS		 	
		======================================== -->			
    <script src='{{asset("admintmpl/js/main.js"										)}}'></script>
	<script src="{{asset('js/EZView.js')}}"></script>
	<script src='{{asset("js/draggable.js")}}'></script>

<script>
$(function(){



 $('img').EZView();



});

 function delitem(btnid){
	
			var id = $("#"+btnid).data('id');
			var name = $("#"+btnid).data('name');
			var type = $("#"+btnid).data('type');
			
			//console.log(type);
			//console.log(id);
			//console.log(name);
				swal({
					title: "Are you sure?",
					text: "You want to delete "+ name +" "+ type+"  !",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes, delete it!",
					closeOnConfirm: false
				}).then((isok) => {
					  if (isok) {
						swal("Poof! Your  "+type+" "+ name +" has been deleted!", {
						  icon: "success",
						});
						var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

						$.ajax({
								url: '/admin/'+type+'/delete',
								type: "POST",
								data: {_token: CSRF_TOKEN, 'id':id},
								datatype: 'html',
								success: function(response) {
									if(response=="success"){
									   window.location.href = "/admin/"+type;
									}else{
										swal("some thing went wronge remove failed",{icon: "error",});
									}
									}
							})
						//window.location.href = '/admin/'+type+'/delete/'+id;
					  } else {
						swal("Your imaginary file is safe!",{icon: "error",});
						
					  }
					});
		}
</script>

		@yield("javascript")
		

    <!-- tawk chat JS	 		
		======================================== 			
    <script src='{{asset("admin/js/tawk-chat.js"					
	)}}'></script>-->
	 <!-- =======================================  -->
	 