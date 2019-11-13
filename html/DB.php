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

      // $db_host = "localhost";
      // $db_name = "ecomerce";
      // $db_user = "root";
      // $db_pass = "";
      // $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
      // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //funcion creada para dar de alta un usuario en la base de datos que recibe como parámetro un "User" -->Users.php iuna clase usuario
    public function altaUsuario($usuario){
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
        $consulta = $this->conexion->query("SELECT * FROM usuarios WHERE id = $id ");
        return $consulta->fetch(PDO::FETCH_ASSOC);
    }


  }



 ?>
