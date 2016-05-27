<?php
session_start();
include_once '../lib/class/Productos.php';
$classPro = new Productos();
$dataPro= $classPro->show_data(NULL);

$classPro2 = new Productos();
$dataPro2= $classPro2->show_data(NULL);

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

if(isset($_POST['cancel']) == "cancelado"){
unset($_SESSION['carroD']);
unset($_SESSION['carroS']);
unset($_SESSION['carroS2']);
unset($_SESSION['carroS3']);
}
?>
<!DOCTYPE html>
<html>
<head>
<!-- ******************************************HEADER********************************************************* -->
        <title>Admin/Punto de Venta</title>
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
    <link href="../css/herramientas/jquery.ketchup-alter.css" rel="stylesheet"/>
    <link href="../css/herramientas/jcomfirmaction2.css" rel="stylesheet"/>
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
                        <a href="productos.php"><i class=" fa fa-laptop fa-3x"></i>&nbsp; Productos</a>
                    </li>
                      <li>
                        <a  href="proveedores.php"><i class="fa fa-users fa-3x"></i>&nbsp; Proveedores</a>
                    </li>
                     <li>
                        <a  href="categorias.php"><i class="fa fa-tags fa-3x"></i>&nbsp; Categorias</a>
                    </li>
                   <li>
                        <a  href="comentarios.php"><i class="fa fa-comments fa-3x"></i>&nbsp; Comentarios
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
                     <a class="active"  href="punto_deVenta.php"><i class="fa fa-shopping-cart fa-3x"></i>&nbsp; Punto de venta</a>
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
                     <h2 id="one">Punto de Venta</h2>   
                        <h5>Realicé ventas en base a los productos del inventario.</h5>
                    </div>
                     
                <div class="col-md-3"> 
                 <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal5">
                              Información <i class="fa fa-question-circle fa-x"></i>
                 </button>
                             <a href="carrito_Venta.php" class="btn btn-success btn-sm" role="button">
                                 Revisar Carrito&nbsp;<i class="fa fa-shopping-cart fa-x"></i>
                             </a>
                </div>
                    
                </div>  
                 
               <div class="row">
                  <div class="col-md-12 "> 
<?php if($dataPro!=null){ ?>
                            <!-- Advanced Tables -->
                              <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                            <thead>
                                                <tr class="text-left">
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Proveedor</th>
                                                    <th>Categoria</th>
                                                    <th>Precio</th>
                                                    <th>Existencia</th>
                                                    <th>Agregar a Carrito</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <?php 


while($data=$dataPro->fetchObject())
{
                        echo "<tr class='odd gradeX'>";
                            echo "<td>" . $data->id_producto . "</td>";
                            echo "<td>" . $data->nom_producto . "</td>";
                            echo "<td>" . $data->em_proveedor . "</td>";
                            echo "<td>" . $data->nom_categoria . "</td>";
                            echo "<td>" . $data->pre_producto. "</td>";
                          
    if($data->can_producto<=0){
           echo "<td> 
<button type='submit' class='btn btn-danger btn-sm cant' disabled>
<i class='fa fa-times fa-x'></i>
Sin existencias<i class='fa fa-times fa-x'></i></button>
                </td>";
                }else{
                echo "<td >" . $data->can_producto. "</td>";
                     }
    
    if($data->can_producto<=0){
                            echo "<td class='text-left'>
                            <input type='number' name='cantidad'class='form-control cant' disabled>
                            <button type='submit' class='btn btn-danger btn-sm cant' disabled>
                            No disponible<i class='fa fa-times fa-x'></i></button>
                            </td>";
    }else{
                            echo "<td class='text-left'> 
        <form name='F-delete' class='validator".$data->id_producto."' action='../lib/ops_carrito/UpAddCarrito.php' method='post'>
                            
                            <input type='hidden' name='id_producto' value='".$data->id_producto."'>
                             <input type='hidden' name='nom_producto' value='".$data->nom_producto."'>
                              <input type='hidden' name='em_proveedor' value='".$data->em_proveedor."'>
                               <input type='hidden' name='nom_categoria' value='".$data->nom_categoria."'>
                                <input type='hidden' name='pre_producto' value='".$data->pre_producto."'>
                                 <input type='hidden' name='can_producto' value='".$data->can_producto."'>
                            
                            
                            <input type='number' name='cantidad'class='form-control cant'
                            data-validate='validate(min(1),max(".$data->can_producto."))'>
                            <button type='submit' class='btn btn-success btn-md cant'>Agregar
                            <i class='fa fa-shopping-cart fa-x'></i></button>
                                 </form>
                                 </td>";
                        echo "</tr>"; ?>
                         <?php } } ?>
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
<?php }else{ ?>
<div class="alert alert-danger empty text-center">
<i class="fa fa-exclamation-circle fa-2x "></i>
&nbsp;No hay ningún producto registrado <a href="formu_Producto.php" class="alert-link">Registra un producto aquí   </a>&nbsp;
<i class="fa fa-exclamation-circle fa-2x "></i>
</div>                                                                   
 <?php } ?>
                 
                 
         
<!-- **********************************Modal 5************************************************************** -->                
                    <div class="modal fade" id="myModal5" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Informacion</h4>
                                        </div>
                                        <div class="modal-body">
En esta sección usted podrá realizar ventas en base a los productos del inventario, esto se registrara para mantener un mejor control sobre el sistema de ventas de la organización. 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
         
<!-- **********************************Modal 5************************************************************** -->  
<!-- **********************************Modal 6***************************************************************-->
<?php 
if(isset($_SESSION['carroD'])){
extract($_SESSION['carroS3']);
?>
<div class="modal fade" id="PDFG" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Finalizar Transaccion</h4>
      </div>
      <div class="modal-body">
          <div class="alert alert-success" role="alert"><i class="fa fa-check-circle"></i> - Su compra ha sido realizada exitosamente, ¿Desea generar un reporte de venta?</div>
      </div>
      <div class="modal-footer">
        <form name="PDF"action="../lib/ops_pdf/createPDF.php" method="POST">
        <a href='#' class="btn btn-default" onClick="resetForm()" data-dismiss="modal" aria-label="Close">
        <span>Salir</span></a>
            
                <input type="Submit" class="btn btn-info" value="Generar PDF">
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- **********************************Modal 6***************************************************************-->                                       
                                                                                                 
                        </div> <!-- col  -->
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


    
    <script>
    $('.popov').popover({ html : true});
    </script>
<?php
if(isset($_SESSION['carroD'])){
?>
    <script>
    $('#PDFG').modal('show')
    </script>
<?php 
} 
?>
         <!-- CUSTOM SCRIPTS -->
    <script src="../js/custom.js"></script>

    <script src="../js/ketchup/jquery.js"></script>
    <script src="../js/ketchup/jquery.ketchup.js"></script>
    <script src="../js/ketchup/jquery.ketchup.validations.js"></script>
    <script src="../js/ketchup/jquery.ketchup.helpers.js"></script>
    <script src="../js/ketchup/jconfirmaction.jquery.js"></script>


<!-- ********************************Validador Individual-->
<?php
while($data=$dataPro2->fetchObject())
{ ?>
  <script> 
      $(document).ready(function(){
          $('.validator<?php echo $data->id_producto; ?>').ketchup();
      });
  </script>
<?php } ?>
<!-- ********************************Validador Individual-->
     
         
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
    
    <script>
function resetForm() {

    $.ajax({
    type: "POST",
    data: "cancel=cancelado",
    error: function(msg){
        alert('Error: cannot load page.');
    }
});
}
    </script>
<!-- *****************************************FOOTER********************************************************** -->
</body>
</html>
 