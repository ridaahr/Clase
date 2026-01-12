let nombre = localStorage.getItem("nombre");
let tema = localStorage.getItem("tema");

if (!nombre) {
  nombre = prompt("Introduce tu nombre:");
  if (!nombre) {
    nombre = "Usuario";
  }
  localStorage.setItem("nombre", nombre);
}
if (!tema) {
  tema = prompt("Elige tema: claro / oscuro").toLowerCase();
  tema = tema === "oscuro" ? "oscuro" : "claro";
  localStorage.setItem("tema", tema);
}

document.body.className = tema;
const h1 = document.querySelector("h1");
h1.textContent = `Bienvenido/a ${nombre}`;