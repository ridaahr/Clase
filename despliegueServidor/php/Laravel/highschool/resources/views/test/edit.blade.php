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
    @include('components.header')
    <div class="container">
        <div class="row">
            <form action="{{ route('test.update', $test) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" value="{{ $test->name }}" name="name" id="name" aria-describedby="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="numberQuestions">Preguntas</label>
                    <input type="number" class="form-control" value="{{ $test->numberQuestions }}" name="numberQuestions" id="numberQuestions" placeholder="numberQuestions">
                </div>
                <div class="form-group">
                    <label for="type">Tipo</label>
                    <input type="number" class="form-control" value="{{ $test->type }}" name="type" id="numberQuestions" placeholder="numberQuestions">
                </div>
                <select name="subject_id" id="">
                    @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" @selected($subject->id == $test->subject_id)>
                        {{ $subject->name }}
                    </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>
</body>

</html>