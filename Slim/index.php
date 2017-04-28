<?php

require 'vendor/autoload.php';
$app = new \Slim\Slim();

//metodo get para mostrar saludo acorde a nombre especificado por url
$app->get("/prueba/:nombre",function($nombre){
        echo "Hola ".$nombre;
});

//mostrar hola mundo si es que la variable es 1, de no ser asi envia mensaje de error, ademas posee condicion de que solo sean numeros los especificados en dicha variable
/*$app->get("/prueba1(/:var)", function($var=null){
	
	if($var==1){
		echo "Hola Mundo";
	}else{
		echo "Ingresa un numero valido";
	}

})->conditions(array(
    "var" => "[0-9]*"
));
*/

//metodo post especificando la ruta del archivo .json
$app->post('/usuario1',function () use ($app) {
    
    $data = file_get_contents("c:/wamp1/htdocs/slim/data/usuario.json");
	$usuario = json_decode($data, true);
    echo json_encode($usuario);
    
});
//metodo post en el cual se envia un nombre mediante url el cual reemplaza al nombre dentro del archivo .json y lo muestra (ojo que no guarda la variable, es temporal).
$app->post('/usuario1/:var',function ($var) use ($app) {
    
    $data = file_get_contents("c:/wamp1/htdocs/slim/data/usuario.json");
	$usuario = json_decode($data, true);
	//codigo de prueba xD
	/*foreach($usuario as $variable=>$valor){
		if($variable.equals("nombre"){
			$valor = ($var).toString;
		}
	}*/
	//$usuarioRes = array(0 => $var);
	//$usuarioFin = array_replace($usuario, $usuarioRes);
    //print_r($usuario); 
    $usuario['nombre']=$var;
    echo json_encode($usuario);
    
});
$app->post('/quieroverelclimadevalparaiso',function () use ($app) {
    
    $data = file_get_contents("https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22Valparaiso%2C%20CL%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys");
	$usuario = json_decode($data, true);
    echo json_encode($usuario);
    
});
 //prueba para llamar al metodo desde el body (no me funciono xd)
/*$app->post('/usuario2', function () use ($app) {
    
    $json = $app->request->getBody();
    $data = json_decode($json, true);

    return $data;
});
*/
$app->run();
