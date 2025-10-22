<?php
include("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
</head>
<body>
    <h1>Funciones</h1>
    
    
    <?php

    /*
    - sort(): ordena de manera ascendente arrays indexados (es decir, de menor a mayor o
alfabéticamente de la a a la z). Si se utiliza con arrays asociativos, se perderán las claves y
serán sustituidas por índices.
- rsort(): (reverse sort) ordena de manera descendente arrays indexados.
- asort(): ordena de manera ascendente arrays asociativos o indexados según valor.
- arsort(): ordena de manera descendente un array asociativo o indexado según valor.
- ksort(): ordena de manera ascendente un array asociativo según clave.
- krsort(): ordena de manera descendente un array asociativo según clave.
- print_r($array): muestra el contenido de todo el array.
- array_keys($array): devuelve las claves de un array asociativo.
- array_pop($array): elimina el último elemento del array.
- array_push($array, $valor): añade al final del array el nuevo elemento.
- in_array($elemento, $array): busca el elemento en el array y devuelve un boolean
dependiendo de si lo ha encontrado o no.
- isset($variable): devuelve un boolean indicando si la variable está declarada o no (esta
función es muy útil, y no es exclusiva de los arrays).
4.7.1. Cadenas
Hasta ahora hemos visto algunas funciones para trabajar con strings (echo, print…). Pero hay muchas
más.
- printf($formato, ...$var): formatea la salida de las variables atendiendo al formato que se le
indique. Por ejemplo, con la variable $d como double y $s como string, printf(“d = %.2f y s =
%s”, $d, $s) mostrará d con dos decimales (%.2f) y la cadena (%s).
- strlen($var): int: devuelve la longitud de una cadena.
- strtolower($var): string: devuelve un string transformado a minúsculas. También existe
strtoupper.
- strcmp($var1, $var2): int: devuelve 0 si las dos cadenas son iguales, -1 si la primera es menor
a la segunda, y 1 si la primera es mayor a la segunda (alfabéticamente hablando). La función
es sensible a mayúsculas y minúsculas. Para una comparación case-insensitive, se puede
utilizar strcasecmp.
- substr($cadena, $offset, $length = null): string: devuelve la subcadena de la variable $cadena
empezando en la posición marcada con $offset hasta la longitud marcada con $length, o
hasta el final si no se indica este parámetro.
Por ejemplo, substr(“Me encanta PHP!!”, 3, 11) devolverá “canta PHP”.
- strpos($cadena, $clave, $offset = 0): int: devuelve la posición de la primera ocurrencia de la
clave en la cadena. Opcionalmente, se puede indicar un offset, que indicará a partir de qué
posición se empezará a buscar. También existe strrpos, que devuelve la posición de la última
vez que se encontró la clave.
Si se quiere hacer búsquedas case-insensitive, podemos utilizar stripos o strripos.
Por ejemplo, strpos(“Me encanta PHP!!”, “n”) devolverá 4, la posición de la primera ‘n’.
- strstr($cadena, $clave, bool $antesClave = false): string: devuelve la parte del string
resultante de buscar la clave en la cadena. Si el último boolean es true, devolverá la parte
anterior a la aparición de la clave.
Por ejemplo, strstr(“hola@ejemplo.com”, “@”) devuelve “ejemplo.com”. Si hubiera
un true como tercer argumento, devuelve “hola”.
- str_split($cadena, $longitud = 1): array: convierte una cadena en un array, con cada carácter
en una posición, o con la cantidad de caracteres indicada en el parámetro longitud.
Por ejemplo, str_split(“Quiero saber más PHP!”, 5), devolverá un array con los
valores [“Quier”, “o sab”, “er má”, “s PHP”, “!”].
- htmlentities($cadena): string: convierte todos los caracteres no ASCII en entidades HTML.
Por ejemplo, cambiará á por &aacute, ñ por &ñtilde, < por &lt…
Una función parecida sería htmlspecialchars($cadena), pero en este caso únicamente se
convierte a codificación HTML los caracteres especiales: &, “, ‘, < y >. Así pues, si htmentities
incluye htmlspecialchars.
- trim($cadena): string: devuelve una cadena quitando los espacios en blanco que pudiera
haber al principio o al final de una cadena.
- implode($separador, $array): string: devuelve un string con cada elemento del array
separado por el separador indicado.
- explode($separador, $string): array: devuelve un array resultante de trocear la cadena con el
separador indicado. Sería la operación inversa a implode.
4.7.2. Matemáticas
Veamos algunas de las funciones matemáticas que ofrece PHP:
- Funciones de cálculo: pow, sqrt, log, max, min, round, floor, ceil, abs, base_convert, decbin,
bindec…
- Funciones trigonométricas: tan, sin, cos, deg2rad, rad2deg…
4.7.3. Otras
Como hemos visto, existe gran variedad de funciones, aquí se muestran algunas que serán de
utilidad:
- isset($var): bool: indica si $var está declarada y es distinto de null. Puede recibir varios
parámetros, y en este caso sólo devolverá true cuando todas las variables estén definidas.
- unset($var): void: elimina una variable, de modo que deja de existir en el código.
- empty($var): bool: determina si una variable está vacía, es decir, si no existe o si su valor es
false (o 0).
- include(archivo): incluye el archivo indicado como parámetro. El método
include_once(archivo) comprueba que no se haya incluido antes dicho archivo. En ambos
casos, si se hace referencia a un fichero que no se encuentra, se lanzará un E_WARNING.
- require(archivo): parecida a include, pero en este caso se utiliza cuando el fichero que
incluimos es imprescindible para la ejecución. Si no se encuentra el fichero referenciado,
lanzará un error fatal E_COMPILE_ERROR. De manera similar, existe require_once(archivo).
Nota: tanto require como include se utilizan a menudo, tanto para recopilar funciones que se
usarán en toda la aplicación, como para reutilizar partes de la estructura de la página (por
ejemplo, la cabecera, el pie, el menú lateral, etc.).
- var_dump($var): void: imprime información sobre la variable o variables que se le pasa como
parámetro. Como alternativa, print_r($var) imprime también información sobre la variable
de una forma más resumida.
- is_int($var): bool: indica si la variable es de tipo entero. También existen is_double (o
is_float, son la misma), is_string, is_bool, is_array…
- intval($var): int: devuelve el valor entero de la variable. Trunca los decimales, no redondea.
Si se quiere redondear, la función round($var, $precision=0): float puede ayudar.
Del mismo modo, también existen doubleval, boolvar, strval…
- settype($var, $tipo): bool: convierte la variable en el tipo indicado. Los tipos pueden ser bool,
int, double, string, array, object o null.
Nota: En PHP también existen los castings similares a Java. Por tanto, si ponemos antes de
una variable (int), se convierte en entero. Lo mismo si ponemos (bool), (double), (string)…
    */
        showName();

        //Se pueden usar las variables declaradas en el fichero
        var_dump($variable);

        echo "<br>";
        printAddition(7,9);

        echo "<br>";
        $sum = addition(4,2);
        echo $sum;
        echo "<br>";

        echo addition(5,2);
        echo "<br>";

        echo "La suma de 6 y 9 es " . addition(6,9);
        echo "<br>";
        echo greet("rida");
        echo "<br>";
        echo greet("rida", "buenos dias");

        echo infoHtml("hola");

        echo "<br>";
        echo matricula("Rida", "Tierno");
        echo "<br>";
        echo matricula("Juan", "Brasil", "DAM", 2026);

        
    ?>

    <?php
    function increment($number) {
        $number++;
        return $number;
    }

    $number = 8;
    increment($number); //Parámetros por valor
    echo "<p>$number</p>";

    function incrementReference(&$number) {
        $number++;
        return $number;
    }

    $number = 8;
    incrementReference($number); //Parámetros por referencia
    echo "<p>$number</p>";

    $edad = 17;
    $edad = add1($edad);
    var_dump( $edad );
    ?>


    <h3>Funciones con un número variable de parámetros</h3>

    <?php

    echo "uno ", " dos", " tres" ,"<br>";

    max(4,8);
    max(4,9,11,-4);
    
    $resta = substract(4,9,8,5);
    var_dump( $resta );

    

    ?>
</body>
</html>