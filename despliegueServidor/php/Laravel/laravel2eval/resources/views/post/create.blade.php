<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Crear Post</h2>

    <form action="{{ route('post.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="title"
                   value="{{ old('title') }}"
                   class="form-control @error('title') is-invalid @enderror">

            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Contenido</label>
            <textarea name="content"
                      class="form-control @error('content') is-invalid @enderror"
                      rows="4">{{ old('content') }}</textarea>

            @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Autor</label>
            <select name="author_id"
                    class="form-select @error('author_id') is-invalid @enderror">
                <option value="">Seleccione autor</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}"
                        {{ old('author_id') == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>

            @error('author_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">Crear</button>
        <a class="btn btn-secondary" href="{{ route('index') }}">Cancelar</a>
    </form>
</div>
</body>
</html>