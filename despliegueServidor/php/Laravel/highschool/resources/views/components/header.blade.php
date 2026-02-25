<header>
    <nav class="navbar navbar-expand navbar-dark bg-dark px-4">
        <a class="navbar-brand fw-bold" href="#">
            Highschool
        </a>

        <ul class="navbar-nav ms-auto d-flex flex-row gap-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('teacher.create') }}">Crear profesor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('subject.create') }}">Crear asignatura</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('test.create') }}">Crear test</a>
            </li>
        </ul>
    </nav>
</header>