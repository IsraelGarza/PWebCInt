<?php

    require "db.php";
    require "config.php";
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

    $sql = "SELECT * FROM productos WHERE activo = 1";
    $resultado = $con->query($sql);
    $datos=mysqli_fetch_array($resultado);

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

        <title>Inicio | Compras MX</title>
    </head>
    <body class="d-flex flex-column min-vh-100 bg-white bg-gradient">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg secondary-bg-color navbar-dark py-3 sticky-top">
            <div class="container">
                <a href="home.php" class="navbar-brand">Compras <span class="text-warning">MX</span></a>

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

        <!-- Búsqueda -->
        <section class="secondary-bg-color text-light py-5">
            <div class="container">
                <div class="d-md-flex align-items-center justify-content-between">
                <?php if($tipousuario == 1 || $tipousuario == 2) {?>
                    <div>
                        <h2 class="pb-3">Busca un producto</h2>
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="Ingresa un producto..." />
                            <button type="button" class="btn accent-bg-color">Buscar</button>
                        </div>
                    </div>
                <?php }?>
                <?php if($tipousuario == 3) {?>
                    <div>
                        <h1 class="pb-3">Menú de Administrador</h1>
                    </div>
                <?php }?>
                    <img class="img-fluent w-25 mx-5 d-none d-md-block" src="img/shopping.svg" alt="">
                </div>
            </div>
        </section>

        <?php if($tipousuario == 1 || $tipousuario == 2) {?>
        <!-- Categorias -->
        <ul class="nav justify-content-center pt-4">
            <li class="nav-item">
                <a href="#" class="nav-link"><strong>Todos los Productos</strong> </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Alimentos</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Belleza</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Limpieza</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Ropa</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Tecnología</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Zapatos</a>
            </li>
        </ul>

        <!-- Grid de Productos -->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-2">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php foreach($resultado as $datos) {?>
                    <div class="col mb-5">
                        <div class="card h-100 align-items-center">
                            <?php 
                                $id = $datos['productId'];
                                $imagen = base64_encode($datos['imagen']);
                                echo '<img class="card-img-top p-4" style="width:auto;height:200px" src="data:image/jpeg;base64,'.base64_encode($datos['imagen']).'"/>';

                                if (empty($imagen)) {
                                    echo '<img class="card-img-top" style="width:150px;height:auto" src="img/defaultimg.jpg"/>';
                                    $imagen = "img/defaultimg.jpg";
                                }
                            ?>
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?php echo $datos['nombre'];?></h5>
                                    <?php echo '$'.number_format($datos['precio'], 2, '.', ',').' MXN';?>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="details.php?id=<?php echo $datos['productId'];?>&token=<?php echo hash_hmac('sha1',$datos['productId'], KEY_TOKEN); ?> ">Detalles</a></div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-success mt-auto" href="#">Carrito</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    
                </div>
            </div>
        </section>
        <?php }?>

        <!-- Menú de Administrador -->
        <?php if($tipousuario == 3) {?>
            <section class="py-5">
                <div class="container px-4 px-lg-5 mt-3">
                    <h2 class="text-center pb-5">Seleccione una opción</h2>
                    <div class="d-flex justify-content-center align-items-center">
                    <button class="btn btn-block fa-lg accent-bg-color mx-4 py-4 px-4" type="button" onclick="parent.location='admindept.php'">Agregar Departamento</button>
                    <button class="btn btn-block fa-lg accent-bg-color mx-4 py-4 px-4" type="button" onclick="parent.location='adminproducts.php'">Autorizar Productos</button>
                    <button class="btn btn-block fa-lg accent-bg-color mx-4 py-4 px-4" type="button" onclick="parent.location='adminproducts.php'">Ver Productos</button>
                    </div>
                </div>
            </section>
        <?php }?>


        <!-- Footer -->
        <footer class="text-center text-md-start bg-dark text-light py-5 mt-auto">
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
                
                <div class="text-center pt-4">
                    <p>&copy; 2022, Compras MX S.A de CV. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>