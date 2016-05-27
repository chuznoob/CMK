<?php
session_start();
include_once '../lib/class/Productos.php';
include_once '../lib/class/Proveedores.php';
include_once '../lib/class/Categoria.php';
$classProv = new Proveedores();
$dataProv= $classProv->show_data(NULL);
$classCat = new Categoria();
$dataCat= $classCat->show_data(NULL);

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


if(isset($_POST['id']))
{
  $id=$_POST['id']; 
  $classPro = new Productos();
  $dataPro= $classPro->show_data($id);
    
      while($pro=$dataPro->fetchObject())
      {
          $id_producto=$pro->id_producto;
          $proveedores_id_proveedor=$pro->proveedores_id_proveedor;
          $categoria_id_Categoria=$pro->categoria_id_Categoria;
          $nom_producto=$pro->nom_producto;
          $pre_producto=$pro->pre_producto;
          $can_producto=$pro->can_producto;
      }
}else{
          $id_producto=NULL;
          $proveedores_id_proveedor=NULL;
          $categoria_id_Categoria=NULL;
          $nom_producto=NULL;
          $pre_producto=NULL;
          $can_producto=NULL; 
} ?>
<!DOCTYPE html>
<html>
<head>
<!-- ******************************************HEADER********************************************************* -->
        <title>Admin/Productos</title>
        <link rel="shortcut icon" type="image/x-icon" href="../herramientas/ico/logo.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />
	<!-- BOOTSTRAP STYLES-->
    <link href="../css/herramientas/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../css/herramientas/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../css/admin-style.css" rel="stylesheet" />
        <!-- KETCHUP-->
    <link href="../css/herramientas/jquery.ketchup.css" rel="stylesheet">
    <link href="../css/herramientas/jcomfirmaction.css" rel="stylesheet">
     <!-- GOOGLE FONTS-->
   <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
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
                        <a  class="back" href="productos.php"><i class=" fa fa-reply fa-3x"></i>&nbsp; Regresar</a>
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
                     <h2 id="one">Panel de productos</h2>   
                        <h5>Aquí usted podrá mantener el control sobre su inventario de productos.</h5>
                        </div>
                        <div class="col-md-3"> 

                        <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5">
                                  Informacion <i class="fa fa-question-circle fa-x"></i>
                        </button>
                       </div>
                </div>              
                 
                 
                 
                 <div class="row">
                  <div class="panel-body"> 
                 
            
<?php
if($dataCat!=null){ 
     if($dataProv!=null){       
                      ?>

<form role="form" class="validator" action="../lib/ops_productos/UpAddProducto.php" method="post">
<?php if($id_producto!=NULL){ ?>
<input type="hidden" name="id_producto" class="form-control" value="<?php echo $id_producto;?>" required>                        
 <?php } ?>  
                                      
<div class="form-group input-group">
<span class="input-group-addon usuTooltip" title="Inserte nombre del producto" data-placement="right"><i class="fa fa-sign-in"></i></span>
<input type="text" name="nom_producto" class="form-control" 
data-validate="validate(required, rangelength(5, 30),maxlength(50))"
value="<?php echo $nom_producto;?>">
</div>

<div class="form-group input-group">
<span class="input-group-addon usuTooltip" title="Elija un proveedor" data-placement="right"><i class="fa fa-group"></i></span>
<select name="proveedores_id_proveedor" class="form-control">
        <?php while($dataP=$dataProv->fetchObject()){ ?>
        <option value="<?php echo $dataP->id_proveedor; ?>"
        <?php if($dataP->id_proveedor==$proveedores_id_proveedor){ echo "selected";} ?> ><?php echo $dataP->em_proveedor; ?>
        </option>
         <?php } ?>
</select>
</div>

<div class="form-group input-group">
<span class="input-group-addon usuTooltip" title="Elija una categoria" data-placement="right"><i class="fa fa-tags"></i></span>
<select name="categoria_id_Categoria" class="form-control">
        <?php while($dataC=$dataCat->fetchObject()){ ?>
        <option value="<?php echo $dataC->id_Categoria; ?>"
        <?php if($dataC->id_Categoria==$categoria_id_Categoria){ echo "selected";} ?> ><?php echo $dataC->nom_categoria;; ?>
        </option>
         <?php } ?>
</select>
</div>

<div class="form-group input-group">
<span class="input-group-addon usuTooltip" title="Inserte el precio del producto" data-placement="right"><i class="fa fa-money"></i></span>
<input type="number" step="0.01"name="pre_producto" class="form-control" 
data-validate="validate(required, min(1),maxlength(11),number)"
value="<?php echo $pre_producto;?>" >
</div>

<div class="form-group input-group">
<span class="input-group-addon usuTooltip" title="Inserte cuantos productos hay disponibles" data-placement="right"><i class="fa fa-tag"></i></span>
<input type="number" step="1"name="can_producto" class="form-control" 
data-validate="validate(required, min(1),maxlength(11),number)"
value="<?php echo $can_producto;?>" >
</div>
                                    
<input type="submit" value="Enviar"class="btn btn-success btn-lg">
</form>

<?php 
     }else{ ?>
         <div class="alert alert-warning empty text-center">
<i class="fa fa-lock fa-2x "></i>
&nbsp;Se requieren proveedores para rellenar esta sección,<a href="formu_Proveedores.php" class="alert-link">Ingresa uno aqui</a>

</div>                               
   <?php  }
}else{ ?>
    <div class="alert alert-warning empty text-center">
<i class="fa fa-lock fa-2x "></i>
&nbsp;Se requiere una categoría para rellenar esta sección,<a href="formu_Categorias.php" class="alert-link">Ingresa una aqui</a>

</div>                               
<?php }
?>
                   </div><!-- Panel Body  -->
                  </div><!-- row  -->
             </div><!-- Page Inner  -->
        </div><!-- Page Wrapper  -->
    </div><!--  Wrapper -->
<!-- **************************************Modal 5************************************************** -->               
                    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Informacion</h4>
                                        </div>
                                        <div class="modal-body">
                                        En este formulario podrás agregar un nuevo producto, 
                                        esto te permitira consultarlos de manera mas sencilla y rapida.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!-- **************************************Modal 5************************************************** -->
<!-- ***************************************CONTENIDO********************************************************* -->
<!-- *****************************************FOOTER********************************************************** -->
   
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../js/jquery.metisMenu.js"></script>

    <!-- DATA TABLE SCRIPTS -->
    <script src="../js/dataTables/jquery.dataTables.js"></script>
    
    <script src="../js/dataTables/dataTables.bootstrap.js"></script>
    
    <script>
    $('.usuTooltip').tooltip();
    </script>
    
     <script>
    $('.popov').popover({ html : true});
    </script>
         
            <!-- CUSTOM SCRIPTS -->
    <script src="../js/custom.js"></script>
    <script src="../js/ketchup/jquery.js"></script>
    <script src="../js/ketchup/jquery.ketchup.js"></script>
    <script src="../js/ketchup/jquery.ketchup.validations.js"></script>
    <script src="../js/ketchup/jquery.ketchup.helpers.js"></script>
    <script src="../js/ketchup/jconfirmaction.jquery.js"></script>
    
  <script> 
      $(document).ready(function(){
          $('.validator').ketchup();
      });
  </script>
<!-- *****************************************FOOTER********************************************************** -->
</body>
</html>
 