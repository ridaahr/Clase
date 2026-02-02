<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journalists</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    @include("components.header")
    <h2>Journalists</h2>
    <p class="bg-info">Estos son las y los periodistas de mi BD</p>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @foreach ($journalists as $j)
                        <p>Nombre: {{ $j->name }}</p>
                        <p>Apellidos: {{ $j->surname }}</p>
                        <p>Email: {{ $j->email }}</p>
                        <p>Contraseña: {{ $j->password }}</p>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>