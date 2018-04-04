        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="{{ Request::is('dashboard')? "active" : "" }}"><a href="/dashboard">Overview</a></li>
            <li class="{{ Request::is('dashboard/invoice')||Request::is('dashboard/invoice/create')? "active" : "" }}"><a href="/dashboard/invoice">Računi</a></li>
            <li class="{{ Request::is('dashboard/items/create')? "active" : "" }}"><a href="/dashboard/items/create">Stavke računa</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>