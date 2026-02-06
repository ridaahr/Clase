<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    @include("components.header")
    <h2>Artículo</h2>
    <p class="bg-info">Este es el artículo que buscas</p>
    

        <p>Título: {{ $article->title }}</p>
        <p>Contenido: {{ $article->content }}</p>
        <p>Lectores: {{ $article->readers }}</p>
        <p>Periodista: {{ $article->journalist->name }}</p>

</body>
</html>