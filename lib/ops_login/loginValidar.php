<?php
session_start();
include_once '../class/Cliente.php';

$cli = new Cliente();

$cor_cliente = $_POST['cor_cliente'];
$pass_cliente = $_POST['pass_cliente'];

$return=$cli->login_data($cor_cliente, $pass_cliente);

if($return!=false){
while($datos=$return->fetchObject())
{
   $_SESSION['id_Cliente']=$datos->id_Cliente;
   $_SESSION['nom_cliente']=$datos->nom_cliente;
   $_SESSION['cor_cliente']=$datos->cor_cliente;
   $_SESSION['niv_cliente']=$datos->niv_cliente;
   $_SESSION['sesion']="true";
    
}
      header("Location: ../../administrador/productos.php");
}else{
     header("Location: ../../login.php");
}
     