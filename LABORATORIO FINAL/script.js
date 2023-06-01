
    function validateForm() {
      var nombre = document.forms["Formularioregistro"]["nombre"].value;
      var primerapellido = document.forms["Formularioregistro"]["primerapellido"].value;
      var segundoapellido = document.forms["Formularioregistro"]["segundoapellido"].value;
      var login = document.forms["Formularioregistro"]["login"].value;
      var password = document.forms["Formularioregistro"]["password"].value;
      var email = document.forms["Formularioregistro"]["email"].value;

      
      if (nombre === '' || primerapellido === '' || segundoapellido === '' || login === '' || password === '' || email === '') {
        alert("Todos los campos son obligatorios");
        return false;
      }

      
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        alert("El formato del correo electrónico no es válido");
        return false;
      }

      
      if (password.length < 4 || password.length > 8) {
        alert("La contraseña debe tener entre 4 y 8 caracteres");
        return false;
      }
    }
  