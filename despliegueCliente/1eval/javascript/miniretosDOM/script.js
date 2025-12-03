/*
//recordatorio
let conf = setInterval(() => {
    let repetir = confirm("¿Quieres continuar?")
    if (!repetir) {
        clearInterval(conf)
    }
}, 5000)

//localStorage
let usuario = localStorage.getItem("usuario");
if (!usuario) {
    usuario = prompt("¿Cómo te llamas?");
    if (usuario) {
        localStorage.setItem("usuario", usuario);
    } else {
        usuario = "invitado";
    }
}
alert("Hola, " + usuario);

console.log(navigator);


let check = setInterval(() => {
    console.log(navigator.onLine ? "Conectado" : "No hay conexión")
}, 3000)
*/

//ejercicios location
//Ej 1
console.log(location.href);
console.log(location.protocol);
console.log(location.host);
console.log(location.pathname);

//Ej 2
let cambioPag = setInterval(() => {
    location.assign("/home/diurno/Escritorio/Clase/despliegueCliente/1eval/javascript/miniretosDOM/practicacss70.html")
}, 5000)