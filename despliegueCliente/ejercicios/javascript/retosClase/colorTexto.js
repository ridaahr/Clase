const color = String(prompt("Introduce el color de la fuente del texto:"));
const parrafos = document.querySelectorAll('p');
parrafos.forEach(p => {
    p.setAttribute('style', `color: ${color};`);
}
)