<?php
require "../conexion_bd.php";

$id = $_GET["id"];
$id = (int)$id;

$sqlDEL = "DELETE FROM personaje WHERE idPersonaje =".$id;

$conn->exec($sqlDEL);
header("Location:../report_personajes.php");