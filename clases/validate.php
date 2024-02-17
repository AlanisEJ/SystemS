<?php
session_start();

include "conex.php";

$conexion = new conexion();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario y escaparlos correctamente
    $email = filter_input(INPUT_POST, "user", FILTER_VALIDATE_EMAIL);
    $pass = filter_input(INPUT_POST, "pass");

    if (!$email || !$pass) {
        die("El email o la contraseña proporcionados no son válidos");
    }

    // Preparar la consulta SQL con una sentencia preparada
    $query = "SELECT email, pass FROM users WHERE email = ?";
    $stmt = $conexion->conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró un usuario con el email proporcionado
    if ($result->num_rows === 1) {
        // Obtener los datos del usuario
        $row = $result->fetch_assoc();



        // Verificar la contraseña
        if (password_verify($pass, $row['pass'])) {
            // Inicio de sesión exitoso: establecer variables de sesión y redirigir al usuario a la página de inicio con un mensaje de éxito
            $_SESSION['email'] = $email;
            header("Location: ../beginus.php?login=success");
            exit;
        } else {
            // Contraseña incorrecta
            header("Location:../include/template/error.php?error=wrong_password");
            exit;
        }
    } else {
        // Usuario no encontrado
        header("Location:../include/template/error.php?error=wrong_password");
            exit;
    }
}

// Cierra la conexión
$conexion->cerrar();
?>
