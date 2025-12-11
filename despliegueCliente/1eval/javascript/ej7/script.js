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
        sum += estudiantes[i]["nota"];
    }

    return sum / estudiantes.length;
};

estudiantes.aprobados = function() {
    let aprobados = 0;
    for (let i = 0; i < estudiantes.length; i++) {
        if(estudiantes[i]["nota"] > 5) {
            aprobados++;
        } 
    }

    return aprobados;
};

let media = estudiantes.media();
alert(media);

let aprobados = estudiantes.aprobados();
alert(aprobados);

estudiantes.buscarPorNombre = function(nombre) {
    let found = false;
    for (let i = 0; i < estudiantes.length; i++) {
        if(estudiantes[i]["nombre"] == nombre) {
            return estudiantes[i];
            found = true;
        } 
    }
    if (!found) {
        return "No se ha encontrado el alumno";
    }
}

let buscar = estudiantes.buscarPorNombre("asd");
alert(buscar);

estudiantes.actualizarNota = function(nombre, nuevaNota) {
    let found = false;
    for (let i = 0; i < estudiantes.length; i++) {
        if(estudiantes[i]["nombre"] == nombre) {
            estudiantes[i]["nota"] = nuevaNota
            found = true;
        } 
    }
    if (!found) {
        return "No se ha encontrado el alumno";
    }
}