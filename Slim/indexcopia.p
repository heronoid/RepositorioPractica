<html>
   <head>
      <title>Login</title>
      <link rel="stylesheet" type="text/css" href="estilos.css">
   </head>
   <body>
      <div id="login">
         <form action= "usuario.php" method="GET">
            <label>Usuario: </label>
            <input type="text" name="user"/><br>
            <label>Contraseña: </label>
            <input type="password" name="password"/><br><br>
            <input type="submit" value="Enviar"/>
         </form>
      </div>
   </body>
</html>

<?php
require 'vendor/autoload.php';
$app = new \Slim\Slim();
$app->get("/prueba/:nombre",function($nombre){
        echo "Hola ".$nombre;
});
$app->get("/prueba1(/:var1(/:var2))", function($var1=null,$var2=null){
    echo $var1."<br/>";  
    echo $var2."<br/>";  
})->conditions(array(
    "var1" => "[a-zA-Z]*",
    "var2" => "[0-9]*"
));



$app->run();