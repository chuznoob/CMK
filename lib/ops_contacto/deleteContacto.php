<?php
session_start();
include_once '../class/Contacto.php';

$id_contacto =$_POST['id'];

$com_cm= new Contacto();
$com_cm->del_data($id_contacto);

header("Location: ../../administrador/contactos_cm.php");