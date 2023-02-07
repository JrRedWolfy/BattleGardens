<?php

class Inicio extends Controlador{

    public function __construct(){
        //echo 'Inicio controlador cargado';

        Sesion::iniciarSesion($this->datos);

        $this->datos["menuActivo"] = "home";

        //$this->asesoriaModelo = $this->modelo('AsesoriaModelo');

        //$this->datos["usuarioSesion"] = $this->loginModelo->login_usuario;

        //$this->datos["usuarioSesion"]->roles = $this->asesoriaModelo->getRolesProfesor($this->datos["usuarioSesion"]->id_profesor);
        
        //$this->datos["usuarioSesion"]->id_rol = obtenerRol($this->datos["usuarioSesion"]->roles);


        $this->datos["rolesPermitidos"] = [1, 2, 3];

        // if(!tienePrivilegios($this->datos["usuarioSesion"]->Id_Rol, $this->datos["rolesPermitidos"])){
        //     echo "No tienes privilegios";
        //     exit();
        // }
        
    }   
    
    public function index(){
        // $this->datos["asesoriasActivas"] = $this->asesoriaModelo->getAsesoriasActivas();

        // foreach($this->datos["asesoriasActivas"] as $asesoria){
        //     $asesoria->acciones = $this->asesoriaModelo->getAccionesAsesoria($asesoria->id_asesoria);

        // }

        // print_r($this->datos["asesoriasActivas"]);
        // exit;

        $this->vista("landing_page",$this->datos);
    }  

    public function login(){

        $this->vista("login",$this->datos);
    }

    public function vista_artefacto(){
        
        $this->vista("creador/artefactos",$this->datos);
    }  

    public function vista_evento(){
        
        $this->vista("creador/artefactos",$this->datos);
    }  

    public function vista_extraviado(){
        
        $this->vista("creador/artefactos",$this->datos);
    }  

    public function vista_historia(){
        
        $this->vista("creador/artefactos",$this->datos);
    }  

    public function vista_mundo(){
        
        $this->vista("creador/artefactos",$this->datos);
    }  

    public function vista_publicacion(){
        
        $this->vista("creador/artefactos",$this->datos);
    }  

    public function vista_usuario(){
        
        $this->vista("creador/artefactos",$this->datos);
    }  

}