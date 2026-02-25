<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">

    <h2>Posts</h2>

    @if (session('result'))
        <div class="alert alert-success">{{ session('result') }}</div>
    @endif

    <a class="btn btn-success mb-3" href="{{ route('post.create') }}">Crear Post</a>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-6 mb-3">
                <div class="card border-primary">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>

                        <p class="text-muted mb-2">
                            Autor: {{ $post->author?->name ?? 'Sin autor' }}
                        </p>

                        <a class="btn btn-warning btn-sm"
                           href="{{ route('post.edit', $post->id) }}">
                           Editar Post
                        </a>

                        <a class="btn btn-success btn-sm"
                           href="{{ route('comment.create', $post->id) }}">
                           Añadir comentario
                        </a>

                        <hr>

                        <h6>Comentarios ({{ $post->comments->count() }})</h6>

                        @if ($post->comments->count() > 0)
                            @foreach ($post->comments as $comment)
                                <div class="border rounded p-2 mb-2">
                                    <p class="mb-1">{{ $comment->content }}</p>
                                    <a class="btn btn-outline-warning btn-sm"
                                       href="{{ route('comment.edit', $comment->id) }}">
                                       Editar comentario
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">No hay comentarios</p>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a class="btn btn-primary mt-3" href="{{ route('index') }}">Inicio</a>
</div>
</body>
</html>