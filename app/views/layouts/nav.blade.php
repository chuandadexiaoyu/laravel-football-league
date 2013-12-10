<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="/" class="navbar-brand">Championship Manager 01/02</a>

        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                @if (!Auth::check())
                <li><a href="/teams">Teams</a></li>
                <li><a href="/players">Players</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                <li><a href="{{{ URL::to('account/logout') }}}">Logout</a></li>
                @else
                <li><a href="{{{ URL::to('account/login') }}}">Login</a></li>
                <li><a href="{{{ URL::to('account/register') }}}">Sign Up</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>