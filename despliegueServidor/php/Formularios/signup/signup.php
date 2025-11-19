<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>

<body>
    <p>Formulario de registro. Al pulsar el botón enviar, se va al index.</p>
    <form action="index.php" method="post">
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="pass">Contraseña</label>
        <input type="password" id="pass" name="pass" minlength="5"><br><br>
        <label for="pass2">Confirma contraseña</label>
        <input type="password" id="passw2" name="pass2" minlength="5"><br><br>
        <label for="age">Edad</label>
        <input type="number" id="edad" name="edad"><br><br>
        <label for="studies">Curso</label><br><br>
        <input type="checkbox" id="daw" name="studies" value="daw">
        <label for="studies">DAW</label><br>
        <input type="checkbox" id="dan" name="studies" value="dam">
        <label for="studies">DAM</label><br>
        <input type="checkbox" id="asir" name="studies" value="asir">
        <label for="studies">ASIR</label><br><br>
        <input type="submit" value="Enviar datos">
    </form>
</body>

</html>