function square(num) {
    return num * num;
}

function factorial(num) {
    let res = 1;
    for (let i = 1; i <= num; i++) {
        res *= i;
    }
    return res;
}

function convert(grades) {
    return (grades * 9 / 5) + 32;
}

function esPrimo(num) {
    let es = true;
    if (num < 2) {
        return false;
    }
    for (let i = 2; i < num; i++) {
        if (num % i == 0) {
            es = false;
        }
    }
    return es;
}

function vocalsCount(text) {
    let vocales = ["a", "e", "i", "o", "u"]
    let counter = 0;
    for (const letter of text) {
        if (vocales.includes(letter)) {
            counter++;
        }
    }
    return counter;
}

function ecuacion(a, b, c) {
    let arr = [];
    let discriminante = b ** 2 - 4 * a * c;

    if (a === 0) {
        return "No es una ecuación cuadrática";
    }

    if (discriminante < 0) {
        return "No hay soluciones reales";
    }

    let arr1 = (-b + Math.sqrt(discriminante)) / (2 * a);
    let arr2 = (-b - Math.sqrt(discriminante)) / (2 * a);
    arr.push(arr1, arr2);
    return arr;
}



function callback() {
    alert("Es mayor de 10");
}

function numCall(num, callback) {
    if (num > 10) {
        callback();
    }
}

function sumar() {
    let sum = 0;
    for (let i = 0; i < arguments; i++) {
        sum += arguments[i];
    }
    return sum;
}

function palindromos(arr) {
    let palindromos = [];
    for (let i = 0; i < arr.length; i++) {
        let word = arr[i];
        let reverse = "";
        for (let j = word.length - 1; j >= 0; j--) {
            reverse += word[j];
        }
        if (reverse === word) {
            palindromos.push(word);
        }
    }
    if (palindromos.length > 0) {
        return palindromos;
    } else {
        alert("No hay ninguna")
    }
}
/*
function palindromos(arr) {
    let palindromos = [];
    for (let i = 0; i < arr.length; i++) {
        let word = arr[i];
        let rev = []
        for (let j = 0; j < word.length; j++) {
            rev[j] = word[j];
        }
        rev = rev.reverse().join('');
        if (rev === word) {
            palindromos.push(word);
        }
    }
    return palindromos;
}
*/
let soluciones = ecuacion(1, 4, 3);
alert(soluciones);
alert(vocalsCount("holaaaaa"))