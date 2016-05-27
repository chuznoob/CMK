<?php
session_start();
include_once '../lib/class/Proveedores.php';
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
  $classProv = new Proveedores();
  $dataProv= $classProv->show_data($id);
    
      while($prov=$dataProv->fetchObject())
      {
          $id_proveedor=$prov->id_proveedor;
          $em_proveedor=$prov->em_proveedor;
          $cont_proveedor=$prov->cont_proveedor;
          $tel_proveedor=$prov->tel_proveedor;
          $cor_proveedor=$prov->cor_proveedor;
          $dir_proveedor=$prov->dir_proveedor;
      }
}else{
          $id_proveedor=NULL;
          $em_proveedor=NULL;
          $cont_proveedor=NULL;
          $tel_proveedor=NULL;
          $cor_proveedor=NULL;
          $dir_proveedor=NULL; 
} ?>

<!DOCTYPE html>
<html>
<head>
<!-- ******************************************HEADER********************************************************* -->
        <title>Admin/Proveedores</title>
         <meta charset="UTF-8" />
        <link rel="shortcut icon" type="image/x-icon" href="../herramientas/ico/logo.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
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
                        <a  href="productos.php"><i class=" fa fa-laptop fa-3x"></i>&nbsp; Productos</a>
                    </li>
                      <li>
                        <a class="back"  href="proveedores.php"><i class="fa fa-reply fa-3x"></i>&nbsp; Regresar</a>
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
                <div class="col-md-9 ">
                 <h2 id="one">Panel de proveedores</h2>   
                        <h5>En esta pantalla usted podrá organizar y administrar a los proveedores de la empresa.</h5> 
                </div>
                
                <div class="col-md-3"> 
               
                 <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5">
                              Informacion <i class="fa fa-question-circle fa-x"></i>
                 </button>
                </div>
            </div>  
                 
                 
                 <div class="row">
                  <div class="panel-body"> 
                 
            

<form role="form" class="validator" action="../lib/ops_proveedores/UpAddProveedor.php" method="post">

<?php if($id_proveedor!=NULL){ ?>
<input type="hidden" name="id_proveedor" class="form-control" value="<?php echo $id_proveedor;?>">                        
 <?php } ?>                
	                                           
	                                        
<div class="form-group input-group">
<span class="input-group-addon usuTooltip" title="Inserte el nombre de la empresa del proveedor" data-placement="right"><i class="fa fa-building"></i></span>
<input type="text" name="em_proveedor" class="form-control" 
data-validate="validate(required, rangelength(5, 30),maxlength(45))"
value="<?php if($id_proveedor!=NULL){ echo $em_proveedor;}?>" >
</div>
                                         
 <div class="form-group input-group">
<span class="input-group-addon usuTooltip" title="Inserte el nombre del contacto con la empresa" data-placement="right"><i class="fa fa-user"></i></span>
<input type="text" name="cont_proveedor" class="form-control" 
data-validate="validate(required, rangelength(5, 30),maxlength(45))"
value="<?php if($id_proveedor!=NULL){echo $cont_proveedor;} ?>" >
</div>
                                    
<div class="form-group input-group">
<span class="input-group-addon usuTooltip" title="Inserte el teléfono del proveedor" data-placement="right"><i class="fa fa-phone"></i></span>
<input type="tel" name="tel_proveedor" class="form-control" 
data-validate="validate(required, number,maxlength(45))"
value="<?php if($id_proveedor!=NULL){ echo $tel_proveedor;} ?>" >
</div>
                                        
<div class="form-group input-group">
<span class="input-group-addon usuTooltip" title="Inserte el E-Mail del proveedor" data-placement="right">@</span>
<input type="email" name="cor_proveedor" class="form-control" 
data-validate="validate(required, email,maxlength(45))"
value="<?php if($id_proveedor!=NULL){ echo $cor_proveedor;}?>" >
</div>
                                        
<div class="form-group input-group">
<span class="input-group-addon usuTooltip" title="Inserte la dirección de la empresa del proveedor" data-placement="right"><i class="fa fa-map-marker"></i></span>
<input type="text" name="dir_proveedor" class="form-control" 
data-validate="validate(required,maxlength(45))"
value="<?php if($id_proveedor!=NULL){ echo $dir_proveedor;} ?>" >
</div>

<input type="submit" value="Enviar"class="btn btn-success btn-lg">
                                    
</form>

                 
<!-- **************************************Modal 5************************************************** -->                 
                    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Informacion</h4>
                                        </div>
                                        <div class="modal-body">
                                        En este formulario podrás agregar uno nuevo proveedor,
                                         este te servirá para administrar de mejor manera tus productos. 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
<!-- **************************************Modal 5************************************************** -->                  
      
                     </div><!-- Panel Body  -->
                  </div><!-- row  -->
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
    