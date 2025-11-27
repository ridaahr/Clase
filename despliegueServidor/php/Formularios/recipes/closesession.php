<?php
//Cerrar sesión
session_start();
session_destroy();
header("Location: formrecipe.php");

//Borrar cookies
setcookie("receta", "", time() - 3600);