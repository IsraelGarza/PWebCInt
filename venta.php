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

        <title>Confirmar Pedido | Compras MX</title>
    </head>
    <body class="d-flex flex-column min-vh-100 bg-white bg-gradient">
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

        <div class="container py-5" id="smart-button-container">
            <div style="text-align: center;">
              <h2 class="pb-4">Seleccione un método de pago</h2>
                <div id="paypal-button-container"></div>
            </div>
        </div>
        <script src="https://www.paypal.com/sdk/js?locale=es_MX&client-id=AQiecxRHBjHcLkZl3gjl-PZU4DQOQty8ChCYr2BxE6hsyMToXXr-WCjU1u-K6LMS6G2VIx_uC7SXM50I&enable-funding=venmo&currency=MXN" data-sdk-integration-source="button-factory"></script>
        <script>
          function initPayPalButton() {
            paypal.Buttons({
              style: {
                shape: 'rect',
                color: 'gold',
                layout: 'vertical',
                label: 'paypal',
              },
          
              createOrder: function(data, actions) {
                return actions.order.create({
                  purchase_units: [{"amount":{"currency_code":"MXN","value":100}}]
                });
              },
          
              onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                
                  // Full available details
                  console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                
                  // Show a success message within this page, e.g.
                  const element = document.getElementById('paypal-button-container');
                  element.innerHTML = '';
                  element.innerHTML = '<h3>Gracias por su compra!</h3>';
                
                  // Or go to another URL:  actions.redirect('thank_you.html');
                
                });
              },

              onCancel: function(data){
                alert("Pago cancelado");
              },
          
              onError: function(err) {
                console.log(err);
              }
            }).render('#paypal-button-container');
          }
          initPayPalButton();
        </script>

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