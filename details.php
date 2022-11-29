<?php

    require "db.php";
    require "funcs.php";
    require "config.php";
    session_start();

    if(!isset($_SESSION['userId'])){
        header("Location: login.php");
    }

    //$username = $_SESSION['username'];
    //$nombre = $_SESSION['nombre'];
    //$apellidos = $_SESSION['apellidos'];
    //$fechaNac = $_SESSION['fechaNac'];
    //$correo = $_SESSION['correo'];
    //$imagen = $_SESSION['imagen'];
    //$pass = $_SESSION['pass'];
    $tipousuario = $_SESSION['tipousuario'];

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    if ($id == '' || $token == '') {
        echo 'Error al procesar la petición';
        exit;
    } else {
        $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

        if ($token == $token_tmp) {

            $sql = "SELECT * FROM productos WHERE productId=1 AND activo = 1";
            $result = $con->query($sql);
            $datos=mysqli_fetch_array($result);
            $nombre = $datos['nombre'];
            $descripcion = $datos['descripcion'];
            $precio = $datos['precio'];
            $existencia = $datos['existencia'];

            //$sql = "SELECT * FROM productos WHERE activo = 1";
            //$resultado = $con->query($sql);
            //$datos=mysqli_fetch_array($resultado);
            //global $con;
            //$stmt = $con->prepare("SELECT * FROM productos WHERE productId=? //AND activo = 1");
            //$stmt->bind_param('i', $id);
            //if ($stmt->execute()) {
            //    $nombre = $datos['nombre'];
            //    $descripcion = $datos['descripcion'];
            //    $precio = $datos['precio'];
            //}
            //$stmt->store_result();
            //$num = $stmt->num_rows;
            //$stmt->close();
            //$sql = "SELECT count(productId) FROM productos WHERE productId=? //AND activo=1";
            //$sql->bind_param("i", $id);
            //$resultado = $con->query($sql);
            //$datos=mysqli_fetch_array($resultado);
            //$stmt = $con->prepare($sql);
            //$stmt->bind_param("i", $id);
            //$stmt->execute([$id]);
            //$stmt->store_result();

            //if ($stmt->fetch() > 0) {
            //    $sql = "SELECT count(productId) FROM productos WHERE //productId=? AND activo=1";
            //    $stmt = $con->prepare($sql);
            //    $stmt->bind_param("i", $id);
            //    $stmt->execute();
            //    $result = $stmt->get_result();
            //    $datos = $result->fetch_assoc();
            //    $datos = mysqli_fetch_array($result);
            //    $nombre = $datos['nombre'];
            //    $descripcion = $datos['descripcion'];
            //    $precio = $datos['precio'];
            //}
            //$resultado = $sql->fetch(PDO::FETCH_ASSOC);
            //$resultado = $con->query($sql);
            //$datos = mysqli_fetch_array($resultado);
        } else {
            echo 'Error al procesar la petición, datos alterados.';
            exit;
        }
    }

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

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 order-md-1">
                    <?php 
                        $producto = $datos['productId'];
                        $imagen = base64_encode($datos['imagen']);
                        echo '<img class="card-img-top p-4" style="width:auto;height:300px" src="data:image/jpeg;base64,'.base64_encode($datos['imagen']).'"/ >';

                        if (empty($imagen)) {
                            echo '<img class="card-img-top" style="width:300px;height:auto" src="img/defaultimg.jpg"/>';
                            $imagen = "img/defaultimg.jpg";
                        }
                    ?>
                </div>
                <div class="col-md-6 order-md-2">
                    <h2><?php echo$nombre;?></h2>
                    <h6><?php echo$descripcion;?></h6>
                    <h4>Precio: </h4>
                    <h2>$<?php echo$precio;?> MXN</h2>
                    <h6>Productos Restantes: <?php echo$existencia;?></h6>
                </div>
            </div>
        </div>


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