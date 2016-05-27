<?php
session_start();
include_once '../class/Contacto.php';

$id_contacto =$_POST['id'];
$status_contacto =$_POST['status_contacto'];

if($status_contacto=="No-Leido")
{
$status_contacto="Leido";
}else{
$status_contacto="No-Leido";  
}

$com_cm= new Contacto();
$com_cm->change_data($id_contacto,$status_contacto);

header("Location: ../../administrador/contactos_cm.php");