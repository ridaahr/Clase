/*
//Ej 1
let text = prompt("Introduce una frase");
let words = text.split(' ');
let longest = words[0];

for (let i = 0; i < words.length; i++) {
    if (words[i].length > longest.length) {
        longest = words[i];
    }
}
alert(longest);

//Ej 2
let word = prompt("Introduce una palabra");
word = word.toLowerCase();
if (word.startsWith("pre")) {
    alert("Empieza con pre");
} else {
    alert("No empieza con pre");
}

//Ej 3
let phrase = "El perro de mi casa es negro y tengo otro perro";
phrase = phrase.toLowerCase();
while (phrase.includes("perro")) {
    phrase = phrase.replace("perro", "gato");
}
alert(phrase);


//Ej 4
function randomNumber(a, b) {
    return Math.random() * (a - b) + b;
}
let num = randomNumber(9, 5);
alert(num);
*/

//Ej 5

class Punto {
    constructor(valX, valY) {
        this.valX = valX;
        this.valY = valY
    }
}

function distance(puntoA, puntoB) {
    return Math.sqrt(Math.pow((puntoB.valX - puntoA.valX), 2) + Math.pow((puntoB.valY - puntoA.valY), 2))
}
let puntoA = new Punto(4, 6)
let puntoB = new Punto(1, 2);
let length = distance(puntoA, puntoB);
alert(length);
/*

//Ej 6
let dias = ["domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado"];
let currentDate = new Date();
let cumpleaños = prompt("Introduce una fecha de cumpleaños");
let cumpleañosSeparado = cumpleaños.split("/");
let dia = cumpleañosSeparado[0];
let mes = cumpleañosSeparado[1];
let año = cumpleañosSeparado[2];
let birthDate = new Date(año, mes - 1, dia);
let dayBirth = birthDate.getDay();

let edad;
if (currentDate.getMonth() > birthDate.getMonth()) {
    edad = currentDate.getFullYear() - birthDate.getFullYear();
} else if (currentDate.getMonth() < birthDate.getMonth()) {
    edad = currentDate.getFullYear() - birthDate.getFullYear() - 1;
} else {
    if (currentDate.getDate() > birthDate.getDate()) {
        edad = currentDate.getFullYear() - birthDate.getFullYear();
    } else {
        edad = currentDate.getFullYear() - birthDate.getFullYear() - 1;
    }
}

alert("Nació un " + dias[dayBirth] + " y tiene " + edad + " años.");
*/