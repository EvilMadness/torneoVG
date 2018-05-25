<?php
require_once "../conexion_bd.php";

$id_instituto = $_POST["id_instituto"];
$nombreIns = $_POST["nom_instituto"];
$municipio = $_POST["municipio"];

$sqlid = "SELECT * FROM institucioneducativa WHERE id_institucion='$id_instituto'";
$resID = $conn->query($sqlid);
$IDres = $resID->fetchAll();
$IDres = count($IDres);

if ($IDres>0){
    echo '<script>alert("ID ya registrado")</script>';
    header("Location:../form_add_instituto.php");
    die();
}

$sqlInsert = "INSERT INTO institucioneducativa(id_institucion, nombre, municipio) VALUES ($id_instituto,'$nombreIns','$municipio')";
$conn->exec($sqlInsert);

header("Location:../report_instituto.php");