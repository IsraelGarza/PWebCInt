<?php

    session_start();

    if(!isset($_SESSION['userId'])){
        header("Location: login.php");
    }

    $username = $_SESSION['username'];
    $nombre = $_SESSION['nombre'];
    $apellidos = $_SESSION['apellidos'];
    $fechaNac = $_SESSION['fechaNac'];
    $correo = $_SESSION['correo'];
    $imagen = $_SESSION['imagen'];
    $pass = $_SESSION['pass'];
    $tipousuario = $_SESSION['tipousuario'];

?>

<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="ventas, compraventa, productos en linea, tienda, envio, méxico">
        <meta name="author" content="Israel Garza">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="style.css">

        <title>Iniciar Sesión | Compras MX</title>
    </head>
    <body class="bg-white bg-gradient">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg secondary-bg-color navbar-dark py-3 sticky-top">
            <div class="container">
                <a href="/PWebCInt/home.php" class="navbar-brand">Compras <span class="text-warning">MX</span></a>

                <button class="button navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                            <a href="profile.php" class="nav-link">Perfil</a>
                        </li>
                        <?php if($tipousuario == 1 || $tipousuario == 2) {?>
                        <li class="nav-item">
                            <a href="cart.php" class="nav-link">Mi Carrito<span class="badge bg-dark text-white ms-1 rounded-pill">3</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="listas.php" class="nav-link">Mis Listas</a>
                        </li>
                        <?php }?>
                        <?php if($tipousuario == 2) {?>
                        <li class="nav-item">
                            <a href="myproducts.php" class="nav-link">Mis Productos</a>
                        </li>
                        <?php }?>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <section class="gradient-form">
            <div class="container py-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12">
                        <div class="card rounded-3 text-white bg-dark py-5">
                            <div class="row g-0">
                                <div class="col-lg-12">
                                    <div class="card-body p-md-5 mx-md-4">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="mb-2">Mi Carrito</h1>
                                            <h6 class="mb-0 text-muted">3 artículos</h6>
                                        </div>
                                        <hr class="my-4">

                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-3">
                                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img5.webp"
                                                class="img-fluid rounded-3" alt="imgProducto">
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Categoria</h6>
                                                <h6 class="mb-0">Producto 1</h6>
                                            </div>

                                            <div class="col-md d-flex">
                                                <button class="btn accent-bg-color btn-link px-1 mx-2"
                                                  onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                  <i class="bi bi-dash"></i>
                                                </button>

                                                <input id="form1" min="0" name="quantity" value="1" type="number"
                                                  class="form-control form-control-sm px-1" />

                                                <button class="btn accent-bg-color btn-link px-1 mx-2"
                                                  onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                  <i class="bi bi-plus"></i>
                                                </button>
                                            </div>
                                            <div class="col-md">
                                                <h6 class="mb-0">$120.00 MXN</h6>
                                            </div>

                                            <div class="col-md">
                                                <i class="bi bi-trash-fill"></i>
                                            </div>
                                        </div>
                                        <hr class="my-4">

                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-3">
                                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img5.webp"
                                                class="img-fluid rounded-3" alt="imgProducto">
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Categoria</h6>
                                                <h6 class="mb-0">Producto 2</h6>
                                            </div>

                                            <div class="col-md d-flex">
                                                <button class="btn accent-bg-color btn-link px-1 mx-2"
                                                  onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                  <i class="bi bi-dash"></i>
                                                </button>

                                                <input id="form1" min="0" name="quantity" value="1" type="number"
                                                  class="form-control form-control-sm px-1" />

                                                <button class="btn accent-bg-color btn-link px-1 mx-2"
                                                  onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                  <i class="bi bi-plus"></i>
                                                </button>
                                            </div>
                                            <div class="col-md">
                                                <h6 class="mb-0">$600.00 MXN</h6>
                                            </div>

                                            <div class="col-md">
                                                <i class="bi bi-trash-fill"></i>
                                            </div>
                                        </div>
                                        <hr class="my-4">

                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-3">
                                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img5.webp"
                                                class="img-fluid rounded-3" alt="imgProducto">
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Categoria</h6>
                                                <h6 class="mb-0">Producto 3</h6>
                                            </div>

                                            <div class="col-md d-flex">
                                                <button class="btn accent-bg-color btn-link px-1 mx-2"
                                                  onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                  <i class="bi bi-dash"></i>
                                                </button>

                                                <input id="form1" min="0" name="quantity" value="1" type="number"
                                                  class="form-control form-control-sm px-1" />

                                                <button class="btn accent-bg-color btn-link px-1 mx-2"
                                                  onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                  <i class="bi bi-plus"></i>
                                                </button>
                                            </div>
                                            <div class="col-md">
                                                <h6 class="mb-0">$270.00 MXN</h6>
                                            </div>

                                            <div class="col-md">
                                                <i class="bi bi-trash-fill"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="button" class="btn accent-bg-color btn-block btn-lg" onclick="parent.location='venta.php'">
                                                <div class="d-flex justify-content-between">
                                                    <span>Pagar</span>
                                                    <span class="ms-2">($990.00 MXN)</span>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <!-- Footer -->
        <footer class="text-center text-md-start bg-dark text-light py-5 position-relative">
            <div class="container">
                <section class="d-flex justify-content-center justify-content-md-between border-bottom">
                    <div class="me-5 d-none d-md-block">
                        <h4>Compras <span class="text-warning">MX</span></h4>
                    </div>
                    <div class="mb-3">
                        <p>
                            <a class="text-white me-4" href="#">Términos y condiciones</a>
                           <a class="text-white me-4" href="#">Política de privacidad</a>
                        </p>
                    </div>
                </section>
                <a href="#" class="position-absolute bottom-0 end-0 p-5">
                    <i class="bi bi-arrow-up-circle h1 text-warning"></i>
                </a>
                <div class="text-center pt-4">
                    <p>&copy; 2022, Compras MX S.A de CV. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>

        <script src="login.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    </body>
</html>