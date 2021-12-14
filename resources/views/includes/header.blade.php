<div style="padding-top: 50px;">
    <div class="navbar-inner">
        <div class="row">
            <div class="col-6">
                <a id="logo" href="{{ config('app.url')}} ">Travel Agency</a>
            </div>
            <div class="col-6 account">
                <ul style="display: flex;justify-content: flex-end;">
                    @auth
                    <li style="font-weight: 700; float: right; list-style: none; padding-right: 10px;">Welcome,
                        {{ auth()->user()->username }}!</li>
                    <li style="list-style: none">
                        <form method="POST" action="{{ config('app.url')}}/logout">
                            @csrf

                            <button type="submit">Log Out</button>
                        </form>
                    </li>

                    @else
                    <li style="list-style: none">
                        <a href="{{ config('app.url') }}/register" style="font-weight: 700; float: right; list-style: none; ">Register</a>
                    </li>
                    <li style="list-style: none; padding-left: 10px;"><a href="{{ config('app.url') }}/login"
                            style="font-weight: 700; float: right; list-style: none; ">Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
        <div class="header-flex">
            <ul class="nav">
                <li><a href="{{ config('app.url') }}">Home</a></li>
                <li><a href="{{ config('app.url') }}/tours">Tours</a></li>
                <li><a href="{{ config('app.url') }}/continents">Continents</a></li>
                <li><a href="{{ config('app.url') }}/locations">Locations</a></li>
                  @if (!Auth::guest())
         <p><a href="{{ route('users.show_user', Auth::id()) }}" class="btn btn-primary btn-sm">Your profile</a></p>
         @endif
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
