<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    @include('components.header')
    <div class="container">
        <div class="row">
            <div class="card mt-3" style="width: 18rem;">
                <div class="card-body">
                    asdasd
                    <p>Nombre: {{ $subject->name }}</p>
                    <p>Duración: {{ $subject->duration }}</p>
                    <p>Profesor: {{ $subject->teacher->name }}</p>
                    <p>Salario: {{ $subject->teacher->salary }}</p>
                    <p>Email: {{ $subject->teacher->email }}</p>
                    <p>Activo: {{ $subject->teacher->active }}</p>
                    <p>Tests:</p>
                    @foreach ($subject->tests as $test)
                    <p>Nombre: {{ $test->name }}</p>
                    <p>Preguntas: {{ $test->numberQuestions }}</p>
                    <p>Tipo: {{ $test->type }}</p>
                    <p>Asignatura: {{ $test->subject_id }}</p>
                    <div class="container">
                        <div class="row">
                            <a href="{{ route('test.edit', $test) }}"><button type="button"
                                    class="btn btn-primary">Editar</button></a>
                        </div>
                        <div class="row mt-2">
                            <form action="{{ route('test.destroy', $test) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar test</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    <div class="container">
                        <div class="row">
                            <a href="{{ route('index') }}"><button type="button"
                                    class="btn btn-primary">Inicio</button></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>