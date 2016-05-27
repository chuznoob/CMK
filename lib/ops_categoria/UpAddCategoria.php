<?php
session_start();
include_once '../class/Categoria.php';
$cat= new Categoria();

       
        
          $nom_categoria=$_POST['nom_categoria'];
          $desc_categoria=$_POST['desc_categoria'];

 if(isset($_POST['id_Categoria']))
 {
   $id_Categoria=$_POST['id_Categoria'];
 }else{
 $id_Categoria=NULL;
 }  

$cat->set_data($id_Categoria,$nom_categoria,$desc_categoria);
$cat->add_data();

header("Location: ../../administrador/categorias.php");