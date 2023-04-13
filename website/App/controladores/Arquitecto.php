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
        $this->mundoModelo = $this->modelo('MundoModelo');
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

        $this->datos["total_historias"] = $this->loreModelo->get_historias();
        
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

        $this->datos["tipos_usuario"] = $this->usuarioModelo->get_tipos();

        $this->datos["total_usuarios"] = $this->usuarioModelo->get_usuarios();
        
        $this->vista("creador/usuario/usuarios",$this->datos);
    }  

    // ARTEFACTOS


    // EVENTOS
    public function add_evento($id = 1){

        $this->datos["evento"] = $this->eventoModelo->get_evento($id);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sheet = $_POST;

            if($this->mundoModelo->new_mundo($sheet)){
                redireccionar("/arquitecto/vista_evento");
            } else {
                echo "Ni se como llegue aqui";
            }
  
        } else {
            if ($id == 0) {

                $this->vista("/creador/evento/evento_detalle", $this->datos);
            } else {

                $this->vista("/creador/evento/evento_detalle", $this->datos);
            }
        }
    }


    // EXTRAVIADOS

    public function add_extraviado($id = 1){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sheet = $_POST;

            if($this->mundoModelo->new_mundo($sheet)){
                redireccionar("/arquitecto/vista_extraviado");
            } else {
                echo "Ni se como llegue aqui";
            }
  
        } else {
            if ($id == 0) {
                $this->vista("/creador/extraviado/extraviado_detalle", $this->datos);
            } else {
                echo "Aqui editamos el extraviado pertinente";
            }
        }
    }


    // HISTORIAS


    // MUNDOS

    public function add_mundo(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sheet = $_POST;

            if($this->mundoModelo->new_mundo($sheet)){
                redireccionar("/arquitecto/vista_mundo");
            } else {
                echo "Ni se como llegue aqui";
            }
  
        } else {
            echo "WTF?";
        }
    }

    // PUBLICACIONES


    // USUARIOS

    public function add_usuario(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sheet = $_POST;

            if($this->usuarioModelo->new_usuario($sheet)){
                redireccionar("/arquitecto/vista_usuario");
            } else {
                echo "Ni se como llegue aqui";
            }
  
        } else {
            echo "WTF?";
        }
    }


}