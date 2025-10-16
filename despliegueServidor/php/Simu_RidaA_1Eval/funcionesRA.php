<?php
function promedio(...$nums)
{
    $result = 0;
    $counter = 0;
    if ($nums == null) {
        return false;    
    } else {
        foreach ($nums as $num) {
            $result = $result + $num;
            $counter++;
        }
        return $result / $counter;
    }
}

function potencia($base, $exponente = 2)
{
    $counter = $exponente;
    $result = $base;
    for ($i = 1; $i < $exponente; $i++) {
        $result = $result * $base;

    }
    return $result;
}