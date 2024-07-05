<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de la Venta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    @include('navbar')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Detalles de la Venta</h3>
            </div>
            <div class="card-body">
                <h5>Datos del Cliente</h5>
                <p><strong>Nombre:</strong> {{ $sale->nombre }}</p>
                <p><strong>{{ $sale->nit ? 'Razón Social' : 'Número de Identificación' }}:</strong> {{ $sale->nit ? $sale->razon_social : $sale->documento }}</p>
                @if ($sale->nit)
                    <p><strong>NIT:</strong> {{ $sale->nit }}</p>
                @endif

                <h5>Productos</h5>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sale->details as $index => $detail)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $detail->product->nombre }}</td>
                            <td>{{ $detail->cantidad }}</td>
                            <td>{{ $detail->precio }}$</td>
                            <td>{{ $detail->cantidad * $detail->precio }}$</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <h5>Total</h5>
                <p><strong>Total (con IVA):</strong> {{ $sale->total }}$</p>

                <a href="{{ route('sales.index') }}" class="btn btn-primary mt-3">Volver a la lista de ventas</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybAOVT9ZLuuN0zA3yBFDYZLiG2z1lW0Ijeq6D8mF4XjW2pH3C" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-cu6ycY8mCqPbUaDfjxnNtdf5MSXxHYQ5zXUomkuE2pq2Jz+9lpPCihS64TDbpLPx" crossorigin="anonymous"></script>
</body>
@include('footer')
</html>
