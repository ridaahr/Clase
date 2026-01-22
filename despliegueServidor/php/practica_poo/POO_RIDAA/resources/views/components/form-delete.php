<div class="form-delete">
    <h2>Eliminar vehículo</h2>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="hidden" name="delete_car">
        <select name="car_id" id="cars">
            <?php
            $cars = CarDAO::readAll();
            if (empty($cars)) {
                echo '<option value="">No hay coches</option>';
            } else {
                foreach ($cars as $car) {
                    echo "<option value=" . $car->getId() . ">" . $car->__toString() . "</option>";
                }
            }
            ?>
        </select>
        <button type="submit">Eliminar</button>
    </form>
</div>