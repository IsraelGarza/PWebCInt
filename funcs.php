<?php
    function isNull($nombre, $apellido, $fecha, $correo, $imagen, $username, $password, $password2, $tipousuario){
      if(strlen(trim($nombre)) < 1 || strlen(trim($apellido)) < 1 || strlen(trim($fecha)) < 1 || strlen(trim($correo)) < 1 || strlen(trim($correo)) < 1 || strlen(trim($imagen)) < 1 || strlen(trim($username)) < 1 || strlen(trim($password)) < 1 || strlen(trim($password2)) < 1 || strlen(trim($tipousuario)) < 1) {
        return true;
      } else {
        return false;
      }
    }

    function nombreChar($nombre) {
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nombre)) {
          return true;
        } else {
            return false;
        }
    }

    function apellidoChar($apellido) {
        if (!preg_match("/^[a-zA-Z-' ]*$/",$apellido)) {
          return true;
        } else {
            return false;
        }
    }

    function isEmail($correo)
    {
      if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return true;
      } else {
        return false;
      }
    }

    function validatePasswordLength($password)
    {
        if (strlen($_POST["password"]) <= '8') {
            return true;
        } else {
            return false;
        }
    }

    function validatePasswordNum($password)
    {
        if(!preg_match("#[0-9]+#",$password)) {
            return true;
        } else {
            return false;
        }
    }

    function validatePasswordMax($password)
    {
        if(!preg_match("#[A-Z]+#",$password)) {
            return true;
        } else {
            return false;
        }
    }

    function validatePasswordMin($password)
    {
        if(!preg_match("#[a-z]+#",$password)) {
            return true;
        } else {
            return false;
        }
    }

    function confirmPassword($password, $password2)
    {
      if (strcmp($password, $password2) !== 0) {
        return false;
      } else {
        return true;
      }
    }

    function usuarioExiste($username)
    {
      global $con;

      $stmt = $con->prepare("SELECT userId FROM usuarios WHERE username = ? LIMIT 1");
      $stmt->bind_param("s", $username);
      $stmt->execute();
      $stmt->store_result();
      $num = $stmt->num_rows;
      $stmt->close();

      if($num > 0){
        return true;
      } else {
        return false;
      }
    }

    function correoExiste($username)
    {
      global $con;

      $stmt = $con->prepare("SELECT userId FROM usuarios WHERE correo = ? LIMIT 1");
      $stmt->bind_param("s", $correo);
      $stmt->execute();
      $stmt->store_result();
      $num = $stmt->num_rows;
      $stmt->close();

      if($num > 0){
        return true;
      } else {
        return false;
      }
    }

    function hashPassword($password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
    }

    function generateToken()
    {
        $gen = md5(uniqid(mt_rand(), false));
        return $gen;
    }

    function resultBlock ($errors) {
        if (count($errors) > 0) {
            echo "<div id='error' class='alert alert-danger' role='alert'>
            <a href='#' onclick=\"showHide('error');\">[X]</a>
            <ul>";
        foreach ($errors as $error)
        {
            echo "<li>".$error."</li>";
        }
            echo "</ul>";
            echo "</div>";
        }
    }

    function registrarUsuario($nombre, $apellido, $fecha, $correo, $imagen, $username, $pass_hash, $tipousuario)
    {
      global $con;

      $stmt = $con->prepare("INSERT INTO usuarios (nombre, apellidos,fechaNac, correo, imagen, username, pass, tipousuario) VALUES(?,?,?,?,?,?,?,?)");
      
      $stmt->bind_param('ssssbssi', $nombre, $apellido, $fecha, $correo,$imagen, $username, $pass_hash, $tipousuario);

      if ($stmt->execute()) {
          return $con->insert_id;
      } else {
          return 0;
      }
      $stmt->store_result();
      $num = $stmt->num_rows;
      $stmt->close();
    }

    function mostrarProducto($id)
    {
      global $con;
      $stmt = $con->prepare("SELECT * FROM productos WHERE productId=? AND activo = 1");
      $stmt->bind_param("i",$id);
      $resultado = $con->query($stmt);
      $datos = mysqli_fetch_array($resultado);
      
      return $datos;
      $stmt->close();
      
    }
?>