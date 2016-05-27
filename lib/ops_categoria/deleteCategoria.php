<?php
session_start();
include_once '../class/Categoria.php';

$id_Categoria =$_POST['id'];

$cat= new Categoria();
$cat->del_data($id_Categoria);

header("Location: ../../administrador/categorias.php");