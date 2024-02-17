<?php
// Incluir el archivo de conexión a la base de datos
include "conex.php";

$conexion = new conexion();

// Verificar si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario y escaparlos correctamente
    $user = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
    $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT); // Hashear la contraseña antes de guardarla

    // Validar que todos los campos estén presentes
    if (!$user || !$name || !$lastname || !$pass) {
        echo "Todos los campos son obligatorios.";
    } else {
        // Preparar la consulta INSERT
        $query = "INSERT INTO users (email, names, lastname, pass) VALUES (?, ?, ?, ?)";

        // Preparar la sentencia
        $stmt = $conexion->conn->prepare($query);
        if (!$stmt) {
            die("Error al preparar la consulta de registro: " . $conexion->conn->error);
        }

        // Enlazar los parámetros
        $stmt->bind_param("ssss", $user, $name, $lastname, $pass);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            header( "Location: ../index.php?" );
            exit();
            // Puedes redirigir al usuario a la página de inicio de sesión aquí si lo deseas
        } else {
            echo "Error al registrar el usuario: " . $stmt->error;
        }

        // Cerrar la sentencia
        $stmt->close();
    }
}

// Cierra la conexión
$conexion->cerrar();
?>
