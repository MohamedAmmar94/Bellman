 <!doctype html>
<html lang="en">
  <head>
  
  
  @include('admin.partials.head')
  
  
  </head>
  <body>
  @include('admin.partials.leftsidebar')

  <div class="all-content-wrapper">
	@include('admin.partials.header')
  
	@yield('content')
  
	@include('admin.partials.footer')
  </div>
  @include('admin.partials.javascript')
  
  
  </body>
 </html>