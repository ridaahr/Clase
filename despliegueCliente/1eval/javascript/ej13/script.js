//1
const abuelo = document.getElementById("abuelo");
const padre = document.getElementById("padre");
const hijo = document.getElementById("hijo");

abuelo.addEventListener("click", () => {
    alert("Has clicado el primero");
})

padre.addEventListener("click", () => {
    alert("Has clicado el segundo");
})

hijo.addEventListener("click", () => {
    alert("Has clicado el tercero");
})

hijo.addEventListener("mouseenter", () => {
    alert("Has clicado el tercero");
})

//2
const abuelo2 = document.getElementById("abuelo2");
const padre2 = document.getElementById("padre2");
const hijo2 = document.getElementById("hijo2");

abuelo2.addEventListener("click", (e) => {
    alert("Has clicado el primero");
    e.stopPropagation();
})

padre2.addEventListener("click", (e) => {
    alert("Has clicado el segundo");
    e.stopPropagation();
})

hijo2.addEventListener("click", (e) => {
    alert("Has clicado el tercero");
    e.stopPropagation();
})

//3
const link = document.getElementById("link");
let contador = 0;
link.addEventListener("click", (e) => {
    contador++;
    if (contador > 1) {
        e.preventDefault();
        console.log("No se puede navegar más");
    }
})

//4
const contador2 = document.getElementById("contador");
const btnContar = document.getElementById("btnContar");
let numero = 0;
const evento = new Event("evento");
document.addEventListener("evento", () => {
    alert("Has llegado a 10");
})
btnContar.addEventListener("click", () => {
    numero++;
    contador2.textContent = numero;
    if (numero == 10) {
        document.dispatchEvent(evento);
    }
});