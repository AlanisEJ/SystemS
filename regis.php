<?php
include "clases/conex.php";
include 'includes/funcion.php';

includeHeader();
?>

    <div class="container">
        <div class="form medidas">
            <h2>
                Hola, Ingresa tus datos!
            </h2>
            <div class="formulario">

                <form action="clases/read.php" method="post">
                    <div class="fila1">
                    <label for="email">Ingresa usuario: </label>
                    <input type="email" id="email" name="email">
                    <label for="name">Ingresa tu nombre: </label>
                    <input type="text" id="name" name="name">
                    </div>
                    <div class="fila2">
                    <label for="lastname">Ingresa tus apellidos: </label>
                    <input type="text" id="lastname" name="lastname">
                    <label for="pass">Ingresa contraseña: </label>
                    <input type="password" id="pass" name="pass">
                    </div>
                    <div class="parrafo">
                        <p>Si no tienes tu cuenta, te <span class="anim">invitamos</span> a <span class="anim">Registrarte!</span></p>
                    </div>
                    <div class="bottom">
                        <button type="submit">Registrar</button>
                </form>
                <form action="index.php">
                    <button type="submit">Iniciar Sesion</></button>
                </form>
            </div>
        </div>

    </div>
    </div>
<?php includeFooter(); ?>