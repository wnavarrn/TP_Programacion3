<?php

include "Empleado.php";
require_once 'IApiUsable.php';

class EmpleadoApi extends Empleado implements IApiUsable
{
    //traigo un empleado - funciona
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
    	$elEmpleado=Empleado::TraerUnEmpleado($id);
     	$newResponse = $response->withJson($elEmpleado, 200);  
    	return $newResponse;
    }

    //traigo todos los empleados - funciona
    public function TraerTodos($request, $response, $args) {

        $todosLosEmpleados=Empleado::TraerTodosLosEmpleados();
     	$response = $response->withJson($todosLosEmpleados, 200);  
    	return $response; 
    }

    //inserto un empleado - funciona y guarda foto

    public function CargarUno($request, $response, $args) {


        $date = date('Y-m-d H:i:s');

     	$ArrayDeParametros = $request->getParsedBody();
        $nombre= $ArrayDeParametros['nombre'];
        $apellido= $ArrayDeParametros['apellido'];
        $clave= $ArrayDeParametros['clave'];
        $perfil= $ArrayDeParametros['perfil'];
        $mail= $ArrayDeParametros['mail'];
        $turno= $ArrayDeParametros['turno'];
            
        $miempleado = new Empleado();
        $miempleado->nombre=$nombre;
        $miempleado->apellido=$apellido;
        $miempleado->clave=$clave;
        $miempleado->perfil=$perfil;
        $miempleado->mail=$mail;
        $miempleado->turno=$turno;
        $miempleado->fecha_creacion= $date;
        $miempleado->InsertarEmpleadoParametros();

        $archivos = $request->getUploadedFiles();
        $destino="./fotosEmpleados/";

        $nombreAnterior=$archivos['foto']->getClientFilename();
        $extension= explode(".", $nombreAnterior);
 
        $extension=array_reverse($extension);

        $archivos['foto']->moveTo($destino.$nombre.".".$extension[0]);
        $response->getBody()->write("se guardo el empleado");
        
        return $response;
    }

    //borrar un empleado y funciona
      public function BorrarUno($request, $response, $args) {

     	$ArrayDeParametros = $request->getParsedBody();
        $id=$ArrayDeParametros['id'];

     	$empleado= new Empleado();
     	$empleado->id= $id;
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

         $date = date('Y-m-d H:i:s');
     	
     	$ArrayDeParametros = $request->getParsedBody();
   	
	    $miempleado = new Empleado();
	    $miempleado->id=$ArrayDeParametros['id'];
        $miempleado->nombre=$ArrayDeParametros['nombre'];
        $miempleado->nombre=$ArrayDeParametros['apellido'];
	    $miempleado->clave=$ArrayDeParametros['clave'];
        $miempleado->perfil=$ArrayDeParametros['perfil'];
        $miempleado->perfil=$ArrayDeParametros['mail'];
        $miempleado->turno=$ArrayDeParametros['turno'];
        $miempleado->fecha_creacion= $date;

	   	$resultado =$miempleado->ModificarEmpleadoParametros();
	   	$objDelaRespuesta= new stdclass();
	
        $objDelaRespuesta->resultado=$resultado;
        
		return $response->withJson($objDelaRespuesta, 200);		
    }

}


?>