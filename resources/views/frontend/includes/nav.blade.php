<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#frontend-navbar-collapse">
                <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{!! route('frontend.index') !!}">
                Laravel Resume Upload
            </a>
        </div><!--navbar-header-->

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">

            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{route('frontend.index')}}" class="@yield('navs.frontend.home')">Home</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                <!-- Authentication Links -->
                @if (Auth::guest())
                <li>
                    <a href="{{url('login')}}" class="@yield('navs.frontend.login')">Home</a>
                </li>
                {{--<li>{!! link_to('register', trans('navs.frontend.register')) !!}</li>--}}
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{route('frontend.user.dashboard')}}" class="@yield('navs.frontend.dashboard')">Dashboard</a>
                        </li>

                        @if(Auth::user()->canChangePassword())
                        <li>
                            <a href="{{route('auth.password.change')}}" class="@yield('navs.frontend.user.change_password')">Change Password</a>
                        </li>
                        @endif

                        <!-- if user can view admin || new permission -->
                        <li>
                            <a href="{{route('admin.dashboard')}}" class="@yield('navs.frontend.user.administration')">Admin Dashboard</a>
                        </li>

                        <li>
                            <a href="{{route('auth.logout')}}" class="@yield('navs.general.logout')">Logout</a>
                        </li>
                    </ul>
                </li>
                @endif

            </ul>
        </div><!--navbar-collapse-->
    </div><!--container-->
</nav>