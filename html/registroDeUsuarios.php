<?php
include_once("DB.php");
include_once("users.php");
// inicializo las variables para errores
$errorUsuario = "";
$errorNombreYApellido = "";
$errorEmail = "";
$errorContrasenia = "";
$errorContrasenias="";
$errorUsuarioYaExiste="";
global $usuarios;
//Inicio de validacion de datos de los input
if($_POST)
{
  // creo una variable para ver si hay errores
  $errores = false;

   if($_POST["usuario"] == ""){
      $errorUsuario = "Debe ingresar un nombre de usuario";
      $errores = true;
  }else if(strlen($_POST["usuario"]) < 5){
      $errorUsuario = "Su nombre de usuario debe tener al menos 5 caracteres";
      $errores = true;
  }
  if($_POST["nombreYapellido"] == ""){
    $errorNombreYApellido = "Debe ingresar un nombre y apellido";
    $errores = true;
    }else if(strlen($_POST["nombreYapellido"]) < 4){
      $errorNombreYApellido = "Su nombre y apellido deben tener al menos 4 caracteres";
      $errores = true;
  }
  if($_POST["email"] == ""){
    $errorEmail = "Ingrese un e-mail";
    $errores = true;
    }else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
      $errorEmail = "Debe escribir un mail correcto";
      $errores = true;
  }
  if($_POST["contrasenia"] == "" || $_POST["contraseniaConfirma"] == ""){
      $errorContrasenia = "Debe ingresar una contraseña";
      $errores = true;
  }else if($_POST["contrasenia"] != $_POST["contraseniaConfirma"]){
      $errorContrasenias = "Las contraseñas deben coincidir";
      $errores = true;
  }else{
      $contrasenia = password_hash($_POST["contrasenia"],PASSWORD_DEFAULT);
      //echo md5($_POST["password"]);
  }
//fin de validaciones de datos

  //primero valido si no hay ningun error
  if(!$errores)
  {
      //Acá empieza la parte del sprint 3
      //crear un objeto usuario y un objeto base de datos
      $usuario= new User();
      $baseDeDatos= new DB();

      //Al objeto usuario le vamos cargando los datos recibidos desde la vista "Registro de usuarios"
      $usuario->nombreDeUsuario= $_POST["usuario"];
      $usuario->nombreYApellido= $_POST["nombreYapellido"];
      $usuario->email= $_POST["email"];
      if(isset($_FILES))
      {
          $tipoImagen = $_FILES['avatar']['type'];
          $avatar = "";
          if( $tipoImagen == 'image/png' ||
              $tipoImagen == 'image/jpg' ||
              $tipoImagen == 'image/jpeg' ||
              $tipoImagen == 'image/gif'){
            $ext = pathinfo($_FILES['avatar']['name'],  PATHINFO_EXTENSION);
            $avatar = '../fotos/' . $_POST['usuario'] . '.' . $ext;
              move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);
            }
          var_dump($avatar);
          $usuario->foto=$avatar;
      }
      else
      {
        $usuario->foto="Sin foto";
      }
      $usuario->password= password_hash($_POST["contrasenia"],PASSWORD_DEFAULT);
      
      //Agregamos el usuario en la base de datos.
        $baseDeDatos->altaUsuario($usuario);

       //Lo logueamos
      $usuario->loguearse($usuario->nombreDeUsuario,$usuario->password);
            //----------FIN
  }
}


function existeUsuario($userABuscar){
  foreach ($usuarios as $unUsuario) {
    if($unUsuario["usuario"]==$userABuscar)
    {
      return true;
    }
  }
  return false;
}

 ?>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Dosis|Great+Vibes&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Karla&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../img/web_icon.ico">
  <link rel="stylesheet" href="../css/styles.css">
  <title>Lagard</title>
</head>
<body class="home">
<?php include_once("header.php") ?>
<?php 
      // if( isset($_SESSION["userLogueado"]) || isset($_COOKIE["usuario"])){ 
      //       header('Location: /ECommerce-DH/html/home.php');
      //   }
?>
  <main class="main_registro">

     <div class="content">
        <div class="row">
          <form class=" offset-lg-4 col-lg-4 registroDeUsuario" action="" method="POST" enctype="multipart/form-data">
            <h2>REGISTRO</h2>
            <p>
                <img src="../img/user.svg" alt="" width="6%">
                <input  <?php echo $errorUsuario!=""?"class='inputValidar'":""; ?>  id="usuario" class="inputEspacio" type="text" name="usuario" <?php echo ($errorUsuario=="" && isset($_POST["usuario"]))?" value='".$_POST["usuario"]."' ":""; ?> placeholder="Ingrese un Usuario" >
                <span style="color:red;font-size:12px;display:block;"><?=$errorUsuario;?></span>
                <span style="color:red;font-size:12px;display:block;"><?=$errorUsuarioYaExiste;?></span>
              </p>
            <p>
              <img src="../img/card.svg" alt="" width="6%">
              <input  <?php echo $errorNombreYApellido!=""?"class='inputValidar'":""; ?> id="nombreYapellido" class="inputEspacio" type="text" name="nombreYapellido" placeholder="Ingrese su nombre y apellido" <?php echo ($errorNombreYApellido==""  && isset($_POST["nombreYapellido"]) )?" value='".$_POST["nombreYapellido"]."' ":""; ?>>
              <span style="color:red;font-size:12px;display:block;"><?=$errorNombreYApellido;?></span>
            </p>
            <p>
              <img src="../img/email.svg" alt="" width="6%">
              <input <?php echo $errorEmail!=""?"class='inputValidar'":""; ?> id="email" class="inputEspacio" type="email" name="email" placeholder="Ingrese su mail" <?php echo ($errorEmail==""  && isset($_POST["email"]))?" value='".$_POST["email"]."' ":""; ?>>
              <span style="color:red;font-size:12px;display:block;"><?=$errorEmail;?></span>
            </p>
            <p>
            <input type="file" name="avatar" id="avatar" placeholder="Ingrese su foto de perfil">
           <p>
            <p>
              <img src="../img/lock.svg" alt="" width="6%">
              <input <?php echo $errorContrasenia!=""?"class='inputValidar''":""; ?> id="contrasenia" class="inputEspacio"  type="password" name="contrasenia" placeholder="Ingrese una contraseña">
              <span style="color:red;font-size:12px;display:block;"><?=$errorContrasenia;?></span>
            </p>
            <p>
              <img src="../img/lock.svg" alt="" width="6%">
              <input <?php echo $errorContrasenia!=""?"class='inputValidar'":""; ?> id="contraseniaConfirma" class="inputEspacio"  type="password" name="contraseniaConfirma" placeholder="Reingrese la contraseña" value="">
              <span style="color:red;font-size:12px;display:block;"><?=$errorContrasenias;?></span>
            </p>
            <input class="inputRegistrar" type="submit" value="Registrarme"/>
         </form>  
        </div>
     </div>

  </main>
<?php include_once("footer.php") ?>

</body>
</html>
