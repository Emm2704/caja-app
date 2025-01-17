<body>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
        <!-- Bootstrap Linki -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
        <title>Nuevo Producto</title>
    </head>
    <body>

        @include('navbar')

      <div class="p-5 mb-4 text-bg-dark container-fluid">
        <div class="container">
          <h1 class="display-5 fw-bold">Agregar Producto</h1>
        </div>
      </div>
        <div class="container">
          <div class="card">
              <div class="card-header">
                  <span>Datos del Producto</span>
              </div>
              <div class="card-body">
                <form method="POST" class="form-horizontal" action="{{ route('products.store') }}">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre">Nombre del Producto:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre de proyecto:" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="codigo">Código del Producto:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingrese codigo de proyecto: P001" requred>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="precio">Precio del Producto:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="precio" name="precio" placeholder="Ingrese precio de proyecto: 10.99" requred>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="stock">Stock del Producto:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="Ingrese stock de proyecto:" requred>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-dark">Guardar</button>
                            
                        </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
      @include('footer')
</body>