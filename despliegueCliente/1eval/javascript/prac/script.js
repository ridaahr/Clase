/*
//Ej 1
let n = Number(prompt("Número a convertir:"));
let letters = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F"];
let resultado = "";
while (n % 16 != 0) {
    let res = n % 16;
    let coc = (n - res) / 16;
    resultado += letters[res];
    n = coc;
}
let resultado2 = "";
for (let i = resultado.length - 1; i >= 0; i--) {
    resultado2 += resultado[i];
}

alert(resultado2);

//Ej 2
let s = Number(prompt("Introduce los segundos que quieres convertir:"));
let min = 0;
let horas = 0;
let dias = 0;
if (s > 60) {
    let aux = s % 60;
    min = (s - aux) / 60;
    s = aux;
    if (min > 60) {
        let aux = min % 60;
        horas = (min - aux) / 60;
        min = aux;
    } 
    if (horas > 24) {
        let aux = horas % 24;
        dias = (horas - aux) / 24;
        horas = aux;
    }
}

alert(dias + " dias " + horas + " horas " + min + " minutos " + s + " segundos.")
/*
//Ej 3
let nperfecto = Number(prompt("Introduce el numero que quieres ver si es perfecto"));
let sum = 0;
for (let i = 0; i < nperfecto; i++) {
    if (nperfecto % i == 0) {
        sum += i;
    }
}

if (sum == nperfecto) {
    alert("Lo es")
} else {
    alert("No lo es")
}


//Ej 4
let numbers = [3, 1, 8, 10, 4, 2];
let max = numbers[0];
for (let i = 0; i < numbers.length; i++) {
    if (max < numbers[i]) {
        max = numbers[i];
    }
}
alert(max);
*/
//Ej 5
let array = [2, 5, 6];
let aux = array[0];
array[0] = array[array.length - 1];
array[array.length - 1] = aux;
rot[0] = array[0];
rot[array.length - 1] = array[array.length - 1]
for (let i = 1; i < array.length - 1; i++) {
    for (let j = 1; j < array.length - 1; j++) {
        rot[j + 1] = array[i]
    }
}

alert(rot);