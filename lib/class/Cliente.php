<?php
require_once 'Conexion.php';

class Cliente
{
 
private $con;
private $id_Cliente;
private $nom_cliente;
private $cor_cliente;
private $tel_cliente;
private $dir_cliente;
private $pass_cliente;
private $niv_cliente;
private $estado_cliente;

public function __construct()
{
 $this->con = Conexion::singleton_conexion();   
}

//---------------------------------------------------------se pasan las variables recibidas a locales
    public function set_data($id_Cliente,$nom_cliente,$cor_cliente,$tel_cliente,$dir_cliente,$pass_cliente,$niv_cliente,$estado_cliente)
    {
        $this->id_Cliente=$id_Cliente;
        $this->nom_cliente=$nom_cliente;
        $this->cor_cliente=$cor_cliente;
        $this->tel_cliente=$tel_cliente;
        $this->dir_cliente=$dir_cliente;
        $this->pass_cliente=$pass_cliente;
        $this->niv_cliente=$niv_cliente;
        $this->estado_cliente=$estado_cliente;
    }
    
    
//---------------------------------------------------------Mostrar los datos
public function show_data($id= null)
{   
    try{
$sql ="SELECT * FROM cliente";
    
if($id != NULL)//si llega un ud en especial se hace la asingacion del orden
{
$sql.=" WHERE id_Cliente = ?";
}
    $consulta = $this->con->prepare($sql);
   if($id != NULL)
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
         if($this->id_Cliente!=NULL)//Identificar si llega un ID nulo o declarado
         {
             $sql="UPDATE cliente set nom_cliente= ?,cor_cliente= ?,tel_cliente= ?, dir_cliente= ?, pass_cliente= ?, niv_cliente= ?, estado_cliente= ? WHERE id_Cliente = ?";
             
         }else{
            $sql="INSERT into cliente Values(0,?,?,?,?,?,?,?)";
         }
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->nom_cliente);
        $consulta->bindParam(2,$this->cor_cliente);
        $consulta->bindParam(3,$this->tel_cliente);
        $consulta->bindParam(4,$this->dir_cliente);
        $consulta->bindParam(5,$this->pass_cliente);
        $consulta->bindParam(6,$this->niv_cliente);
        $consulta->bindParam(7,$this->estado_cliente);
        
        if($this->id_Cliente!=null)//Se asigna el valor del ID si esta declarado
        {
        $consulta->bindParam(8,$this->id_Cliente);  
        }
        $consulta->execute();
        $this->con=null;
    
      }catch(PDOException $e)//mensaje de error en caso de fallo
      {
      print "Error: ".$e->getMessage();   
      }  
   }
    
//---------------------------------------------------------Borrar datos
    public function del_data($id_Cliente)
    {
        try{
            
        $sql="DELETE FROM cliente where id_Cliente = ?";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$id_Cliente);
        $consulta->execute();
        $this->con=null;
          
        }catch(PDOException $e)
        {
        print "Error: ".$e->getMessage();   
        } 
        
        
    }
       
//---------------------------------------------------------Validar el Login
       public function login_data($cor_cliente, $pass_cliente)
    {
        try
        {
         $sql="SELECT * FROM cliente WHERE cor_cliente = ? AND pass_cliente = ?";
            $consulta = $this->con->prepare($sql);
                $consulta->bindParam(1,$cor_cliente);
                $pass=md5($pass_cliente);
                $consulta->bindParam(2,$pass);
                $consulta->execute();
                $this->con = null;

            
    if($consulta->rowCount()==1)//mostrar o no el resultado de la consulta
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