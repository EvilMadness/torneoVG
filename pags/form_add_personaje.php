<?php
session_start();
if (isset($_SESSION["tipo"])==false){
    if ($_SESSION["tipo"]!=2){
        header("Location:../index.php");
    }
}
include "conexion_bd.php";
$sql = 'SELECT * FROM personaje';
$result = $conn ->query($sql);
$personajes = $result -> fetchAll();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Imagen</title>
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="../css/botones.css" rel="stylesheet" type="text/css" media="all">
    <link href="../images/MarioIcon2.png" rel="shortcut icon" type="image/x-icon" >

    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />


</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
    <div id="topbar" class="hoc clear">
        <!-- ################################################################################################ -->
        <div class="fl_left">
            <ul class="nospace inline pushright">
                <li><i class="fa fa-phone"></i> (386) 106 4302</li>
                <li><i class="fa fa-envelope-o"></i> luisgarcia@alumnos.udg.mx</li>
            </ul>
        </div>
        <div class="fl_right">
            <ul class="faico clear">
                <li><a class="faicon-facebook" href="http://www.facebook.com/LuizGarcia.CA"><i class="fa fa-facebook"></i></a></li>
                <li><a class="faicon-twitter" href="https://twitter.com/RayoMonster"><i class="fa fa-twitter"></i></a></li>
                <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
        <!-- ################################################################################################ -->
    </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
    <header id="header" class="hoc clear">
        <!-- ################################################################################################ -->
        <div id="logo" class="fl_left">
            <h1><a href="../index.php">Torneo de videojuegos</a></h1>
        </div>
        <nav id="mainav" class="fl_right">
            <ul class="clear">
                <li><a href="../index.php">Inicio</a></li>
                <?php
                if (isset($_SESSION["nickname"])){
                    if ($_SESSION["tipo"]==2){ ?>
                        <li class="drop"><a href="index.php">Carrera</a>
                            <ul>
                                <li><a href="report_carreras.php">Administrar carreras</a></li>
                                <li><a href="form_add_carrera.php">Agregar carreras</a></li>
                            </ul>
                        </li>
                        <li class="drop"><a href="index.php">Institución</a>
                            <ul>
                                <li><a href="report_instituto.php">Administrar instituciones</a></li>
                                <li><a href="form_add_instituto.php">Agregar instituciones</a></li>
                            </ul>
                        </li>
                        <li class="drop"><a href="index.php">Personaje</a>
                            <ul>
                                <li><a href="report_personajes.php">Administrar personajes</a></li>
                                <li><a href="subir_imagen.php">Subir imagen</a></li>
                            </ul>
                        </li>
                    <?php }?>
                    <li><a class="drop" href="#"><?php echo $_SESSION["nickname"];?></a>
                    <ul>
                        <li><a href="logoff.php">Cerrar Sesión</a></li>
                        <li><a href="reporte_users.php">Ver tabla de concursantes</a></li>
                    </ul>
                <?php } ?>
            </ul>
        </nav>
        <!-- ################################################################################################ -->
    </header>
</div>

<div class="wrapper row3 bgded overlay2 fondoformulario">
    <main class="hoc container clear">
        <div id="comments" align="center">
            <form enctype="multipart/form-data" action="process/add_personaje.php" method="POST" style="width: 70%" onsubmit="return validarpersonaje();">
                <h2 style="background-color: rgba(255,255,255,0.75)">Registrar nuevo personaje de juego</h2>
                <div class="one_quarter first">
                    <label for="id_personaje"><b>Id</b><span>*</span></label>
                    <input class="" id="id_personaje" name="id_personaje" type="number" placeholder="ID del personaje" onkeyup="verificar_id()">
                    <label id="id_exist"></label>
                </div>
                <div class="three_quarter form-group">
                    <label for="nom_personaje"><b>Nombre del personaje</b><span>*</span></label>
                    <input class="" id="nom_personaje" name="nom_personaje" type="text" placeholder="Nombre del personaje de Smash" >
                </div>
                <br><br><br><br><br>
                <div class="first">
                    <label for="imagen"></label>
                    <input name="imagen" id="imagen" type="file" required>
                </div>
                <div class="center first" >
                    <input type="submit" name="submit" value="Registrar institución">
                </div>
            </form>
        </div>
    </main>
</div>
<div class="wrapper row4">
    <footer id="footer" class="hoc topspace-0 clear">
        <!-- ################################################################################################ -->
        <br>
        <!-- ################################################################################################ -->
        <div class="group">
            <div class="one_half first">
                <h6 class="title">Contacto</h6>
                <address class="btmspace-15">
                    Luis Ángel García Castro<br>
                    Carretera Guadalajara - Ameca Km 45.5
                    Ameca, Jalisco, México
                    C.P. 46600
                </address>
            </div>
            <div class="one_half">
                <h6 class="title">Comunicate</h6>
                <ul class="nospace">
                    <li class="btmspace-10"><span class="fa fa-phone"></span> (386) 106 4302</li>
                    <li><span class="fa fa-envelope-o"></span> luisgarcia@alumnos.udg.mx</li>
                </ul>
            </div>
        </div>
    </footer>
</div>
<div class="wrapper row5">
    <div id="copyright" class="hoc clear">
        <!-- ################################################################################################ -->
        <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="../../index.php">Luis A. García</a></p>
        <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
        <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
</div>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/validar2.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js"></script><script type="text/javascript">
    function verificar_id() {
        //var email = document.getElementById('email').value;
        $.ajax({
            data:{
                "id_personaje" : $("#id_personaje").val()
            },
            type: 'post',
            url: 'process/search_ids.php',
            success:function (response) {
                $('#id_exist').html(response);
            }
        });
    }
</script>
</body>
</html>