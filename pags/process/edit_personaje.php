<?php
require_once '../conexion_bd.php';
$id = $_GET["id"];
$id = (int)$id;

$nombre = $_POST["nom_personaje"];

$sqlUpdate = "UPDATE personaje SET nombre='$nombre' WHERE idPersonaje=$id";
$res = $conn->exec($sqlUpdate);

header("Location:../report_personajes.php");