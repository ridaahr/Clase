//Promesas
function esperarSegundos(segundos) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve('Se han esperado ' + segundos + ' segundos');
        }, segundos * 1000);
    });
}

esperarSegundos(3).then(mensaje => console.log(mensaje));

function doblarNumero(num) {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(num * 2);
        }, 1000);
    });
}
doblarNumero(5).then(resultado => console.log(resultado));

function dividirEntreDos(num) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (num == 0) {
                reject('No se puede dividir entre dos');
            } else {
                resolve(num / 2);
            }
        }, 1000);
    });
}

dividirEntreDos(6).then(resultado => console.log(resultado)).catch((error) => console.log(error));

dividirEntreDos(0).then(resultado => console.log(resultado)).catch((error) => console.log(error));