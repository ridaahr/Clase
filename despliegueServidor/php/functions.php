<?php
function showName()
{
    echo "Rida";
}

$variable = "hola";

function printAddition($a, $b)
{
    echo $a + $b;
}
/**
 * Realiza la suma de dos número enteros o double
 * @param int | float $a Primer operando
 * @param int | float $b Segundo operando
 * @return int | float El resultado de la suma de los dos operandos
 */
function addition($a, $b): int|float
{
    return $a + $b;
}

//funcion para saludar que puede recibir solamente el nombre (muestra hola $nombre)
//o el nombre y el tipo de saludi (muestra $saludo $nombre)
//public static String saludar(String nombre)(return "hola " + nombre;)
//public static String saludar(String nombre, String saludo)(return saludo + " " + nombre;)
//Esto en JAVA se conoce como la sobreescritura de funciones
function greet($name, $greet = "hola")
{
    return $greet . " " . $name;
}

/**
 * Devuelve como string lo que le digamos como parametro dentro de las etiquetas que indiquemos (p si no indicamos nada)
 * @param string $tag etiquetas en las que envolver el elemento. Si no se indica ninguna, que sea <p></p>
 * @param string $element cadena de texto a envolver entre las tags html
 * @return string con el elemento rodeado de las tags indicadas
 */
function infoHtml($element, $tag = "p")
{
    return "<$tag>$element</$tag>";
}
/**
 * Summary of matricula
 * @param mixed $student
 * @param mixed $school
 * @param mixed $course
 * @param mixed $year
 * @return string
 */
function matricula($student, $school, $course = "DAW", $year = 2025)
{
    return "$student se ha matriculado en $course el año $year en el colegio $school";
} // Los opcionales van al final

function add1($num)
{
    $num++;
    return $num;
}

function substract($firstNumber, ...$numbers)
{
    $result = $firstNumber;
    foreach ($numbers as $n) {
        $result -= $n;
    }
    return $result;
}
/**
 * Devuelve un texto concatenado de todos los textos que introduzcamos
 * @param array $texts
 * @return bool|string
 */
function concat(...$texts)
{
    if (count($texts) <2) {
        return false;
    }
    $result = "";
    foreach ($texts as $text) {
        $result .= $text;
    }
    return $result;
}

function concat2(...$texts)
{

}