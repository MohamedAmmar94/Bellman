<!-- Start Welcome area -->
   
      <style>
	  .navbar-nav {
    	flex-direction: row !important;
	  }
	  </style> 
        <div class="header-advance-area" >
            <div class="header-top-area" >
                <div class="container-fluid" >
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                   
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                               
												<li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<?php if(isset(Auth::user()->images)&& Auth::user()->images !="" ){
																?><img width="42" class="rounded-circle" src='{{asset("/images/". Auth::user()->images)}}' alt="">
															 <?php }else{ ?>
																		<img src={{asset("/images/default.png")}} width="42" class="rounded-circle"  />
																	<?php } ?>

															<span class="admin-name"><?php if(Auth::user()->name){echo Auth::user()->name;}?></span>
															
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        
														
                                                        
                                                        <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
													 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
														{{ csrf_field() }}
													</form>
                                                        </li>
                                                    </ul>
                                                </li>
												<li class="nav-item">
                                                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('images/'.app()->getLocale().'.png')}}" style="width:25px;height:25px;"> {{ app()->getLocale() }}</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="{{ url('locale/en') }}" ><img src="{{asset('images/en.png')}}" style="width:25px;height:25px;margin: 0 15px;"> EN</a></li>
														<li><a href="{{ url('locale/ar') }}" ><img src="{{asset('images/ar.png')}}" style="width:25px;height:25px;margin: 0 15px;"> AR</a></li>
                                                    </ul>
                                                </li>
												
                                              </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
										
                                        <li >
											<a  href="/admin/home">
												 <i class="fas fa-building"></i>
												   <span class="mini-click-non">Companies </span>
												</a>
											
										</li>
									  <li >
										<a  href="/admin/employee" aria-expanded="false"><i class="fas fa-users"></i><span class="mini-click-non"> Employees</span></a>
										
									  </li>
									  <li >
										<a  href="/admin/users" aria-expanded="false"><i class="fas fa-users-cog"></i><span class="mini-click-non"> Users</span></a>
										
									  </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area" >
                <div class="container-fluid">
                    <div class="row">

                        
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list" style="margin-top:0px;">
                                <div class="row">
                                  <!--  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    -->
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                           <!-- <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Dashboard V.1</span>
                                            </li>-->
                                        </ul>
                                    </div>
									
                                </div>
                            </div>
                        </div>
                    </div>
					
                </div>
            </div>
        </div>
    