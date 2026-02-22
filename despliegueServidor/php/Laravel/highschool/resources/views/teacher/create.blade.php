<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Asignatura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <form action="{{ route('teacher.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="duration">Salario</label>
                    <input type="number" class="form-control" name="salary" id="salary" placeholder="salary">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email">
                </div>
                <div class="form-check">
                    <input type="hidden" name="active" value="0">
                    <input type="checkbox" class="form-check-input" name="active" id="active" value="1">
                    <label class="form-check-label" name="active" for="active">Active</label>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
    </div>
</body>

</html>