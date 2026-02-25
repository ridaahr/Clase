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
        <h2>Autor</h2>
        @if (isset($message))
        <div class="alert alert-primary" role="alert">
            {{ $message }}
        </div>
        @endif
        <div class="row">
            <div class="mt-3">
                <div class="card bg-light border-warning">
                    <div class="card-body">
                        @foreach ($authors as $a)
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
                        @endforeach
                                            <a class="btn btn-primary mt-3 btn-sm" href="{{ route('index') }}">Inicio</a>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>