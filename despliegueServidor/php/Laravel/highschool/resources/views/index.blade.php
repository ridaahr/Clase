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
            @foreach ($teachers as $teacher)
            <div class="card mt-3" style="width: 18rem;">
                <div class="card-body">
                    <p>Nombre: {{ $teacher->name }}</p>
                    <p>Email: {{ $teacher->email }}</p>

                    <p>Asignaturas:
                        @if ($teacher->subjects->count() == 0)
                        No tiene
                        @endif
                    </p>
                    @foreach ($teacher->subjects as $subject)
                    <p>Asignatura: {{ $subject->name }}</p>
                    <p>Nº tests: {{ $subject->tests->count() }} </p>
                    @endforeach

                    <div class="container">
                        <div class="row">
                            <a href="{{ route('teacher.show', $teacher->id) }}"><button type="button"
                                    class="btn btn-primary">Ver profesor</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>