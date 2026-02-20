<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include("components.header")

    <div class="container mt-4">
        <h2>Pedidos</h2>
        <p class="bg-info p-2 rounded">Estos son los productos de mi BD</p>

        @if (session('deleted'))
        <div class="alert alert-success">
            {{ session('deleted') }}
        </div>
        @endif
        <div class="col">
            <div class="col">
                <form action="{{ route('product.search') }}" method="post">
                    @csrf
                    <!-- añade un campo hidden con un token imprescindible para que laravel le deje continuar -->
                    <div class="form-group">
                        <label for="minPrice">Precio mínimo</label>
                        <input name="minPrice" type="text" class="form-control @error('minPrice') is-invalid @enderror" value="{{ old('minPrice') }}" id="minPrice" placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <label for="maxPrice">Precio máximo</label>
                        <input name="maxPrice" type="text" class="form-control @error('maxPrice') is-invalid @enderror" value="{{ old('maxPrice') }}" id="maxPrice" placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <label for="size">Talla</label>
                        <input name="size" type="numero" class="form-control" id="size" placeholder="Enter size">
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
                <div class="row">
                    @if( isset ($products))
                    @foreach ($products as $p)
                    <div class="col-md-4 mt-3">
                        <div class="card bg-light border-warning">
                            <div class="card-body">
                                <p>Nombre: {{ $p->name }}</p>
                                <p>Precio: {{ $p->price }}</p>
                                <p>Talla: {{ $p->size }}</p>
                                <p>Descripción: {{ $p->description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    @if( isset ($message))
                        {{ $message }}
                    @endif
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>