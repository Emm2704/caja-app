<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bienvenido</title>
    <style>
        .hero {
            background-image: url('https://source.unsplash.com/1600x900/?technology');
            background-size: cover;
            background-position: center;
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero h1 {
            font-size: 4rem;
            font-weight: bold;
        }
        .hero p {
            font-size: 1.5rem;
        }
        .gallery img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

    @include('navbar')

    <!-- Hero Section -->
    <div class="text-center">
        <div>
            <h1>Bienvenido a Mi Empresa</h1>
            <p>Ofrecemos los mejores productos tecnológicos</p>
            <a href="{{ route('products.index') }}" class="btn btn-dark btn-lg">Explora nuestros productos</a>
        </div>
    </div>

    <!-- About Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Sobre Nosotros</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel ligula scelerisque, finibus odio eget, mattis purus. Nullam bibendum justo vel justo sollicitudin aliquam.
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt, hic, quisquam architecto perferendis illum, animi eos quia dolorum voluptas distinctio temporibus consequuntur totam est magni. Eius minima quis eligendi soluta.
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit magnam esse rem. Quisquam sunt odit nam doloribus officia? Sint perspiciatis doloremque tempore voluptatibus minus sit architecto dolorum atque, quibusdam vitae.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, placeat quas? Quia quas laboriosam sint similique dolorum eligendi soluta, deserunt, corrupti, voluptatum explicabo in quisquam. Sed ipsa temporibus ipsam iure.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores cum quibusdam similique, delectus veniam, possimus molestias recusandae vero unde illo eaque beatae id deleniti quos in aut voluptatibus officia! Illum.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum, rem. Consequatur, ratione illum possimus veniam temporibus velit harum cupiditate, adipisci labore aperiam dolore perferendis? Vel pariatur tenetur dignissimos eligendi quia?
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime voluptatum sed expedita iste quaerat, impedit dolorem reiciendis perspiciatis minus sapiente asperiores porro dolor quidem delectus doloribus id qui tenetur recusandae.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum atque, in optio porro necessitatibus totam labore aliquam, qui dolorem a non quisquam recusandae. Iusto dolor iure, temporibus aspernatur facilis eligendi!
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium eligendi excepturi ipsam eos nostrum, voluptates sunt culpa possimus omnis itaque quidem maxime pariatur quis officia neque sint vero? Maxime, aut.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi iusto consectetur aliquid sapiente corrupti deleniti excepturi, maiores eveniet officia sed iure ad recusandae error dolor explicabo tempora natus animi adipisci.
                </p>
            </div>
            <div class="col-md-6">
                <img src="https://i.pinimg.com/564x/54/84/52/5484528f52fed1c97f7d16e585de3fa3.jpg" alt="Office Image" class="img-fluid rounded">
            </div>
        </div>
    </div>

    <!-- Products Gallery -->
    <div class="container my-5">
        <h2 class="text-center">Nuestros Productos</h2>
        <div class="row gallery">
            <div class="col-md-4">
                <img src="https://i.pinimg.com/564x/11/73/a0/1173a0970b02ff178bb6eadf98ebbd96.jpg" alt="Product 1" class="img-fluid rounded">
            </div>
            <div class="col-md-4">
                <img src="https://i.pinimg.com/564x/82/cd/7e/82cd7e61e37432dc3aa96ba825264305.jpg" alt="Product 2" class="img-fluid rounded">
            </div>
            <div class="col-md-4">
                <img src="https://i.pinimg.com/564x/09/51/5c/09515cf40f46d1ad43a6af253783ef18.jpg" alt="Product 3" class="img-fluid rounded">
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('footer')

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybAOVT9ZLuuN0zA3yBFDYZLiG2z1lW0Ijeq6D8mF4XjW2pH3C" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-cu6ycY8mCqPbUaDfjxnNtdf5MSXxHYQ5zXUomkuE2pq2Jz+9lpPCihS64TDbpLPx" crossorigin="anonymous"></script>
</body>
</html>
