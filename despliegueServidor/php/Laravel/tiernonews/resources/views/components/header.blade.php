<header>
    <nav class="navbar navbar-expand navbar-dark bg-dark px-4">
        <a class="navbar-brand fw-bold" href="#">
            Tierno News
        </a>

        <ul class="navbar-nav ms-auto d-flex flex-row gap-3">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('journalist') }}">🏠 Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('journalist.create') }}">✍️ Create</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">👤 About me</a>
            </li>
        </ul>
    </nav>
</header>
