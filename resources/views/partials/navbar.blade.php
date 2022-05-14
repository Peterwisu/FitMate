
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="height:92px;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('images/logo.png')}}" width="80"/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto" style="margin-left:auto;">
                <li class="nav-item">
                    <a class="nav-link" href="/find">Find a Gym</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/calculator">Fitness Calculator</a>
                </li>
                <li class="nav-item">
                <div class="dropdown">
                    <a class="btn dropdown-toggle nav-link" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                       More
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="/contact">Contact</a></li>
                        <li><a class="dropdown-item" href="/about">About</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </div>
                </li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav" style="margin-left:0;">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link sign-up-btn"  href="{{ route('login') }}">Sign In</a>
                        </li>
                    @endif
                    @if (Route::has('login'))
                    <li class="nav-item btn-reg">
                            <a class="nav-link sign-up-btn" href="{{ route('register') }}">Sign up</a>
                        </li>
                    @endif


                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="/profile/{{Auth::user()->id}}">
                               Your Profile
                            </a>
                            <a class="dropdown-item" href="/health/{{Auth::user()->id}}">
                                Your Fitness
                             </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
