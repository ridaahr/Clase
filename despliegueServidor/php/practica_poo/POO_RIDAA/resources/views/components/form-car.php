<div class="form">
    <h2>Nuevo vehículo</h2>
    <?= empty($errorBD) ? "" : "<p class=\"errors\">$errorBD</p>" ?>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="hidden" name="create_car">
        <label for="plate">Matrícula</label>
        <input type="text" name="plate" id="plate" value="<?= $plate ?>" required>
        <?= !empty($plateError) ? "<p class='errors'>$plateError</p>" : "" ?>

        <label for="brand">Marca</label>
        <input type="text" name="brand" id="brand" value="<?= $brand ?>">
        <?= !empty($brandError) ? "<p class='errors'>$brandError</p>" : "" ?>

        <label for="model">Modelo</label>
        <input type="text" name="model" id="model" value="<?= $model ?>">
        <?= !empty($modelError) ? "<p class='errors'>$modelError</p>" : "" ?>

        <label for="fabricationYear">Año de fabricación</label>
        <input type="number" min="1900" max="<?=  date('Y') ?>" name="fabricationYear" id="fabricationYear" value="<?= $fabricationYear ?>">
        <?= !empty($fabricationYearError) ? "<p class='errors'>$fabricationYearError</p>" : "" ?>

        <label for="consumation">Consumo (L/100km)</label>
        <input type="number" step="0.1" min="0.1" name="consumation" id="consumation" value="<?= $consumation ?>">
        <?= !empty($consumationError) ? "<p class='errors'>$consumationError</p>" : "" ?>

        <label for="pricePerDay">Precio por día (€)</label>
        <input type="number" step="0.1" min="0.1" name="pricePerDay" id="pricePerDay" value="<?= $pricePerDay ?>">
        <?= !empty($pricePerDayError) ? "<p class='errors'>$pricePerDayError</p>" : "" ?>

        <div class="checkbox-group">
            <label for="available">Disponible</label>
            <input type="checkbox" name="available" id="available" <?= $available ? "checked" : "" ?>>
        </div>

        <label for="doors">Puertas</label>
        <input type="number" min="1" name="doors" id="doors" value="<?= $doors ?>">
        <?= !empty($doorsError) ? "<p class='errors'>$doorsError</p>" : "" ?>

        <label for="seats">Asientos</label>
        <input type="number" min="1" name="seats" id="seats" value="<?= $seats ?>">
        <?= !empty($seatsError) ? "<p class='errors'>$seatsError</p>" : "" ?>

        <label for="extras">Extras</label>
        <div class="checkbox-group">
            <input type="checkbox" name="extras[]" id="techoSolar" value="techoSolar" <?= in_array("techoSolar", $extras) ? "checked" : "" ?>>
            <label for="techoSolar">Techo Solar</label>

            <input type="checkbox" name="extras[]" id="aire" value="aire" <?= in_array("aire", $extras) ? "checked" : "" ?>>
            <label for="aire">Aire Acondicionado</label>

            <input type="checkbox" name="extras[]" id="carplay" value="carplay" <?= in_array("carplay", $extras) ? "checked" : "" ?>>
            <label for="carplay">Carplay</label>

            <input type="checkbox" name="extras[]" id="lunasTintadas" value="lunasTintadas" <?= in_array("lunasTintadas", $extras) ? "checked" : "" ?>>
            <label for="lunasTintadas">Lunas Tintadas</label>
        </div>
        <button type="submit">Insertar vehículo</button>
    </form>
</div>