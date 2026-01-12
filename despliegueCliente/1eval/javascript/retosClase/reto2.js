let cookies = document.cookie;
let tema = null;
let nombre = null;

let listaCookies = cookies.split("; ");

for (let cookie of listaCookies) {
  let partes = cookie.split("=");

  if (partes[0] === "tema") {
    tema = partes[1];
  }

  if (partes[0] === "nombre") {
    nombre = partes[1];
  }
}

if (!nombre) {
  nombre = prompt("Introduce tu nombre:");
  if (!nombre) {
    nombre = "Usuario";
  }
  document.cookie = `nombre=${nombre}; max-age=86400`;
}

if (!tema) {
  tema = prompt("Elige tema: claro / oscuro").toLowerCase();
  tema = tema === "oscuro" ? "oscuro" : "claro";
  document.cookie = `tema=${tema}; max-age=86400`;
}

document.body.className = tema;

let h1 = document.querySelector("h1");
if (!h1) {
  h1 = document.createElement("h1");
  document.body.prepend(h1);
}

h1.textContent = `Bienvenido/a ${nombre}`;
