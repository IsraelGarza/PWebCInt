function getInfo() {
    var validar = 0; //0 es normal y 1 marca un error
    var username = document.getElementById("loginNombre").value;
    var password = document.getElementById("loginPass").value;
    
    if(username.length == 0 || password.length == 0) {
        validar = 1;
        alert("Debe llenar los campos restantes.");
    }

    if(validar == 1) {
        alert("Error al iniciar sesión.");
    } else {
        alert("Haz iniciado sesión.\nTu nombre es " + username + " y tu contraseña es " + password + ".");
    }
}