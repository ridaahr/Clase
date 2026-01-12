function getCookie(nombre) {
    let cookies = document.cookie.split("; ");
    for (let i = 0; i < cookies.length; i++) {
        let [key, value] = cookies[i].split("=");
        if (key === nombre) {
            return value;
        }
    }
    return null;
}

let visitas = getCookie("visitas"); // obtiene la cookie visitas
 if (visitas === null) {
 visitas = 1; // Primer caso (que no haya almacenada cookie visitas)
 } else {
 visitas = parseInt(visitas) + 1;
 }
 document.cookie = "visitas=" + visitas + "; max-age=" + (60 * 60 *
24 * 365); // Guarda la cookie 1 año.
 alert("Bienvenid@, esta es tu visita núm. " + visitas);