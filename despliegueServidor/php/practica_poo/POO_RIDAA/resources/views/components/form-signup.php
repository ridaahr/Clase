<div class="form">
    <h2>Crear Cuenta</h2>
    <?= empty($errorBD) ? "" : "<p class=\"errors\">$errorBD</p>" ?>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="name">Nombre</label>
        <input type="text" name="name" value="<?= $name ?>" required>
        <?= empty($nameError) ? "" : "<p class=\"errors\">$nameError</p>" ?>

        <label for="surname">Apellidos</label>
        <input type="text" name="surname" value="<?= $surname ?>" required>
        <?= empty($surnameError) ? "" : "<p class=\"errors\">$surnameError</p>" ?>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $email ?>" required>
        <?= empty($emailError) ? "" : "<p class=\"errors\">$emailError</p>" ?>

        <label for="password">Contraseña</label>
        <input type="password" minlength="3" name="password" value="<?= $password ?>" required>

        <label for="surname">Repite la contraseña</label>
        <input type="password" minlength="3" name="password2" value="<?= $password2 ?>" required>
        <?= empty($passError) ? "" : "<p class=\"errors\">$passError</p>" ?>

        <label for="surname">DNI</label>
        <input type="text" name="dni" value="<?= $dni ?>">
        <?= empty($dniError) ? "" : "<p class=\"errors\">$dniError</p>" ?>

        <label for="age">Edad</label>
        <input type="number" min="18" name="age" value="<?= $age ?>">
        <?= empty($ageError) ? "" : "<p class=\"errors\">$ageError</p>" ?>

        <div class="checkbox-group">
            <input type="checkbox" id="stay-connected" name="stay-connected">
            <label for="stay-connected">Quiero seguir conectado</label>
        </div>

        <button type="submit">Crear Cuenta</button>

        <div class="form-footer">
            ¿Ya tienes cuenta? <a href="/public/login.php" id="go-to-login">Inicia Sesión</a>
        </div>
    </form>
</div>