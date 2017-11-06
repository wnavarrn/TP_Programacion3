<?php

class Empleado
{
    public $id;
    public $nombre;
    public $apellido;
    public $clave;
    public $perfil;
    public $mail;
    public $turno;
    public $fecha_creacion;
    public $foto;
    
    public function BorrarEmpleado()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from empleado 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
    } 

    public function TraerTodosLosEmpleados()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, nombre, apellido, clave, perfil, mail, turno, fecha_creacion, foto from empleado");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Empleado");	
    }

    public function TraerUnEmpleado($id)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, nombre, apellido, clave, perfil, mail, turno, fecha_creacion, foto from empleado where id = $id");
			$consulta->execute();
			$empleadoBuscado= $consulta->fetchObject('Empleado');
			return $empleadoBuscado;	
    }

    public function InsertarEmpleadoParametros()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into empleado (nombre, apellido,clave,perfil, mail,turno,fecha_creacion)
                values(:nombre,:apellido,:clave,:perfil,:mail,:turno,:fecha_creacion)");
                $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_INT);
                $consulta->bindValue(':apellido',$this->apellido, PDO::PARAM_INT);
				$consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
                $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
                $consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
                $consulta->bindValue(':turno', $this->turno, PDO::PARAM_STR);
                $consulta->bindValue(':fecha_creacion', $this->fecha_creacion, PDO::PARAM_STR);
                //$consulta->bindValue(':foto', $this->turno, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    public function ModificarEmpleadoParametros()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update empleado 
                set nombre=:nombre,
                apellido=:apellido,
				clave=:clave,
                perfil=:perfil,
                mail=:mail,
                turno=:turno,
                fecha_creacion=:fecha_creacion
                WHERE id=:id");
            $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
            $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_INT);
            $consulta->bindValue(':apellido',$this->nombre, PDO::PARAM_INT);
			$consulta->bindValue(':clave',$this->clave, PDO::PARAM_INT);
			$consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
            $consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
            $consulta->bindValue(':turno', $this->turno, PDO::PARAM_STR);
            $consulta->bindValue(':fecha_creacion', $this->fecha_creacion, PDO::PARAM_STR);
			return $consulta->execute();
    }

    public function GuardarEmpleado()
    {

    }

}




?>