<?php
require_once 'Conexion.php';

class User_Comentarios
{
 
private $con;

public function __construct()
{
 $this->con = Conexion::singleton_conexion();   
}

//---------------------------------------------------------Mostrar los datos
public function show_data($id= null) 
{   
    try{
$sql ="SELECT * FROM comentarios,cliente WHERE cliente_id_Cliente=id_Cliente  AND aprob_comentario='aprobado' ORDER BY id_comentario DESC LIMIT 5";

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