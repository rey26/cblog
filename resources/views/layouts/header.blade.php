
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="true">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'cBlog') }}
                </a>
            </div>
            {{--<ul class="nav navbar-nav dropDownMenu">--}}
                {{--Multi level dropdown--}}

                {{--<li>--}}
                    {{--<a href="#">DropDown_1</a>--}}
                    {{--<ul>--}}
                        {{--<li><a href="#">Test</a></li>--}}
                        {{--<li><a href="#">DropDown_2</a>--}}
                            {{--<ul>--}}
                                {{--<li><a href="#">test2.1</a></li>--}}
                                {{--<li><a href="#">test2.2</a></li>--}}
                                {{--<li><a href="#">test2.3</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}


            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-left dropDownMenu">
                    @foreach($cats as $cat)
                        @if($cat->children->count() > 0)
                            <li><a href="#">{{$cat->title}}</a>
                                <ul>
                                    @foreach($cat->children as $subCat)
                                        <li><a href="/posts/cats/{{$subCat->slug}}">{{$subCat->title}}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                        @elseif(!$cat->parent)
                            <li><a href="/posts/cats/{{$cat->slug}}">{{$cat->title}}</a></li>
                        @endif
                    @endforeach
                </ul>
                <!-- Right Side Of Navbar -->


                    <!-- Authentication Links -->
                        <ul class="nav navbar-nav navbar-right">
                    @guest
                        <li><a href="{{ route('login') }}">Log in</a></li>

                        @else
                            @if($user->isAdmin())
                                <li><a href="{{ route('register') }}">New User</a></li>
                            @endif
                                <li class="add">
                                    <a href="/cat/all">
                                        New category
                                    </a>
                                </li>
                                <li class="add">
                                <a href="/post/create">
                                    New blog
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
                                            Log out
                                        </a>
                                        <a href="/author/{{$user->username}}">
                                            My blogs
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
