<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ (isset($title) ? $title  . ' | ' : '') . 'Studio' }}</title>

        <link href="{{ mix('css/dashboard.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <section class="side_navigation">
                <div class="side_navigation__wrapper">
                    <div class="logo_box">
                        <a href="{{ Request::root() }}">
                            <img src="http://www.simondebackere.be/images/assets/logos/logo.png" alt="logo">
                        </a>
                    </div>
                    <h1>Main</h1>
                    <ul>
                        <li><a href="">Reports</a></li>
                        <li><a href="">Insights</a></li>
                        <li><a href="">Spreadsheets</a></li>
                        <li><a href="">Leaderboard</a></li>
                        <li><a href="">Administration</a></li>
                        <li><a href="">Sales <span class="badge">new</span></a></li>
                        <li><a href="">Schedule</a></li>
                    </ul>
                    <h1>Help</h1>
                    <ul>
                        <li><a href="">Settings</a></li>
                        <li><a href="">Library</a></li>
                        <li><a href="">Support</a></li>
                    </ul>
                    <div class="side_navigation__footer">
                        <a href="{{ Request::root() }}" data-toggle="tooltip" data-placement="top" title="{{ Request::isSecure() ? 'The website is secure': 'The website is not secure' }}"><i class="fa {{ Request::isSecure() ? 'fa-lock': 'fa-unlock' }}"></i>&nbsp;&nbsp;&nbsp;{{ Request::getHost() }}</a>
                    </div>
                </div>
            </section>
            <main class="main">
                <header>
                    <div class="header__navigation">
                        <div class="header__navigation__item">
                            <div class="dropdown">
                                <div id="avatar" class="avatar__pop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <img src="https://avatars0.githubusercontent.com/u/9008623?s=460&v=4" alt="profile">
                                </div>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="avatar">
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Settings</a></li>
                                    <li><a href="#">Notifications</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="header__title">
                        <h1><i class="{{ $icon }}"></i>{{ $title }}</h1>
                    </div>
                    <nav>
                        <ul>
                            <li>
                                <a class="active">General</a>
                            </li>
                            <li>
                                <a>Tasks</a>
                            </li>
                            <li>
                                <a>Notes</a>
                            </li>
                            <li>
                                <a>Documents</a>
                            </li>
                        </ul>
                    </nav>
                </header>
                <div class="main__content">
                    {{ $slot }}
                </div>
            </main>
        </div>
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
        @yield('javascript')
    </body>
</html>
