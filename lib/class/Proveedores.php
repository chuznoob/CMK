<?php
require_once 'Conexion.php';

class Proveedores
{
 
private $con;
private $id_proveedor;
private $em_proveedor;
private $cont_proveedor;
private $tel_proveedor;
private $cor_proveedor;
private $dir_proveedor;

public function __construct()
{
 $this->con = Conexion::singleton_conexion();   
}
//---------------------------------------------------------se pasan las variables recibidas a locales
    public function set_data($id_proveedor,$em_proveedor,$cont_proveedor,$tel_proveedor,$cor_proveedor,$dir_proveedor)
    {
        $this->id_proveedor=$id_proveedor;
        $this->em_proveedor=$em_proveedor;
        $this->cont_proveedor=$cont_proveedor;
        $this->tel_proveedor=$tel_proveedor;
        $this->cor_proveedor=$cor_proveedor;
        $this->dir_proveedor=$dir_proveedor;
    }

//---------------------------------------------------------Mostrar los datos
public function show_data($id= null) 
{   
    try{
$sql ="SELECT * FROM proveedores";
    
if($id != NULL)
{
$sql.=" WHERE id_proveedor = ?";
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
         if($this->id_proveedor!=NULL) //Identificar si llega un ID nulo o declarado
         {
  $sql="UPDATE proveedores set em_proveedor=?,cont_proveedor=?,tel_proveedor=?,cor_proveedor=?,dir_proveedor=? WHERE id_proveedor = ?";
             
         }else{
  $sql="INSERT into proveedores Values(0,?,?,?,?,?)";
         }
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->em_proveedor);
        $consulta->bindParam(2,$this->cont_proveedor);
        $consulta->bindParam(3,$this->tel_proveedor);
        $consulta->bindParam(4,$this->cor_proveedor);
        $consulta->bindParam(5,$this->dir_proveedor);   
            if($this->id_proveedor!=null)//Se asigna el valor del ID si esta declarado
            {
            $consulta->bindParam(6,$this->id_proveedor);  
            }
        $consulta->execute();
        $this->con=null;        
      }catch(PDOException $e)//mensaje de error en caso de fallo
      {
      print "Error: ".$e->getMessage();   
      }  
   }
//---------------------------------------------------------Borrar datos  
    public function del_data($id_proveedor)
    {
        try{
            
        $sql="DELETE FROM proveedores where id_proveedor = ?";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$id_proveedor);
        $consulta->execute();
        $this->con=null;
          
        }catch(PDOException $e)
        {
        print "Error: ".$e->getMessage();   
        } 
    }
    
}