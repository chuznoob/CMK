<?php
session_start();
include_once '../class/Proveedores.php';

$id_proveedor =$_POST['id'];

$prov= new Proveedores();
$prov->del_data($id_proveedor);

header("Location: ../../administrador/proveedores.php");