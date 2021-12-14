<!doctype html>
<html>

<head>
    @include('includes.dashboard_head')
</head>

<body>
    <div class="container">
        <header>
            @include('includes.dashboard_header')
        </header>
        <aside class="menu-sidebar d-none d-lg-block">
            @include('includes.dashboard_sidebar')
        </aside>
        <div id="main" class="row">
                    @yield('dashboard_content')
        </div>
    </div>
    <footer class="container-fluid">
        @include('includes.dashboard_footer')
        
    </footer>