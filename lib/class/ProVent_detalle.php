<?php
require_once 'Conexion.php';

class ProVent_detalle
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
//---------------------------------------------------------se pasan las variables recibidas a locales
    public function set_data($id_proVent,$id_Producto,$id_Compras,$pvdet_cantidad)
    {
        $this->id_proVent=$id_proVent;
        $this->id_Producto=$id_Producto;
        $this->id_Compras=$id_Compras;
        $this->pvdet_cantidad=$pvdet_cantidad;
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
//---------------------------------------------------------Agregar o modificar los datos
   public function add_data()
   {
    try
      {
       
  $sql="INSERT into provent_detalle Values(0,?,?,?)";
         
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->id_Producto);
        $consulta->bindParam(2,$this->id_Compras);  
        $consulta->bindParam(3,$this->pvdet_cantidad);  
        
        $consulta->execute();
        $this->con=null; 
    
      }catch(PDOException $e)//mensaje de error en caso de fallo
      {
      print "Error: ".$e->getMessage();   
      }  
   }
    

//---------------------------------------------------------Borrar datos  
    public function del_data($id_Categoria)
    {
        try{
            
        $sql="DELETE FROM provent_detalle where id_proVent = ?";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$id_proVent);
        $consulta->execute();
        $this->con=null;
        
        
        }catch(PDOException $e)
        {
        print "Error: ".$e->getMessage();   
        } 
    }
    
}