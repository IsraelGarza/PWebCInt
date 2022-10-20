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

        <!-- Forma de Inicio de Sesión -->
        <section class="gradient-form">
            <div class="container py-5">
              <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-10">
                  <div class="card rounded-3 text-white bg-dark py-5">
                    <div class="row g-0">
                      <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">
                          <div class="text-center">
                            <h3 class="mb-4">Bienvenido a Compras<span class="text-warning"> MX</span></h3>
                            <img src="img/welcome-back.svg" style="width: 300px;" alt="logo" class="mb-4">
                          </div>
                          <form method="POST" action="/PWebCInt/home.php">
                            <div class="form-outline mb-4">
                              <label class="form-label" for="loginNombre">Nombre de Usuario: </label>
                              <input type="text" id="loginNombre" name="loginNombre" class="form-control" required>
                            </div>
                            <div class="form-outline">
                                <label class="form-label" for="loginPass">Contraseña: </label>
                                <input type="password" id="loginPass" name="loginPass" class="form-control" required>
                            </div>
                            <div class="text-center">
                              <button class="btn btn-block fa-lg accent-bg-color my-5 px-3" type="button" onclick="getInfo()">Iniciar Sesión</button>
                            </div>
          
                            <div class="d-flex align-items-center justify-content-center pb-5">
                              <p class="mb-0 me-2">¿No tienes una cuenta?</p>
                              <button type="button" onclick="parent.location='/PWebCInt/register.php'" class="btn btn-outline-primary">Registrate</button>
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6 d-none d-md-block px-3 pt-5 mt-3">
                        <img src="img/1.png" alt="login form" class="img-fluid d-none d-lg-block" style="border-radius: 1rem 1rem;"/>
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