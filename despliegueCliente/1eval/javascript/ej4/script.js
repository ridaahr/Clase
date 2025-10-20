/*
//Ej 1
let numbers = [];
let num;
do {
    num = Number(prompt("Introduce un número"));
    if (num != 0) {
        numbers.push(num);
    } else {
        alert("Finalizando programa...")
    }
} while (num != 0);

alert(numbers);
alert("La longitud del array es " + numbers.length);

//Ej 2
let includes5 = false;
for (let i = 0; i < numbers.length; i++) {
    if (numbers[i] % 10 == 5) {
        includes5 = true;
    }
}


if (numbers.includes(5) || includes5) {
    alert("Incluye al menos un 5 o un número con el dígito 5");
} else {
    alert("No hay ningún 5");
}
/*
//Ej 3
let search = Number(prompt("¿Qué numbero quieres buscar?"));
let counter = 0;
for (let i = 0; i < numbers.length; i++) {
    if (numbers[i] == search) {
        counter++;
    }
}
alert("El número " + search + " está " + counter + " veces");

//Ej 4
names = ["Rida", "Nico", "Javi", "Marcos"];
let searchName = prompt("Introduce el nombre a buscar");
searchName = searchName.toLowerCase();
for (let i = 0; i < names.length; i++) {
    names[i] = names[i].toLowerCase();
}

if (names.includes(searchName)) {
    alert("He encontrado el nombre " + searchName);
} else {
    alert("No lo he encontrado");
}


//Ej 5
let basket = [];
let option;
do {
    option = Number(prompt("1.Añadir al principio\n 2.Añadir al final\n 3.Eliminar repetido\n 4.Borrar todos\n 5.Salir\n"));
    if (option == 1) {
        let product = prompt(alert("Introduce el producto"));
        basket.unshift(product);
        alert(basket);
    } else if (option == 2) {
        let product = prompt(alert("Introduce el producto"));
        basket.push(product);
        alert(basket);
    } else if (option == 3) {
        let product = prompt(alert("Introduce el producto"));
        if (basket.includes(product)) {
            let count = 0;
            let repetido = [];
            for (let i = 0; i < basket.length; i++) {
                if (basket[i] == product) {
                    count++;
                    repetido.push(i);
                }
            }
            if (repetido.length > 1) {
                for (let i = 1; i <= repetido.length; i++) {
                    basket.splice(repetido[i], 1);
                }
            }
        } else {
            alert("Este producto no se encuentra");
        }
        alert(basket);
    } else if (option == 4) {
        basket.splice(0, basket.length);
        alert(basket);
    } else if (option == 5) {
        alert("Saliendo...")
    }
} while (option != 5);
*/
//Ej 6
let numbers = [];
let num;
do {
    num = Number(prompt("Introduce un número"));
    if (num != 0) {
        numbers.push(num);
    } else {
        alert("Finalizando programa...")
    }
} while (num != 0);
numbers.sort((a, b) => a - b);
alert(numbers);