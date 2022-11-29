<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "comprasmx";
    
    $con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if (!$con) {
        die("Connexión fallida: " . mysqli_connect_error());
    }

    /*
    class Database
    {
        private 
        private 
        private 
        private 

        function conectar()
        {
            try {

                $server = "localhost";
                $username = "root";
                $password = "";
                $database = "comprasmx";

                $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);

                $id = isset($_GET['id']) ? $_GET['id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    $registro = mostrarProducto($id);
    $nombre = $registro['nombre'];
    $precio = $registro['precio'];

                return $con;

            } catch (PDOException $error) {
                die("Error de conexion: " . $error->getMessage());
                exit;
            }
        }
    }*/
?>