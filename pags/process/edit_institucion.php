<?php
require_once '../conexion_bd.php';
$id = $_GET["id"];
$id = (int)$id;

$nombre = $_POST["nom_instituto"];
$municipio = $_POST["municipio"];

$sqlUpdate = "UPDATE institucioneducativa SET nombre='$nombre',municipio='$municipio' WHERE id_institucion=$id";
$res = $conn->exec($sqlUpdate);

header("Location:../report_instituto.php");