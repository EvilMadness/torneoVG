<?php
session_start();
if (isset($_SESSION["tipo"])==true || isset($_SESSION["tipo"])==false){
    if ($_SESSION["tipo"]!=2 || $_SESSION["tipo"]==1){
        header("Location:../index.php");
    }
}
require_once "conexion_bd.php";
$sql = 'SELECT * FROM institucioneducativa';
$result = $conn -> query($sql);
$datos = $result -> fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte Insituciones</title>
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="../css/botones.css" rel="stylesheet" type="text/css" media="all">
    <link href="../images/MarioIcon2.png" rel="shortcut icon" type="image/x-icon" >


</head>
<script>
    function confirmDelete(user) {
        if (confirm("¿Estas seguro de eliminar la institución "+user+"?")==true){
            return true;
        }else
            return false;
    }
</script>
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
<div class="wrapper row1">
    <header id="header" class="hoc clear">
        <!-- ################################################################################################ -->
        <div id="logo" class="fl_left">
            <h1><a href="../index.php">Torneo de videojuegos</a></h1>
        </div>
        <nav id="mainav" class="fl_right">
            <ul class="clear">
                <li><a href="../index.php">Inicio</a></li>
                <li class="drop"><a href="#">Carrera</a>
                    <ul>
                        <li><a href="report_carreras.php">Administrar carreras</a></li>
                        <li><a href="form_add_carrera.php">Agregar carreras</a></li>
                    </ul>
                </li>
                <li class="drop"><a href="#">Institución</a>
                    <ul>
                        <li><a href="form_add_instituto.php">Agregar instituciones</a></li>
                    </ul>
                </li>
                <li class="drop"><a href="#">Personaje</a>
                    <ul>
                        <li><a href="report_personajes.php">Administrar personaje</a></li>
                        <li><a href="form_add_personaje.php">Agregar personaje</a></li>
                        <li><a href="subir_imagen.php">Subir imagen</a></li>
                    </ul>
                </li>
                <li><a class="drop" href="#"><?php echo $_SESSION["nickname"];?></a>
                    <ul>
                        <li><a href="reporte_users.php">Ver tabla de concursantes</a></li>
                        <li><a href="logoff.php">Cerrar Sesión</a></li>
                    </ul>
            </ul>
        </nav>
        <!-- ################################################################################################ -->
    </header>
    <div class="wrapper row3 bgded overlay2 fondoformulario">
        <main class="hoc container clear">
            <div id="comments">
                <div align="center">
                    <h2 class="healset2">Lista de instituciones</h2>
                    <table class="tablapos" border="1" width="80%" style="background-color: #469599" id="result">
                        <tr>
                            <th>Nombre de la institución</th>
                            <th>Municipio</th>
                            <th>Acciones</th>
                        </tr>
                        <?php
                        foreach ($datos as $dato){
                            ?>
                            <tr align="center">
                                <td><?php echo $dato['nombre'];?></td>
                                <td><?php echo $dato['municipio'];?></td>
                                <td>
                                <a href="form_edit_instituto.php?id=<?php echo $dato['id_institucion'];?>"><img src="../images/icon/Edit.png"></a>
                                <a href="process/remove_institucion.php?id=<?php echo $dato['id_institucion'];?>"onclick="return confirmDelete('<?php echo $dato['nombre'];?>')"><img src="../images/icon/delete.png"></a>
                                    </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div><br>
                <div class="center">
                    <input type="submit" onclick="location.href='form_add_instituto.php';" value="Registrar otra institución" >
                </div>
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
    <script type="application/javascript" src="../js/jquery-3.3.1.min.js"></script>
</body>
</html>
