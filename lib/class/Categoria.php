<?php
require_once 'Conexion.php';

class Categoria
{
 
private $con;
private $id_Categoria;
private $nom_categoria;
private $desc_categoria;

public function __construct()
{
 $this->con = Conexion::singleton_conexion();   
}
//---------------------------------------------------------se pasan las variables recibidas a locales
    public function set_data($id_Categoria,$nom_categoria,$desc_categoria)
    {
        $this->id_Categoria=$id_Categoria;
        $this->nom_categoria=$nom_categoria;
        $this->desc_categoria=$desc_categoria;
    }

//---------------------------------------------------------Mostrar los datos
public function show_data($id= null) 
{   
    try{
$sql ="SELECT * FROM categoria";
    
if($id != NULL)
{
$sql.=" WHERE id_Categoria = ?";
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
         if($this->id_Categoria!=NULL) //Identificar si llega un ID nulo o declarado
         {
  $sql="UPDATE categoria set nom_categoria=?,desc_categoria=? WHERE id_Categoria = ?";
             
         }else{
  $sql="INSERT into categoria Values(0,?,?)";
         }
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->nom_categoria);
        $consulta->bindParam(2,$this->desc_categoria);  
            if($this->id_Categoria!=null)//Se asigna el valor del ID si esta declarado
            {
            $consulta->bindParam(3,$this->id_Categoria);  
            }
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
            
        $sql="DELETE FROM categoria where id_Categoria = ?";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$id_Categoria);
        $consulta->execute();
        $this->con=null;
        
        
        }catch(PDOException $e)
        {
        print "Error: ".$e->getMessage();   
        } 
    }
    
}