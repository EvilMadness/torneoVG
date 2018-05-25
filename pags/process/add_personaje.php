<?php
require_once "../conexion_bd.php";

$id_personaje = $_POST["id_personaje"];
$nombre = $_POST["nom_personaje"];
$id_imagen = $_POST["nom_personaje"];

$sqlid = "SELECT * FROM personaje WHERE idPersonaje='$id_personaje'";
$resID = $conn->query($sqlid);
$IDres = $resID->fetchAll();
$IDres = count($IDres);

if ($IDres>0){
    echo '<script>alert("ID ya registrado")</script>';
    header("Location:../form_add_personaje.php");
    die();
}

//foto
$directorio_subida=$id_imagen."/";
$foto_name = $directorio_subida.basename($_FILES["imagen"]["name"]);
$tam = $_FILES['imagen']["size"];
$ext = pathinfo($foto_name,PATHINFO_EXTENSION);
$foto_name=$id_imagen.".$ext";
if($conn){
    if (subirFoto($_FILES['imagen'], $id_imagen, $ext)) {
        echo '<script>alert("Imagen guardada correctamente.")</script>';
        guardar_foto($id_personaje, $nombre, $foto_name, $conn);
        header("Location:../report_personajes.php");
    } else {
        echo '<script>alert("Error, la imagen no se ha podido subir.")</script>';
        header("Location:../subir_imagen.php");
    }
}else{
    mensaje("Error de comunicación con la base de datos");
}

function subirFoto($archivo,$idpersonaje,$ext){
    if($archivo['name'])
    {
        $valid_file=true;
        //if no errors...
        if(!$archivo['error'])
        {
            //now is the time to modify the future file name and validate the file
            $new_file_name = $idpersonaje; //rename file
            if($archivo['size'] > (1024000)) //can't be larger than 1 MB
            {
                $valid_file = false;
                $message = 'Oops!  Your file\'s size is to large.';
            }
            //if the file has passed the test
            if($valid_file)
            {
                //move it to where we want it to be
                move_uploaded_file($archivo['tmp_name'], '../../images/personajes/'.$new_file_name.".$ext");
                $message = 'Congratulations!  Your file was accepted.';
                // echo $message;
                return true;
            }
        }
        //if there is an error...
        else
        {
            //set that to be the returned message
            $message = 'Ooops!  Your upload triggered the following error:  '.$archivo['error'];
        }
    }
}
function guardar_foto($idpersonaje, $nombre, $imagen, $conn){
    $sql = "INSERT INTO personaje(idPersonaje, nombre, imagen) VALUES ($idpersonaje,'$nombre','$imagen')";
    if ($conn->exec($sql)){
        echo "SUBIDO";
        return true;

    }else{
        return false;
        echo "ERROR";
    }
}
