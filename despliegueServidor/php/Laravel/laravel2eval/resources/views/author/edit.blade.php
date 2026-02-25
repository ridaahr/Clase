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
        @if (session('result'))
        <div class="alert alert-primary" role="alert">
            {{ session('result') }}
        </div>
        @endif
        <div class="row">
            <div class="mt-3">
                <div class="card bg-light border-warning">
                    <div class="card-body">
                        <p>Nombre: {{ $a->name }}</p>
                        <p>Email: {{ $a->email }}</p>
                        <p>Edad: {{ $a->age }}</p>
                        <p>Posts: </p>
                        @if (count($a ->posts) > 0)
                        @foreach ($a ->posts as $post)
                        <p> {{ $post->title }} </p>
                        <p>Contenido: {{ $post->content }}</p>
                        <p>Comentarios: </p>
                        @foreach ($post->comments as $comment)
                        <p> {{ $comment->content }} </p>
                        @endforeach
                        <form action="{{ route('comment.destroy', $post->id) }}"
                            method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">
                                Borrar
                            </button>
                        </form>
                        @endforeach
                        @else
                        <p> No tiene posts </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-primary mt-3" href="{{ route('index') }}">Inicio</a>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>