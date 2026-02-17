<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create pedido</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    @include("components.header")
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
                <form action="{{ route('order.store') }}" method="post">
                    @csrf
                    <!-- añade un campo hidden con un token imprescindible para que laravel le deje continuar -->
                    <div class="form-group">
                        <label for="date">Fecha</label>
                        <input name="date" type="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" id="date" placeholder="Enter date">
                        @error('date')<small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="client_id">Cliente</label>
                        <select name="client_id" id="client_id"
                            class="form-select @error('client_id') is-invalid @enderror" required>
                            <option value="">Selecciona cliente</option>

                            @foreach ($clients as $client)
                            <option value="{{ $client->id }}"
                                {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                {{ $client->name }}
                            </option>
                            @endforeach
                        </select>

                        @error('client_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="product_id">Producto</label>
                        <select name="product_id" id="product_id"
                            class="form-select @error('product_id') is-invalid @enderror" required>
                            <option value="">Selecciona producto</option>

                            @foreach ($products as $product)
                            <option value="{{ $product->id }}"
                                {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                            @endforeach
                        </select>

                        @error('client_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>