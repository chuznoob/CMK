<?php
session_start();

 $id_Compras=NULL;
 $cliente_id_Cliente=$_POST['cliente_id_Cliente']; 
 $fech_compra=$_POST['fech_compra']; 
 $mf_compras=$_POST['mf_compras']; 
 $desc_por_compra=$_POST['porcentaje'];
 $desc_compra=$_POST['desc_compra'];


    $_SESSION['carroS2']=$_SESSION['carroS'];
    $_SESSION['carroS3']=array(
"cliente_id_Cliente"=>$cliente_id_Cliente,
"fech_compra"=>$fech_compra);
    $_SESSION['carroD'] = array(
"cliente_id_Cliente"=>$cliente_id_Cliente,
"fech_compra"=>$fech_compra,
"desc_por_compra"=>$desc_por_compra,
"desc_compra"=>$desc_compra,
"mf_compras"=>$mf_compras
);

include_once '../class/Compras.php';
include_once '../class/ProVent_detalle.php';
$com= new Compras();

$com->set_data($id_Compras,$cliente_id_Cliente,$fech_compra,$mf_compras,$desc_compra);
$com->add_data();

//Rellenado del detalle de compra
 //Se obtiene el ultimo ID de compra registrado
$comp= new Compras();
$dataComp= $comp->show_Lastdata(NULL);
      
      while($data=$dataComp->fetchObject())
      {
          $last_ID= $data->id_Compras;
      }


if(isset($_SESSION['carroS'])){
 //Comprobamos que exista la sesion

  for($i=0; $i<count($_SESSION['carroS']); $i++){
//Recorremos el array para separar los productos en variables.

$pvd= new ProVent_detalle();

          
   $id_proVent =  NULL;
   $id_Producto = $_SESSION['carroS'][$i]['id_producto'];
   $id_Compras = $last_ID;
   $pvdet_cantidad = $_SESSION['carroS'][$i]['cantidad'];
          
$pvd->set_data($id_proVent,$id_Producto,$id_Compras,$pvdet_cantidad);
$pvd->add_data();
       
  }
   unset($_SESSION['carroS']);
 header("Location:../../administrador/punto_deVenta.php"); 
  }

?>
