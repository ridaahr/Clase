let buscarEtiqueta = document.getElementsByTagName(prompt("¿Qué etiqueta quieres buscar?"));
const elementos = Array.from(buscarEtiqueta);
for (const elemento of elementos) {
    console.log(elemento.textContent);
}

