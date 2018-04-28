<?php
require_once "conexion_bd.php";
$sql1 = 'SELECT * FROM carrera';
$result1 = $conn -> query($sql1);
$carreras = $result1 -> fetchAll();

$sql2 = 'SELECT * FROM personaje';
$result2 = $conn -> query($sql2);
$personajes = $result2 -> fetchAll();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/magister.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <link href="../css/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<script type="text/javascript">
    $('#combo_instituto').change(function(){
        if( $(this).val() == '1'){
            $('body').append('<select class="slcb" name="combo_carrera" id="combo_carrera"><option value="0" >...Selecciona tu carrera...</option></select>');
        }else{
            $('#myInput').remove();
        }
    });
</script>
<body>
<div align="center" class="div" id="">
    <fieldset style="align-content: center">
    <form data-toggle="validator" role="form" action="registrar_usuario.php" method="post" id="formulario" onsubmit="return validarAutor()">
        <div class="first">
            <h2>Datos del participante</h2>
            <div class="one_half first">
                <label class="control-label" for="txtnombre"><b>Nombre(s)</b><span>*</span></label>
                <input type="text" id="txtnombre" name="txtnombre" placeholder="Nombre(s)" required>
            </div>
            <div class="one_quarter">
                <label for="txtapaterno"><b>Apellido Paterno</b><span>*</span></label>
                <input id="txtapaterno" name="txtapaterno" type="text" placeholder="Apellido paterno" required>
            </div>
            <div class="one_quarter">
                <label for="txtamaterno"><b>Apellido Materno</b><span>*</span></label>
                <input id="txtamaterno" name="txtamaterno" type="text" placeholder="Apellido materno" required>
            </div>
            <br><br><br><br><br>
            <div class="one_third first">
                <label for="combo_instituto"><b>Institución Educativa</b></label>
                <select class="slcb" name="combo_instituto" id="combo_instituto" onchange="validar()">
                    <option value="0" >...Seleccione...</option>
                    <option value="1" >Centro Universitario de los Valles</option>
                    <option value="2" >Otro</option>
                </select>
            </div>
            <div class="one_third">
                <label for="combo_carrera"><b>Carrera</b></label>
                <select class="slcb" name="combo_carrera" id="combo_carrera">
                    <option value="0" >...Selecciona tu carrera...</option>
                    <?php
                    foreach ($carreras as $carrera){
                        echo '<option value="'.$carrera['idCarrera'].'">'.utf8_encode($carrera['nombre_carrera']).'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="one_third">
                <label for="txtpersonaje"><b>Personaje</b></label>
                <select class="slcb" name="combo_personaje" id="combo_personaje">
                    <option value="0" >...Seleccione su personaje...</option>
                    <?php
                    foreach ($personajes as $personaje){
                        echo '<option value="'.$personaje['idPersonaje'].'">'.utf8_encode($personaje['nombre']).'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="first"><br><br>
            <h2>Datos de la cuenta</h2>
            <div class="one_third first">
                <label for="txtnickname"><b>Nickname</b><span>*</span></label>
                <input id="txtnickname" name="txtnickname" type="text" placeholder="Nombre de usuario">
            </div>
            <div class="one_third">
                <label for="txtpassword"><b>Contraseña</b><span>*</span></label>
                <input id="txtpassword" name="txtpassword" type="password" placeholder="Contraseña">
            </div>
            <div class="one_third">
                <label for="email"><b>Email</b><span>*</span></label>
                <input id="email" name="email" type="email" placeholder="Correo electronico" required>
            </div>
        </div>
        <div><br><br><br><br><br><br><br><br></div>
        <div>
            <input type="reset" value="Limpiar Campos">
        </div>
        <div>
            <input type="submit" name="buscar" value="Registrase">
        </div>

    </form>
</fieldset>
</div>
</body>
</html>