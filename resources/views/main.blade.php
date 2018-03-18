@include('partials._head')

  <body>

@include('partials._navbar')    

    <div class="container-fluid">
      <div class="row">
@include('partials._sidebar')       


@yield('content')


      </div>
    </div>

@yield('javascript')
  </body>
</html>