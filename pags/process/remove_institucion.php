<?php
require "../conexion_bd.php";

$id = $_GET["id"];
$id = (int)$id;

$sqlDEL = "DELETE FROM institucioneducativa WHERE id_institucion =".$id;

$conn->exec($sqlDEL);
header("Location:../report_instituto.php");