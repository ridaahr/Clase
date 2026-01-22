<header>
    <h1>Concesionario</h1>
    <nav>
        <ul>
            <?php if (!$isLogged): ?>
            <li><a href="/public/login.php">Iniciar sesión</a></li>
            <li><a href="/public/signup.php">Registrarse</a></li>
            <?php endif; ?>
            <li><a href="/public/index.php">Inicio</a></li>
            <li><a href="/public/closesession.php">Cerrar sesión</a></li>
        </ul>
    </nav>
</header>