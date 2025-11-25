fecha = new Date();

const dias = ["domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado"]
const meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"]

alert("Buenos días, hoy es " + dias[fecha.getDay()] + " " + fecha.getDate() + " de " + meses[fecha.getMonth()] + " de " + fecha.getFullYear()
    + ". Son las " + fecha.getHours() + " y " + fecha.getMinutes() + " minutos."
) ;