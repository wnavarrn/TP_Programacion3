<?php

include "Empleado";
require_once 'IApiUsable.php';

class EmpleadoApi extends Empleado implements IApiUsable
{
    //traigo un empleado
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
    	$elEmpleado=Empleado::TraerUnEmpleado($id);
     	$newResponse = $response->withJson($elEmpleado, 200);  
    	return $newResponse;
    }

    //traigo todos los empleados
    public function TraerTodos($request, $response, $args) {
      	$todosLosEmpleados=cd::TraerTodoLosEmpleados();
     	$response = $response->withJson($todosLosEmpleados, 200);  
    	return $response;
    }

    public function CargarUno($request, $response, $args) {

     	$ArrayDeParametros = $request->getParsedBody();
        $nombre= $ArrayDeParametros['nombre'];
        $clave= $ArrayDeParametros['clave'];
        $perfil= $ArrayDeParametros['perfil'];
        $mail= $ArrayDeParametros['mail'];
        $turno= $ArrayDeParametros['turno'];
        $sexo= $ArrayDeParametros['sexo'];
        
        $miempleado = new Empleado();
        $miempleado->nombre=$nombre;
        $miempleado->clave=$clave;
        $miempleado->perfil=$perfil;
        $miempleado->mail=$mail;
        $miempleado->turno=$turno;
        $miempleado->sexo=$sexo;
        $miempleado->InsertarEmpleadoParametros();

        $archivos = $request->getUploadedFiles();
        $destino="./fotos/";
        //var_dump($archivos);
        //var_dump($archivos['foto']);

        $nombreAnterior=$archivos['foto']->getClientFilename();
        $extension= explode(".", $nombreAnterior)  ;
        //var_dump($nombreAnterior);
        $extension=array_reverse($extension);

        $archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
        $response->getBody()->write("se guardo el empleado");

        return $response;
    }

      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$empleado= new Empleado();
     	$empleado->id=$id;
     	$cantidadDeBorrados=$empleado->BorrarEmpleado();

     	$objDelaRespuesta= new stdclass();
	    $objDelaRespuesta->cantidad=$cantidadDeBorrados;
	    if($cantidadDeBorrados>0)
	    	{
	    		 $objDelaRespuesta->resultado="algo borro!!!";
	    	}
	    	else
	    	{
	    		$objDelaRespuesta->resultado="no Borro nada!!!";
	    	}
	    $newResponse = $response->withJson($objDelaRespuesta, 200);  
      	return $newResponse;
    }
     
     public function ModificarUno($request, $response, $args) {
     	//$response->getBody()->write("<h1>Modificar  uno</h1>");
     	$ArrayDeParametros = $request->getParsedBody();
	    //var_dump($ArrayDeParametros);    	
	    $miempleado = new cd();
	    $miempleado->id=$ArrayDeParametros['id'];
	    $miempleado->nombre=$ArrayDeParametros['nombre'];
	    $miempleado->clave=$ArrayDeParametros['clave'];
        $miempleado->perfil=$ArrayDeParametros['perfil'];
        $miempleado->turno=$ArrayDeParametros['turno'];
        $miempleado->sexo=$ArrayDeParametros['sexo'];

	   	$resultado =$micd->ModificarEmpleadoParametros();
	   	$objDelaRespuesta= new stdclass();
		//var_dump($resultado);
		$objDelaRespuesta->resultado=$resultado;
		return $response->withJson($objDelaRespuesta, 200);		
    }
*/

}


?>