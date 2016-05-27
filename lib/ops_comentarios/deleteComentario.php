<?php
session_start();
include_once '../class/Comentarios.php';

$id_comentario =$_POST['id'];

$com= new Comentarios();
$com->del_data($id_comentario);

header("Location: ../../administrador/comentarios.php");