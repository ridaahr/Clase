<header>
    <nav class="navbar navbar-expand navbar-dark bg-dark px-4">
        <a class="navbar-brand fw-bold" href="#">
            Tierno News
        </a>

        <ul class="navbar-nav ms-auto d-flex flex-row gap-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('journalist') }}">Journalists</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('article.index') }}">Articles</a>
            </li>

            @if (request()->routeIs('journalist*'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('journalist.create') }}">Create journalists</a>
            </li>
            @elseif (request()->routeIs('article*'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('article.create') }}">Create article</a>
            </li>
            @endif
        </ul>
    </nav>
</header>