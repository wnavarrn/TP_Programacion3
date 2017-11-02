<?php

class Empleado
{
    public $id;
    public $nombre;
    public $clave;
    public $perfil;
    public $mail;
    public $turno;
    public $sexo;
    
    public function BorrarEmpleado()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from empleado 				
				WHERE Id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
    } 

    public function TraerTodosLosEmpleados()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select Id as id, Nombre as nombre, Clave as clave, Perfil as perfil, Mail as mail, Turno as turno, Sexo as sexo from empleado");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Empleado");	
    }

    public function TraerUnEmpleado($id)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select Id as id, Nombre as nombre, Clave as clave, Perfil as perfil, Mail as mail, Turno as turno, Sexo as sexo from empleado where Id = $id");
			$consulta->execute();
			$empleadoBuscado= $consulta->fetchObject('Empleado');
			return $empleadoBuscado;	
    }

    public function InsertarEmpleadoParametros()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into empleado (Nombre,Clave,Perfil,Mail,Turno,Sexo)
                values(:nombre,:clave,:perfil,:mail,:turno,:sexo)");
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_INT);
				$consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
                $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
                $consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
                $consulta->bindValue(':turno', $this->turno, PDO::PARAM_STR);
                $consulta->bindValue(':sexo', $this->sexo, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    public function ModificarEmpleadoParametros()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update empleado 
				set Nombre=:nombre,
				Clave=:clave,
                Perfil=:perfil,
                Mail=:mail,
                Turno=:turno,
                Sexo=:sexo
                WHERE Id=:id");
            $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_INT);
			$consulta->bindValue(':clave',$this->clave, PDO::PARAM_INT);
			$consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
            $consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
            $consulta->bindValue(':turno', $this->turno, PDO::PARAM_STR);
            $consulta->bindValue(':sexo', $this->sexo, PDO::PARAM_STR);
			return $consulta->execute();
    }

    public function GuardarEmpleado()
    {

    }

}




?>