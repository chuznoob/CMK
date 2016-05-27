<?php
session_start();
unset($_SESSION['carroS']);

header("Location:../../administrador/punto_deVenta.php");