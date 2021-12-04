<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">Multi-Auth</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link "  href="{{ route('home') }}">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
          </li>

        </ul>

        <ul class="navbar-nav me-autho mb-2 mb0lg-0">

            @auth
                @if (Auth::user()->role == 1)
                <li class="nav-item mr-2">
                    <a class="nav-link pl-4 pr-4 mr-2" href="{{ route('admin') }}">Dashboard</a>
                </li>
                @elseif(Auth::user()->role == 2)
                    <li class="nav-item mr-2">
                        <a class="nav-link pl-4 pr-4 mr-2" href="{{ route('user') }}">Dashboard</a>
                    </li>
                @endif
            @endauth
            @guest
            <li class="nav-item mr-2">
                <a class="nav-link pl-4 pr-4 mr-2" href="{{ route('login') }}">login</a>
            </li>

            <li class="nav-item mr-2">
                <a class="nav-link pl-4 pr-4 mr-2" href="{{ route('register') }}">register</a>
            </li>
            @endguest






        </ul>

      </div>
    </div>
  </nav>
