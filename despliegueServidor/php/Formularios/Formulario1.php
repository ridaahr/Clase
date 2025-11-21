<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>
    <form action="landing.php" method="POST">
        <label for="name">Nombre</label>
        <input type="text"  placeholder="Nombre..." id="name" name="name" required>
        <br>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="pass" minlength="5">
        <br>
        <label for="terms">Acepto los terminos y condiciones</label>
        <input type="checkbox" name="terms">
        <br>
        <label for="subjects">Asignatura</label>
        <select name="subjects" id="subjects">
            <option value="DWEC">Desarrollo web entorno cliente</option>
            <option value="DWES">Desarrollo web entorno servidor</option>
            <option value="Desp">Despliegue</option>
        </select>
        <br>

        <fieldset>
            <legend>Genero</legend>
            <input type="radio" name="genero" id="genero" value="hombre" >
            <label for="genero">Hombre</label>
            <br>
            <input type="radio" name="genero" id="genero" value="mujer">
            <label for="genero">Mujer</label>
            <br>
            <input type="radio" name="genero" id="genero" value="otro">
            <label for="genero">Otro</label>
        </fieldset>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>