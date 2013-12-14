<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            {{ HTML::link('/', 'Championship Manager 01/02', array('class' => 'navbar-brand')) }}
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                @if (Auth::check())
                <li>{{ HTML::link('teams', 'Teams') }}</li>
                <li>{{ HTML::link('players', 'Players') }}</li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(!Auth::check())
                <li>{{ HTML::link('users/register', 'Register') }}</li>
                <li>{{ HTML::link('users/login', 'Login') }}</li>
                @else
                <li>{{ HTML::link('users/logout', 'Logout') }}</li>
                @endif
            </ul>
        </div>
    </div>
</div>