<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .sin-stock {
            background-color: #ffcccc; /* Rojo claro */
        }
    </style>
</head>
<body>
    @include('navbar')

    <div class="container mt-5">
        <a href="{{ route('products.create') }}" class="btn btn-dark mb-3">Nuevo Producto</a>

        <h2>Productos</h2>
        <div class="mb-3">
            <label for="filtro-stock" class="form-label">Filtrar por stock:</label>
            <select id="filtro-stock" class="form-select">
                <option value="todos">Todos</option>
                <option value="con-stock">Con stock</option>
                <option value="sin-stock">Sin stock</option>
            </select>
        </div>

        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Código</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="@if ($product->stock == 0) sin-stock @endif">
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->nombre}}</td>
                    <td>{{$product->codigo}}</td>
                    <td>{{$product->precio}}$</td>
                    <td>{{$product->stock == 0 ? 'Sin stock' : $product->stock}}</td>
                    <td>
                        <a href="{{ route('products.edit', ['product'=>$product->id]) }}" class="btn btn-secondary">Editar</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                            @method('delete')
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybAOVT9ZLuuN0zA3yBFDYZLiG2z1lW0Ijeq6D8mF4XjW2pH3C" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-cu6ycY8mCqPbUaDfjxnNtdf5MSXxHYQ5zXUomkuE2pq2Jz+9lpPCihS64TDbpLPx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#filtro-stock').change(function() {
                var filtro = $(this).val();
                if (filtro === 'todos') {
                    $('tbody tr').show();
                } else if (filtro === 'con-stock') {
                    $('tbody tr').hide();
                    $('tbody tr').not('.sin-stock').show();
                } else if (filtro === 'sin-stock') {
                    $('tbody tr').hide();
                    $('tbody tr.sin-stock').show();
                }
            });
        });
    </script>
</body>
@include('footer')
</html>
