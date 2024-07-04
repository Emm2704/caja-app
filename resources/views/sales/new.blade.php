<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva Venta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    @include('navbar')

    <div class="p-5 mb-4 text-bg-dark container-fluid">
        <div class="container">
            <h1 class="display-5 fw-bold">Registrar Venta</h1>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <span>Datos del Cliente</span>
            </div>
            <div class="card-body">
                <form method="POST" class="form-horizontal" action="{{ route('sales.store') }}">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="buyer_type">Tipo de Comprador:</label>
                        <div class="col-sm-10">
                            <select id="buyer_type" class="form-select" name="buyer_type" required>
                                <option value="">Seleccionar tipo de comprador</option>
                                <option value="persona">Persona</option>
                                <option value="entidad">Entidad</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre del cliente" required>
                        </div>
                    </div>
                    <div class="form-group" id="persona-fields">
                        <label class="control-label col-sm-2" for="documento">Número de Identificación:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="documento" name="documento" placeholder="Ingrese número de identificación">
                        </div>
                    </div>
                    <div class="form-group" id="entidad-fields" style="display: none;">
                        <label class="control-label col-sm-2" for="razon_social">Razón Social:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="razon_social" name="razon_social" placeholder="Ingrese razón social">
                        </div>
                        <label class="control-label col-sm-2" for="nit">NIT:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nit" name="nit" placeholder="Ingrese NIT">
                        </div>
                    </div>
                    
                    <div class="card-header mt-4">
                        <span>Productos</span>
                    </div>
                    <div class="card-body" id="products-container">
                        <div class="product-row mb-3">
                            <select class="form-select product-select" name="products[0][id]" required>
                                <option value="">Seleccionar producto</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->nombre }} - ${{ $product->precio }}</option>
                                @endforeach
                            </select>
                            <input type="number" class="form-control product-quantity mt-2" name="products[0][quantity]" placeholder="Cantidad" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="button" class="btn btn-secondary mb-3" id="add-product">Añadir Producto</button>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybAOVT9ZLuuN0zA3yBFDYZLiG2z1lW0Ijeq6D8mF4XjW2pH3C" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-cu6ycY8mCqPbUaDfjxnNtdf5MSXxHYQ5zXUomkuE2pq2Jz+9lpPCihS64TDbpLPx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let productIndex = 1;

            document.getElementById('add-product').addEventListener('click', function () {
                const container = document.getElementById('products-container');
                const newRow = document.createElement('div');
                newRow.classList.add('product-row', 'mb-3');
                newRow.innerHTML = `
                    <select class="form-select product-select" name="products[${productIndex}][id]" required>
                        <option value="">Seleccionar producto</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->nombre }} - ${{ $product->precio }}</option>
                        @endforeach
                    </select>
                    <input type="number" class="form-control product-quantity mt-2" name="products[${productIndex}][quantity]" placeholder="Cantidad" required>
                `;
                container.appendChild(newRow);
                productIndex++;
            });

            document.getElementById('buyer_type').addEventListener('change', function () {
                const personaFields = document.getElementById('persona-fields');
                const entidadFields = document.getElementById('entidad-fields');

                if (this.value === 'persona') {
                    personaFields.style.display = 'block';
                    entidadFields.style.display = 'none';
                } else if (this.value === 'entidad') {
                    personaFields.style.display = 'none';
                    entidadFields.style.display = 'block';
                } else {
                    personaFields.style.display = 'none';
                    entidadFields.style.display = 'none';
                }
            });
        });
    </script>
</body>
@include('footer')
</html>
