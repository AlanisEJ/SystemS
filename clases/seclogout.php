<?php
class Logout {
    public static function logout() {
        // Iniciar o reanudar la sesión
        session_start();

        // Destruir todas las variables de sesión
        $_SESSION = array();

        // Borrar la cookie de sesión
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Destruir la sesión
        session_destroy();

        // Redirigir al usuario a la página de inicio o a donde desees después de cerrar sesión
        header("Location: ../index.php");
        exit;
    }
}

// Para usar la clase, simplemente llama al método logout
Logout::logout();
?>
