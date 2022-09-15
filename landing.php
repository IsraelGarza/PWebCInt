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

        <title>Bienvenido | Compras MX</title>
    </head>
    <body class="light-bg-color">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg secondary-bg-color navbar-dark py-3 sticky-top">
            <div class="container">
                <a href="#" class="navbar-brand">Compras <span class="text-warning">MX</span></a>

                <button class="button navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto text-center">
                        <li class="nav-item">
                            <a href="/PWebCInt/login.php"    class="nav-link">Iniciar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Showcase -->
        <section class="secondary-bg-color text-light py-5 text-center text-sm-start">
            <div class="container">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <div>
                        <h1>Compra desde <span class="text-warning">tu Casa</span></h1>
                        <p class="lead my-4">
                            Unete a miles de usuarios en el mayor sitio de compra y venta en línea. Con entregas en todas las partes de la República.
                            En Compras MX siempre encontrarás todos los artículos que estas buscando y compradores a los cuales vender. Compras MX es siempre tu mejor opción.
                        </p>
                        <button class="btn btn-warning text-dark btn-lg" onclick="parent.location='/PWebCInt/register.php'">Crear una Cuenta</button>
                    </div>
                    <img class="img-fluent w-25 mx-5 d-none d-md-block" src="img/shopping.svg" alt="">
                </div>
            </div>
        </section>

        <!-- Boxes -->
        <section class="p-5 light-bg-color">
            <div class="container">
                <div class="row text-center g-4">
                    <div class="col-md">
                        <div class="card primary-bg-color text-light">
                            <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <h3 class="card-title mb-3">Compra</h3>
                                <p class="card-text mb-3">
                                    Accede a nuestro amplio catálogo de productos en línea, agrega todo lo que quieras al carrito, y listo ya estas comprando en Compras MX.
                                </p>
                                <a href="#compra" class="btn btn-warning mb-2">Entrar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card bg-secondary text-light">
                            <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <i class="bi bi-cash"></i>
                                </div>
                                <h3 class="card-title mb-3">Vende</h3>
                                <p class="card-text mb-3">
                                    Lista tu producto en nuestra base de datos llenando el formulario de los datos de tu producto, el resto es esperar a un cliente afortunado.
                                </p>
                                <a href="#vende" class="btn btn-warning mb-2">Entrar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card primary-bg-color text-light">
                            <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <i class="bi bi-search"></i>
                                </div>
                                <h3 class="card-title mb-3">Navega</h3>
                                <p class="card-text mb-3">
                                    Navega por el sitio de Compras MX de forma gratuita y agrega los productos que más te interesen a tu lista de deseados.
                                </p>
                                <a href="#navega" class="btn btn-warning mb-2">Entrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Learn Sections -->
        <section id="celular" class="mb-3 p-5 light-bg-color">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md">
                        <img src="img/smartphone.svg" class="img-fluid" alt="" />
                    </div>
                    <div class="col-md p-5">
                        <h2>Compras MX en tu celular</h2>
                        <p class="lead">
                            Nuestro sitio está completamente optimizado para que puedas acceder desde tu télefono o tableta, conservando nuestro diseño limpio y fresco.
                        </p>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque
                            reiciendis eius autem eveniet mollitia, at asperiores suscipit
                            quae similique laboriosam iste minus placeat odit velit quos,
                            nulla architecto amet voluptates?
                        </p>
                        <a href="#" class="btn btn-warning mt-3">
                            <i class="bi bi-chevron-right"></i> Saber Más
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter -->
        <section class="secondary-bg-color p-5">
            <div class="container">
                <div class="d-md-flex justify-content-between align-items-center text-center">
                    <h4 class="mb-3 mb-md-0 mx-5">¡Suscribete a nuestro boletín!</h4>

                    <div class="input-group news-input px-5">
                        <input type="text" class="form-control" placeholder="Ingresa tu Email..." />
                        <button class="btn accent-bg-color btn-lg" type="button">Suscribirse</button>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        
    </body>
</html>