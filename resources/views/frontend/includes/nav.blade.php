<!-- <nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#frontend-navbar-collapse">
                <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{!! route('frontend.index') !!}">
                Laravel Resume Upload
            </a>
        </div>

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{route('frontend.index')}}" class="@yield('navs.frontend.home')">Home</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
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
        </div>
    </div>
</nav> -->

<header class="py-3 mb-3 border-bottom">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
        <a href="#" class="d-flex align-items-center col-lg-8 mb-2 mb-lg-0 link-dark text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
            <h3>Laravel Resume Upload</h3>
        </a>

        <div class="d-flex justify-content-end">

            @if(Auth::user())
            <div class="flex-shrink-0 dropdown">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small shadow" style="">

                    <li>
                        <a class="dropdown-item" href="{{route('frontend.user.dashboard')}}" class="@yield('navs.frontend.dashboard')">Dashboard</a>
                    </li>

                    @if(Auth::user()->canChangePassword())
                    <li>
                        <a class="dropdown-item" href="{{route('auth.password.change')}}" class="@yield('navs.frontend.user.change_password')">Change Password</a>
                    </li>
                    @endif
                    <li>
                        <a class="dropdown-item" href="{{route('admin.dashboard')}}" class="@yield('navs.frontend.user.administration')">Admin Dashboard</a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{route('auth.logout')}}" class="@yield('navs.general.logout')">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        @else
        <div class="col-md-3 text-end">
            <a href="{{url('login')}}" type="button" class="btn btn-outline-primary me-2">Login</a>
            <a href="{{url('register')}}" type="button" class="btn btn-primary">Sign-up</a>
        </div>
        @endif
    </div>
</header>