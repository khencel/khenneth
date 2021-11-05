@guest
    <nav class="navbar navbar-expand-lg navbar-light w-100" style="position: absolute !important;z-index: 1">
        <a class="navbar-brand" href="/"><img id="mobileLogo" src="{{ asset('img/logo.png') }}" alt="" srcset="" style="width:200px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
        </svg>
        </button>
        <div class="collapse navbar-collapse pr-5" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto ">
            <li class="nav-item active">
            <a class="nav-link text-white nav-Font" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a href="/login" class="nav-link text-white nav-Font" style="cursor: pointer">Login</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link text-white nav-Font" style="cursor: pointer">About Us</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('privacy') }}" class="nav-link text-white nav-Font" style="cursor: pointer">Data Privacy</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('copyright') }}" class="nav-link text-white nav-Font" style="cursor: pointer">Copyright Notice</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white nav-Font" href="/register">Sign Up</a>
            </li>
        </ul>
        </div>
    </nav>
@else
<nav class="navbar navbar-expand-md navbar-light" style="background-image: linear-gradient(rgb(255, 38, 0), rgb(255, 255, 255));">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
            @if (Auth::user()->is_subscriber == 1)
                <strong>Premium</strong>
            @endif
            Yijing
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
                </li>
                @if (Auth::user()->is_subscriber != null)
                    <li class="nav-item">
                        <a class="nav-link" href="/diaries">Diaries</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Oracle
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{url('/oracle/number')}}">Numbers</a>
                          <a class="dropdown-item" href="{{url('/oracle/text')}}">Letters</a>
                        </div>
                    </li>
                @else
                <li class="nav-item">
                    <div class="position-relative">
                        <svg style="width:24px;height:24px;position:absolute;left:0;right:0;margin-left:auto;margin-right: auto;top:5px; " viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
                        </svg>
                        <span class="nav-link">Diaries</span>
                    </div>
                </li>
                @endif
                
                <li class="nav-item">
                    <a class="nav-link" href="/schedule">Schedule</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle font-weight-bold text-black" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href="/profile">
                                Profile
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
@endguest
