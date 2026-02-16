<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cliente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    @include("components.header")
    <!--Formulario de creación de journalist:
        - nombre
        - apellidos
        - email
        - contraseña
        - repite la contraseña
    -->
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
                <form action="{{ route('client.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Enter name"
                        >
                        @error('name')<small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="surname">Apellidos</label>
                        <input name="surname" type="text" class="form-control" id="surname" placeholder="Enter surname">
                    </div>
                    <div class="form-group">
                        <label for="address">Direccioń</label>
                        <input name="text" type="text" class="form-control" id="address" placeholder="Address">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>