<?php
require_once '../conexion_bd.php';
$id = $_GET["id"];
$id = (int)$id;

$nombre = $_POST["nom_carrera"];

$sqlUpdate = "UPDATE carrera SET nombre_carrera='$nombre' WHERE idCarrera=$id";
$res = $conn->exec($sqlUpdate);

header("Location:../report_carreras.php");