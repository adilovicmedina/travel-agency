<!doctype html>
<html>
<head>
   @include('includes.head')
</head>
<body>
<div class="container">
   <header class="row header-padding">
       @include('includes.header')
   </header>
   <div id="main" class="row">
        <h4 class="col-12 title">
            @yield('title')
        </h4>
        @yield('content')
   </div>
</div>
 <footer class="container-fluid">
       @include('includes.footer')
   </footer>
</body>
</html>