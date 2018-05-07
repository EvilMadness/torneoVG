<?php
require "../conexion_bd.php";

$id = $_GET["id"];
$id = (int)$id;

$sqlDEL = "DELETE FROM concursante WHERE idConcursante =".$id;

$conn->exec($sqlDEL);
header("Location:../reporte_users.php");