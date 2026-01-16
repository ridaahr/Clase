<div class="form">
    <h2>Crear Cuenta</h2>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="email">Email</label>
        <input type="text" name="email" value="<?= $email ?>">
        <?= empty($emailError) ? "" : "<p class=\"errors\">$emailError</p>" ?>

        <label for="password">Contraseña</label>
        <input type="password" name="password" value="<?= $password ?>">
        <?= empty($passwordError) ? "" : "<p class=\"errors\">$passwordError</p>" ?>

        <div class="checkbox-group">
            <input type="checkbox" id="stay-connected" name="stay-connected">
            <label for="stay-connected">Quiero seguir conectado</label>
        </div>


        <button type="submit">Iniciar Sesión</button>

        <div class="form-footer">
            ¿No tienes cuenta? <a href="/public/signup.php" id="go-to-login">Regístrate</a>
        </div>
    </form>
</div>