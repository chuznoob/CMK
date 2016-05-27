<?php
session_start();
include_once '../class/Proveedores.php';
$prov= new Proveedores();

       
          $em_proveedor=$_POST['em_proveedor'];
          $cont_proveedor=$_POST['cont_proveedor'];
          $tel_proveedor=$_POST['tel_proveedor'];
          $cor_proveedor=$_POST['cor_proveedor'];
          $dir_proveedor=$_POST['dir_proveedor'];

 if(isset($_POST['id_proveedor']))
 {
 $id_proveedor=$_POST['id_proveedor'];
 }else{
 $id_proveedor=NULL;
 }  

$prov->set_data($id_proveedor,$em_proveedor,$cont_proveedor,$tel_proveedor,$cor_proveedor,$dir_proveedor);
$prov->add_data();

header("Location: ../../administrador/proveedores.php");