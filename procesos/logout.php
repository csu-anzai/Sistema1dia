<?php

session_start();
unset($_SESSION['admin']);
unset($_SESSION['tecnico']);
unset($_SESSION['cajero']);
unset($_SESSION['empleado']);
session_destroy();

header("location: ../index.php");

 ?>
