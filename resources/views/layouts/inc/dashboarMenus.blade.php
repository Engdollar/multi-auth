<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      @auth
      @if (Auth::user()->role == 1)
        <a class="navbar-brand" href="{{ route('admin') }}">Multi-Auth</a>
      @elseif(Auth::user()->role == 2)
      <a class="navbar-brand" href="{{ route('user') }}">Multi-Auth</a>
      @endif
  @endauth
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link "  href="{{ route('home') }}">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="">Profile</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
          </li>

        </ul>
        {{-- <a href="" class="link text-light m-1">{{ auth()->user()->fName }}</a> --}}

        {{-- @can('update', $user) --}}
            <form class="d-flex" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-light" type="submit">Logout</button>
            </form>
        {{-- @endcan --}}


      </div>
    </div>
  </nav>
