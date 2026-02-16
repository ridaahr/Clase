const p1 = document.getElementById("p1");
p1.addEventListener("mouseover", () => {
    p1.style.color = "red";
});

const p2 = document.getElementById("p2");
p2.addEventListener("mouseover", () => {
    p2.style.color = "blue";
});
p2.addEventListener("mouseout", () => {
    p2.style.color = "black";
});

const contador = document.getElementById("contador");
const btnContar = document.getElementById("btnContar");
let numero = 0;
btnContar.addEventListener("click", () => {
    numero++;
    contador.textContent = numero;
});

const botones = document.querySelectorAll(".btnTexto");
botones.forEach(boton => {
    boton.addEventListener("click", () => {
        console.log(boton.textContent);
    });
});

const especial = document.getElementById("especial");
especial.addEventListener("dblclick", () => {
    console.log("Doble clic en el botón especial");
});

const caja = document.getElementById("caja");
const btnClase = document.getElementById("btnClase");
btnClase.addEventListener("click", () => {
    caja.classList.toggle("activa");
});