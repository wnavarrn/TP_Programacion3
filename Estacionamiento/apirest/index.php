<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../composer/vendor/autoload.php';
require 'clases/AccesoDatos.php';


require 'clases/EmpleadoApi.php';
require 'clases/OperacionApi.php';


require 'clases/MWparaCORS.php';
require 'clases/MWparaAutentificar.php';


$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*
¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

$app = new \Slim\App(["settings" => $config]);

/*LLAMADA A METODOS DE INSTANCIA DE UNA CLASE*/

$app->group('/ingreso', function () {
  $this->post('/', \LoginApi::class . ':TraerUno');   
});
/*
$app->post('/ingreso/', function (Request $request, Response $response) {    
    
	//$token="";
  $ArrayDeParametros = $request->getParsedBody();
  
 // var_dump($ArrayDeParametros );
  if(isset( $ArrayDeParametros['usuario']) && isset( $ArrayDeParametros['clave']) )
  {
      $usuario=$ArrayDeParametros['usuario'];
      $clave= $ArrayDeParametros['clave'];


      $retorno=array('error'=> "no es usuario valido" );
      $newResponse = $response->withJson( $retorno ,409); 
      if(usuario::esValido($usuario,$clave))
      {
        $datos=array('usuario'=>$usuario,'clave'=>$clave);
        $token= AutentificadorJWT::CrearToken($datos);
        $retorno=array('datos'=> $datos, 'token'=>$token );
        $newResponse = $response->withJson( $retorno ,200); 
      }
      else
      {
        $retorno=array('error'=> "no es usuario valido" );
        $newResponse = $response->withJson( $retorno ,409); 
      }
  }else
  {
        $retorno=array('error'=> "Faltan los datos del usuario y su clave" );
        $newResponse = $response->withJson( $retorno ,409); 
  }
 
	return $newResponse;
});*/

/*LLAMADA A METODOS DE INSTANCIA DE LA CLASE EMPLEADO*/
$app->group('/empleado', function () {
 
  $this->get('/', \EmpleadoApi::class . ':traerTodos');
    
  $this->get('/{id}', \EmpleadoApi::class . ':traerUno');

  $this->post('/', \EmpleadoApi::class . ':CargarUno');

  $this->delete('/', \EmpleadoApi::class . ':BorrarUno');

  $this->put('/', \EmpleadoApi::class . ':ModificarUno');
     
});

/*LLAMADA A METODOS DE INSTANCIA DE LA CLASE OPERACION*/
$app->group('/operacion', function () {
 
  $this->get('/', \OperacionApi::class . ':traerTodos');
 
  $this->get('/{id}', \OperacionApi::class . ':traerUno');

  $this->post('/', \OperacionApi::class . ':CargarUno');

  $this->delete('/', \OperacionApi::class . ':BorrarUno');

  $this->put('/', \OperacionApi::class . ':ModificarUno');
     
});

$app->run();