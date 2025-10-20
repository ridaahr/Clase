<?php
function filterByType($arr, $type)
{
    for ($i = 0; $i < count($arr); $i++) {
        $arr2 = [];
        if ($type == "par") {
            for ($i = 0; $i < count($arr); $i++) {
                if ($arr[$i] % 2 == 0) {
                    $arr2[] = $arr[$i];
                }
            }
        } elseif ($type == "impar") { {
                if ($arr[$i] % 2 != 0) {
                    $arr2[] = $arr[$i];
                }
            }
        } elseif ($type == "primo") {
            $num = $arr[$i];
            $esPrimo = true;
            if ($num > 1) {
                for ($j = 2; $j < $num; $j++) {
                    if ($num % $j == 0) {
                        $esPrimo = false;
                    }
                }
            } else {
                $esPrimo = false;
            }

            if ($esPrimo) {
                $arr2[] = $num;
            }
        } elseif ($type == "positivo") {
            if ($arr[$i] >= 0) {
                $arr2[] = $arr[$i];
            }


        } elseif ($type == "negativo") {
            if ($arr[$i] < 0) {
                $arr2[] = $arr[$i];
            }
        }
    }
    return $arr2;
}

function calculateStatistics($arr)
{
    $arr2 = [];
    $suma = 0;
    foreach ($arr as $num) {
        $suma += $num;
    }
    $media = $suma / count($arr);

    $count = count($arr);
    if ($count % 2 == 1) {
        $mediana = $arr[($count / 2)];
    } else {
        $mediana = ($arr[$count / 2 - 1] + $arr[$count / 2]) / 2;
    }

    $frecuencias = array_count_values($arr);
    $maxFreq = max($frecuencias);
    $moda = [];
    foreach ($frecuencias as $valor => $freq) {
        if ($freq == $maxFreq) {
            $moda[] = $valor;
        }
    }

    $arr2["media"] = $media;
    $arr2["mediana"] = $mediana;
    $arr2["moda"] = $moda;

    return $arr2;
}

function analizarPalabras($text)
{
    $palabras = preg_split("/\s+/", $text);

    $number_of_words = count($palabras);
    $longest_word = 0;
    $shortest_word = 0;

    for ($i = 0; $i < count($palabras); $i++) {
        if (mb_strlen($palabras[$i] > mb_strlen($longest_word))) {
            $longest_word = $palabras[$i];
        }
        if (mb_strlen($palabras[$i] < mb_strlen($shortest_word))) {
            $shortest_word = $palabras[$i];
        }
    }

    return [
        'number_of_words' => $number_of_words,
        'longest_word' => $longest_word,
        'shortest_word' => $shortest_word
    ];
}

function convertTemperature($temperatura, $unidadOrigen = "celsius", $unidadDestino = "fahrenheit")
{
    if (
        ($unidadOrigen != "celsius" && $unidadOrigen != "fahrenheit" && $unidadOrigen != "kelvin") ||
        ($unidadDestino != "celsius" && $unidadDestino != "fahrenheit" && $unidadDestino != "kelvin")
    ) {
        return false;
    } else {
        if ($unidadOrigen == "celsius" && $unidadDestino == "fahrenheit") {
            return ($temperatura * 9 / 5) + 32;
        } elseif ($unidadOrigen == "celsius" && $unidadDestino == "kelvin") {
            return $temperatura + 273.15;
        } elseif ($unidadOrigen == "fahrenheit" && $unidadDestino == "celsius") {
            return ($temperatura - 32) * 5 / 9;
        } elseif ($unidadOrigen == "fahrenheit" && $unidadDestino == "kelvin") {
            return ($temperatura - 32) * 5 / 9 + 273.15;
        } elseif ($unidadOrigen == "kelvin" && $unidadDestino == "celsius") {
            return $temperatura - 273.15;
        } elseif ($unidadOrigen == "kelvin" && $unidadDestino == "fahrenheit") {
            return ($temperatura - 273.15) * 9 / 5 + 32;
        } else {
            return $temperatura;
        }
    }
}

$personas = $personas = [
    "12345678A" => [
        "nombre" => "Juan Pérez",
        "edad" => 30,
        "correo" => "juan.perez@example.com",
        "telefono" => "600123456"
    ],
    "87654321B" => [
        "nombre" => "María López",
        "edad" => 25,
        "correo" => "maria.lopez@example.com",
        "telefono" => "600654321"
    ],
    "11223344C" => [
        "nombre" => "Carlos Gómez",
        "edad" => 40,
        "correo" => "carlos.gomez@example.com",
        "telefono" => "600112233"
    ]
];

/**
 * Es una función sencilla que se utiliza para buscar si el DNI que proporcionamos se encuentra en nuestro sistema imaginario
 * @param mixed $dni Aquí se indica el DNI de la persona a buscar
 * @param mixed $arr Aquí pasamos el array donde tenemos guardadas las personas que tengamos registradas en nuestro sistema imaginario
 */
function inventoRida($dni, $arr)
{
    foreach ($arr as $key => $value) {
        if ($dni == $key) {
            return $value;
        }
    }
    return false;
}

var_dump(inventoRida("11223344C", $personas));