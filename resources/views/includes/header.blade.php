
<div class="navbar">
    <div class="navbar-inner">
        <a id="logo" href="{{ config('app.url')}} ">Travel Agency</a>
        <div class="header-flex">
            <ul class="nav">
                <li><a href="{{ config('app.url') }}">Home</a></li>
                <li><a href="{{ config('app.url') }}/tours">Tours</a></li>
                <li><a href="{{ config('app.url') }}/continents">Continents</a></li>
                <li><a href="{{ config('app.url') }}/locations">Locations</a></li>
            </ul>
             <div class="search">
                <form method="GET" action="">
                    <input type="search" name="search" value="{{ request('search') }}">
                    <button>Search</button>
                </form>
            </div>
        </div>
    </div>
</div>
