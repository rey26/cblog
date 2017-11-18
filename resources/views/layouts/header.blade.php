
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

                <ul class="nav navbar-nav">
                    <li>
                            <a href="/Cat/Intro">
                                Intro
                            </a>
                    </li> &nbsp;

                    <li>
                        <a href="/Cat/PR">
                            PR
                        </a>
                    </li> &nbsp;

                    <li>
                        <a href="/Cat/Programming">
                            Programovanie
                        </a>
                    </li> &nbsp;
                </ul>


            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                    <!-- Authentication Links -->

                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>

                        @else
                            @if($user->isAdmin())
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                            <li style="background-color: red; border-radius: 10px">
                                <a href="/post/create">
                                    Novy blog
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ $user->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
