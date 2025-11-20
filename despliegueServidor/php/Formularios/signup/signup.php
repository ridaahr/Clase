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
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>

        <label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="pass"><br>

        <label for="pass2">Repite la contraseña:</label>
        <input type="password" id="pass2" name="pass2"><br>

        <label for="age">Edad:</label>
        <input type="number" id="age" name="age"><br>
        <p>Cursos</p>
        <input type="checkbox" id="daw" name="studies[]" value="daw">
        <label for="daw">DAW</label><br>
        <input type="checkbox" id="dam" name="studies[]" value="dam">
        <label for="dam">DAM</label><br>
        <input type="checkbox" id="asir" name="studies[]" value="asir">
        <label for="daw">ASIR</label><br>
        <br>

        <input type="submit" value="Enviar datos">
    </form>
</body>

</html>