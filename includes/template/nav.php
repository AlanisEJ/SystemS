<?php
// Incluir el archivo de conexión a la base de datos y la clase Usuario
include 'clases\conex.php';
include 'clases\username.php';

// Instanciar la conexión
$conexion = new conexion();

// Instanciar la clase Usuario
$usuario = new Usuario($conexion);

// Obtener el nombre del usuario
$nombreUsuario = $usuario->obtenerNombreUsuario();
?>

<header class="contenedor">
        <nav class="nav-principal ">
            <div class="logo">
                <a href="beginus.php" ><img class="imgn" src="img\icono.png" alt="Icono de la pagina"></a>
            </div> 
            <div class="navegacion">
                <ul class="nav-cont">
                    <li>
                        <a class="btn" href="">Inicio</a>
                    </li>
                    <li>
                        <a class="btn"><?php echo "Hola $nombreUsuario"; ?></a>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="btn" >Mas</a>
                    <ul class="dropdown-content">
                        <li><a href="#">Opción 1</a></li>
                        <li><a href="#">Opción 2</a></li>
                        <li><?php mostrarBotonCerrarSesion(); ?></li>
                    </ul>
                </li>
            </ul>
                </ul>
            </div>
        </nav>
    </header>