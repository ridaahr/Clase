<header>
    <nav class="navbar navbar-expand navbar-dark bg-dark px-4">
        <a class="navbar-brand fw-bold" href="#">
            SHOP
        </a>

        <ul class="navbar-nav ms-auto d-flex flex-row gap-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">Inicio</a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('client.create') }}">Crear cliente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('order.create') }}">Crear pedidos</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout, {{ auth()->user()->name }}</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @endauth
        </ul>
    </nav>
</header>