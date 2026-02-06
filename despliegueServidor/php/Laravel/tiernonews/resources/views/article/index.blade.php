<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">
    @include('components.header')

    <div class="container mt-5">
        <h2 class="mb-3 text-primary fw-bold">Articles</h2>
        <p class="bg-info p-3 rounded text-white shadow-sm">
            Cada artículo es una tarjeta de la galería
        </p>

        @if(session('deleted'))
        <div class="alert alert-success mt-3 shadow-sm">
            {{ session('deleted') }}
        </div>
        @endif

        <div class="masonry mt-4">
            @forelse($articles as $a)
            <div class="card card-hover border-0 shadow-sm">
                <div class="card-header bg-warning fw-bold text-dark">
                    {{ $a->title }}
                </div>
                <div class="card-body">
                    <p class="card-text text-muted">{{ $a->content }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <span class="badge bg-info text-dark">Lectores: {{ $a->readers }}</span>
                    <div>
                        <a href="{{ route('article.edit', $a->id) }}" class="btn btn-sm btn-success">Editar</a>
                        <form action="{{ route('article.destroy', $a->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger">Borrar</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="alert alert-warning text-center w-100">
                No hay artículos disponibles 😔
            </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
