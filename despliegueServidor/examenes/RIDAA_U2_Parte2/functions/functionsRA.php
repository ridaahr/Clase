<?php

function numberAnalysis(...$numbers)
{
    if (count($numbers) == 0) {
        return false;
    } else {
        $array = [
            "total" => null,
            "sum" => null,
            "max" => null,
            "avg" => null,
            "pos" => null,
            "squares" => []
        ];
        $total = count($numbers);
        $sum = 0;
        $max = $numbers[0];
        $positivos = 0;
        for ($i = 0; $i < $total; $i++) {
            $sum += $numbers[$i];
            if ($numbers[$i] > $max) {
                $max = $numbers[$i];
            }
            if ($numbers[$i] >= 0) {
                $positivos++;
            }
            $array["squares"][$i] = $numbers[$i] * $numbers[$i];
        }
        $avg = $sum / $total;

        $array["total"] = $total;
        $array["sum"] = $sum;
        $array["max"] = $max;
        $array["avg"] = round($avg, 2);
        $array["pos"] = $positivos;
        return $array;
    }
}

function calculate($numbers, $operation = "sum", $round = false)
{
 
        if ($operation === "order") {
            return arsort($numbers);
        } elseif ($operation === "sum") {
            $sum = 0;
            for ($i = 0; $i < count($numbers); $i++) {
                $sum += $numbers[$i];
            }
            if ($round == true) {
                $sum = round($sum, 0);
                return $sum;
            } else {
                return $sum;
            }
        } elseif ($operation === "product") {
            $prod = 1;
            for ($i = 0; $i < count($numbers); $i++) {
                $prod *= $numbers[$i];
            }
            if ($operation == true) {
                $prod = $round($prod, 0);
                return $prod;
            } else {
                return $prod;
            }
        }
    
}