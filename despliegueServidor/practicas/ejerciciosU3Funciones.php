<?php
function imprimeMayor($n1, $n2)
{
    if ($n1 >= $n2) {
        echo $n1;
    } else {
        echo $n2;
    }
}

function mayor($n1, $n2)
{
    if ($n1 < $n2) {
        return $n1;
    } else {
        return $n2;
    }
}

function esMayor($n1, $n2)
{
    if ($n1 > $n2) {
        return true;
    } else {
        return false;
    }
}

function cuentaCaracteres($text)
{
    return strlen($text);
}

function cuentaVocales($text)
{
    $vocales = ["a", "e", "i", "o", "u"];
    $counter = 0;
    for ($i = 0; $i < strlen($text); $i++) {
        if (in_array($text[$i], $vocales)) {
            $counter++;
        }
    }
    return $counter;
}

var_dump(cuentaVocales("holaae"));


function arrayPares($numeros) {
    $pares = [];
    foreach ($numeros as $num) {
        if ($num % 2 == 0) {
            $pares[] = $num;
        }
    }
    return $pares;
}

function arrayAleatorio($tamaño, $min, $max) {
    $arr = [];
    for ($i = 0; $i < $tamaño; $i++) {
        $arr[$i] = rand($min, $max);
    }
}


function digitos($numero) {
    // Si el número es negativo, eliminamos el signo
    if ($numero < 0) {
        $numero = substr((string)$numero, 1);
    }
    // Contamos los dígitos convirtiéndolo en cadena
    return strlen((string)$numero);
}

const CAMBIO_EURO_CORONA = 7.46;


function coronasAEuros($coronas) {
    return $coronas / CAMBIO_EURO_CORONA;
}


function eurosACoronas($euros) {
    return $euros * CAMBIO_EURO_CORONA;
}

function modifica(&$numero, $cantidad) {
    $numero += $cantidad;
}

$numero = 6;
modifica($numero, 5);

var_dump($numero);