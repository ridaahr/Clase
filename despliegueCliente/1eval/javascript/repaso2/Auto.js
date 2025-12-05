class Auto extends Vehiculo {
    constructor(marca, modelo, ano, puertas) {
        super(marca, modelo, ano);
        this.puertas = puertas;
    }

    descripcion() {
        let text = super.descripcion() + "Tiene " + this.puertas + " puertas."
        return text;
    }
}