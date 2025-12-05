/*
//Ej 1
console.log(location.href);
console.log(location.protocol);
console.log(location.host);
console.log(location.pathname);

//Ej 2
let cambioPag = setInterval(() => {
    location.assign("file:///home/diurno/Escritorio/Clase/despliegueCliente/1eval/javascript/ej10/practicacss70.html")
}, 5000)
*/

//Ej 3
if (confirm("¿Quieres cambiar de página?")) {
    location.assign("practicacss70.html");
};
console.log(location.href); 

//Ej 4
console.log(history.length);
