<?php

$productos = [
    'prod1' => [
        'nombre' => 'portátil gaming',
        'precio' => 899.99,
        'stock' => 15,
        'categoria' => 'electrónica'
    ],
    'prod2' => [
        'nombre' => 'mesa escritorio',
        'precio' => 120.50,
        'stock' => 8,
        'categoria' => 'hogar'
    ],
    'prod3' => [
        'nombre' => 'ratón inalámbrico',
        'precio' => 25.99,
        'stock' => 0,
        'categoria' => 'electrónica'
    ]
];

$productosConDescuento = [
    'prod1' => [
        'nombre' => 'portátil gaming',
        'precio' => 899.99,
        'descuento' => 800.99,
        'stock' => 15,
        'categoria' => 'electrónica',
        
    ],
    'prod2' => [
        'nombre' => 'mesa escritorio',
        'precio' => 120.50,
        'stock' => 8,
        'categoria' => 'hogar'
    ],
    'prod3' => [
        'nombre' => 'ratón inalámbrico',
        'precio' => 25.99,
        'descuento' => 15.99,
        'stock' => 0,
        'categoria' => 'electrónica',
        
    ]
];

function formatPrice($precio)
{
    return str_replace('.', ',', round($precio, 2)) . " €";
}

function calculateIVA($precio)
{
    return $precio * 1.21;
}

function getStock($productos)
{
    $stockProducts = [];
    foreach ($productos as $producto => $valor) {
        if ($valor["stock"] > 0) {
            $stockProducts[] = $producto;
        }
    }
    return $stockProducts;
}
