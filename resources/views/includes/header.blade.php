<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('dashboard') }}">dashboard</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href=""></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logs')}}">Logs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('orders')}}">Orders</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</header>
