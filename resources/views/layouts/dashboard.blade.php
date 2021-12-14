<!DOCTYPE html>
<html lang="en">

<head>
@include('includes.dashboard_head')
</head>
<body class="animsition">
    <div class="page-wrapper">
            @include('includes.dashboard_header')
        <aside class="menu-sidebar d-none d-lg-block">
            @include('includes.dashboard_sidebar')
        </aside>
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('includes.dashboard_footer')