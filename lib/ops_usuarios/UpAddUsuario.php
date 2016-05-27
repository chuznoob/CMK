<?php
session_start();
include_once '../class/Cliente.php';
$cli= new Cliente();

       
          $nom_cliente=$_POST['nom_cliente'];
          $cor_cliente=$_POST['cor_cliente'];
          $tel_cliente=$_POST['tel_cliente'];
          $dir_cliente=$_POST['dir_cliente'];
          $pass=$_POST['pass_cliente'];
          $niv_cliente=$_POST['niv_cliente'];
          $estado_cliente=$_POST['estado_cliente'];


 if(isset($_POST['id_Cliente']))
 {
 $id_Cliente=$_POST['id_Cliente'];
 $pass_old=$_POST['pass_cliente_OLD'];
            if($pass==$pass_old)
            {
              $pass_cliente=$pass;
            }else{
             $pass_cliente=md5($pass);
            }
 }else{
 $id_Cliente=NULL;
 $pass_cliente=md5($pass);
 }  

$cli->set_data($id_Cliente,$nom_cliente,$cor_cliente, $tel_cliente,$dir_cliente,$pass_cliente,$niv_cliente,$estado_cliente);
$cli->add_data();

header("Location: ../../administrador/usuarios.php");