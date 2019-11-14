<?php
include("users.php");
  class DB{
    
    private $conexion;

    public function __construct(){
        $dsn = 'mysql:host=localhost;dbname=ecomerce';
        $user = "root";
        $pass = "";
        $opciones = array(
          PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
      );
        
        $this->conexion = new PDO($dsn,$user,$pass,$opciones);
      //   var_dump($this->conexion);
    }

    //Método creada para dar de alta un usuario en la base de datos que recibe como parámetro un "User" -->Users.php iuna clase usuario
    public function altaUsuario($usuario)
    {
      $unUsuario=new User();
      $unUsuario=$usuario;
      $consulta = $this->conexion->prepare("INSERT INTO ecomerce.usuarios (nombre_apellido,email,contrasenia,foto,nombre_usuario,estado_usuario) VALUES
                                                                   (:nombre1 ,:email1 ,:contrasenia,:foto,:nombreUsuario,:estado )");

      
        $consulta->bindValue(":nombre1",$unUsuario->nombreYApellido);
        $consulta->bindValue(":email1",$unUsuario->email);
        $consulta->bindValue(":contrasenia",password_hash($unUsuario->password,PASSWORD_DEFAULT));
        $consulta->bindValue(":foto",$unUsuario->foto);
        $consulta->bindValue(":nombreUsuario",$unUsuario->nombreDeUsuario);
        $consulta->bindValue(":estado",TRUE);
       
        $consulta->execute(); 
       // return $consulta->lastInsertId();
    }

    public function verPerfilDelUsuario($id){ 
      try{
        $consulta = $this->conexion->query("SELECT * FROM ecomerce.usuarios WHERE idUsuario = ". $id);
        $unUser= $consulta->fetch(PDO::FETCH_ASSOC);
        $usuario->id=$unUser["idUsuario"];                    
        $usuario->nombreYApellido=$unUser["nombre_apellido"];
        $usuario->email=$unUser["email"];
        $usuario->password=$unUser["contrasenia"];
        $usuario->foto= $unUser["foto"];
        $usuario->nombreDeUsuario= $unUser["nombre_usuario"];
        $usuario->estado=$unUser["estado_usuario"];
        return $usuario;
      }
      catch(Exception $e)
      {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
      }
    }

    function idByUsername($unUser,$unaPsw)
    {
      $usuario= new User();
     try{
      $consulta = $this->conexion->query("SELECT idUsuario,nombre_usuario,contrasenia FROM ecomerce.usuarios WHERE nombre_usuario = '". $unUser . "'");
      $unUser=$consulta->fetch(PDO::FETCH_ASSOC);
        if(password_verify($unaPsw,$unUser["contrasenia"]))
        {
          return $unUser["idUsuario"];
        }
        else{
          echo 'No coincide el user con la contraseña';
        }
      }catch(Exception $e){
      echo 'Excepción capturada: ',  $e->getMessage(), "\n";
     }
    }

     function getUsuarioByUsername($unUser,$unaPsw)
     {
       $usuario= new User();
      try{
        $consulta = $this->conexion->query("SELECT * FROM ecomerce.usuarios WHERE nombre_usuario = '". $unUser . "'");
        $unUser=$consulta->fetch(PDO::FETCH_ASSOC);
        $usuario->id=$unUser["idUsuario"];                    
        $usuario->nombreYApellido=$unUser["nombre_apellido"];
        $usuario->email=$unUser["email"];
        $usuario->password=$unUser["contrasenia"];
        $usuario->foto= $unUser["foto"];
        $usuario->nombreDeUsuario= $unUser["nombre_usuario"];
        $usuario->estado=$unUser["estado_usuario"];
         if(password_verify($unaPsw,$unUser["contrasenia"]))
         {
           return $usuario;
         }
        else{
          return $usuario;
           echo 'No coincide el user con la contraseña';
        }
      }catch(Exception $e){
       echo 'Excepción capturada: ',  $e->getMessage(), "\n";
      }

        
      }

      function validarUserYPsw($unUser,$unaPsw)
      {
        $usuario= new User();
      try{
        $consulta = $this->conexion->query("SELECT * FROM ecomerce.usuarios WHERE nombre_usuario = '". $unUser . "'");
        $unUser=$consulta->fetch(PDO::FETCH_ASSOC);
        // $usuario->id=$unUser["idUsuario"];                    
        // $usuario->nombreYApellido=$unUser["nombre_apellido"];
        // $usuario->email=$unUser["email"];
        // $usuario->password=$unUser["contrasenia"];
        // $usuario->foto= $unUser["foto"];
        // $usuario->nombreDeUsuario= $unUser["nombre_usuario"];
        // $usuario->estado=$unUser["estado_usuario"];
         if(password_verify($unaPsw,$unUser["contrasenia"]))
         {
           return true;
           exit();
         }
        else{
          //Esto esta MAL....
           return true;
        }
      }catch(Exception $e){
       echo 'Excepción capturada: ',  $e->getMessage(), "\n";
      }
      }

  }



 ?>
