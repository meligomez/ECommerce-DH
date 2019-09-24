<?php
//Validamos que lleguen datos
if($_POST)
{
  //nos guardarmos los datos del post en un array
  $usuario=[
    "usuario" => $_POST["usuario"],
    "nombre" => $_POST["nombre"],
    "apellido" => $_POST["apellido"],
    "email" => $_POST["email"],
    "Contraseña" =>  password_hash($_POST["Contraseña"],PASSWORD_DEFAULT)
  ];

  //traigo los usuarios del json

  $usuariosEnJSON = file_get_contents("..\json\usuarios.json");
  //convierto el json en array
  $usuarios = json_decode($usuariosEnJSON);
  //agrego el nuevo usuario al array de la base de datos
  $usuarios[] = $usuario;
  //convierto el nuevo array completo a json
  $nuevosUsuariosEnJSON = json_encode($usuarios);
  //escribo el nuevo json en el archivo .json
  file_put_contents("usuarios.json",$nuevosUsuariosEnJSON);

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

  <main class="main_registro">

     <div class="content">
        <div class="row">
          <form class=" offset-lg-4 col-lg-4 registroDeUsuario" action="" method="POST">
            <h2>REGISTRO</h2>
            <p>
                <label  for="usuario">Usuario:</label>
                <input id="usuario" class:"inputEspacio" type="text" name="usuario" placeholder="Ingrese un Usuario" value=""  minlength="5">
              </p>
            <p>
              <label  for="nombre">Nombre:</label>
              <input id="nombre" class:"inputEspacio" type="text" name="nombre" placeholder="Ingrese su nombre" value=""  minlength="1" maxlength="30">
            </p>
            <p>
              <label for="apellido">Apellido:</label>
              <input id="apellido" class:"inputEspacio" type="text" name="apellido" placeholder="Ingrese su apellido" value="" minlength="1" maxlength="30">
            </p>
            <p>
              <label for="email">E-mail:</label>
              <input id="email" class:"inputEspacio" type="email" name="email" placeholder="Ingrese su mail" value="">
            </p>
            <p>
              <label for="contraseña">Contraseña:</label>
              <input id="contraseña" class:"inputEspacio"  type="password" name="Contraseña" placeholder="Ingrese una contraseña" value="" minlength="8" pattern=(?=\S{az})>
            </p>
            <input class="inputRegistrar" type="submit" value="Registrarme"/>
         </form>
        </div>
     </div>

  </main>
<?php include_once("footer.php") ?>

</body>
</html>
