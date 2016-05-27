<?php
session_start();
include_once '../lib/class/Comentarios.php';
$classCom = new Comentarios();
$dataCom=$classCom->show_data(NULL);

include_once '../lib/class/Comentarios.php';
$classBad = new Comentarios();
$badge= $classBad->badges();

include_once '../lib/class/Contacto.php';
$classCont = new Contacto();
$badge_Cont= $classCont->badges();

if(isset($_SESSION['sesion']))
{
 if($_SESSION['niv_cliente']=="administrador"|| $_SESSION['niv_cliente']=="ad-master")
 {
 $bienvenido=$_SESSION['nom_cliente'];
 }else{
header("Location: ../index.php");
 }
}else{
  header("Location: ../login.php");   
}

?>
<!DOCTYPE html>
<html>
<head>
<!-- ******************************************HEADER********************************************************* -->
        <title>Admin/Comentarios</title>
        <link rel="shortcut icon" type="image/x-icon" href="../herramientas/ico/logo.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />
	<!-- BOOTSTRAP STYLES-->
    <link href="../css/herramientas/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../css/herramientas/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../css/admin-style.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
            <!-- KETCHUP-->
    <link href="../css/herramientas/jquery.ketchup-alter.css" rel="stylesheet">
    <link href="../css/herramientas/jcomfirmaction2.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">

<!-- *****************************************HEADER********************************************************** -->
<!-- ******************************************NAV************************************************************ -->
           <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">CompuMark</a> 
            </div>
       <div class="session">
       <a tabindex="0" class="btn btn-xs btn-info popov" role="button" data-toggle="popover" data-trigger="focus"
       title="Informacion de <?php echo $_SESSION['nom_cliente']; ?>" data-placement="left" 
       data-content="
              <strong> Nivel:</strong>&nbsp;<?php echo $_SESSION['niv_cliente']; ?><br>
               <strong>E-Mail:</strong>&nbsp;<?php echo $_SESSION['cor_cliente']; ?><br>
               <strong>No.de Usuario:</strong>&nbsp;<?php echo $_SESSION['id_Cliente']; ?><br>
          ">
           <?php echo $_SESSION['nom_cliente']; ?>
       </a>
       
       <a href="../login.php" class="btn btn-danger btn-xs">Logout</a> 
           
       </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../herramientas/img/find_user.png" class="user-image img-responsive"/>
					</li>
                     <li>
                        <a  href="productos.php"><i class=" fa fa-laptop fa-3x"></i>&nbsp; Productos</a>
                    </li>
                      <li>
                        <a  href="proveedores.php"><i class="fa fa-users fa-3x"></i>&nbsp; Proveedores</a>
                    </li>
                     <li>
                        <a  href="categorias.php"><i class="fa fa-tags fa-3x"></i>&nbsp; Categorias</a>
                    </li>
                     <li>
                        <a class="active" href="comentarios.php"><i class="fa fa-comments fa-3x"></i>&nbsp; Comentarios
<?php  if($badge!=null){ 
$number = $badge->rowCount();
?>
<span class="badge">
<?php echo $number; ?>  
</span>
<?php } ?>   
                    </a>
                    </li>
                    <li>
                        <a  href="contactos_cm.php"><i class="fa fa-inbox fa-3x"></i>&nbsp; Bandeja de entrada
<?php  if($badge_Cont!=null){ 
$number2 = $badge_Cont->rowCount();
?>
<span class="badge">
<?php echo $number2; ?>  
</span>
<?php } ?>   
                    </a>
                    </li>
                    <li>
                        <a   href="punto_deVenta.php"><i class="fa fa-shopping-cart fa-3x"></i>&nbsp; Punto de venta</a>
                    </li>
                    <li>
                        <a   href="ventas.php"><i class="fa fa-line-chart fa-3x"></i>&nbsp; Historial de Ventas</a>
                    </li>
				    <li>
<?php
 if($_SESSION['niv_cliente']=="ad-master")
 { ?>
                        <a  href="usuarios.php"><i class="fa fa-user-plus fa-3x"></i>&nbsp; Usuarios</a>
<?php
 }else{
?>
                   <a  href="#" class="disabled_menu"><i class="fa fa-user-plus fa-3x"></i>&nbsp; Usuarios</a>
 <?php } ?>
                    </li>	
                     </ul>
            </div>
        </nav>
<!-- ******************************************NAV************************************************************ -->
<!-- ***************************************CONTENIDO********************************************************* -->
       
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row orion">
                    <div class="col-md-9">
                     <h2 id="four">Panel de comentarios </h2>   
                        <h5>En este apartado usted podrá decidir los comentarios publicados en su sitio web.</h5>
                    </div>
                            <div class="col-md-3"> 
                             <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5">
                                          Informacion <i class="fa fa-question-circle fa-x"></i>
                             </button>
                            </div>
                </div>              
                  <div class="row">
                  <div class="col-md-12 "> 
<?php if($dataCom!=null){ ?>
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Autor</th>
                                                    <th>E-mail</th>
                                                    <th>Comentario</th>
                                                    <th>Fecha/Hora</th>
                                                    <th>Estatus</th>
                                                    <th>Cambiar estatus</th>
                                                    <th>Borrar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 


while($data=$dataCom->fetchObject())
{
                        echo "<tr class='odd gradeX '>";
                            echo "<td>" . $data->id_comentario . "</td>";
                            echo "<td>" . $data->nom_cliente . "</td>";
                            echo "<td>" . $data->cor_cliente . "</td>";
                            echo "<td>" . $data->com_comentario . "</td>";
                            echo "<td>" . $data->date_comentario . "</td>";
    
     if($data->aprob_comentario=="oculto"){
                            echo "<td class='text-center'><i class='red-e fa fa-eye-slash fa-2x'></i>
                            <span class='lil-c'>(".$data->aprob_comentario.")</span></td>";
     }else{
                            echo "<td class='text-center'><i class='green-e fa fa-eye fa-2x'></i>
                            <span class='lil-c'>(".$data->aprob_comentario.")</span></td>";
     }
        
    if($data->aprob_comentario=="oculto"){
                            echo "<td> <form name='F-update' action='../lib/ops_comentarios/changeComentario.php' method='post'>
                                 <input type='hidden' name='id' value='".$data->id_comentario."'>
                                 <input type='hidden' name='aprob_comentario' value='".$data->aprob_comentario."'>
                                 <button type='submit' class='btn btn-success btn-sm'><i class='fa fa-check-circle fa-2x'></i></button>
                                 </form>
                                 </td>";
    }else{
                           echo "<td> <form name='F-update' action='../lib/ops_comentarios/changeComentario.php' method='post'>
                                 <input type='hidden' name='id' value='".$data->id_comentario."'>
                                 <input type='hidden' name='aprob_comentario' value='".$data->aprob_comentario."'>
                                 <button type='submit' class='btn btn-warning btn-sm'><i class='fa fa-times-circle fa-2x'></i></button>
                                 </form>
                                 </td>";
    }
    
                            echo "<td> <form name='F-delete' class='validator' action='../lib/ops_comentarios/deleteComentario.php' method='post'>
                                 <input type='hidden' name='id' value='".$data->id_comentario."'>
                                 <button type='submit' class='btn btn-danger btn-sm ask'><i class='fa fa-trash fa-2x'></i></button>
                                 </form>
                                 </td>";
                        echo "</tr>"; ?>
                                
     
   <?php } ?>
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
<?php }else{ ?>
<div class="alert alert-danger empty text-center">
<i class="fa fa-exclamation-circle fa-2x "></i>
&nbsp;Ningún comentario ha sido publicado en la página de Compumark&nbsp;
<i class="fa fa-exclamation-circle fa-2x "></i>
</div>                                                                   
 <?php } ?>
 
<!-- **********************************Modal 5************************************************************** -->          
                    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Informacion</h4>
                                        </div>
                                        <div class="modal-body">
                                          En esta sección usted podrá realizar bajas y editar la visibilidad de los comentarios lo cual le permite mantener un control sobe lo que resibe, para ello solo debe seleccionar el botón que corresponda a la acción que usted desea realizar.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
         
<!-- **********************************Modal 5************************************************************** -->         
   
                     </div> <!-- Panel body  -->
                </div><!-- ROW  -->
            </div><!-- Page Inner  -->
        </div><!-- Page Wrapper  -->
    </div><!--  Wrapper -->
     
<!-- ***************************************CONTENIDO********************************************************* -->
<!-- *****************************************FOOTER********************************************************** -->
   
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../js/bootstrap.min.js"></script>
  <!-- METISMENU SCRIPTS -->
    <script src="../js/jquery.metisMenu.js"></script>
    <script src="../js/ketchup/jquery.js"></script>
    <script src="../js/ketchup/jquery.ketchup.js"></script>
    <script src="../js/ketchup/jquery.ketchup.validations.js"></script>
    <script src="../js/ketchup/jquery.ketchup.helpers.js"></script>
    <script src="../js/ketchup/jconfirmaction.jquery.js"></script>     
    
    <script> 
      $(document).ready(function(){
          $('.validator').ketchup();
          $('.ask').jConfirmAction({
        question:"¿Esta seguro?",
        yesAnswer:"<input type='submit' class='btn btn-success' value='Si' >",
        cancelAnswer:"<p role='button' class='btn btn-danger'>NO</p>"});
      });
   </script>

    <!-- DATA TABLE SCRIPTS -->
    <script src="../js/dataTables/jquery.dataTables.js"></script>
    
    <script src="../js/dataTables/dataTables.bootstrap.js"></script>
        
     <script>
        $(document).ready(function() {
            $('#dataTables-example2').dataTable( {
                "lengthMenu": [[2, 5, 10], [2, 5, 10, "Todos"]],
                "oLanguage": {
                    "sLengthMenu": " _MENU_ registros por p&aacute;gina"
                }
            } );
            
        } );
    </script>
    <script src="../js/bootstrap.min.js"></script>
     <script>
    $('.popov').popover({ html : true});
    </script>
        
         <!-- CUSTOM SCRIPTS -->
    <script src="../js/custom.js"></script>
<!-- *****************************************FOOTER********************************************************** -->
</body>
</html>
    