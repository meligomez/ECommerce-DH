<?php

//Deberia ir en una clase usuario
function getUserById($id)
{
  $urlJsonUsuarios=file_get_contents("../json/usuarios.json");
  $usuarios =json_decode($urlJsonUsuarios,true);
  foreach ($usuarios as $unUsuario) 
  { 
    if($unUsuario["id"]==$id)
    {
      return $unUsuario;
    }
  }
}
//Fin Clase usuario
//Valido que alguien esté en la sesión
if(isset($_SESSION))
{
  session_start();
  $usuarioLogueado=getUserById($_SESSION["userLogueado"]);
}

//Ya anda, deberíamos ver como mostrar los diferentes menúes según si está logueado o no.
?>


<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Dosis|Great+Vibes&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../img/web_icon.ico">
  <link rel="stylesheet" href="../css/styles.css">
  <title>Lagard</title>
</head>
<body class="home">

<?php include_once("header.php") ?>
  <main class="main_home">
    <div class="contenedor-titulo-autos">
      <p class="titulo-autos">Autos</p>
    </div>
    <div class="bloque_autos">
      <div class="card" style="width: 18rem;">
        <img src="../img/articulo_1-1.jpg" class="card-img-top" alt="auto-1">
        <div class="card-body">
          <h5 class="card-title">Nuevo Peugeot 308</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, unt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="../img/articulo_1-2.jpg" class="card-img-top" alt="auto-2">
        <div class="card-body">
          <h5 class="card-title">Mercedes Benz C Class</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, unt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="../img/articulo_1-3.jpg" class="card-img-top" alt="auto-3">
        <div class="card-body">
          <h5 class="card-title">Lamborghini murcielago</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, unt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
    </div>
    <div class="contenedor-titulo-pickups">
      <p class="titulo-pickups">Pickups</p>
    </div>
    <div class="bloque_pickups">
      <div class="card" style="width: 18rem;">
        <img src="../img/articulo_2-1.jpg" class="card-img-top" alt="pick-1">
        <div class="card-body">
          <h5 class="card-title">Ford Ranger</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, unt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="../img/articulo_2-2.jpg" class="card-img-top" alt="pick-2">
        <div class="card-body">
          <h5 class="card-title">Toyota Hilux</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, unt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="../img/articulo_2-3.jpg" class="card-img-top" alt="pick-3">
        <div class="card-body">
          <h5 class="card-title">Dodge RAM</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, unt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
    </div>
    <div class="contenedor-titulo-van">
      <p class="titulo-van">Vans</p>
    </div>
    <div class="bloque_van">
      <div class="card" style="width: 18rem;">
        <img src="../img/articulo_3-1.jpg" class="card-img-top" alt="van-1">
        <div class="card-body">
          <h5 class="card-title">Hyundai h1</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, unt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="../img/articulo_3-2.jpg" class="card-img-top" alt="van-2">
        <div class="card-body">
          <h5 class="card-title">Nueva Renault Traffic</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, unt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="../img/articulo_3-3.jpg" class="card-img-top" alt="van-3">
        <div class="card-body">
          <h5 class="card-title">Mercedes Benz Sprinter</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, unt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
    </div>
  </main>
<?php include_once("footer.php") ?>

</body>
</html>
