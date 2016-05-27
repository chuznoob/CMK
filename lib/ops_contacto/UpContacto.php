<?php
session_start();
include_once '../class/Contacto.php';
$com_cm= new Contacto();
       
          $id_contacto=NULL;
          $cliente_id_Cliente=$_POST['cliente_id_Cliente'];
          $asunto_contacto=$_POST['asunto_contacto'];
          $time = time();
          $date_contacto= date("Y-m-d H:i:s", $time);
          $text_contacto=$_POST['text_contacto'];
          $status_contacto="No-Leido";



$com_cm->set_data($id_contacto,$cliente_id_Cliente,$asunto_contacto,$date_contacto, $text_contacto,$status_contacto);
$com_cm->add_data();

header("Location:../../contacto.php");
