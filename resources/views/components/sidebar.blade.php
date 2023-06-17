<ul class="nav">
    <li class="nav-item @if (Request::routeIs('dashboard.*')) active @endif">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item @if(Request::routeIs('users.*')) active @endif">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="material-icons">people</i>
            <p>Users</p>
        </a>
    </li>
    <li class="nav-item @if(Request::routeIs('products.*')) active @endif">
        <a class="nav-link" href="{{ route('products.index') }}">
            <i class="material-icons">store</i>
            <p>Products</p>
        </a>
    </li>
</ul>