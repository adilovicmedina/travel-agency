<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body>
    <div class="container">
        <header>
            @include('includes.header')
        </header>
        <div id="main" class="row">
            <h4 class="col-12 title">
                @yield('title')
            </h4>
            <div class="container-fluid">
                <div class="row">
                @yield('content')
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid">
        @include('includes.footer')

    </footer>