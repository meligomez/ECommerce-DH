<?php
include("DB.php");
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
  $baseDeDatos=new DB();
  session_start();
  if(isset($_SESSION["userLogueado"]) && isset($_SESSION["idUser"]))
  {
    $usuarioLogueado=$baseDeDatos->verPerfilDelUsuario((int) $_SESSION["idUser"]);
  
  }
  
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
          <p class="card-text">El Peugeot 308 es un automóvil de turismo del segmento C producido por el fabricante francés Peugeot desde finales del año 2007. Es un cinco plazas con tracción delantera y motor delantero transversal.</p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="../img/articulo_1-2.jpg" class="card-img-top" alt="auto-2">
        <div class="card-body">
          <h5 class="card-title">Mercedes Benz C Class</h5>
          <p class="card-text"> Automóvil de gama alta (automóvil de turismo del segmento D) producido por el fabricante alemán Mercedes-Benz desde el año 1993. Es el sucesor del Mercedes-Benz 190, y fue el modelo más accesible...</p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="../img/articulo_1-3.jpg" class="card-img-top" alt="auto-3">
        <div class="card-body">
          <h5 class="card-title">Lamborghini murcielago</h5>
          <p class="card-text">Superdeportivo diseñado y producido por el fabricante italiano Lamborghini en su fábrica de Sant’Agata Bolognese. El Murciélago es un dos plazas disponible con carrocerías cupé y descapotable de dos puertas</p>
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
          <p class="card-text">Tiene 200 caballos de vapor (197 HP) de potencia y 470 Nm de torque. En el mercado suramericano se comercializa con tres motorizaciones: una de 2.2 litros diésel, una 3.2 también diésel y un 2.5 a gasolina. </p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="../img/articulo_2-2.jpg" class="card-img-top" alt="pick-2">
        <div class="card-body">
          <h5 class="card-title">Toyota Hilux</h5>
          <p class="card-text">Para maximizar la capacidad off-road, el bloqueo de diferencial trasero permite distribuir en partes iguales el torque para que las ruedas posteriores giren a la misma velocidad sin tener en cuenta las diferencias de tracción.Cuando el vehículo se encuentra en modo 4x4, el control de tracción activo aplica fuerza de frenado...</p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="../img/articulo_2-3.jpg" class="card-img-top" alt="pick-3">
        <div class="card-body">
          <h5 class="card-title">Dodge RAM</h5>
          <p class="card-text">Con un motor 8,3 litros V10 de Viper. Este motor produce 510 HP  5.600 rpm y 525 libras • pie (712 N • m) de torque  4.200 rpm. La versión de cabina regular, con un peso en vacío total de 2.330 kg, alcanza una velocidad máxima 246 km / h. </p>
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
          <p class="card-text"> Es una furgoneta construida por Hyundai Motor Company de Corea del Sur e Indonesia. Los modelos de primera generación eran conocidos en Europa como Hyundai H-1 </p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="../img/articulo_3-2.jpg" class="card-img-top" alt="van-2">
        <div class="card-body">
          <h5 class="card-title">Nueva Renault Traffic</h5>
          <p class="card-text">Es una furgoneta mediana producida por el fabricante francés Renault desde el año 1981. También se ha comercializado bajo las marcas Vauxhall, Nissan y Opel. Sus principales rivales son las furgonetas medianas de Sevel y la Volkswagen Transporter. </p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
      <div class="card" style="width: 18rem;">
        <img src="../img/articulo_3-3.jpg" class="card-img-top" alt="van-3">
        <div class="card-body">
          <h5 class="card-title">Mercedes Benz Sprinter</h5>
          <p class="card-text">El Mercedes-Benz Sprinter es un vehículo comercial ligero, construido por Daimler AG de Düsseldorf, Alemania, como furgón, microbús, plataforma abierta y chasis</p>
          <a href="#" class="btn btn-primary">Leer más</a>
        </div>
      </div>
    </div>
  </main>
<?php include_once("footer.php") ?>

</body>
</html>
