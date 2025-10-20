/*
//Ej 1
let area;
let perimetro = 0;
let lado = Number(prompt("¿Cuánto mide el lado?"));
area = lado * lado;
for (let i = 0; i < 4; i++) {
    perimetro += lado;
}
alert("El área es " + area + " y el perímetro es " + perimetro);

//Ej 2. Número de 4 dígitos que sumado el primero y el último de el del medio
let number = Number(prompt("Introduce el número"));
let last = number % 10;
let numbers = number % 1000;
let mid = (numbers - last) / 10;
let first = (number - (number % 1000)) / 1000;
alert(first);
alert(mid);
alert(last);

if (first + last == mid) {
    alert("Es mágico");
} else {
    alert("No es");
}

//Ej 3
let num = Number(prompt("Introduce el número"));
let counter = 1;
if(num < 0) {
    num = num * -1;
}

if (num < 10 && num >= 0) {
    alert("Tiene 1 dígito");
} else {
while (num >= 10) {
    num = num / 10;
    counter++;
}
}

alert("Tiene " + counter + " dígitos")

//Ej 4
let pairs = [];
for(let i = 1; i <= 100; i++) {
    if(i % 2 == 0) {
        pairs.push(i);
    }
}
alert(pairs);


//Ej 5
let counter = Number(prompt("¿Cuántos números vas a introducir?"));
let sum2 = 0;
for (let i = 0; i < counter; i++) {
    let num2 = Number(prompt("Introduce un número"));
    sum2 = Number(sum2 + num2);
}
let average2 = Number(sum / counter);
alert("La media es: " + average);


//Ej 6
let min = 1;
let max = 100;
let adivinado = false;
let num;
let ask;
let ask2;
while (adivinado == false) {
    num = Math.floor(Math.random() * (max - min + 1)) + min;

    ask = prompt("¿Tu número es " + num + "?(s/n)")
    if (ask == "s") {
        adivinado = true;
    } else {
        ask2 = prompt("¿Tu número es menor?(s/n)");
        if (ask2 == "s") {
            max = num - 1;
        } else {
            min = num + 1;
        }
    }
}

//Ej 7
console.log("Preguntas y respuestas");
let respuesta1 = prompt("Capital de españa");
if (respuesta1.toLowerCase() == "madrid") {
    console.log("Correcto!");
} else {
    console.log("Incorrecto, es Madrid");    
}

let respuesta2 = prompt("¿Cuál es el planeta rojo?");
if (respuesta2.toLowerCase() == "marte") {
    console.log("Correcto!");
} else {
    console.log("Incorrecto, es Marte");    
}

console.log("Fin");

//Ej 8
let option;

do {
    alert("1. Números pares \n2. Calcular área y perímetro \n3. Salir");
    option = Number(prompt("Introduce la opción deseada"));
    if (option == 1) {
        let pairs = [];
        for (let i = 1; i <= 100; i++) {
            if (i % 2 == 0) {
                pairs.push(i);
            }
        }
        alert(pairs);
    } else if (option == 2) {
        let area;
        let perimetro = 0;
        let lado = Number(prompt("¿Cuánto mide el lado?"));
        area = lado * lado;
        for (let i = 0; i < 4; i++) {
            perimetro += lado;
        }
        alert("El área es " + area + " y el perímetro es " + perimetro);
    } else if (option == 3) {
        alert("Saliendo...");
    } else {
        alert("Opción inválida")
    }
} while (option != 3);


//Ej 9
alert("Piedra, papel o tijera");
let jugador1 = Number(prompt("1. Piedra \n2. Papel \n3. Tijera"));
let jugador2 = Math.floor(Math.random() * 3) + 1;

let opciones = ["piedra", "papel", "tijera"];

alert("El jugador 2 ha sacado " + opciones[jugador2 - 1]);

if (jugador1 == jugador2) {
    alert("Empate")
} else if ((jugador1 == 1 && jugador2 == 3) || (jugador1 == 2 && jugador2 == 1) || (jugador1 == 3 && jugador2 == 2)){
    alert("Ha ganado el jugador 1");
} else {
    alert("Ha ganado el jugador 2");
}



//Ej 10
let primos = [];
for (let i = 2; i <= 100; i++) {
    let esprimo = true;
    for (let j = 2; j < i; j++) {
        if (i % j == 0) {
            esprimo = false;
        }
    }
    if (esprimo) {
        primos.push(i);
    }
}

alert(primos);

*/
//Ej 11
let num = Number(prompt("Introduce un número"));
let sum;

while (num >= 10) {
    sum = 0;
    while (num > 0) {
        sum += num % 10;
        num = Math.floor(num / 10);
    }
    num = sum;
}

alert(sum);