<?php

function multiplos($n1, $n2) {
    if ($n1 < 0 || $n2 < 0) {
        return null;
    } elseif ($n1 % $n2 == 0 || $n2 % $n1 == 0) {
        return true;
    }
    return false;
}

function analiza($texto, ...$args) {
    if (count($args)  < 2) {
        return -1;
    } else {
        $letrasesp = str_split($texto);
        $letras = str_replace(' ', '', $letrasesp);
        $counter = 0;
        for ( $i = 0; $i < count($args); $i++) {
            if (in_array($args[$i], $letras)) {
                $counter++;
            }
        }
        if ($counter == count($args)) {
            return 1;
        } elseif ($counter < count($args) && $counter > 0) {
            return 0;
        }
        else {
            return -1;
        }
    }
}

function analiza2(...$args) {
    if (count($args)  < 2) {
        return -1;
    } else {
        $palabras = $args[0];
        $letrasesp = str_split($palabras);
        $letras = str_replace(' ', '', $letrasesp);
        var_dump($letras);
        $counter = 0;
        for ($i = 1; $i < count($args); $i++) {
            if (in_array($args[$i], $letras)) {
                $counter++;
            }
        }
        if ($counter == (count($args) - 1)) {
            return 1;
        } elseif ($counter < (count($args) - 1) && $counter > 1) {
            return 0;
        }
        else {
            return -1;
        }
    }
}

function printBid($bid) {
    for ($i = 0; $i < count($bid); $i++) {
        for ($j = 0; $j < count($bid[$i]); $j++) {
            echo $bid[$i][$j] ." ";
        }
    }
    echo "<br>";
}

