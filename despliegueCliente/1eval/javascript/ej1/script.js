//Ej 1
let num = prompt("Introduce la cantidad");
let res = num * 1.21;
alert("La cantidad introducida con el iva es " + res);


//Ej 2
let n = Number(prompt("Introduce un valor"));
let n2 = Number(prompt("Introduce otro valor"));
let n3 = Number(prompt("Introduce otro valor"));
let sum = n + n2 + n3;
let average = sum / 3;
alert("La media es " + average);


//Ej 3
let n4 = prompt("Introduce un número");
if (n4 % 2 == 0) {
    alert("Es par");
} else {
    alert("Es impar");
} 


//Ej 4
let name = prompt("Introduce un nombre");
let name2 = prompt("Introduce otro");
let name3 = prompt("Introduce otro");
if (name == name2 || name == name3 || name2 == name3) {
    alert("Hay repetido")
} else {
    alert("No hay repetido")
}


//Ej 5
let grade = Number(prompt("Introduce la nota"));
if (grade < 5) {
    alert("Suspenso");
} else if(grade >= 5 && grade < 6.5) {
    alert("Aprobado");
} else if(grade >= 6.5 && grade < 8.5) {
    alert("Notable");
} else {
    alert("Sobresaliente");
}


//Ej 6
let year = Number(prompt("Introduce el año"));
let date = new Date();
let year2 = date.getFullYear();
let age = year2 - year;
if (age >= 18) {
    alert("Eres mayor");
} else {
    alert("Eres menor");
}


//Ej 7
let dni = Number(prompt("Introduce tu dni"));
let resto = dni % 23;
switch (resto) {
    case 0: alert("T");
        break;
    case 1: alert("R");
        break;
    case 2: alert("W");
        break;
    case 3: alert("A");
        break;
    case 4: alert("G");
        break;
    case 5: alert("M");
        break;
    case 6: alert("Y");
        break;
    case 7: alert("F");
        break;
    case 8: alert("P");
        break;
    case 9: alert("D");
        break;
    case 10: alert("X");
        break;
    case 11: alert("B");
        break;
    case 12: alert("N");
        break;
    case 13: alert("J");
        break;
    case 14: alert("Z");
        break;
    case 15: alert("S");
        break;
    case 16: alert("Q");
        break;
    case 17: alert("V");
        break;
    case 18: alert("H");
        break;
    case 19: alert("L");
        break;
    case 20: alert("C");
        break;
    case 21: alert("K");
        break;
    case 22:
        alert("E");
        break;
    default:
        alert("DNI incorrecto")
}

//Ej 8 lo mismo que la media pero que pida cuantos numeros
//va a meter el usuario

let counter = Number(prompt("¿Cuántos números vas a introducir?"));
let sum2 = 0;
for (let i = 0; i < counter; i++) {
    let num2 = Number(prompt("Introduce un número"));
    sum2 = Number(sum2 + num2);
}
let average2 = Number(sum / counter);
alert("La media es: " + average);
