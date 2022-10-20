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

        <title>Registrarse | Compras MX</title>

        <style>.error {color: #FF0000;}</style>
    </head>
    <body class="bg-white bg-gradient">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg secondary-bg-color navbar-dark py-3 sticky-top">
            <div class="container">
                <a href="/PWebCInt/index.php" class="navbar-brand">Compras <span class="text-warning">MX</span></a>

                <button class="button navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto text-center">
                        <li class="nav-item">
                            <a href="/PWebCInt/login.php" class="nav-link">Iniciar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
        // define variables and set to empty values
        $nombreErr = $apellidoErr = $fechaErr = $correoErr = $usernameErr = $passwordErr = $userTypeErr = "";
        $nombre = $apellido = $fecha = $correo = $username = $password = $userType = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["nombre"])) {
            $nombreErr = "El nombre es requerido";
          } else {
            $nombre = test_input($_POST["nombre"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$nombre)) {
              $nombreErr = "Sólo se admiten letras y espacios en blanco";
            }
          }

          if (empty($_POST["apellido"])) {
            $apellidoErr = "El apellido es requerido";
          } else {
            $apellido = test_input($_POST["apellido"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$apellido)) {
              $apellidoErr = "Sólo se admiten letras y espacios en blanco";
            }
          }

          if (empty($_POST["correo"])) {
            $correoErr = "El correo es requerido";
          } else {
            $correo = test_input($_POST["correo"]);
            // check if e-mail address is well-formed
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
              $correoErr = "Formato de correo inválido";
            }
          }

          if (empty($_POST["username"])) {
            $apellidoErr = "El usuario es requerido";
          } else {
            $username = test_input($_POST["apellido"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-']*$/",$username)) {
              $usernameErr = "Sólo se admiten letras";
            }
          }
      
          if(!empty($_POST["password"])) {
            $password = test_input($_POST["password"]);
            if (strlen($_POST["password"]) <= '8') {
                $passwordErr = "La contraseña debe tener al menos 8 dígitos";
            }
            elseif(!preg_match("#[0-9]+#",$password)) {
                $passwordErr = "La contraseña debe tener al menos 1 número";
            }
            elseif(!preg_match("#[A-Z]+#",$password)) {
                $passwordErr = "La contraseña debe tener al menos 1 caracter en mayúscula";
            }
            elseif(!preg_match("#[a-z]+#",$password)) {
                $passwordErr = "La contraseña debe tener al menos 1 caracter en minúscula";
            }
           }
           else if(!empty($_POST["password"])) {
               $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
           } else {
                $passwordErr = "Debe de ingresar una constraseña";
           }
      
          if (empty($_POST["userType"])) {
            $userTypeErr = "Seleccione un tipo de usuario";
          } else {
            $userType = test_input($_POST["userType"]);
          }
        }

        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
        ?>

        <!-- Forma de Registro -->
        <section class="gradient-form">
            <div class="container py-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-xl-10">
                        <div class="card rounded-3 text-white bg-dark py-5">
                            <div class="text-center">
                                <img src="img/shopping_app.svg" style="width: 300px;" alt="">
                                <h3 class="mt-3">Registrate en Compras <span class="text-warning">MX</span></h3>
                            </div>
                              
                            <div class="justify-content-center align-items-center row g-0">
                                <div class="col-lg-8">
                                    <div class="card-body p-md-5 mx-md-4">
                                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                            <div class="form-outline mb-4">
                                              <label class="form-label" for="nombre">Nombre(s): </label>
                                              <span class="error"> * <?php echo $nombreErr;?></span>
                                              <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $nombre;?>" required>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="apellido">Apellidos: </label>
                                                <span class="error"> * <?php echo $apellidoErr;?></span>
                                                <input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $apellido;?>" required>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="fecha">Fecha de Nacimiento: </label>
                                                <input type="date" id="fecha" name="fecha" class="form-control">
                                            </div>
                                            <div class="form-outline mb-4">
                                              <label class="form-label" for="correo">Correo Electrónico: </label>
                                              <span class="error"> * <?php echo $correoErr;?></span>
                                              <input type="email" id="correo" name="correo" class="form-control" value="<?php echo $correo;?>" required>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="imagen">Imagen de Perfil: </label>
                                                <input type="file" id="imagen" name="imagen" class="form-control">
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="username">Nombre de Usuario: </label>
                                                <span class="error"> * <?php echo $usernameErr;?></span>
                                                <input type="text" id="username" name="username" class="form-control" value="<?php echo $username;?>" required>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="password">Contraseña: </label>
                                                <span class="error"> * <?php echo $passwordErr;?></span>
                                                <input type="password" id="password" name="password" class="form-control" value="<?php echo $password;?>" required>
                                            </div>
                                            <div class="form-outline mb-4">
                                              <label class="form-label" for="password2">Confirmar Contraseña: </label>
                                              <input type="password" id="password2" name="password2" class="form-control" required>
                                            </div>
                                            <p class="mb-2">Tipo de Usuario:</p>
                                            <div class="form-check form-check-inline mb-2">
                                                <input class="form-check-input" type="radio" name="userType" id="userType1" value="Comprador" checked>
                                                <label class="form-check-label" for="userType1">Comprador</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-4">
                                                <input class="form-check-input" type="radio" name="userType" id="userType2" value="Vendedor">
                                                <label class="form-check-label" for="userType2">Vendedor</label>
                                            </div>
                                            <div class="text-center">
                                                <input class="btn btn-block fa-lg btn-lg accent-bg-color mb-4" type="submit" name="submit" value="Registrar">  
                                                <input class="btn btn-block fa-lg btn-lg accent-bg-color mb-4" type="submit" value="Entrar" onclick="parent.location='home.php'">
                                            </div>
          
                                            <div class="d-flex align-items-center justify-content-center pb-3">
                                              <p class="mb-0 me-2">¿Ya tienes una cuenta?</p>
                                              <button type="button" onclick="parent.location='login.php'" class="btn btn-outline-primary">Iniciar Sesión</button>
                                            </div>
                                        </form>
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
                    <p>
                        &copy; 2022, Compras MX S.A de CV. Todos los derechos reservados.
                    </p>
                </div>
                
            </div>
        </footer>

        <script src="register.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    </body>
</html>