<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/U4AccesoADatos/pc/PcDAO.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/despliegueServidor/php/U4AccesoADatos/pc/UserDAO.php";

    $pc = new Pc("asus1997", "andrea", "Asus", 1364.1);
    $c1 = new Component("ssd", "samsung", "58H");
    $c2 = new Component("ram", "samsung", "W526");
    $c3 = new Component("mouse", "logitech", "asd");
    $pc->addComponent($c1);
    $pc->addComponent($c2);
    $pc->addComponent($c3);

    //Lo añado a la BD:
    //PcDAO::create($pc);

    //echo PcDAO::read("asus125");

    $u = new User("sete", "admin123987!!!---");
    $u2 = new User("diego", "a");
    $u3 = new User("marco", "a");

    //Guardos los users en la BD:
    //UserDAO::create($u);
    //UserDAO::create($u2);
    //UserDAO::create($u3);


    var_dump(UserDAO::verifyPassword("asdf", "asdf"));  //-1
    var_dump(UserDAO::verifyPassword("sete", "asdf"));  //-2
    var_dump(UserDAO::verifyPassword("sete", "admin123987!!!---")); //1


    ///
    if (PcDAO::create($pc)){
        echo "se ha creado :)";
    }else{
        echo "no se ha creado :(";
    }

    echo PcDAO::delete("asus1997");

    ?>
</body>
</html>