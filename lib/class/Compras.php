<?php
require_once 'Conexion.php';

class Compras
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
//---------------------------------------------------------se pasan las variables recibidas a locales
    public function set_data($id_Compras,$cliente_id_Cliente,$fech_compra,$mf_compras,$desc_compra)
    {
        $this->id_Compras=$id_Compras;
        $this->cliente_id_Cliente=$cliente_id_Cliente;
        $this->fech_compra=$fech_compra;
        $this->mf_compras=$mf_compras;
        $this->desc_compra=$desc_compra;
    }

//---------------------------------------------------------Mostrar los datos
public function show_data($id= null) 
{   
    try{
$sql ="Select * from compras,cliente where cliente_id_Cliente=id_Cliente";
    
if($id != 0)
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
//---------------------------------------------------------Agregar o modificar los datos
   public function add_data()
   {
    try
      {

  $sql="INSERT into compras Values(0,?,?,?,?)";
        
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->cliente_id_Cliente);
        $consulta->bindParam(2,$this->fech_compra);  
        $consulta->bindParam(3,$this->mf_compras);  
        $consulta->bindParam(4,$this->desc_compra);  

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
            
        $sql="DELETE FROM compras where id_Compras = ?";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$id_Compras);
        $consulta->execute();
        $this->con=null;
        
        
        }catch(PDOException $e)
        {
        print "Error: ".$e->getMessage();   
        } 
    }

//---------------------------------------------------------Mostrar ultimo registro
public function show_Lastdata($id= null) 
{   
    try{
$sql ="SELECT id_Compras FROM compras WHERE id_Compras = LAST_INSERT_ID();";
    
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