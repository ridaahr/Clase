<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Comentario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">

    <h2>Crear comentario</h2>
    <p class="text-muted">Post: {{ $post->title }}</p>

    <form action="{{ route('comment.store') }}" method="POST">
        @csrf

        <!-- importante: post_id oculto -->
        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <div class="mb-3">
            <label class="form-label">Contenido</label>
            <textarea name="content" rows="4"
                class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>

            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @error('post_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-success">Crear</button>
        <a class="btn btn-secondary" href="{{ route('index') }}">Cancelar</a>
    </form>

</div>
</body>
</html>