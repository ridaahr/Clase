<?php
session_start();
session_destroy();
header("Location: login.php");
setcookie("stay-connected","", time() - 3600, "/");
