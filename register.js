function registroUsuario() {
    var validar = 0; //0 es normal y 1 marca un error
    var fechaActual = new Date();
    var nombre = document.getElementById("registroNombre").value;
    var apellido = document.getElementById("registroApellido").value;
    var fecha = document.getElementById("fecha").value;
    var formDate = new Date(fecha);
    var correo = document.getElementById("correo").value;
    var imagen = document.getElementById("imagen").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var password2 = document.getElementById("password2").value;

    //Validar contenido
    if (nombre.length == 0 || apellido.length == 0 || fecha.length == 0 || correo.length == 0 || imagen.length == 0 || username.length == 0 || password.length == 0 || password2.length == 0) {
        validar = 1;
        alert("Debe llenar los campos restantes.");
    }

    //Comparar las Fechas
    formYear = formDate.getFullYear();
    formMonth = formDate.getMonth();
    formDay = formDate.getDate() + 1;
    var actualYear = (fechaActual.getFullYear());
    var actualMonth = (fechaActual.getMonth());
    var actualDay = (fechaActual.getDate());

    console.log("Form. Año: " + formYear + " Mes: " + formMonth + " Día: " + formDay);
    console.log("LocalTime. Año: " + actualYear + " Mes: " + actualMonth + " Día: " + actualDay);

    if((formYear > actualYear) || (formYear == actualYear && formMonth > actualMonth) || (formYear == actualYear && formMonth == actualMonth && formDay > actualDay)) {
        validar = 1;
        alert("Ingrese una fecha válida.");
    }

    //Validar el correo
    var expReg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var correoValido = expReg.test(correo);
    if(correoValido != true){
        validar = 1;
        alert("El correo electrónico introducido no es válido.");
    }

    //Validar la contraseña
	if(password.length >= 8) {		
		var mayuscula = false;
		var minuscula = false;
		var numero = false;
		var caracter = false;
    
		for(var i = 0; i<password.length; i++) {
			if(password.charCodeAt(i) >= 65 && password.charCodeAt(i) <= 90) {
				mayuscula = true;
			}
			else if(password.charCodeAt(i) >= 97 && password.charCodeAt(i) <= 122) {
				minuscula = true;
			}
			else if(password.charCodeAt(i) >= 48 && password.charCodeAt(i) <= 57) {
				numero = true;
			}
			else if(password.charCodeAt(i) >= 32 && password.charCodeAt(i) <= 47) {
				caracter = true;
			}
		}
        if(mayuscula == false) {
            validar = 1;
            alert("La contraseña debe incluir al menos una letra mayúscula.");
        }
        if(minuscula == false) {
            validar = 1;
            alert("La contraseña debe incluir al menos una letra minúscula.");
        }
        if(numero == false) {
            validar = 1;
            alert("La contraseña debe incluir al menos un dígito numérico.");
        }
        if(caracter == false) {
            validar = 1;
            alert("La contraseña debe incluir un caracter entre estos: \n! # $ % & ' ( ) * + , - . /")
        }
    } else {
        validar = 1;
        alert("La contraseña deber tener más de 7 dígitos.")
    }


    //Comparar las contraseñas
    if (password != password2) {
        validar = 1;
        alert("Las contraseñas deben de ser iguales.")
    }

    //Validar el registro
    if (validar === 1) {
        alert("Error al registrar usuario.");
    } else {
        alert("Usuario registrado excitosamente.");
        //Contenido introducido
        console.log("Nombre: " + nombre);
        console.log("Apellido: " + apellido);
        console.log("Fecha Introducida: " + fecha);
        console.log("Fecha Actual: " + fechaActual);
        console.log("Correo: " + correo);
        console.log("Imagen: " + imagen);
        console.log("Username: " + username);
        console.log("Constraseña: " + password);
        console.log("Confirmar contraseña: " + password2);
    }

}