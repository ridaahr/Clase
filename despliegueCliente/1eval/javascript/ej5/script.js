/*
//Ej 1
let numbers = [1, 4, 5, 6, 3, 4];
const setnumbers = new Set(numbers);
for (const n of setnumbers) {
    alert(n);
}


//Ej 2
let setA = new Set([1, 2, 3, 4]);
let setB = new Set([3, 4, 5, 6]);

let arr = [...setA];
let arr2 = [...setB];


let comunes = new Set(arr.filter(x=> arr2.includes(x)));

for (const n of comunes) {
    alert(n);
}

//Ej 3
let option;
usuarios = new Map([
    ["rida@gmail.com", "sandia"],
    ["usuario2@gmail.com", "melon"]
]);


do {
    alert("1. Iniciar sesión\n2. Registrarse\n3. Salir");
    option = Number(prompt("Introduce una opción"));
    if (option == 1) {
        let user = prompt("Introduce el correo");
        let pass = prompt("Introduce la contraseña");

        if(usuarios.has(user)) {
            if (usuarios.get(user) == pass) {
                alert("Inicio de sesión correcto")
            }
        } else {
            alert("Inicio de sesión incorrecto")
        }


    } else if (option == 2) {
        let user = prompt("Introduce el correo");
        let pass = prompt("Introduce la contraseña");
        let repetido = false;
            if (usuarios.has(user)) {
                repetido = true;
                alert("Este usuario ya existe")
            
        }

        if (repetido === false) {
            usuarios.set(user, pass)
        }

        for (let user of usuarios) {
            alert(user);
        }
    } else if (option == 3) {
        alert("Saliendo...");
    } else {
        alert("Opción incorrecta");
    }
} while (option != 3);
*/

//Ej 4
let size1 = Number(prompt("¿Cuántos vas a meter en el primero?"));
let set1 = new Set();
for (let i = 0; i < size1; i++) {
    let n = prompt("Introduce número");
    set1.add(n);
}

let size2 = Number(prompt("¿Cuántos vas a meter en el segundo?"));
let set2 = new Set();
for (let i = 0; i < size2; i++) {
    let n = prompt("Introduce número");
    set2.add(n);
}
let size3 = Number(prompt("¿Cuántos vas a meter en el tercero?"));
let set3 = new Set();
for (let i = 0; i < size3; i++) {
    let n = prompt("Introduce número");
    set3.add(n);
}

let dif = new Set();






for (const n of set1) {
    let tiene1 = set2.has(n);
    let tiene2 = set3.has(n);
    if (!tiene1 && !tiene2) {
        dif.add(n);
    }
    
}

for (const n of set2) {
    let tiene1 = set3.has(n);
    let tiene2 = set1.has(n);
    if (!tiene1 && !tiene2) {
        dif.add(n);
    }
}

for (const n of set3) {
    let tiene1 = set1.has(n);
    let tiene2 = set2.has(n);
    if (!tiene1 && !tiene2) {
        dif.add(n);
    }
}

for (const n of dif) {
    alert(n);
}
