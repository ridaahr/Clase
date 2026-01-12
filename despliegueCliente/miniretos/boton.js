const boton = document.getElementById('boton');
boton.addEventListener("click", function() {
        alert("Has hecho click");
});

boton.addEventListener("click", (objEvento)=> {
        console.log(objEvento);
});