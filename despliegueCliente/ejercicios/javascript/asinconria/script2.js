function hacerTarea() {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve('Tarea completada');
        }, 1000);
    });
}

async function run() {
    try {
        let mensaje = await hacerTarea();
        console.log(mensaje);
    } catch(e) {
        console.log("Error:", e);
    }
}