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

//Ej 5
let array = [2, 5, 6, 3];
let aux = array[array.length - 1];
for (let i = array.length - 1; i > 0; i--) {
  array[i] = array[i - 1];
}
array[0] = aux;
alert(array);

*/

/*
let array = [2, 5, 6, 3];
let aux = array[array.length - 1];
for (let i = 0; i < array.length; i++) {
    let temp = array[i];
    array[i] = aux;
    aux = temp;
}
array[0] = aux;
alert(array);
*/
/*
let n1 = 2;
let n2 = 3;
let n3 = 1;
if (n1 > n2 && n1 > n3) {
    alert(n1)
} else if (n2 > n1 && n2 > n3) {
    alert(n2)
} else if (n3 > n1 && n3 > n2) {
    alert(n3)
} else {
    alert(n1)
}


let n = Number(prompt("Introduce número"));

let sum = 0;

while (n > 0) {
    let s = n % 10;
    sum += s;
    n = Math.floor(n / 10);  
}

alert(sum);


let opt;
let lista = []
do {opt = Number(prompt("1. Añadir producto\n2. Elminiar producto\n3. Mostrar lista\n4. Salir"));

    if (opt == 1) {
        let producto = prompt("Introduce el producto");
        if (producto.length != 0) {
            lista.push(producto);
            } else alert("No puedes añadir un producto vacío");
    } else if (opt == 2) {
        let producto = prompt("Introduce el producto");
        if (lista.includes(producto)) {
            lista.splice(lista.indexOf(producto), 1);
        } else {
            alert("El producto no existe");
        }
    } else if (opt == 3) {
        if (lista.length == 0) {
            alert("Lista vacía")
        } else {
            alert(lista)
        }
    } else if (opt == 4) {
        alert("Saliendo...")
    } else {
        alert("Opción inválida")
    }
} while (opt != 4);


let array = [3, 5, 2]
let sum = array.reduce((a, b) => a + b, 0);
alert(sum)


let n = Number(prompt("Introduce número"))
let last = Math.floor(n % 10);
let first = (n - (n % 1000)) / 1000;
let mid = Math.floor(((n % 1000) - last) / 10);

if (mid == (first + last)) {
    alert("Es mágico")
} else alert("No es")


for (let i = 2; i <= 100; i++){
    let es = true;
    for (let j = 2; j < i; j++) {
        if (i % j == 0) {
            es = false;
        }
    }
    if (es) {
        alert(i)
    }
}


let descuento = Number(prompt("Descuento"))
let numbers = [120, 23, 10, 500]

let descontados = numbers.map(x => ((100-descuento)*x) / 100)

let n5numbers = [10, 3, 2, 9, 8];
let inverso = [];
for (let i = 0; i < n5numbers.length; i++) {
    inverso[i] = n5numbers[n5numbers.length - 1 - i];
}

let lista = ["maricarmen", "pepa", "juan"]
let nombre = prompt("Introuduce nombre")
let encontrado = false;
for (let i = 0; i < lista.length; i++) {
    if (lista[i] == nombre) {
        encontrado = true;
    }
}

if (encontrado) {
    alert("Encontrado")
} else alert("No encontrado");

let arr1 = [1, 5, 3, 2, 4]
let arr2 = [1, 2, 3, 4, 4]
let counter = 0;
for (let i = 0; i < arr1.length;i++) {
    for (let j = 0; j < arr2.length; j++) {
        if (arr1[i] == arr2[j]) counter++
    }
}

alert(counter)

let n = [4, 1, 2, 5, 3];
for (let i = 0; i < n.length; i++) {
    for (let j = 0; j < n.length - i - 1; j++) {
        if(n[j] > n[j + 1]) {
            let aux = n[j + 1]
            n[j + 1] = n[j]
            n[j] = aux
        }
    }
}

let n1 = 220
let s1 = 0
let n2 = 284

for (let i = 1; i < n1; i++) {
    if (n1 % i == 0) {
        s1 += i
    }
}

if (s1 == n2) alert ("Son amigos")
    else alert ("No lo son")



let n1 = 1331
let n2;

let n = Number(prompt("Introduce número de 4 cifras:"));
let u = n % 10; // último
let d = Math.floor((n / 10) % 10); // segundo
let c = Math.floor((n / 100) % 10); // tercero
let m = Math.floor(n / 1000); // primero

let mid = c * 10 + d; // une los del medio

if (m + u == mid) alert("Es mágico ✨");
else alert("No es mágico ❌");

let n = Number(prompt("Introduce número"));
let sum = 0;
while (n > 0) {
    let lastdig = n % 10;
    if (lastdig % 2 == 0) sum += lastdig
    n = Math.floor(n / 10);
}

let palabra = prompt("Introduce palabra")
let inv = "";
for (let i = palabra.length - 1; i >= 0; i--) {
    inv += palabra[i];
}

if (inv == palabra) {
    alert("Es")
} else alert ("No es")

let number = Number(prompt("Introduce número"));
let sum = 0;

for (let i = 1; i <= number; i++) {
    let res = 1;
    for (let j = 1; j <= i; j++) {
        res *= j;
    }
    sum += res;
}

let arr1 = [1, 2, 3]
let arr2 = [4, 5, 6]
let arr3 = []
for (let i = 0; i < arr1.length; i++) {
    arr3[2*i] = arr1[i]
    arr3[2*i+1] = arr2[i]
}



let sum = 0;
let n = 2134;
while(n > 0) {
    let r = n % 10;
    sum += r;
    n = Math.floor(n/10);
}


let n2 = 2134;
while (n2 >= 10) {
    let sum = 0;
    while(n2 > 0) {
        let r = n2 % 10;
        sum += r;
        n2 = Math.floor(n2/10);
    }
    n2 = sum;
}



let n = 1234;
let inverted = 0;

while (n > 0) {
    inverted = inverted * 10 + (n % 10)
    n = Math.floor(n / 10)
}
alert(inverted);


let n = 1234;
let par = 0;
let impar = 0;
while (n > 0)  {
    let r = n % 10;
    if (r % 2 == 0) {
        par++
    } else {impar ++}
    n = Math.floor(n / 10)
}

alert (par + impar);


let numbers = [2, 4, 2, 1, 6];
let n = 2;
let counter = 0;
for (let i = 0; i < numbers.length; i++) {
    if (n == numbers[i]) counter++
}

let n = 8;
let primo = true;
if (n < 2){
    alert("No es ")
} else {
    for (let i = 2; i < n; i++) {
        if (n % i == 0) {
            primo = false;
        }
    }
}
if (primo) alert("Es")
    else alert ("NO")


let n = 6;
let r = 1;
for (let i = 1; i <= n; i++) {
    r *=i
}
alert(r)



let n1 = 0;
let n2 = 1;

for (let i = 0; i < 20; i++) {
    alert(n1);
    n2 = n1 + n2;
    n1 = n2;
    
}


let n1 = []
let ordenado = true;
for (let i = 0; i < n1.length - 1; i++) {
    if (n1[i] > n1 [i + 1]) ordenado = false
}

if (ordenado) alert ("Ordenado")


let random = (Math.floor(Math.random()*100) + 1);
let n = 50;
let min = 1;
let max = 100;
while (n != random) {
    let ask = prompt("Es mayor o menor que" + n);
    if (ask == "mayor") {
        min = n;
    } else {
        max = n 
    }
    n = (max + min) / 2
}



let n = 145;
let original = n;
let sum = 0;
while (n > 0) {
    let digit = n % 10;
    let fact = 1;
    for (let i = 1; i <= digit; i++) {
        fact *= i
    }
    sum += fact;
    n = Math.floor(n / 10)
}

if (sum === original) alert ("Fuerte")


let n = 1331;
let original = n;
let capicua = 0;
while (n > 0) {
    capicua = capicua * 10 + (n % 10);
    n = Math.floor(n / 10)
}

*/

