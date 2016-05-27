<?php
require_once 'Conexion.php';

class User_Cliente
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
    
 //---------------------------------------------------------Agregar los datos
   public function add_data()
   {
    try
      {
         
            $sql="INSERT into cliente Values(0,?,?,?,?,?,?,?)";
         
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->nom_cliente);
        $consulta->bindParam(2,$this->cor_cliente);
        $consulta->bindParam(3,$this->tel_cliente);
        $consulta->bindParam(4,$this->dir_cliente);
        $consulta->bindParam(5,$this->pass_cliente);
        $consulta->bindParam(6,$this->niv_cliente);
        $consulta->bindParam(7,$this->estado_cliente);
       
        $consulta->execute();
       
        
   $_SESSION['id_Cliente']= $this->con->last_Id();
   $_SESSION['nom_cliente']=$this->nom_cliente;
   $_SESSION['cor_cliente']=$this->cor_cliente;
   $_SESSION['niv_cliente']=$this->niv_cliente;
   $_SESSION['sesion']="true";
        
         $this->con=null;
        
      }catch(PDOException $e)//mensaje de error en caso de fallo
      {
      print "Error: ".$e->getMessage();   
      }  
   }
}