<?php

  require "db.php";
  require "funcs.php";
  $errors = array();
  
  if(!empty($_POST)){

    $nombre = $con->real_escape_string($_POST['nombre']);
    $apellido = $con->real_escape_string($_POST['apellido']);
    $fecha = $con->real_escape_string($_POST['fecha']);
    $correo = $con->real_escape_string($_POST['correo']);
    $imagen = $con->real_escape_string($_POST['imagen']); 
    $username = $con->real_escape_string($_POST['username']);
    $password = $con->real_escape_string($_POST['password']);
    $password2 = $con->real_escape_string($_POST['password2']);
    $tipousuario = $con->real_escape_string($_POST['tipousuario']);
    //$captcha = $con->real_escape_string($_POST['g-captcha-response']);

    //$secret = '6LdRTT0jAAAAACrhBblAS2mqOd2NKPBuOtJFmVnM';
    $secret = '';
    
    if ('tipousuario' == '1') {
      $tipousuario = 1;
    } elseif ('tipousuario' == '2') {
      $tipousuario = 2;
    } elseif ('tipousuario' == '3') {
      $tipousuario = 3;
    }

    //if (!$captcha) {
    //  $errors[] = "Porfavor verifica el captcha.";
    //}

    if(isNull ($nombre, $apellido, $fecha, $correo, $imagen, $username, $password, $password2, $tipousuario)){
      $errors[] = "Debe llenar todos los campos.";
    }

    if(nombreChar($nombre)){
      $errors[] = "El nombre sólo admite letras y espacios.";
    }

    if(apellidoChar($apellido)){
      $errors[] = "Los apellidos sólo admiten letras y espacios.";
    }

    if(!isEmail($correo)) {
      $errors[] = "Dirección de correo inválida.";
    }

    if(validatePasswordLength($password)) {
      $errors[] = "La contraseña debe tener al menos 8 dígitos.";
    }

    if(validatePasswordNum($password)) {
      $errors[] = "La contraseña debe tener al menos 1 número.";
    }

    if(validatePasswordMax($password)) {
      $errors[] = "La contraseña debe tener al menos 1 caracter en mayúscula.";
    }

    if(validatePasswordMin($password)) {
      $errors[] = "La contraseña debe tener al menos 1 caracter en minúscula.";
    }

    if(!confirmPassword($password, $password2)) {
      $errors[] = "Las contraseñas no coinciden.";
    }
    
    if(usuarioExiste($username)){
      $errors[] = "El nombre de usuario $usuario ya existe.";
    }

    if(correoExiste($correo)){
      $errors[] = "El correo introducido $correo ya existe.";
    }

    if(count($errors) == 0){
      //$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

      //$arr = json_decode($response, TRUE);

      //if($arr['success'])
      //{
        $pass_hash = hashPassword($password);
        $registro = registrarUsuario($nombre, $apellido, $fecha, $correo, $imagen, $username, $password, $tipousuario);

        if($registro > 0){
          header("Location: login.php");
        } else {
          $errors[] = "Error al registrar el usuario.";
        }

      //} else {
        //$errors[] = 'Error al comprobar Captcha';
      //}
    }
    mysqli_close($con);
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
        <script src=”http://www.google.com/recaptcha/api.js”></script>

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
                                        <form method="POST" autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="form-outline mb-4">
                                              <label class="form-label" for="nombre">Nombre(s): </label>
                                              <span class="error"> *</span>
                                              <input type="text" id="nombre" name="nombre" class="form-control" required>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="apellido">Apellidos: </label>
                                                <span class="error"> *</span>
                                                <input type="text" id="apellido" name="apellido" class="form-control" required>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="fecha">Fecha de Nacimiento: </label>
                                                <span class="error"> *</span>
                                                <input type="date" id="fecha" name="fecha" class="form-control" required>
                                            </div>
                                            <div class="form-outline mb-4">
                                              <label class="form-label" for="correo">Correo Electrónico: </label>
                                              <span class="error"> *</span>
                                              <input type="email" id="correo" name="correo" class="form-control" required>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="imagen">Imagen de Perfil: </label>
                                                <span class="error"> *</span>
                                                <input type="file" id="imagen" name="imagen" class="form-control" required>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="username">Nombre de Usuario: </label>
                                                <span class="error"> *</span>
                                                <input type="text" id="username" name="username" class="form-control" required>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="password">Contraseña: </label>
                                                <span class="error"> *</span>
                                                <input type="password" id="password" name="password" class="form-control" required>
                                            </div>
                                            <div class="form-outline mb-4">
                                              <label class="form-label" for="password2">Confirmar Contraseña: </label>
                                              <span class="error"> *</span>
                                              <input type="password" id="password2" name="password2" class="form-control" required>
                                            </div>


                                            <p class="mb-2">Tipo de Usuario:</p>
                                            <div class="form-check form-check-inline mb-2">
                                                <input class="form-check-input" type="radio" name="tipousuario" id="userType1" value="1" checked>
                                                <label class="form-check-label" for="userType1">Comprador</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-2">
                                                <input class="form-check-input" type="radio" name="tipousuario" id="userType2" value="2">
                                                <label class="form-check-label" for="userType2">Vendedor</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-2">
                                                <input class="form-check-input" type="radio" name="tipousuario" id="userType3" value="3">
                                                <label class="form-check-label" for="userType3">Administrador</label>
                                            </div>

                                            <!--<div class="form-group my-4 d-flex">
                                              <label for="captcha" class="col-md-3 control-label"></label>
                                              <div class="g-recaptcha col-md-9" data-sitekey="6LdRTT0jAAAAAMBuKKf_-fLbRtNvqdK5tHruVzi5"></div>
                                            </div>-->

                                            <div class="text-center">
                                                <button class="btn btn-block fa-lg btn-lg accent-bg-color my-4" type="submit" name="submit">Registrarse</button>
                                            </div>
          
                                            <div class="text-center pb-3">
                                              <div class="mb-0 me-2">¿Ya tienes una cuenta?</div>
                                              <button type="button" onclick="parent.location='login.php'" class="btn btn-outline-primary mt-2">Iniciar Sesión</button>
                                            </div>
                                        </form>
                                        <?php 
                                          echo resultBlock($errors);
                                        ?>
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