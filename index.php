<?php
include 'includes/funcion.php';
includeHeader();
?>


<div class="container">
    <div class="form">
        <h2>
            <span id="mensajeSaludo"></span> Bienvendio!
        </h2>
        <div class="formulario">
            <form action="clases/validate.php" method="post">
                <label for="user">Ingresa E-mail: </label>
                <input type="text" id="user" name="user">
                <label for="pass">Ingresa contraseña: </label>
                <input type="password" id="pass" name="pass">
                <div class="parrafo">
                    <p>Si no tienes tu cuenta, te invitamos a <span class="anim">crear</span> una en el boton <span class="anim">"Registrar"</span></p>
                    <?php if (isset($_SESSION['login_error'])) : ?>
                        <p class="anim"><?php echo $_SESSION['login_error']; ?></p>
                        <?php unset($_SESSION['login_error']); ?>
                    <?php endif; ?>
                </div>
        </div>
        <div class="bottom">
            <button type="submit">Iniciar Sesion</button>
            </form>
            <form action="regis.php">
                <button type="submit">Registrarse</button>
            </form>
        </div>
    </div>
</div>
<?php includeFooter(); ?>