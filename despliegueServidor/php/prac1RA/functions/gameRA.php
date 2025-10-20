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

/**
 * calculamos la media del jugador que pasamos en el array jugadores
 * si no se encuentra el jugador nos devuelve un false y si se encuentra
 * pues se hace la media y nos devuelve la media
 * @param mixed $jugador
 * @param mixed $jugadores
 * @return bool|float|int
 */
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

/**
 * está funcion hace que segun el promedio que pasemos pues nos 
 * devuelve un nivel u otro (en string)
 * @param mixed $promedio recibe un promedio
 * @return string
 */
function nivel($promedio) {
    if ($promedio > 100) return "Experto";
    elseif ($promedio > 50) return "Intermedio";
    else return "Principiante";
}

/**
 * en este pasamos los jugadores y va recorriendo las partidas de cada jugador
 * y sus puntuaciones para guardar cual es la maxima puntuacion de cada uno de los jugadores
 * @param mixed $jugadores
 * @return array de maximos de cada jugador
 */
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
/**
 * pasamos los jugadores y recorriendo las puntuaciones vamos a saber cuantas partidas
 * ha jugado cada uno, nos devuelve un array de partidas
 * @param mixed $jugadores
 * @return int[]
 */
function partidas($jugadores) {
    $partidas = [];
    foreach ($jugadores as $clave => $jugador) {
        $partidas[$clave] = count($jugador["puntuaciones"]);
    }
    return $partidas;
}