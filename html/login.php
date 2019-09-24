<!DOCTYPE html>
<?php
IF($_POST){

}




 ?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Karla&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <?php include_once("header.php") ?>
  <body id="bodyLogin">
  <div class="content">
    <div class="offset-lg-11 goToHome">
        <a href="home.php">Volver al Home</a>
    </div>
    <div class="row">
      <div class="divFormLogin">
        <img class="offset-lg-3 userImg" src="../img/Lagard3.png" alt="">
        <form class="offset-lg-5 col-lg-5 offset-sm-3 col-sm-6 offset-xs-3 col-xs-6 formLogin" action="" method="post">
        <h1>Sign In</h1>
        <div class="nombre">
          <img src="../img/user.svg" alt="" width="6%">
          <input class="inputNombreLogin" type="text" name="nombre" value="" placeholder="Username">
        </div>
        <div class="password">
          <img src="../img/lock.svg" alt="" width="6%">
          <input class="inputPassLogin" type="password" name="password" value="" placeholder="Password"  >
        </div>
        <div class="col-12 rememberMe">
        <label class="labelrememberMe"><input type="checkbox" id="cbox1" value="first_checkbox"> Recordarme</label>
        </div>
        <input class="login" type="submit" name="" value="LOGIN">
        <div class="forgotPsw">
          <a href="#" class="col-8">¿Te olvidaste la contraseña?</a>
        </div>
        </form>
        <div class="offset-lg-3 offset-sm-1 offset-xs-1 footerLogin">
        ¿No tenés cuenta? <a href="registroDeUsuarios.php">Registrarme</a>
        </div>
      </div>
    </div>
    <div class="register">

    </div>
  </div>

  </body>

</html>
