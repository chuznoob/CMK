<?php
session_start();


/*--Agrega, Inicia el primer producto,(lo detecta por su ID), y pone todos 
los datos en el array carroC*/

if (isset($_POST['id_producto'])) { 
$id_producto=$_POST['id_producto'];
$nom_producto=$_POST['nom_producto'];
$em_proveedor=$_POST['em_proveedor']; 
$nom_categoria=$_POST['nom_categoria']; 
$pre_producto=$_POST['pre_producto']; 
$can_producto=$_POST['can_producto']; 
$cantidad=$_POST['cantidad'];

$carroC[]=array('id_producto'=>$id_producto,
                'nom_producto'=>$nom_producto,
                'em_proveedor'=>$em_proveedor,
                'nom_categoria'=>$nom_categoria,
                'pre_producto'=>$pre_producto,
                'can_producto'=>$can_producto,
                'cantidad'=>$cantidad );
}
/*-- Fin de Agrega */




/*Actualizar,solo se inicia si esta iniciada la sesion "carroS" */

if (isset($_SESSION['carroS'])) { 

   $carroC =$_SESSION['carroS'] ;
    /*El contenido de la sesion(carroS),
                         (una nueva sesion que guardara los productos (esta al final de los PHP's) ↓↓↓) 
                             se pone en el array CarroC*/

if (isset($_POST['id_producto'])) {  /*Si llego un Id en el POST, el primero ↑↑↑, hara el registro, si no, no hara nada*/

$id_producto=$_POST['id_producto'];
$nom_producto=$_POST['nom_producto'];
$em_proveedor=$_POST['em_proveedor']; 
$nom_categoria=$_POST['nom_categoria']; 
$pre_producto=$_POST['pre_producto']; 
$can_producto=$_POST['can_producto']; 
$cantidad=$_POST['cantidad'];

$pos= -1; /*Se declara la variable con un valor de -1, para ocultar registros de la BD*/

for ($i=0; $i < count($carroC); $i++) { /*Empieza la funcion que recorre el arreglo para buscar 
	                                   si existe el producto  |count($carroC) tiene los productos| */

if ($id_producto == $carroC[$i]['id_producto']) { /* Si el id enviado ↑↑ con los datos en el POST es igual a alguno que ya exista 
                                   esto mediante el 'For' que recorre el arreglo carroC */

	$pos = $i;   
    /*Si el producto ya existe se le asignara el valor -1 a la posicion*/
}
}
if ($pos != -1) { /*Si la posicion es diferente de -1, osea que el articulo existe*/

$addCanti = $carroC[$pos]['cantidad'] + $cantidad;
$carroC[$pos]= array('id_producto'=>$id_producto,
                'nom_producto'=>$nom_producto,
                'em_proveedor'=>$em_proveedor,
                'nom_categoria'=>$nom_categoria,
                'pre_producto'=>$pre_producto,
                'can_producto'=>$can_producto,
                'cantidad'=>$addCanti );
/*Si pasa, la cantidad del producto encontrado en el array carroC se suma a la nueva cantidad y esto de guarda en $addCanti
asi se declara un nuevo array carroC con el parametro 'pos' ||Donde 'pos' es la posicion del arreglo que se va a modificar ||
a este se le actualizan los datos entre ellos $addCanti, el cual agregara la nueva cantidad de productos encontrados*/

}else{ 
$carroC[]=array('id_producto'=>$id_producto,
                'nom_producto'=>$nom_producto,
                'em_proveedor'=>$em_proveedor,
                'nom_categoria'=>$nom_categoria,
                'pre_producto'=>$pre_producto,
                'can_producto'=>$can_producto,
                'cantidad'=>$cantidad );
/*Si no pasa, osea que el producto no exista en carroC, este 
se agrega al array carroC ya que no lleva un parametro   || $carroC['vacio'] ||
*/
}

}
}

if (isset($carroC)) {

/* aqui se toma el valor declarado en las lineas: 39 a 79 . de el array carroC , y se pasa a la sesion carroS*/
	$_SESSION['carroS']=$carroC;
	
}


if (isset($_POST['idp'])) { 
	/* Esta parte es del actualizador de productos en el carrito, sirve para actualizar la cantidad
	 de procductos a comprar, al cambiar la cantidad y pulsar el boton actualizar se envia el ID del
	 producto, este se guarda en $IDP...($idp = $_POST['idp'];), la nueva cantidad en
	  $cantidad2...$cantidad2 = $_POST['cantidad2']; y despues se actualiza el valor del array $_SESSION['carroS']
	  con la nueva cantidad asignada, $_SESSION['carroS'][$i]['cantidad'] = $cantidad2; */ 
	
	$idp = $_POST['idp'];
    $stocker = $_POST['stocker'];
	$cantidad2 = $_POST['cantidad2'];

  if ($cantidad2>$stocker) {
    $_SESSION['carroS'][$idp]['cantidad'] = $stocker;
  }else{
      if($cantidad2<=0){
	$_SESSION['carroS'][$idp] = NULL;  
      }else{
          if($cantidad2==0){
            $_SESSION['carroS'][$idp] = NULL;  
          }else{
      $_SESSION['carroS'][$idp]['cantidad'] = $cantidad2;  
 }
}
}
}

if (isset($_POST['ide'])) {
	/* Esta parte es la eliminacion de un producto, la forma de eliminarlo es poniendo todos los valores 
	de ese arreglo en NULL, para esto recivimos la pocision del arreglo ($i) en el POST 'ide' y lo pasamos a 
	una variable $ide... $ide = $_POST['ide']; con esto tomamos el array $carroC en el parametro que elegimos ($ide)
	y lo ponemos en un valor de NULL...  $_SESSION['carroS'][$ide] = NULL; 

	(formulario en la linea: 282 )*/

	$ide = $_POST['ide'];
		 $_SESSION['carroS'][$ide] = NULL;
							  
}


header("Location:../../administrador/carrito_Venta.php");
