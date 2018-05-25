<?php
require_once "../conexion_bd.php";
if(isset($_POST['id_carrera'])) {
    $id_carrera = $_POST['id_carrera'];
    $sqlid_carrera = "SELECT * FROM carrera WHERE idCarrera = '{$id_carrera}'";
    $result = $conn->query($sqlid_carrera);
    $count = $result->rowCount();
    if ($count > 0) {
        echo '<span class="ocupado">¡Id ya registrado!</span>';
    }
    elseif ($id_carrera == " " || $id_carrera == null) {
        echo '<span class="ocupado">Campo vacío</span>';
    }
    else
        echo '<span class="disponible"> Id disponible </span>';
}

if(isset($_POST['id_instituto'])) {
    $id_instituto = $_POST['id_instituto'];
    $sqlid_instituto = "SELECT * FROM institucioneducativa WHERE id_institucion = '{$id_instituto}'";
    $resultInstituro = $conn->query($sqlid_instituto);
    $countIns = $resultInstituro->rowCount();
    if ($countIns > 0) {
        echo '<span class="ocupado">¡Id no disponible!</span>';
    }
    elseif ($id_instituto == " " || $id_instituto == null) {
        echo '<span class="ocupado">Campo vacío</span>';
    }
    else
        echo '<span class="disponible"> Id disponible </span>';
}

if(isset($_POST['id_personaje'])) {
    $id_personaje = $_POST['id_personaje'];
    $sqlid_personaje = "SELECT * FROM personaje WHERE idPersonaje = '{$id_personaje}'";
    $resultPersonaje = $conn->query($sqlid_personaje);
    $countPer = $resultPersonaje->rowCount();
    if ($countPer > 0) {
        echo '<span class="ocupado">¡Id no disponible!</span>';
    }
    elseif ($id_personaje == " " || $id_personaje == null) {
        echo '<span class="ocupado">Campo vacío</span>';
    }
    else
        echo '<span class="disponible"> Id disponible </span>';
}