<?php
session_start();
include_once '../class/Comentarios.php';
$com= new Comentarios();
       
          $id_comentario=NULL;
          $cliente_id_Cliente=$_POST['cliente_id_Cliente'];
          $com_comentario=$_POST['com_comentario'];
          $time = time();
          $date_comentario= date("Y-m-d H:i:s", $time);
          $aprob_comentario="oculto";
          

$com->set_data($id_comentario,$cliente_id_Cliente,$com_comentario,$date_comentario, $aprob_comentario);
$com->add_data();

header("Location: ../../comentarios.php");
