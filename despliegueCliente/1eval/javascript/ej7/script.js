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

