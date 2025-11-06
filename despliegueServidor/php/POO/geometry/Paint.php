<?php 

interface Paint{
    //1. Atributos: almacén de constantes
    const PI = 3.141592;
    const MAX_SIZE = "200px";

    //2. Constructores no tiene

    //3. Getters / Setters (no suele tener)

    //4. Métodos: siempre abstractos(no se pone "abstract")
    public function draw();
}