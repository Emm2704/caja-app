<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            padding: 20px;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Factura</h1>
            <p>Fecha: {{ date('d-m-Y') }}</p>
        </div>
        <div class="content">
            <h3>Datos del Cliente</h3>
            <p><strong>Nombre:</strong> {{ $sale->nombre }}</p>
            <p><strong>{{ $sale->nit ? 'Razón Social' : 'Número de Identificación' }}:</strong> {{ $sale->nit ? $sale->razon_social : $sale->documento }}</p>
            @if ($sale->nit)
                <p><strong>NIT:</strong> {{ $sale->nit }}</p>
            @endif
        </div>
        <div class="content">
            <h3>Productos</h3>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sale->details as $index => $detail)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $detail->product->nombre }}</td>
                        <td>{{ $detail->cantidad }}</td>
                        <td>{{ $detail->precio }}$</td>
                        <td>{{ $detail->cantidad * $detail->precio }}$</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="content">
            <h3>Total</h3>
            <p><strong>Total (con IVA):</strong> {{ $sale->total }}$</p>
        </div>
        <div class="footer">
            <p>Gracias por su compra</p>
        </div>
    </div>
</body>
</html>
