<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journalists</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include("components.header")

    <div class="container mt-4">
        <h2>Journalists</h2>
        <p class="bg-info p-2 rounded">Estos son las y los periodistas de mi BD</p>

        @if (session('deleted'))
        <div class="alert alert-success">
            {{ session('deleted') }}
        </div>
        @endif

        <div class="row">
            @foreach ($journalists as $j)
            <div class="col-md-4 mt-3">
                <div class="card bg-light border-warning">
                    <div class="card-body">
                        <p>Nombre: {{ $j->name }}</p>
                        <p>Apellidos: {{ $j->surname }}</p>
                        <p>Email: {{ $j->email }}</p>

                        <a href="{{ route('journalist.edit', $j->id) }}"
                            class="btn btn-success btn-sm">Editar</a>

                        <form action="{{ route('journalist.destroy', $j->id) }}"
                            method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">
                                Borrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>