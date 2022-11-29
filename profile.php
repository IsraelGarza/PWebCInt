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

        <title>Mi Perfil | Compras MX</title>
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
                        <?php }?>
                        <?php if($tipousuario == 2) {?>
                        <li class="nav-item">
                            <a href="cart.php" class="nav-link">Mis Productos</a>
                        </li>
                        <?php }?>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">Cerrar Sesión</a>
                        </li>
                </div>
            </div>
        </nav>


        <!-- Perfil de Usuario -->
        <div class="container my-5 bg-dark pt-2 pb-5">
            <div class="main-body py-5 px-4 my-3">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <?php 
                                        echo '<img class="rounded-circle"   width="150" src="data:image/jpeg;base64,'.    base64_encode($imagen).'"/>';

                                        if (empty($imagen)) {
                                            echo '<img class="card-img-top"         style="width:150px;height:auto"     src="img/   defaultimg.jpg"/>';
                                            $imagen = "img/defaultimg.jpg";
                                        }
                                    ?>
                                    <div class="mt-3">
                                      <h4><?php echo $username; ?></h4>
                                      <p class="text-secondary">
                                        Tipo de Usuario: <?php if($tipousuario == 1){
                                            echo "Comprador(a)";
                                        }else if($tipousuario == 2){
                                            echo "Vendedor(a)";
                                        }else if($tipousuario == 3){
                                            echo "Administrador(a)";
                                        }else
                                            echo "ERROR"?></p>
                                      <a class="btn btn-outline-danger my-3" href="logout.php">Cerrar Sesión</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla Datos Personales -->
                    <div class="col-md-8 mb-5">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nombre(s)</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $nombre; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Apellidos</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $apellidos; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Fecha de Nacimiento</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $fechaNac; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Correo</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $correo; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Contraseña</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $pass; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                      <a class="btn accent-bg-color " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Editar datos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    </body>
</html>