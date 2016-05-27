<?php
session_start();
include_once '../class/Productos.php';

$id_producto =$_POST['id'];

$prov= new Productos();
$prov->del_data($id_producto);

header("Location: ../../administrador/productos.php");