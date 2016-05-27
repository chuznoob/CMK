<?php
session_start();
include_once '../class/User_Cliente.php';
$cli= new User_Cliente();

          $id_Cliente=NULL;
          $nom_cliente=$_POST['nom_cliente'];
          $pass=$_POST['pass_cliente'];
          $cor_cliente=$_POST['cor_cliente'];
          $tel_cliente=$_POST['tel_cliente'];
          $dir_cliente=$_POST['dir_cliente'];
          $niv_cliente="cliente";
          $estado_cliente="activo";

          $pass_cliente=md5($pass);
           

$cli->set_data($id_Cliente,$nom_cliente,$cor_cliente, $tel_cliente,$dir_cliente,$pass_cliente,$niv_cliente,$estado_cliente);
$cli->add_data();

header("Location: ../../index.php");