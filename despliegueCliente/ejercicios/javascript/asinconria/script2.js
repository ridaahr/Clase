//1
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
    } catch (e) {
        console.log("Error:", e);
    }
}
run();
//2
function doblar(num) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (num < 0) {
                reject('Utiliza sólo números positivos');
            } else {
                resolve(num * 2);
            }
        }, 1000);
    });
}
async function run2() {
    try {
        let num = await doblar(5);
        let numDoblado = await doblar(num);
        console.log('Resultado: ' + numDoblado);
    } catch (e) {
        console.log("Error;", e);
    }
}
run2();