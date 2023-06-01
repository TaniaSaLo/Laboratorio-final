<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laboratorio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST["nombre"];
$primerapellido = $_POST["primerapellido"];
$segundoapellido = $_POST["segundoapellido"];
$email = $_POST["email"];
$login = $_POST["login"];
$password = $_POST["password"];

function validate ($nombre, $primerapellido, $segundoapellido, $email, $login, $password)
{
   

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "El formato de correo electrónico no es válido.";
    }

    if (strlen($password) < 4 || strlen($password) > 8) {
        return "La contraseña debe tener entre 4 y 8 caracteres.";
    }

    return "";
}

$validar = validate ($nombre, $primerapellido, $segundoapellido, $email, $login, $password);

if ($validar !== "") {
    echo $validar;
    echo '<button onclick="window.location.href=\'index.html\'">Regresar al formulario</button>';
} else {
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "El email ya está registrado.";
        echo '<button onclick="window.location.href=\'index.html\'">Regresar al formulario</button>';
   
    } else {
        $sql = "INSERT INTO usuarios (nombre, primerapellido, segundoapellido, email, login, password)
                VALUES ('$nombre', '$primerapellido', '$segundoapellido', '$email', '$login', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro completado con éxito";
            echo '<button onclick="window.location.href=\'index.html\'">Regresar al formulario</button>';
            echo '<button onclick="window.location.href=\'consulta.php\'">Consulta</button>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
