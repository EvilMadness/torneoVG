<?php
require "../conexion_bd.php";

$id = $_GET["id"];
$id = (int)$id;

$sqlDEL = "DELETE FROM carrera WHERE idCarrera =".$id;

$conn->exec($sqlDEL);
header("Location:../report_carreras.php");