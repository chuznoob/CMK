<?php
session_start();
include_once '../class/Comentarios.php';

$id_comentario =$_POST['id'];
$aprob =$_POST['aprob_comentario'];

if($aprob=="oculto")
{
$aprob_comentario="aprobado";
}else{
$aprob_comentario="oculto";  
}

$com= new Comentarios();
$com->change_data($id_comentario,$aprob_comentario);

header("Location: ../../administrador/comentarios.php");