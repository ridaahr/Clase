//Ej 1
const persona =  {
    nombre : "Maricarmen",
    edad : 69,
    ciudad : "Madrid"
};

console.log(persona.nombre);
console.log(persona.edad);
console.log(persona.ciudad);

console.log(persona["nombre"]);
console.log(persona["edad"]);
console.log(persona["ciudad"]);

persona.edad = 69;
persona.profesion = "Informático";

console.log(persona);

delete persona.ciudad;
console.log(persona);


persona.saludar = function() {
    alert("Hola, soy " + persona.nombre);
}

persona.cumplirAnos = function() {
    persona.edad += 1;
}

console.log(persona);
delete persona.ciudad;
console.log(persona);

const estudiante1 = {
    nombre: "eustaquio",
    nota: 5
}

const estudiante2 = {
    nombre: "josefina",
    nota: 7
}

const estudiante3 = {
    nombre: "sandalio",
    nota: 8
}

const estudiantes = [
    estudiante1,
    estudiante2,
    estudiante3
];

estudiantes.media = function() {
    let sum = 0;
    for (let i = 0; i < estudiantes.length; i++) {
        sum += estudiantes[i]["media"];
    }

    return sum / estudiantes.length;
};

let media = estudiantes.media();
alert(media);

