<!DOCTYPE html>
<html>

<head>
 
    <meta charset="utf-8" />

        <!-- CUSTOM STYLES-->
    <link  href="../css/print.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link  href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="container">

	<div class="row log">
		<div class="size12">
		<img src="../herramientas/img/logo.png" alt="">
		</div> <!-- Size-9 -->
	</div> <!-- Row -->

<div class="cleared H-W">&nbsp;</div>

	<div class="row ">
	    <div class="size8 text-center">
             <table class="tableR">
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
                        <tr class='odd'>
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
        </div> <!-- Size-10 -->

<div class="size3 sp">
 
<table class="tableR2">
  <tr class="odd">
    <td>ID de Cliente:</td>
  </tr>
  <tr>
    <td><?php echo $cliente_id_Cliente ?></td>
  </tr>
  <tr  class="odd">
    <td>Fecha:</td>
  </tr>
  <tr>
    <td><?php echo $fech_compra ?></td>
  </tr>
  <tr class="odd">
    <td>Monto Final:</td>
  </tr>
  <tr>
    <td><?php echo number_format($mf_compras, 0, '', ',');?></td>
  </tr>
  <tr  class="odd">
    <td>Descuento:</td>
  </tr>
  <tr>
    <td>%<?php echo $desc_por_compra; ?> = $<?php echo $desc_compra; ?></td>
  </tr>
</table>   

</div> <!-- Size-2 -->
  </div> <!-- Row -->

<div class="cleared H-W">&nbsp;</div>

	<div class="row foot">
    <div class="size4 text-center opp lft">
    <p>Direccion: <br><a href="https://goo.gl/maps/0l7Hb" target="_blank">Guadalupe Victoria #333-A</a></p>
    </div>
    
    <div class="size4 text-center opp">
 <p>Ubicación: <br><a href="https://goo.gl/maps/3zrCV" target="_blank">Acámbaro,Gunanajuato,Mexico</a></p>  
    </div>
  
   <div class="size4 text-center opp rgt">
<p>Telefono: <br><a href="tel:+4171729096">(417) 17-2-90-96</a></p>
   </div>
    
    </div><!-- Row -->

</div><!-- Container -->
</body>

</html>