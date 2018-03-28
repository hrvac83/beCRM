@include('partials._head')

  <body>

@include('partials._navbar')    

    <div class="container-fluid">
    	<div class="row">
     
@include('partials._sidebar')   

			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">    

@include('partials._messages')

@yield('content')

			</div>     
     	</div>
    </div>

@include('partials._javascript')
  
  </body>
</html>