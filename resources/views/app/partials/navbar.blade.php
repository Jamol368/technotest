<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
<div class="bg-blue py-3 top-bar shadow d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-md-left pl-0">
                <a href="{{ route('home') }}" class=" pr-3 pl-0">{{ env('APP_NAME') }}</a>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="https://t.me/Ruzmetova_Shirin" class="p-3"><span class="icon-send"></span></a>
                <a href="https://t.me/DildoraRoziqova" class="p-3"><span class="icon-send"></span></a>
            </div>
        </div>
    </div>
</div>
<header class="site-navbar site-navbar-target shadow" role="banner">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="site-logo">
                <a href="{{ route('home') }}" class="text-white">
                    <img src="{{ asset('/app/images/logo.svg') }}" alt="logo" style="width: 212px">
                </a>
            </div>
            <nav class="site-navigation text-left ml-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                    <li class="{{ request()->routeIs('home')?'active':'' }}"><a href="{{ route('home') }}" class="nav-link">{{ trans('messages.home') }}</a></li>
                    <li><a href="{{ route('home') }}/#test" class="nav-link">Test</a></li>
                    <li class="{{ request()->routeIs('textbooks.*')?'active':'' }}"><a href="{{ route('textbooks') }}" class="nav-link">{{ trans('messages.textbooks') }}</a></li>
                    <li class="{{ request()->routeIs('blog.*')?'active':'' }}"><a href="{{ route('blog.index') }}" class="nav-link">{{ trans('messages.announcements') }}</a></li>
                    <li class=""><a href="#" class="nav-link">{{ trans('messages.about_us') }}</a></li>
                    <li><a href="https://t.me/Ruzmetova_Shirin" target="_blank" class="nav-link">{{ trans('messages.contact') }}</a></li>
                    @guest
                        <li><a href="{{ route('login') }}" class="nav-link btn btn-success">{{ trans('messages.login') }}</a></li>
                        <li><a href="{{ route('register') }}" class="nav-link btn btn-success">{{ trans('messages.register') }}</a></li>
                    @else
                        <li class="nav-item dropdown {{ request()->routeIs('profile')?'active':'' }}">
                            <a class="nav-link" data-bs-toggle="dropdown" href="#">
                                {{ trans('messages.profile') }}
                            </a>

                            <ul class="dropdown-menu">
                                <li class="dropdown-item">
                                    <a href="{{ route('profile') }}" class="d-block">
                                        {{ trans('messages.profile') }}
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item" type="submit">
                                            {{ trans('messages.logout') }}
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </nav>
            <div class="ml-auto toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-white"><span class="icon-menu h3 text-white"></span></a></div>
        </div>
    </div>
</header>
