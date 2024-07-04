<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('navbar')
    <div class="container mt-5">

        <a href="{{ route('products.create') }}" class="btn btn-dark" style="margin-bottom: 1%">Nuevo Producto</a>

        <h2>Productos</h2>
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
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->nombre}}</td>
                    <td>{{$product->codigo}}</td>
                    <td>{{$product->precio}}$</td>

                    @if ($product->stock == 0)
                        <td>Sin stock</td>
                    @else
                       <td>{{$product->stock}}</td>
                    @endif
                    
                    <td>
                        <a href="#" class="btn btn-secondary">Editar</a>
                        <form action="#" method="POST" style="display:inline-block">
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
</body>
@include('footer')
</html>
