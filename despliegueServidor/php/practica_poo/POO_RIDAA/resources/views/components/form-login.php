<div class="form">
    <h2>Iniciar sesión</h2>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $email ?>" required>
        <?= empty($emailError) ? "" : "<p class=\"errors\">$emailError</p>" ?>

        <label for="password">Contraseña</label>
        <input type="password" minlength="3" name="password" value="<?= $password ?>" required>
        <?= empty($passError) ? "" : "<p class=\"errors\">$passError</p>" ?>

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