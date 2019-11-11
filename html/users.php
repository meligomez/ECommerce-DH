<?php

class User{

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
  };

  //Valido que alguien esté en la sesión
  public function loguearse($_SESSION){
    if(isset($_SESSION)){
      session_start();
      $this->getUserById($_SESSION["userLogueado"]);
    }
  };

  private function eliminarSesionOCookie(){
    session_destroy();
    setcookie("usuario",null,time()-1);
    header("Location: login.php ");
  };

  public function desloguearse(){
    if(isset($_POST["inputDeslogueo"])){
      $this->eliminarSesionOCookie();
      header('Location: /ECommerce-DH/html/login.php');
    }
  };

  public function get_Contenido_Header_Segun_Estado_De_Logueo_Desktop(){
    echo (isset($_SESSION["userLogueado"])  || isset($_COOKIE["usuario"]))?"style='display:none;'":"";
  };

  public function get_Contenido_Header_Segun_Estado_De_Logueo_Mobile(){
    echo isset($_SESSION["userLogueado"])?"style='display:none;'":"";
  }

}




?>
