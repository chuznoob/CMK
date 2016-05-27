<?php
session_start();
include_once '../class/Cliente.php';

$id_Cliente =$_POST['id'];

$cli= new Cliente();
$cli->del_data($id_Cliente);

header("Location: ../../administrador/usuarios.php");