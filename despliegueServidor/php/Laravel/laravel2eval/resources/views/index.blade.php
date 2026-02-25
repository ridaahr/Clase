<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Autores</h2>

        @if (session('deleted'))
        <div class="alert alert-success">
            {{ session('deleted') }}
        </div>
        @endif

        <div class="row">
            @foreach ($authors as $a)
            <div class="col-md-4 mt-3">
                <div class="card bg-light border-warning">
                    <div class="card-body">
                        <p>Nombre: {{ $a->name }}</p>
                        <p>Email: {{ $a->email }}</p>
                        <p>Edad: {{ $a->age }}</p>
                        <p>Posts: </p>
                        @if (count($a ->posts) > 0)
                        @foreach ($a ->posts as $post)
                        <p> {{ $post->title }} </p>
                        <p>Número comentarios: {{ $post->comments->count() }}</p>
                        @endforeach
                        @else
                        <p> No tiene posts </p>
                        @endif
                        <a href="{{ route('author.edit', $a->id) }}" class="btn btn-primary btn-sm">See author</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>