<?php
require_once '../conexion_bd.php';

$nombre = $_POST["nombre"];
$paterno = $_POST["apaterno"];
$materno = $_POST["amaterno"];
$instituto = $_POST["combo_instituto"];
$instituto = (int)$instituto;
$personaje = $_POST["combo_personaje"];
$carrera = $_POST["combo_carrera"];
$carrera = (int)$carrera;
$nickname = $_POST["nickname"];
$password = md5($_POST["password"]);
$email = $_POST["email"];

$sqlNick = "SELECT * FROM concursante WHERE nickname='$nickname'";
$sqlEmail = "SELECT * FROM concursante WHERE email='$email'";
$resNick = $conn->query($sqlNick);
$resEmail = $conn->query($sqlEmail);
$nickRes = $resNick->fetchAll();
$emailRes = $resEmail->fetchAll();


$nickRes = count($nickRes);
$emailRes = count($emailRes);
if ($nickRes>0){
    echo '<script>alert("Nombre de usuario ya registrado")</script>';
    header("Location:../form_registro.php");
    die();
}
if ($emailRes>0){
    echo '<script>alert("Correo electronico ya registrado")</script>';
    header("Location:../form_registro.php");
    die();
}

if ($instituto == 1){
    $insertarDatos = "INSERT INTO concursante(nombres,apaterno,amaterno,id_rol,id_institucion,id_personaje,nickname,password,email)VALUES('$nombre','$paterno','$materno',1,$instituto,$personaje,'$nickname','$password','$email')";
    $concur = $conn->lastInsertId($insertarDatos);
    $insertDato2 = "INSERT INTO carrera_institucion(id_concursante,idCarrera,id_institucion) VALUES ($concur,$carrera,$instituto)";
    if($conn -> exec($insertarDatos)) {
        if ($conn->exec($insertDato2)) {
            echo '<script>alert("Usuario registrado correctamente.")</script>';
            header("Location:../reporte_users.php");
        }
        else
            echo '<script>alert("Error con la carrera.")</script>';
    }
    else
        echo '<script>alert("Error, no se ha podido registrar el usuario.")</script>';
}
elseif ($instituto >1) {
    $insertarDatos = "INSERT INTO concursante(nombres,apaterno,amaterno,id_rol,id_institucion,id_personaje,nickname,password,email)VALUES('$nombre','$paterno','$materno',1,$instituto,$personaje,'$nickname','$password','$email')";
    if ($conn->exec($insertarDatos)) {
        echo '<script>alert("Usuario registrado correctamente.")</script>';
        header("Location:../reporte_users.php");
    } else
        echo '<script>alert("Error, no se ha podido registrar el usuario.")</script>';
}
else
    echo "Error";
