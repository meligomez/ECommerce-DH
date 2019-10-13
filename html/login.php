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
  if($_POST["user"] == ""){
    $errorUsuario = "Debe ingresar un nombre de usuario";
    $errores = true;
}else if($_POST["user"] != "" && $_POST["password"] != ""){
  if(!validarUserYPsw($_POST["user"],$_POST["password"]))
  {
    $errores=true;
  }
  else{
    echo "Entro aca";
    loguearse($_POST["user"],$_POST["password"]);
  }
}


  if($_POST["password"] == ""){
      $errorContrasenia = "Debe ingresar su contraseña";
      $errores = true;
  }

}
//Creo una función para validar el usuario y la contraseña
function validarUserYPsw($unUser,$unaPsw){
  global $errorUserYPsw;
  global $errorNoExisteUsuario;
  $userCo;
  //Recorro el json de usuarios y encontrar ese usuario y validar la psw 
  $urlJsonUsuarios=file_get_contents("../json/usuarios.json");
  $usuarios =json_decode($urlJsonUsuarios,true);
  foreach ($usuarios as $unUsuario ) {
    if($unUsuario["usuario"]==$unUser){
      if(password_verify($unaPsw,$unUsuario["contrasenia"])){
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
function loguearse($unUser,$unaPsw)  
  {
//crear la sesión / cookie y redirigirlo al home, 
   session_start();
    header('Location: /ECommerce-DH/html/home.php');

  }

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
            <label class="labelrememberMe"><input type="checkbox" id="cbox1" value="first_checkbox"> Recordarme</label>
        </div>
             <input class="login" type="submit" name="" value="LOGIN">
        <div class="forgotPsw">
          <a href="#" class="col-8">¿Te olvidaste la contraseña?</a>
        </div>
        </form>
          <div class="col-12 footerLogin">
                 ¿No tenés cuenta? <a href="registroDeUsuarios.php">Registrarme</a>
          </div>
      <!-- </div> -->
    </div>
    <div class="register">

    </div>
  </div>

  </body>
  <?php include_once("footer.php") ?>
</html>