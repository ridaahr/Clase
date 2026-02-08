<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a new journalist</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    @include("components.header")
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('journalist.update', $journalist->id) }}" method="post">
                    @csrf
                    @method('put')
                    <!-- añade un campo hidden con un token imprescindible para que laravel le deje continuar -->
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input name="name" value={{ $journalist->name }} type="text" class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="surname">Apellidos</label>
                        <input name="surname" value={{ $journalist->surname }} type="text" class="form-control" id="surname" placeholder="Enter surname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" value={{ $journalist->email }} type="email" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="pass1">Contraseña</label>
                        <input name="password" type="password" class="form-control" id="pass1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="pass2">Repite la contraseña</label>
                        <input name="password2" type="password" class="form-control" id="pass2" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>