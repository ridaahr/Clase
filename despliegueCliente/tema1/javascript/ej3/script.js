/*
//Ej 1
let size = Number(prompt("¿Cuántos valores vas a introducir?"));
let numbers = [size]

for (let i = 0; i < size; i++) {
    numbers[i] = Number(prompt("Introduce un valor"));
}


for (let i = 0; i < numbers.length; i++) {
    for (let j = 0; j < numbers.length  - 1 - i; j++) {
        if (numbers[j] > numbers[j + 1]) {
            let aux = numbers[j + 1];
            numbers[j + 1] = numbers[j];
            numbers[j] = aux;
        }
    }
}

for (let i = 0; i < numbers.length; i++) {
    alert(numbers[i]);
}
*/

//Ej 2
let option;
usuarios = [
    ["rida", "rida@gmail.com", "sandia"],
    ["usuario2", "usuario2@gmail.com", "melon"]
];


do {
    alert("1. Iniciar sesión\n2. Registrarse\n3. Salir");
    option = Number(prompt("Introduce una opción"));
    if (option == 1) {
        let user = prompt("Introduce el correo");
        let pass = prompt("Introduce la contraseña");
        let found = false;

        for (let i = 0; i < usuarios.length; i++) {
            if (usuarios[i][1] === user && usuarios[i][2] === pass) {
                alert("Inicio de sesión correcto");
                found = true;
            }

        }

        if (found == false) {
            alert("Usuario o contraseña incorrecta");
        }

    } else if (option == 2) {
        let name = prompt("Introduce el nombre");
        let user = prompt("Introduce el correo");
        let pass = prompt("Introduce la contraseña");
        let usuario = [name, user, pass];
        let repetido = false;
        for (let i = 0; i < usuarios.length; i++) {
            if (usuarios[i][1] === user) {
                repetido = true;
                alert("Este usuario ya existe")
            }
        }

        let numUsers = usuarios.length;

        if (repetido === false) {
            usuarios[numUsers] = usuario;
        }

        alert(usuarios);
    } else if (option == 3) {
        alert("Saliendo...");
    } else {
        alert("Opción incorrecta");
    }
} while (option != 3);

/*
//Ej 3
let notas = [5, 2, 8, 10 ,3];
let media = 0;
let aprobados = 0;
let counter = 0;
for (let i = 0; i < notas.length; i++) {
    media = media + notas[i];
    if (notas[i] >= 5) {
        aprobados += notas[i];
        counter++
    }
}

media = media / notas.length;

alert("La media total es " + media);

aprobados = aprobados / counter;

alert("La media de los aprobados es " + aprobados);


//Ej 3 sin arrays
let n = Number(prompt("¿Cuántas notas vas a introducir?"));
let cont = 0;
let aprobados = 0;
let sum = 0;
let sumAprobados = 0;
do {
    let nota = Number(prompt("Introduce una nota"));
    sum += nota;
    if (nota >= 5) {
        sumAprobados += nota;
        aprobados++;
    }
    cont++;
} while (cont < n);
let avg = sum / n;
let avgAprobados = sumAprobados / aprobados;
alert("La media total es " + avg)
alert("La media de los aprobados es " + avgAprobados);
/*
//Ej 4
let numbers = [5, 2, 8, 11, 12, 9, 5, 3, 1, 4]

for (let i = 0; i < numbers.length; i++) {
    for (let j = 0; j < numbers.length - 1 - i; j++) {
        if (numbers[j] > numbers[j + 1]) {
            let num = numbers[j + 1];
            numbers[j + 1] = numbers[j];
            numbers[j] = num;
        }
    }
}

for (let i = 0; i < numbers.length; i++) {
    alert(numbers[i]);
}

//Ej 5
let arr1 = [4, 2, 1, 6, 3];
let arr2 = [4, 2, 4, 6, 5];
let counter = 0;
for (let i = 0; i < arr1.length; i++) {
    for (let j = 0; j < arr2.length; j++) {
        if (arr1[i] == arr2[j] && i == j) {
            counter++;
        }
    }
}

alert("Hay " + counter + " elementos repetidos");
*/
