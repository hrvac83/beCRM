<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          @if (Auth::user()->company_id != NULL)
            <p class="navbar-brand"><strong> {{ Auth::user()->company->name }} </strong>Korisnik: <strong>{{ Auth::user()->name }}
             {{ Auth::user()->last_name }}</strong></p>
          @else
            <a class="navbar-brand" href="{{ route('company.create') }}">Prijavi tvrtku!</a>
          @endif
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Postavke</a></li>
            <li><a href="#">Moj račun</a></li>
            <li><a href="#">Pomoć</a></li>
            <li><a href="{{ route('logout') }}">Odjava</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
</nav>