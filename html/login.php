<!DOCTYPE html>
<?php
// include("users.php");
include("DB.php");


$userL= new User();
$bd=new DB();

$errorUsuario = "";
$errorNoExisteUsuario = "";
$errorUserYPsw="";
$errorContrasenia = "";
//Inicio de validacion de datos de los input
if($_POST)
{
  // creo una variable para ver si hay errores
  $errores = false;
  if($_POST["user"] == "")
  {
    $errorUsuario = "Debe ingresar un nombre de usuario";
    $errores = true;
  }else if($_POST["user"] != "" && $_POST["password"] != "")
  {
    if(!$bd->validarUserYPsw($_POST["user"],$_POST["password"]))
    {
      $errores=true;
    }
    else
    {
      //Valido si seleccionó "Recordarme" y en caso de ok genero Cookie, sino creo Session
      if(isset($_POST["cbox1"]) && $_POST["cbox1"])
      {
        $cookie_name="usuario";
        $cookie_value=idByUsername($_POST["user"],$_POST["password"]);
        setcookie($cookie_name,$cookie_value);
        header('Location: /ECommerce-DH/html/home.php');
      }
      else{
        $userL->loguearse($_POST["user"],$_POST["password"]);
      }
    }
}
  //Validación campo psw vacio
  if($_POST["password"] == "")
  {
      $errorContrasenia = "Debe ingresar su contraseña";
      $errores = true;
  }

}

//Metodo que sirve para crear la sesión y redirigirlo al home


//Metodo para obtener el ID de un usuario determinado, dado su nombre de usuario y psw
function idByUsername($unUser,$unaPsw)
{
  $urlJsonUsuarios=file_get_contents("../json/usuarios.json");
  $usuarios =json_decode($urlJsonUsuarios,true);
    foreach ($usuarios as $unUsuario) 
    { 
        if($unUsuario["usuario"]==$unUser && password_verify($unaPsw,$unUsuario["contrasenia"]))
        {
        return $unUsuario["id"];
        }
  }
}

//Fin clase Usuario
 ?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Karla&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis|Great+Vibes&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Karla&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <?php include_once("header.php") ?>
  <?php 
      // if( isset($_SESSION["userLogueado"]) || isset($_COOKIE["usuario"])){ 
      //       header('Location: /ECommerce-DH/html/home.php');
      //   }
  ?>
  <body id="bodyLogin">
    <div class="container">    
    <div class="login-content-logo">
      <img class="userImg" src="../img/Lagard3.png" alt="">    
    </div>
        <div class="login-content-form">
        <form class="formLogin" action="" method="post">
        <h1>Sign In</h1>
        <div class="nombre">
           <img src="../img/user.svg" alt="" width="6%">
          <input  <?php echo $errorUsuario!=""?"class='inputValidar'":""; ?> class="inputNombreLogin" type="text" name="user" <?php echo $errorUserYPsw!=""?" value='".$_POST["user"]."' ":""; ?> placeholder="Username">
          <span style="color:red;font-size:12px;display:block;"><?=$errorUsuario;?></span>
        </div>
        <div class="password">
          <img src="../img/lock.svg" alt="" width="6%">
          <input <?php echo $errorContrasenia!=""?"class='inputValidar'":""; ?> class="inputPassLogin" type="password" name="password" value="" placeholder="Password"  >
          <span style="color:red;font-size:12px;display:block;"><?=$errorContrasenia;?></span>
        </div>
        <span style="color:red;font-size:12px;"><?=$errorNoExisteUsuario;?></span>
        <span style="color:red;font-size:12px;"><?=$errorUserYPsw;?></span>
        <div class="col-12 rememberMe">
            <label class="labelrememberMe"><input type="checkbox" id="cbox1" name="cbox1" value="first_checkbox"> Recordarme</label>
        </div>
             <input class="login" type="submit" name="" value="LOGIN">
        <div class="forgotPsw">
          <a href="#" class="col-8">¿Te olvidaste la contraseña?</a>
        </div>
        </form>
        
        
        </div>
          <div class="col-12 footerLogin">
                 ¿No tenés cuenta? <a href="registroDeUsuarios.php">  Registrarme</a>
          </div>
    </div>
      <?php include_once("footer.php") ?>
  </body>
</html>