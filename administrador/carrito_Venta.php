<?php
session_start();
/* Declaracion de variables como subtotal,total,descuento y fecha */
$sT=0;
$Tot=0;
$desc=0;
$date = date( 'Y-m-d');

/* validacion del descuento*/
if (isset($_POST['desc'])) {
    $desc =$_POST['desc'];
    
    if($desc>100){
    $desc=100;
    }else{
    if($desc<0){
    $desc=0;
    }else{
    $desc =$_POST['desc'];  
    }
    }
}

/* incluir archivos necesarios para cargar badges, y mostrar datos */
include_once '../lib/class/Comentarios.php';
$classBad = new Comentarios();
$badge= $classBad->badges();

include_once '../lib/class/Contacto.php';
$classCont = new Contacto();
$badge_Cont= $classCont->badges();

include_once '../lib/class/Cliente.php';
$classCli = new Cliente();
$dataCli=$classCli->show_data(NULL);

/* Validacion del nivel de cliente */
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
                     <a class="back"  href="punto_deVenta.php"><i class="fa fa-reply fa-3x"></i>&nbsp; Regresar</a>
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
                     <h2 id="one">Carrito de Compras </h2>   
                        <h5>Verifique los productos agregados desde el punto de venta</h5>
                    </div>
                     
                <div class="col-md-3"> 
                 <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5">
                              Información <i class="fa fa-question-circle fa-x"></i>
                 </button>
                </div>
                    
                </div>  
                 
               <div class="row">
                  <div class="col-md-12 "> 
<!-- Si existe la sesion muestra los resultados en una tabla-->
<?php if (isset($_SESSION['carroS'])) { ?>
                            <!-- Tabla Avanzda-->
                              <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Proveedor</th>
                                                    <th>Categoria</th>
                                                    <th>Precio</th>
                                                    <th>Stock</th>
                                                    <th>Cantidad de Compra</th>
                                                    <th>Subtotal</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                        <tbody>
<!-- Descomponer el arreglo para mostrar el contenido en <tr> y <td>--> 
<?php 
for ($i=0; $i < count($_SESSION['carroS']); $i++) { 

if ($_SESSION['carroS'][$i] != NULL) {
?>
<!-- Mostrar los datos--> 
                        <tr class='odd gradeX'>
                           <td><?php echo $_SESSION['carroS'][$i]['id_producto']?></td>
                           <td><?php echo $_SESSION['carroS'][$i]['nom_producto']?></td>
                           <td><?php echo $_SESSION['carroS'][$i]['em_proveedor']?></td>
                           <td><?php echo $_SESSION['carroS'][$i]['nom_categoria']?></td>
                           <td><?php echo $_SESSION['carroS'][$i]['pre_producto']?></td>
                           <td><?php echo $_SESSION['carroS'][$i]['can_producto']?></td>
                           
<!-- Number Actualizar canidad Producto-->   
               <td >
			    <form name="actualizar" method="POST" action="../lib/ops_carrito/UpAddCarrito.php">
               
                <input type="hidden" name="idp" value="<?php echo $i; ?>">
                <input type="hidden" name="stocker" value="<?php echo $_SESSION['carroS'][$i]['can_producto']; ?>">
				<input type="number" min="1" max="<?php echo $_SESSION['carroS'][$i]['can_producto']; ?>" 
            value="<?php echo $_SESSION['carroS'][$i]['cantidad'] ?>" name="cantidad2" onchange="this.form.submit();">
			   </form>
               </td>

<!-- Calcular Subtotal-->                 
<?php 
$sT = $_SESSION['carroS'][$i]['pre_producto'] * $_SESSION['carroS'][$i]['cantidad']; 
/* Calcular el total al sumar subtotales*/
$Tot = $sT+$Tot;
?>
                      
                       <td>$<?php echo $sT ?></td>
<!-- Boton Eliminar Producto-->   
                       <td > 
            <form action="../lib/ops_carrito/UpAddCarrito.php" class='validator' method="post" >

            <input type="hidden" name="ide" value="<?php echo $i; ?>">
            <button type='submit' class='btn btn-danger btn-sm ask'><i class='fa fa-trash fa-2x'></i></button>
            </form>
                      </td>
                     </tr>
<?php } }?>
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div> 

                                                           
<?php }else{?>

<!-- Boton Eliminar Producto--> 

<div class="alert alert-danger empty text-center">
<i class="fa fa-exclamation-circle fa-2x "></i>
&nbsp;Ningún producto ha sido agregado al carrito&nbsp;<a href="punto_deVenta.php" class="alert-link">Agrega un producto aquí   </a>&nbsp;
<i class="fa fa-exclamation-circle fa-2x "></i>
</div>        
<?php } ?>          
                 
</div> <!-- col  -->   

<?php 
if (isset($_SESSION['carroS'])) {
?>
<div class="col-md-3 "> 
<div class="panel panel-danger">
  <div class="panel-heading"><i class="fa fa-shopping-cart fa-x "></i>
&nbsp;Borrar Carrito</div>
  <div class="panel-body">
<a href="../lib/ops_carrito/deleteCarrito.php" class="btn btn-danger btn-sm" role="button">
 Borrar&nbsp;  <i class="fa fa-times fa-x "></i>
</a>
  </div>
</div>
</div>     

<div class="col-md-2 "> 
</div>

<div class="col-md-2 "> 
<div class="panel panel-info">
  <div class="panel-heading"><i class="fa fa-tags fa-x "></i>
&nbsp;Descuento</div>
  <div class="panel-body">
 <form name="Descuento" method="POST" action="#"> 
%<input type="number" min="1" max="100" 
value="<?php echo $desc; ?>"name="desc" onchange="this.form.submit();">   
</form>
  </div> 
</div>

</div>     

<div class="col-md-2 text-center"> 
<div class="panel panel-info">
  <div class="panel-heading"><i class="fa fa-money fa-x "></i>&nbsp;Costo total:</div>
  <div class="panel-body">
  <?php 
$descuento= $Tot*($desc/100); 
$total= $Tot-$descuento;
      ?>
 <h5>$ &nbsp; <?php echo number_format($total, 0, '', ','); ?></h5> 
</div>
</div>
</div>     

<div class="col-md-3 text-center"> 
<div class="panel panel-success">
  <div class="panel-heading"><i class="fa fa-check-circle fa-x "></i>&nbsp;Confirmar Pedido </div>
  <div class="panel-body">
<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal6">
  Confirmar
  </button>
  </div>
</div>
</div>   

<?php 
 } 
?>  
<!-- **********************************Modal 5************************************************************** -->                
                    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Informacion</h4>
                                        </div>
                                        <div class="modal-body">
En esta sección usted puede gestionar los artículos a vender, agregando, eliminando y modificando las cantidades de productos que el cliente desea, así como borrar por completo la sesión del carrito (Compra Cancelada).
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
         
<!-- **********************************Modal 5************************************************************** -->    
<!-- **********************************Modal 6************************************************************** -->                
                    <div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Reporte de Venta</h4>
                                        </div>
                                        <div class="modal-body">

<!-- ************************************************REP****************************************************--> 

              <div class="col-md-8 ">
                       <div class="panel panel-info">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Categoria</th>
                                                    <th>Precio</th>
                                                    <th>Cantidad de Compra</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php 
for ($i=0; $i < count($_SESSION['carroS']); $i++) { 

if ($_SESSION['carroS'][$i] != NULL) {
?>
                        <tr class='odd gradeX'>
                           <td><?php echo $_SESSION['carroS'][$i]['nom_producto']?></td>
                           <td><?php echo $_SESSION['carroS'][$i]['nom_categoria']?></td>
                           <td><?php echo $_SESSION['carroS'][$i]['pre_producto']?></td>
                           <td><?php echo $_SESSION['carroS'][$i]['cantidad']?></td>
               
                      
<?php 
$sT = $_SESSION['carroS'][$i]['pre_producto'] * $_SESSION['carroS'][$i]['cantidad']; 
?>
                      
                       <td>$<?php echo $sT ?></td>
                       
                     </tr>
<?php } }?>
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>    
            </div>   
                                                               
                                                               
<div class="col-md-4 ">   
<form role="form" class="validator" action="../lib/ops_carrito/UpAddCompra.php" method="post">
<h4><span class="label label-success">Cliente:</span></h4>   
<select name="cliente_id_Cliente" class="form-control">
<?php while($dataC=$dataCli->fetchObject()){ ?>
<option value="<?php echo $dataC->id_Cliente; ?>">
<?php echo $dataC->cor_cliente;; ?>
</option>
         <?php } ?>
</select>

<h4><span class="label label-default">Fecha:</span></h4>
<div class="form-group input-group">
<span class="input-group-addon "><i class="fa fa-calendar"></i></span>
<input type="date" name="fech_compra" class="form-control" 
value="<?php echo $date ?>" readonly>
</div>  

<h4><span class="label label-default">Monto Final:</span></h4>
<div class="form-group input-group">
<input type="hidden" name="mf_compras" value="<?php echo $total; ?>">
<span class="input-group-addon ">$</span>
<input type="text" name="final" class="form-control" 
value="<?php echo number_format($total, 0, '', ',');?>" readonly>
</div>  
  
<h4><span class="label label-default">Descuento:</span></h4>
<div class="form-group input-group">
<span class="input-group-addon ">%</span>
<input type="text" name="porcentaje" class="form-control" 
value="<?php echo $desc; ?>" readonly>

<span class="input-group-addon ">= $</span>
<input type="text" name="desc_compra" class="form-control" 
value="<?php echo $descuento; ?>" readonly>
</div>    


<button type='submit' class='btn btn-success btn-md cant ask'>Realizar Venta
<i class='fa fa-check fa-x'></i></button>

</form>
</div> 
                                                                
                            
<!-- ************************************************REP****************************************************-->                                           
                                                            
                                                                            
                                                                                                            
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
         
<!-- **********************************Modal 6************************************************************** -->                         
                        
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
    <script>
    $('.popov').popover({ html : true});
    </script>
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
    

        
         <!-- CUSTOM SCRIPTS -->
    <script src="../js/custom.js"></script>

    <script src="../js/ketchup/jquery.js"></script>
    <script src="../js/ketchup/jquery.ketchup.js"></script>
    <script src="../js/ketchup/jquery.ketchup.validations.js"></script>
    <script src="../js/ketchup/jquery.ketchup.helpers.js"></script>
    <script src="../js/ketchup/jconfirmaction.jquery.js"></script>
     
         
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
  
  
  

<!-- *****************************************FOOTER********************************************************** -->
</body>
</html>
 