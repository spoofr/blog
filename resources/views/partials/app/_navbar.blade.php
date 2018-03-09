<div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar; top: 250">
    <nav class="uk-navbar-container">
        <div class="uk-container" uk-navbar>
            <div class="uk-navbar-left">
                <a href="/" class="uk-navbar-item uk-logo uk-margin-right">{{ $setting->site_name }}</a>
                <ul class="uk-navbar-nav">

                    <li>
                        <a href="#" class="">Category</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('category.single', $category->id) }}">{{ $category->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="uk-navbar-right">
                @guest
                <div class="uk-navbar-item">
                    <ul class="uk-grid-small" uk-grid>
                        <li>
                            <a class="uk-icon-link" href="#" uk-icon="icon: search"></a>
                            <div class="uk-drop" uk-drop="mode: click; pos: left-center; offset: 0">
                                <form class="uk-search uk-search-navbar uk-width-1-1" action="{{ route('search') }}" method="GEt">
                                    <input class="uk-search-input" type="search" name="search" placeholder="Search..." autofocus>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                @else
                <div class="uk-navbar-item">
                    <ul class="uk-grid-small" uk-grid>
                        <li>
                            <a class="uk-icon-link" href="#" uk-icon="icon: search"></a>
                            <div class="uk-drop" uk-drop="mode: click; pos: left-center; offset: 0">
                                <form class="uk-search uk-search-navbar uk-width-1-1" action="{{ route('search') }}" method="GEt">
                                    <input class="uk-search-input" type="search" name="search" placeholder="Search..." autofocus>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul class="uk-navbar-nav">
                    <li>
                        <a href="#" class="uk-icon-link" uk-icon="icon: user"></a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-nav-header">Signed in as
                                    <b>{{ Auth::user()->name }}</b>
                                </li>
                                <li class="uk-nav-divider"></li>
                                <li class="{{ (Request::is('admin/home') ? " uk-active " : " ") }}">
                                    <a href="{{ route('home') }}">Dashboard
                                        <span class="uk-float-right" uk-icon="icon: settings"></span>
                                    </a>
                                </li>
                                <li class="{{ (Request::is('admin/profile') ? " uk-active " : " ") }}">
                                    <a href="{{ route('profile') }}">Profile
                                        <span class="uk-float-right" uk-icon="icon: happy"></span>
                                    </a>
                                </li>
                                @if(Auth::user()->admin)
                                <li class="{{ (Request::is('admin/settings') ? " uk-active " : " ") }}">
                                    <a href="{{ route('settings') }}">Settings
                                        <span class="uk-float-right" uk-icon="icon: cog"></span>
                                    </a>
                                </li>
                                @endif
                                <li class="uk-nav-divider"></li>
                                <li>
                                    <a href="#" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Sign out
                                        <span class="uk-float-right" uk-icon="icon: sign-out"></span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                @endguest
            </div>
        </div>
    </nav>
</div>