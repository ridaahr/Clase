<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journalist</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    @include("components.header")
    <h2>Journalist</h2>
    <p class="bg-info">Este es el periodista que buscas</p>
    <div class="container">
        <div class="row">
            <p>Nombre: {{ $journalist->name }}</p>
            <p>Apellidos: {{ $journalist->surname }}</p>
            <p>Email: {{ $journalist->email }}</p>
            <p>Contraseña: {{ $journalist->password }}</p>
        </div>
        <h3>{{ $journalist->name }} ha escrito {{ sizeof($journalist->articles) }} artículos</h3>
        <div class="row">
            @foreach ($journalist->articles as $article)
            <div class="col">
                <p>Título: {{ $article->title }}</p>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>