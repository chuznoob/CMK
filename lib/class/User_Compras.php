<?php
require_once 'Conexion.php';

class User_Compras
{
 
private $con;
private $id_Compras;
private $cliente_id_Cliente;
private $fech_compra;
private $mf_compras;
private $desc_compra;
public function __construct()
{
 $this->con = Conexion::singleton_conexion();   
}

//---------------------------------------------------------Mostrar los datos
public function show_data($id= null) 
{   
    try{
$sql ="Select * from compras,cliente where cliente_id_Cliente=id_Cliente";
    
if($id != NULL)
{
$sql.=" AND cliente_id_Cliente = ?";
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