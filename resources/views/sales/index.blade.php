<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    @include('navbar')

    <div class="container mt-5">
        <a href="{{ route('sales.create') }}" class="btn btn-dark mb-3">Nueva Venta</a>

        <h2>Ventas</h2>
        
        <div class="mb-3">
            <label for="filtro-comprador" class="form-label">Filtrar por tipo de comprador:</label>
            <select id="filtro-comprador" class="form-select">
                <option value="todos">Todos</option>
                <option value="persona">Persona</option>
                <option value="entidad">Entidad</option>
            </select>
        </div>
        
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre del Cliente</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Razón Social</th>
                    <th scope="col">NIT</th>
                    <th scope="col">Total</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                <tr class="{{ $sale->nit ? 'entidad' : 'persona' }}">
                    <th scope="row">{{$sale->id}}</th>
                    <td>{{$sale->nombre}}</td>
                    <td>{{$sale->documento}}</td>
                    <td>{{$sale->razon_social}}</td>
                    <td>{{$sale->nit}}</td>
                    <td>{{$sale->total}}$</td>
                    <td>
                        <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-success">Ver</a>
                        <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta venta?');">
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
            $('#filtro-comprador').change(function() {
                var filtro = $(this).val();
                if (filtro === 'todos') {
                    $('tbody tr').show();
                } else if (filtro === 'persona') {
                    $('tbody tr').hide();
                    $('tbody tr.persona').show();
                } else if (filtro === 'entidad') {
                    $('tbody tr').hide();
                    $('tbody tr.entidad').show();
                }
            });
        });
    </script>
</body>
@include('footer')
</html>
