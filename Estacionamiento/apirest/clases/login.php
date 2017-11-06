<?php

class Login
{
    public $id;
    public $nombre;
	public $apellido;
	public $perfil;

    public static function TraerUnUsuario($nombre,$password) 
	{
		
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id ,nombre, apellido, perfil from empleado  WHERE nombre=? AND clave=?");
			$consulta->execute(array($nombre, $password));
			$UserBuscado= $consulta->fetchObject('Login');
      		return $UserBuscado;				
		
	}
}