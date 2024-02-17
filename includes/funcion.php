<?php

function includeHeader() {
    include 'template/header.php';
}

function includeFooter() {
    include 'template/footer.php';
}
function includeNav(){
    include 'template/nav.php';
}


function mostrarBotonCerrarSesion() {
    echo '
    <form action="clases/seclogout.php" method="post">
        <button type="submit" name="logout">Cerrar Sesión</button>
    </form>';
}

// Función para obtener el nombre del usuario
function obtenerNombreUsuario() {
    // Iniciar sesión si aún no se ha iniciado
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Verificar si la sesión del usuario está establecida
    if (isset($_SESSION['email'])) {
        // Instanciar la conexión
        $conexion = new conexion();

        // Preparar consulta SELECT
        $query = "SELECT names FROM users WHERE email = ?";

        // Preparar la sentencia
        $stmt = $conexion->conn->prepare($query);
        $stmt->bind_param("s", $_SESSION['email']);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado de la consulta
        $result = $stmt->get_result();

        // Verificar si se encontró un usuario con el email proporcionado
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $nombreUsuario = $row['names'];
        } else {
            $nombreUsuario = "";
        }

        // Cerrar la sentencia
        $stmt->close();

        // Cerrar la conexión
        $conexion->cerrar();

        // Devolver el nombre del usuario
        return $nombreUsuario;
    } else {
        return "";
    }
}
?>
