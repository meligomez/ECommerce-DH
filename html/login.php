<!DOCTYPE html>
<?php
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
    if(!validarUserYPsw($_POST["user"],$_POST["password"]))
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
        loguearse($_POST["user"],$_POST["password"]);

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
//Usuario---> Esto iria en una clase
//Creo un metodo para validar el usuario y la contraseña
function validarUserYPsw($unUser,$unaPsw)
{
  global $errorUserYPsw;
  global $errorNoExisteUsuario;
  $userCo;
  //Recorro el json de usuarios y encontrar ese usuario y validar la psw 
  $urlJsonUsuarios=file_get_contents("../json/usuarios.json");
  $usuarios =json_decode($urlJsonUsuarios,true);
    foreach ($usuarios as $unUsuario ) 
    {
      if($unUsuario["usuario"]==$unUser)
      {
        if(password_verify($unaPsw,$unUsuario["contrasenia"]))
        {
          return true;
        }
        $errorUserYPsw="No coincide el usuario y la contraseña, valide los datos ingresados";
        return false;
      }
      $errores=true;
    }
  $errorNoExisteUsuario="No existe el usuario indicado, valide los datos ingresados";
  return false;
}

//Metodo que sirve para crear la sesión y redirigirlo al home
function loguearse($unUser,$unaPsw)  
{
   //crear la sesión 
   session_start();
   $_SESSION["userLogueado"]=idByUsername($unUser,$unaPsw);
    header('Location: /ECommerce-DH/html/home.php');
}

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
      if( isset($_SESSION["userLogueado"]) || isset($_COOKIE["usuario"])){ 
            header('Location: /ECommerce-DH/html/home.php');
        }
  ?>
  <body id="bodyLogin">
  <div class="container">
    <div class="row">
    <!-- <div class="divFormLogin"> -->
      <img class="offset-lg-5 col-lg-2 userImg" src="../img/Lagard3.png" alt="">
        <form class="offset-lg-4 col-lg-4 offset-sm-3 col-sm-6 offset-xs-3 col-xs-6 formLogin container" action="" method="post">
        <h1>Sign In</h1>
        <div class="col-lg-12 nombre">
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
          <div class="col-12 footerLogin">
                 ¿No tenés cuenta? <a href="registroDeUsuarios.php">  Registrarme</a>
          </div>
      <!-- </div> -->
    </div>
    <div class="register">

    </div>
  </div>

  </body>
  <?php include_once("footer.php") ?>
</html>