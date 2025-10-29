<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prática 1</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <?php  
        $rows = 19 % 8 + 4;
        $columns = 1 % 8 + 4;
        echo "<h3>1</h3>";
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                echo "*";
            }
            echo "<br>";
        }
        echo "<h3>2</h3>";
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $i; $j++) {
                    echo "*";
            }
            echo "<br>";
        }
        echo "<h3>3</h3>";

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                if ($i == 0 || $i == ($rows - 1)) {
                    echo "*";
                } 
                elseif ($j == 0 || $j == ($columns - 1)) {
                    echo "*";
                } else {
                    echo " ";
                }
            }
            echo "<br>";
        }

        echo "<h3>4</h3>";

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                if (($i + $j) % 2 == 0) {
                    echo "*";
                } else {
                    echo " ";
                }
            }
            echo "<br>";
        }

    ?>
</body>
</html>