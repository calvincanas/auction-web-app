<ul class="nav">
    <li class="nav-item @if (Request::is('/')) active @endif">
        <a class="nav-link" href="javascript:;">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item @if(Request::routeIs('users.*')) active @endif">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="material-icons">table</i>
            <p>Users</p>
        </a>
    </li>
</ul>