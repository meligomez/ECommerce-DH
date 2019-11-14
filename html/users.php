<?php
  class User{

    //Atributos
        public $nombreYApellido;
        public $nombreDeUsuario;
        public $id;
        public $email;
        public $password;
        public $foto;
        public $estado;




  /*--------------------------------------------------
  -------------------responsabilidades----------------
  --------------------------------------------------*/
  //Obtengo ID del usuario de la DB
  private function getUserById($id){
    $urlJsonUsuarios=file_get_contents("../json/usuarios.json");
    $usuarios =json_decode($urlJsonUsuarios,true);
    foreach ($usuarios as $unUsuario){
      if($unUsuario["id"]==$id){
        return $unUsuario;
      }
    }
  }

  //Valido que alguien esté en la sesión
  public function getUsuarioSiExisteSession()
  {
    //Aca veo si la variable está seteada con algun valor
    if(isset($_SESSION))
    {
      session_start();
      //llamo a la funcion getUserById que me trae un usuario por ID y le paso por parámetro la sesion de ese usuario
      $this->getUserById($_SESSION["userLogueado"]);
    }
  }

  
  private function eliminarSesionOCookie()
  {
    session_destroy();
    setcookie("usuario",null,time()-1);
    header("Location: login.php ");
  }

  public function desloguearse()
  {
    if(isset($_POST["inputDeslogueo"]))
    {
      $this->eliminarSesionOCookie();
      header('Location: /ECommerce-DH/html/login.php');
    }
  }

  public function loguearse($unUser,$unaPsw)  
  {
    //crear la sesión 
    $bd= new DB();
    $usuarioALoguear=$bd->getUsuarioByUsername($unUser,$unaPsw);
    session_start();
    $_SESSION["userLogueado"]=$usuarioALoguear->nombreDeUsuario;
    $_SESSION["idSession"]=md5($usuarioALoguear->id);
    $_SESSION["idUser"]=$usuarioALoguear->id;
    header('Location: /ECommerce-DH/html/home.php');
    return $usuario;
  }
  
  public function get_Contenido_Header_Segun_Estado_De_Logueo_Desktop()
  {
    echo (isset($_SESSION["userLogueado"])  || isset($_COOKIE["usuario"]))?"style='display:none;'":"";
  }

  public function get_Contenido_Header_Segun_Estado_De_Logueo_Mobile()
  {
    echo isset($_SESSION["userLogueado"])?"style='display:none;'":"";
  }

}




?>
