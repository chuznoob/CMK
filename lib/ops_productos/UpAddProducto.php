<?php
session_start();
include_once '../class/Productos.php';
$prod= new Productos();

       
          $proveedores_id_proveedor=$_POST['proveedores_id_proveedor'];
          $categoria_id_Categoria=$_POST['categoria_id_Categoria'];
          $nom_producto=$_POST['nom_producto'];
          $pre_producto=$_POST['pre_producto'];
          $can_producto=$_POST['can_producto'];

 if(isset($_POST['id_producto']))
 {
 $id_producto=$_POST['id_producto'];
 }else{
 $id_producto=NULL;
 }  

$prod->set_data($id_producto,$proveedores_id_proveedor,$categoria_id_Categoria,$nom_producto,$pre_producto,$can_producto);
$prod->add_data();

header("Location: ../../administrador/productos.php");