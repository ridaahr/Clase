class Vehiculo {
    constructor(marca, modelo, ano) {
        this.marca = marca;
        this.modelo = modelo;
        this.ano = ano;
    }

    descripcion() {
        return "Vehículo: " + this.marca + " " + this.modelo + " del año " + this.ano + ".";
    }

    edad() {
        let fecha = new Date; 
        return fecha.getFullYear() - this.ano;
    }
}
