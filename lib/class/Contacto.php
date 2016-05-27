<?php
require_once 'Conexion.php';

class Contacto
{
 
private $con;
private $id_contacto;
private $cliente_id_Cliente;
private $asunto_contacto;
private $date_contacto;
private $text_contacto;
private $status_contacto;

public function __construct()
{
 $this->con = Conexion::singleton_conexion();   
}
//---------------------------------------------------------se pasan las variables recibidas a locales
    public function set_data($id_contacto,$cliente_id_Cliente,$asunto_contacto,$date_contacto, $text_contacto,$status_contacto)
    {
        $this->id_contacto=$id_contacto;
        $this->cliente_id_Cliente=$cliente_id_Cliente;
        $this->asunto_contacto=$asunto_contacto;
        $this->date_contacto=$date_contacto;
        $this->text_contacto=$text_contacto;
        $this->status_contacto=$status_contacto;
    }

//---------------------------------------------------------Mostrar los datos
public function show_data($id= null) 
{   
    try{
$sql ="SELECT * FROM contacto,cliente WHERE cliente_id_Cliente=id_Cliente ";
$sql.="ORDER BY id_contacto DESC";
if($id != NULL)
{
$sql.=" AND id_contacto = ? ORDER BY id_contacto DESC";
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
    public function del_data($id_contacto)
    {
        try{
            
        $sql="DELETE FROM contacto where id_contacto = ?";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$id_contacto);
        $consulta->execute();
        $this->con=null;
        
        
        }catch(PDOException $e)
        {
        print "Error: ".$e->getMessage();   
        } 
    }

//---------------------------------------------------------Cambiar estado  
 public function change_data($id_contacto,$status_contacto)
 {
     try
     {
     $sql="UPDATE contacto set status_contacto=? WHERE id_contacto = ?";
     $consulta = $this->con->prepare($sql);
     $consulta->bindParam(1,$status_contacto);
     $consulta->bindParam(2,$id_contacto);
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
  
  $sql="INSERT into contacto Values(0,?,?,?,?,?)";
         
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->cliente_id_Cliente);
        $consulta->bindParam(2,$this->asunto_contacto);
        $consulta->bindParam(3,$this->date_contacto);
        $consulta->bindParam(4,$this->text_contacto);
        $consulta->bindparam(5,$this->status_contacto);
        $consulta->execute();
        $this->con=null;  

      }catch(PDOException $e)//mensaje de error en caso de fallo
      {
      print "Error: ".$e->getMessage();   
      }  
   }
//----------------------------------------------------------------badges
public function badges() 
{   
    try{
$sql ="SELECT * FROM contacto WHERE status_contacto='No-Leido' ";

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