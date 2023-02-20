<?php

class Arquitecto extends Controlador{

    public function __construct(){
        //echo 'Inicio controlador cargado';

        Sesion::iniciarSesion($this->datos);

        $this->datos["menuActivo"] = "home";

        $this->usuarioModelo = $this->modelo('UsuarioModelo');
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
        
        $this->datos["total_artefactos"] = $this->artefactoModelo->get_artefactos();

        $this->vista("creador/artefacto/artefactos",$this->datos);
    }  

    public function vista_evento(){

        $this->datos["total_eventos"] = $this->eventoModelo->get_eventos();
        
        $this->vista("creador/evento/eventos",$this->datos);
    }  

    public function vista_extraviado(){

        $this->datos["total_extraviados"] = $this->extraviadoModelo->get_extraviados();
        
        $this->vista("creador/extraviado/extraviados",$this->datos);
    }  

    public function vista_historia(){

        $this->datos["total_historias"] = $this->historiaModelo->get_historias();
        
        $this->vista("creador/historia/historias",$this->datos);
    }  

    public function vista_mundo(){

        $this->datos["total_mundos"] = $this->mundoModelo->get_mundos();
        
        $this->vista("creador/mundo/mundos",$this->datos);
    }  

    public function vista_publicacion(){

        $this->datos["total_publicaciones"] = $this->publicacionModelo->get_publicaciones();
        
        $this->vista("creador/publicacion/publicaciones",$this->datos);
    }  

    public function vista_usuario(){

        $this->datos["total_usuarios"] = $this->usuarioModelo->get_usuarios();
        
        $this->vista("creador/usuario/usuarios",$this->datos);
    }  

    // ARTEFACTOS


    // EVENTOS


    // EXTRAVIADOS


    // HISTORIAS


    // MUNDOS


    // PUBLICACIONES


    // USUARIOS


}