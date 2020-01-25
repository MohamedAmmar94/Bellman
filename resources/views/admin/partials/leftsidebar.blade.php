<?php
$url=$_SERVER['REQUEST_URI'];


?>
<!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="/admin/home"><img class="main-logo" src="{{asset('images/logo.png')}}" alt="" /></a>
                <strong><a href="index.html"><img  src="{{asset('images/logo.png')}}" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                       
							<li class="<?php if(strpos($url,"home")!==false){echo " active" ;}else{echo "";} ?>">
								<a  href="/admin/home">
									 <i class="fas fa-building"></i>
									   <span class="mini-click-non">{{ __('messages.Companies') }} </span>
									</a>
								
							</li>
						  <li class="<?php if(strpos($url,"employee")!==false){echo " active" ;}else{echo "";} ?>">
                            <a  href="/admin/employee" aria-expanded="false"><i class="fas fa-users"></i><span class="mini-click-non"> {{ __('messages.Employees') }} </span></a>
                            
						  </li>
						  <li class="<?php if(strpos($url,"users")!==false){echo " active" ;}else{echo "";} ?>">
                            <a  href="/admin/users" aria-expanded="false"><i class="fas fa-users-cog"></i><span class="mini-click-non"> {{ __('messages.Users') }} </span></a>
                            
						  </li>
						


						


                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
