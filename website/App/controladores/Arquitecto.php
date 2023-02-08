<?php

class Arquitecto extends Controlador{

    public function __construct(){
        //echo 'Inicio controlador cargado';

        Sesion::iniciarSesion($this->datos);

        $this->datos["menuActivo"] = "home";

        $this->eventoModelo = $this->modelo('EventoModelo');
        $this->artefactoModelo = $this->modelo('ArtefactoModelo');
        $this->extraviadoModelo = $this->modelo('ExtraviadoModelo');
        $this->loreModelo = $this->modelo('LoreModelo');
        $this->publicacionModelo = $this->modelo('PublicacionModelo');

        //$this->datos["usuarioSesion"] = $this->loginModelo->login_usuario;

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
        
        $this->vista("creador/artefacto/artefactos",$this->datos);
    }  

    public function vista_evento(){
        
        $this->vista("creador/evento/eventos",$this->datos);
    }  

    public function vista_extraviado(){
        
        $this->vista("creador/extraviado/extraviados",$this->datos);
    }  

    public function vista_historia(){
        
        $this->vista("creador/historia/historias",$this->datos);
    }  

    public function vista_mundo(){
        
        $this->vista("creador/mundo/mundos",$this->datos);
    }  

    public function vista_publicacion(){
        
        $this->vista("creador/publicacion/publicaciones",$this->datos);
    }  

    public function vista_usuario(){
        
        $this->vista("creador/usuario/usuarios",$this->datos);
    }  

}