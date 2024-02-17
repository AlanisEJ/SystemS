<?php

class Usuario {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Método para obtener el nombre del usuario
    public function obtenerNombreUsuario() {
        // Iniciar sesión si aún no se ha iniciado
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Verificar si la sesión del usuario está establecida
        if (isset($_SESSION['email'])) {
            // Preparar consulta SELECT
            $query = "SELECT names FROM users WHERE email = ?";

            // Preparar la sentencia
            $stmt = $this->conexion->conn->prepare($query);
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

            // Devolver el nombre del usuario
            return $nombreUsuario;
        } else {
            return "";
        }
    }
}

?>
