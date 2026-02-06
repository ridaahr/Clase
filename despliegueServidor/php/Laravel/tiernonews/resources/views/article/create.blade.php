<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a new article</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    @include("components.header")
    <div class="container">
        <div class="row">
            @if ($errors->any())
            @foreach($errors->all() as $c => $error)
            <div class="alert alert-danger mt-2">
                {{ $error }}
            </div>
            @endforeach
            @endif
            <div class="col">
                <form action="{{ route('article.store') }}" method="post">
                    @csrf
                    <!-- añade un campo hidden con un token imprescindible para que laravel le deje continuar -->
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title" placeholder="Enter title">
                        @error('title')<small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Contenido</label>
                        <input name="content" type="text" class="form-control" id="content" placeholder="Enter content">
                    </div>
                    <div class="form-group">
                        <label for="readers">Lectores</label>
                        <input name="readers" type="numero" class="form-control" id="readers" placeholder="Enter readers">
                    </div>
                    <div class="form-group mt-3">
                        <label for="journalist_id">Journalist</label>
                        <select name="journalist_id" id="journalist_id"
                            class="form-select @error('journalist_id') is-invalid @enderror" required>
                            <option value="">Select journalist</option>

                            @foreach ($journalists as $journalist)
                            <option value="{{ $journalist->id }}"
                                {{ old('journalist_id') == $journalist->id ? 'selected' : '' }}>
                                {{ $journalist->name }}
                            </option>
                            @endforeach
                        </select>

                        @error('journalist_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>