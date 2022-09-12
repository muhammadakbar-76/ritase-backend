<nav class="navbar navbar-expand-lg navbar-dark mb-4" style="background-color: #1bb04a">
    <a class="navbar-brand" href="#" style="color: #f5aa3b">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item {{ request()->is('units') || request()->is('units/*') ? 'active' : '' }}">
          <a class="nav-link" href="/units">Units</a>
        </li>
        <li class="nav-item {{ request()->is('ritase') ? 'active' : '' }}">
          <a class="nav-link" href="/ritase">Ritase</a>
        </li>
      </ul>
    </div>
  </nav>