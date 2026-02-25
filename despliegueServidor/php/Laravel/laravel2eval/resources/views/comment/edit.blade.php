<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Comentario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">

    <h2>Editar comentario</h2>

    @if(isset($post))
        <p class="text-muted">Post: {{ $post->title }}</p>
    @endif

    <form action="{{ route('comment.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Contenido</label>
            <textarea name="content" rows="4"
                class="form-control @error('content') is-invalid @enderror">{{ old('content', $comment->content) }}</textarea>

            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-warning">Actualizar</button>
        <a class="btn btn-secondary" href="{{ route('index') }}">Cancelar</a>
    </form>

</div>
</body>
</html>