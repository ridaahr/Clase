<div class="form">
    <h2>Nuevo vehículo</h2>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
    <label for="plate">Matrícula</label>
    <input type="text" name="plate" id="plate">
    <label for="brand">Marca</label>
    <input type="text" name="brand" id="brand">
    <label for="model">Modelo</label>
    <input type="text" name="model" id="model">
    <label for="fabricactionYear">Año de fabricación</label>
    <input type="date" name="fabricactionYear" id="fabricactionYear">
    <label for="consumation">Consumo</label>
    <input type="text" name="consumation" id="consumation">
    <label for="pricePerDay">Precio por día</label>
    <input type="text" name="pricePerDay" id="pricePerDay">
    <label for="available">Disponible</label>
    <input type="text" name="available" id="available">
    <label for="doors">Puertas</label>
    <input type="text" name="doors" id="doors">
    <label for="seats">Asientos</label>
    <input type="text" name="seats" id="seats">
    <label for="extras">Extras</label>
    <div class="checkbox-group">
    <input type="checkbox" name="extras[]" id="techoSolar" value="techoSolar">
    <label for="techoSolar">Techo Solar</label>
    <input type="checkbox" name="extras[]" id="aire" value="aire">
    <label for="aire">Aire Acondicionado</label>
    <input type="checkbox" name="extras[]" id="carplay" value="carplay">
    <label for="carplay">Carplay</label>
    <input type="checkbox" name="extras[]" id="lunasTintadas" value="lunasTintadas">
    <label for="lunasTintadas">Lunas Tintadas</label>
    </div>
    <button>Insertar vehículo</button>
</div>