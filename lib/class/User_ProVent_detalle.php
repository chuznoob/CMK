<?php
require_once 'Conexion.php';

class User_ProVent_detalle
{
 
private $con;
private $id_proVent;
private $id_Producto;
private $id_Compras;
private $pvdet_cantidad;
    
public function __construct()
{
 $this->con = Conexion::singleton_conexion();   
}

//---------------------------------------------------------Mostrar los datos
public function show_data($id= null) 
{   
    try{
$sql ="SELECT * FROM provent_detalle,productos where productos.id_Producto=provent_detalle.id_producto";
    
if($id != NULL)
{
$sql.=" AND id_Compras = ?";
}
    $consulta = $this->con->prepare($sql);       
        if($id != NULL) //si llega un ud en especial se hace la asingacion del orden
        {
        $consulta->bindParam(1,$id);
        }
    $consulta->execute();
    $this->con=NULL;//cierra la conexion

        
        if($consulta->rowCount()>0)//mostrar o no el resultado de la consulta
        {
            return $consulta;
        }else{
            return false;
        }
       
    }catch(PDOException $e){//mensaje de error en caso de fallo
      print "Error: ".$e->getMessage();   
    }
}
}
