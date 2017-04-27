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
 //prueba para llamar al metodo desde el body (no me funciono xd)
/*$app->post('/usuario2', function () use ($app) {
    
    $json = $app->request->getBody();
    $data = json_decode($json, true);

    return $data;
});
*/
$app->run();
