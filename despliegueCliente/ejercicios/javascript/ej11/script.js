/*
// 1
let buscarEtiqueta = document.getElementsByTagName(prompt("¿Qué etiqueta quieres buscar?"));
const elementos = Array.from(buscarEtiqueta);
for (const elemento of elementos) {
    console.log(elemento.textContent);
}

// 2
let nuevo = document.createElement('h1');
nuevo.textContent = "Título nuevo";
document.body.appendChild(nuevo);


// 3
let nuevo = document.createElement('p');
let contador = 0;
document.body.appendChild(nuevo);
let actualizar = setInterval(() => {
    nuevo.textContent = contador++;
}, 3000
);


//4
let option;
do {
    option = Number(prompt("1. Al inicio\n2. Al final\n3. Salir"));

    if (option == 1) {
        let content = prompt("Elemento a meter");
        let element = document.createElement('li');
        element.textContent = content;
        let ul = document.querySelector('ul');
        ul.insertBefore(element, ul.firstChild);
    }
    if (option == 2) {
        let content = prompt("Elemento a meter");
        let element = document.createElement('li');
        element.textContent = content;
        let ul = document.querySelector('ul');
        ul.appendChild(element);
    }
} while (option != 3);
*/
// 5
let ul = document.getElementsByClassName('segunda')[0];
let liItems = ul.getElementsByTagName('li');
let mid = liItems[Math.floor(liItems.length / 2)];
console.log(mid);
console.log(mid.previousElementSibling);
console.log(mid.nextElementSibling);
