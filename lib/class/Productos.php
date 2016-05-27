<?php
require_once 'Conexion.php';

class Productos
{
 
private $con;
private $id_producto;
private $proveedores_id_proveedor;
private $categoria_id_Categoria;
private $nom_producto;
private $pre_producto;
private $can_producto;

public function __construct()
{
 $this->con = Conexion::singleton_conexion();   
}
//---------------------------------------------------------se pasan las variables recibidas a locales
    public function set_data($id_producto,$proveedores_id_proveedor,$categoria_id_Categoria,$nom_producto,$pre_producto,$can_producto)
    {
        $this->id_producto=$id_producto;
        $this->proveedores_id_proveedor=$proveedores_id_proveedor;
        $this->categoria_id_Categoria=$categoria_id_Categoria;
        $this->nom_producto=$nom_producto;
        $this->pre_producto=$pre_producto;
        $this->can_producto=$can_producto;
    }

//---------------------------------------------------------Mostrar los datos
public function show_data($id= null) 
{   
    try{
$sql ="Select * from categoria,proveedores,productos where categoria_id_Categoria=id_categoria and proveedores_id_proveedor=id_proveedor";
    
if($id != NULL)
{
$sql.=" AND id_producto = ?";
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
         if($this->id_producto!=NULL) //Identificar si llega un ID nulo o declarado
         {
  $sql="UPDATE productos set proveedores_id_proveedor=?,categoria_id_Categoria=?,nom_producto=?,pre_producto=?,can_producto=? WHERE id_producto = ?";
             
         }else{
  $sql="INSERT into productos Values(0,?,?,?,?,?)";
         }
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->proveedores_id_proveedor);
        $consulta->bindParam(2,$this->categoria_id_Categoria);
        $consulta->bindParam(3,$this->nom_producto);
        $consulta->bindParam(4,$this->pre_producto);
        $consulta->bindParam(5,$this->can_producto);   
            if($this->id_producto!=null)//Se asigna el valor del ID si esta declarado
            {
            $consulta->bindParam(6,$this->id_producto);  
            }
        $consulta->execute();
        $this->con=null;        
      }catch(PDOException $e)//mensaje de error en caso de fallo
      {
      print "Error: ".$e->getMessage();   
      }  
   }
//---------------------------------------------------------Borrar datos  
    public function del_data($id_producto)
    {
        try{
            
        $sql="DELETE FROM productos where id_producto = ?";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$id_producto);
        $consulta->execute();
        $this->con=null;
          
        }catch(PDOException $e)
        {
        print "Error: ".$e->getMessage();   
        } 
    }
    
}