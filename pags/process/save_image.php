<?php
include ("../conexion_bd.php");
$idpersonaje = $_POST['nombre'];
$nombre = $_POST['nombre'];

//foto
$directorio_subida=$idpersonaje."/";
$foto_name = $directorio_subida.basename($_FILES["imagen"]["name"]);
$tam = $_FILES['imagen']["size"];
$ext = pathinfo($foto_name,PATHINFO_EXTENSION);
$foto_name=$idpersonaje.".$ext";
if($conn){
    if (subirFoto($_FILES['imagen'], $idpersonaje, $ext)) {
        guardar_foto($idpersonaje, $foto_name, $conn);
        '<script>alert("KYC PRRO")</script>';
        header("Location:../subir_imagen.php");
    } else {
        mensaje("Error subiendo la foto");
        header("Location:../subir_imagen.php");
        echo "no se subió la foto";
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
function guardar_foto($idpersonaje, $imagen, $conn){
    $sql = "UPDATE personaje SET imagen='$imagen' WHERE idPersonaje=$idpersonaje";
    if ($conn->exec($sql)){
        echo "SUBIDO";
        return true;

    }else{
        return false;
        echo "ERROR";
    }
}