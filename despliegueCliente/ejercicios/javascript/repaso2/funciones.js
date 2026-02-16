function sumar(lista) {
    let suma = 0;
    for (let i = 0; i < lista.length; i++) {
        suma += lista[i];
    }
    return suma;
}

function filtrarPares(lista) {
    let pares = [];
    for (let i = 0; i < lista.length; i++) {
        if (lista[i] % 2 == 0) {
            pares.push(lista[i]);
        }
    }
    return pares;
}

function aplicarOperacion(lista, operacion) {
    return lista.map(operacion);
}


let suma = sumar([2, 5, 7]);
let pares = filtrarPares([2, 3, 4, 9, 6]);
let operacion = aplicarOperacion([3, 4, 7], x => x * 2);

console.log(suma);
console.log(pares);
console.log(operacion);