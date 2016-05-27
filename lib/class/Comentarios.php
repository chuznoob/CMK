<?php
require_once 'Conexion.php';

class Comentarios
{
 
private $con;
private $id_comentario;
private $cliente_id_Cliente;
private $com_comentario;
private $date_comentario;
private $aprob_comentario;

public function __construct()
{
 $this->con = Conexion::singleton_conexion();   
}
//---------------------------------------------------------se pasan las variables recibidas a locales
    public function set_data($id_comentario,$cliente_id_Cliente,$com_comentario,$date_comentario, $aprob_comentario)
    {
        $this->id_comentario=$id_comentario;
        $this->cliente_id_Cliente=$cliente_id_Cliente;
        $this->com_comentario=$com_comentario;
        $this->date_comentario=$date_comentario;
        $this->aprob_comentario=$aprob_comentario;
    }

//---------------------------------------------------------Mostrar los datos
public function show_data($id= null) 
{   
    try{
$sql ="SELECT * FROM comentarios,cliente WHERE cliente_id_Cliente=id_Cliente ";
$sql.="ORDER BY id_comentario DESC";
if($id != NULL)
{
$sql.=" AND id_comentario = ? ORDER BY id_comentario DESC";
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

//---------------------------------------------------------Borrar datos  
    public function del_data($id_comentario)
    {
        try{
            
        $sql="DELETE FROM comentarios where id_comentario = ?";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$id_comentario);
        $consulta->execute();
        $this->con=null;
        
        
        }catch(PDOException $e)
        {
        print "Error: ".$e->getMessage();   
        } 
    }

//---------------------------------------------------------Cambiar estado  
 public function change_data($id_comentario,$aprob_comentario)
 {
     try
     {
     $sql="UPDATE comentarios set aprob_comentario=? WHERE id_comentario = ?";
     $consulta = $this->con->prepare($sql);
     $consulta->bindParam(1,$aprob_comentario);
     $consulta->bindParam(2,$id_comentario);
     $consulta->execute();
     $this->con=null;
     }catch(PDOException $e)
        {
        print "Error: ".$e->getMessage();   
        } 
 }
    
//---------------------------------------------------------Agregar o modificar los datos
   public function add_data()
   {
    try
      {
  
  $sql="INSERT into comentarios Values(0,?,?,?,?)";
         
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->cliente_id_Cliente);
        $consulta->bindParam(2,$this->com_comentario);
        $consulta->bindParam(3,$this->date_comentario);
        $consulta->bindParam(4,$this->aprob_comentario);
        $consulta->execute();
        $this->con=null;  
      }catch(PDOException $e)//mensaje de error en caso de fallo
      {
      print "Error: ".$e->getMessage();   
      }  
   }
//---------------------------------------------------------------Badges
     public function badges() 
{   
    try{
$sql ="SELECT * FROM comentarios WHERE aprob_comentario='oculto'";

    $consulta = $this->con->prepare($sql);       
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