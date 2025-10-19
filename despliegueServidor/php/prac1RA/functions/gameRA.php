<?php
$jugadores = [
    "rida" => [
        "nombre" => "Rida Aharrar",
        "edad" => 24,
        "puntuaciones" => [24, 150, 21, 11],
        "activo" => true
    ],
    "nico" => [
        "nombre" => "Nicolás Marín",
        "edad" => 21,
        "puntuaciones" => [12, 2, 3],
        "activo" => true
    ],
    "mari" => [
        "nombre" => "Mari Carmen",
        "edad" => 18,
        "puntuaciones" => [2, 12, 21, 11, 7],
        "activo" => false
    ],
    "pepi" => [
        "nombre" => "Peppa Pig",
        "edad" => 32,
        "puntuaciones" => [12, 42, 21, 350],
        "activo" => true
    ],
];

function promedio($jugador, $jugadores)
{
    if (!isset($jugadores[$jugador])) {
        return false;
    }
    $avg = 0;

    $puntuaciones = $jugadores[$jugador]["puntuaciones"];
        for ($i = 0; $i < count($puntuaciones); $i++) {
            $avg += $puntuaciones[$i];
        }

    return $avg / count($puntuaciones);
}

function nivel($promedio) {
    if ($promedio > 100) return "Experto";
    elseif ($promedio > 50) return "Intermedio";
    else return "Principiante";
}

function maxPuntuacion($jugadores) {
    $maximos = [];
    foreach ($jugadores as $clave => $jugador) {
        $max = $jugador["puntuaciones"][0];
        for ($i = 0; $i < count($jugador["puntuaciones"]); $i++) {
            if ($jugador["puntuaciones"][$i] > $max) {
                $max = $jugador["puntuaciones"][$i];
            }
        }
        $maximos[$clave] = $max;
    }
    return $maximos;
}

function partidas($jugadores) {
    $partidas = [];
    foreach ($jugadores as $clave => $jugador) {
        $partidas[$clave] = count($jugador["puntuaciones"]);
    }
    return $partidas;
}