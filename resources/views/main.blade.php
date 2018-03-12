@include('partials._head')

  <body>

@include('partials._navbar')    

    <div class="container-fluid">
      <div class="row">
@include('partials._sidebar')       


@yield('content')


      </div>
    </div>

@include('partials._javascript')
  </body>
</html>