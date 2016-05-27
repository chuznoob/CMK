<!DOCTYPE html>
<html lang="es ">
<head>
<link rel="stylesheet" href="../../css/print.css">
</head>
<body>

<table class="title">
  <tr>
    <td class="log"><img src="../../herramientas/img/logo-pdf.png" alt=""></td>
    <td class="ltitle"> Reporte de venta</td>
  </tr>
</table>

    <table class="center">
                <tr>
               <td colspan="5"><p>Compra:</p></td> 
                </tr> 
                      <tr>
                        <td class="cth cl">Nombre</td>
                        <td class="cth">Categoria</td>
                        <td class="cth">Precio</td>
                        <td class="cth">Cantidad de Compra</td>
                        <td class="cth cr">Subtotal</td>
                      </tr>
              
       
       <?php 
for ($i=0; $i < count($_SESSION['carroS2']); $i++) { 

if ($_SESSION['carroS2'][$i] != NULL) {
?>
                        <tr class='odd'>
                           <td class="ctd"><?php echo $_SESSION['carroS2'][$i]['nom_producto']?></td>
                           <td class="ctd"><?php echo $_SESSION['carroS2'][$i]['nom_categoria']?></td>
                           <td class="ctd"><?php echo $_SESSION['carroS2'][$i]['pre_producto']?></td>
                           <td class="ctd"><?php echo $_SESSION['carroS2'][$i]['cantidad']?></td>                
<?php 
$sT = $_SESSION['carroS2'][$i]['pre_producto'] * $_SESSION['carroS2'][$i]['cantidad']; 
?>
                           <td class="ctd">$<?php echo $sT ?></td>
                       
                        </tr>
<?php } }?>
    </table>
    
      
        <table class="user">
                <tr>
               <td colspan="4"><p>Detalles:</p></td> 
                </tr> 
                 
        <tr class="odd">
            <td class="uth">ID de Cliente</td>
            <td class="uth">Fecha</td>
            <td class="uth">Descuento de Compra</td>
            <td class="uth">Monto Final de Compra</td>
        </tr>
        
       <?php 
extract($_SESSION['carroD']);
?>
       
        <tr class="odd">
            <td class="utd"><?php echo $cliente_id_Cliente; ?></td>
            <td class="utd"><?php echo  $fech_compra; ?></td>
            <td class="utd"><?php echo  $desc_por_compra; ?>% = $<?php echo $desc_compra; ?></td> <!-- Arriba  -->
            <td class="utd"><?php echo  $mf_compras; ?></td>
        </tr>
         </table>
         
        <table class="foot">
        <tr>
            <td class="utd">Telefono: <br>(417)17-2-90-96</td>
            <td class="utd">Ubicación: <br>Acámbaro,Gunanajuato,México</td>
            <td class="textcenter">Direccion: <br>Guadalupe Victoria #333-A</td>
        </tr>
         </table>
</body>
</html>