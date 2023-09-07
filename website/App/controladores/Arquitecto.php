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
        $this->datos["accesibilidad"] = $this->usuarioModelo->get_preferencias();

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
        $this->datos["fil_fecha"] = $this->artefactoModelo->get_fil_fecha();
        $this->datos["fil_autor"] = $this->artefactoModelo->get_fil_autor();
        $this->datos["fil_progreso"] = $this->artefactoModelo->get_fil_progreso();
        $this->datos["progresos"] = $this->usuarioModelo->get_progresos();

        $this->vista("creador/artefacto/artefactos",$this->datos);
    }  

    public function vista_evento(){
        
        $this->datos["total_eventos"] = $this->eventoModelo->get_eventos();
        $this->datos["fil_fecha"] = $this->eventoModelo->get_fil_fecha();
        $this->datos["fil_autor"] = $this->eventoModelo->get_fil_autor();
        $this->datos["fil_progreso"] = $this->eventoModelo->get_fil_progreso();
        $this->datos["progresos"] = $this->usuarioModelo->get_progresos();
       
        $this->vista("creador/evento/eventos",$this->datos);
    }  

    public function vista_extraviado(){

        $this->datos["total_extraviados"] = $this->extraviadoModelo->get_extraviados();
        $this->datos["fil_fecha"] = $this->extraviadoModelo->get_fil_fecha();
        $this->datos["fil_autor"] = $this->extraviadoModelo->get_fil_autor();
        $this->datos["fil_progreso"] = $this->extraviadoModelo->get_fil_progreso();
        $this->datos["progresos"] = $this->usuarioModelo->get_progresos();
        
        $this->vista("creador/extraviado/extraviados",$this->datos);
    }  

    public function vista_historia(){

        $this->datos["total_historias"] = $this->loreModelo->get_historias();
        $this->datos["fil_fecha"] = $this->loreModelo->get_fil_fecha();
        $this->datos["fil_autor"] = $this->loreModelo->get_fil_autor();
        $this->datos["fil_progreso"] = $this->loreModelo->get_fil_progreso();
        $this->datos["progresos"] = $this->usuarioModelo->get_progresos();
        
        $this->vista("creador/historia/historias",$this->datos);
    }  

    public function vista_mundo(){

        $this->datos["total_mundos"] = $this->mundoModelo->get_mundos();
        
        $this->vista("creador/mundo/mundos",$this->datos);
    }  

    public function vista_publicacion(){

        $this->datos["total_publicaciones"] = $this->publicacionModelo->get_publicaciones();
        $this->datos["progresos"] = $this->usuarioModelo->get_progresos();
        
        $this->vista("creador/publicacion/publicaciones",$this->datos);
    }  

    public function vista_usuario(){

        $this->datos["total_usuarios"] = $this->usuarioModelo->get_usuarios();
        
        $this->vista("creador/usuario/usuarios",$this->datos);
    }  

    // ARTEFACTOS

    public function add_artefacto($id = 1){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sheet = $_POST;

            if ($id != 1){
            if($this->artefactoModelo->mod_artefacto($sheet, $id)){
                redireccionar("/arquitecto/add_artefacto/$id");
            } else {
                echo "Ni se como llegue aqui";
            }

            } else {

                if($this->artefactoModelo->new_artefacto($sheet)){
                    redireccionar("/arquitecto/vista_artefacto");
                } else {
                    echo "Ni se como llegue aqui";
                }
            }
  
        } else {

            $this->datos["artefacto"] = $this->artefactoModelo->get_artefacto($id);
            $this->datos["rarezas"] = $this->artefactoModelo->get_rarezas();


            if ($id == 1) {
                $this->datos["editar"] = "no";
                $this->vista("/creador/artefacto/artefacto_detalle", $this->datos);
            } else {
                $this->datos["editar"] = "yes";
                $this->vista("/creador/artefacto/artefacto_detalle", $this->datos);
            }
        }
    }

    public function finish_artefacto($id){

        if($this->artefactoModelo->end_artefacto($id)){
            redireccionar("/arquitecto/vista_artefacto");
        } else {
            echo "Ni se como llegue aqui[Fallo el UPDATE]";
        }
    }

    public function dismiss_artefacto(){
        $id = $_POST["id"];
        if($this->artefactoModelo->del_artefacto($id)){
            redireccionar("/arquitecto/vista_artefacto");
        } else {
            echo "Ni se como llegue aqui[Fallo el UPDATE]";
        }
    }

    // EVENTOS
    public function add_evento($id = 1){

        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sheet = $_POST;

            if($id != 1){
                //Editar
                if($this->eventoModelo->mod_evento($sheet)){
                    redireccionar("/arquitecto/vista_evento");
                } else {
                    echo "Ni se como llegue aqui";
                }
            } else {
                // Crear
                if($this->eventoModelo->new_evento($sheet)){
                    redireccionar("/arquitecto/vista_evento");
                } else {
                    echo "Ni se como llegue aqui";
                }
            }

        } else {
            $this->datos["evento"] = $this->eventoModelo->get_evento($id);
            $this->datos["tipos"] = $this->eventoModelo->get_tipos();

            if ($id == 1) {
                $this->datos["editar"] = "no";
                $this->vista("/creador/evento/evento_detalle", $this->datos);
            } else {
                $this->datos["editar"] = "yes";
                $this->vista("/creador/evento/evento_detalle", $this->datos);
            }
        }
    }

    public function get_arquetipo($id, $arquetipo){

        $data["arquetipo"] = $this->eventoModelo->get_arquetipo($id, $arquetipo);

        $this->vistaApi($data);
    }

    

    public function set_activador($id, $main, $insert){
        if ($id != -1){

            if ($insert == 1){
                $this->extraviadoModelo->add_activador($id, $main);
            } else {
                $this->extraviadoModelo->del_activador($id, $main);
            }
        }
        $data["activadores"] = $this->extraviadoModelo->get_activadores($main);

        $this->vistaApi($data);
    }

    // EXTRAVIADOS


    public function add_extraviado($id = 1){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sheet = $_POST;

            if($id != 1){
                //Editar

                if($this->extraviadoModelo->mod_extraviado($sheet, $id)){
                    redireccionar("/arquitecto/add_extraviado/$id");
                } else {
                    echo "Ni se como llegue aqui";
                }
            } else {
                // Crear
                if($this->extraviadoModelo->new_extraviado($sheet)){
                    redireccionar("/arquitecto/vista_extraviado");
                } else {
                    echo "Ni se como llegue aqui";
                }
            }
  
        } else {
            
            $this->datos["extraviado"] = $this->extraviadoModelo->get_extraviado($id);
            $this->datos["mundos"] = $this->mundoModelo->get_mundos_short();
            $this->datos["rarezas"] = $this->artefactoModelo->get_rarezas();

            if ($id == 1) {
                $this->datos["editar"] = "no";
                $this->vista("/creador/extraviado/extraviado_detalle", $this->datos);
            } else {
                $this->datos["editar"] = "yes";
                $this->vista("/creador/extraviado/extraviado_detalle", $this->datos);
            }
        }
    }

    public function dismiss_extraviado(){
        $id = $_POST["id"];
        if($this->extraviadoModelo->del_extraviado($id)){
            redireccionar("/arquitecto/vista_extraviado");
        } else {
            echo "Ni se como llegue aqui[Fallo el UPDATE]";
        }
    }

    public function get_conocidos($id){
        $data["desconocidos"] = $this->extraviadoModelo->get_desconocidos($id);
        //$data["conocidos"] = $this->extraviadoModelo->get_conocidos($id);
        $this->vistaApi($data);
    }

    public function set_conocido($id, $main, $insert){
        if ($id != -1){

            if ($insert == 1){
                $this->extraviadoModelo->add_conocido($id, $main);
            } else {
                $this->extraviadoModelo->del_conocido($id, $main);
            }
        }
        $data["conocidos"] = $this->extraviadoModelo->get_conocidos($main);

        $this->vistaApi($data);
    }

    


    // HISTORIAS (CRUD BASICO)
    public function add_historia($id = 1){

        
        //$this->datos["involucrados"] = $this->loreModelo->get_implicados($id);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sheet = $_POST;
            
            if ($id != 1){
                
                if($this->loreModelo->mod_story($id, $sheet)){
                    redireccionar("/arquitecto/add_historia/$id");
                } else {
                    echo "Ni se como llegue aqui";
                }
            } else {
                $autor = $this->datos["usuarioSesion"]->nickname;

                if($this->loreModelo->new_story($sheet)){
                    redireccionar("/arquitecto/vista_historia");
                } else {
                    echo "Ni se como llegue aqui";
                }
            }
  
        } else {

            $this->datos["historia"] = $this->loreModelo->get_historia($id);
            $this->datos["mundos"] = $this->mundoModelo->get_mundos_short();

            if ($id == 1) {
                // CREAR NUEVO
                $this->datos["editar"] = "no";

                $this->vista("/creador/historia/historia_detalle", $this->datos);
            } else {
                // EDITAR
                $this->datos["editar"] = "yes";
                $this->vista("/creador/historia/historia_detalle", $this->datos);
            }
        }
    }

    public function dismiss_historia(){
        $id = $_POST['id'];
        
        if($this->loreModelo->del_story($id)){
            redireccionar("/arquitecto/vista_historia");
        } else {
            echo "Ni se como llegue aqui(Fallo en la consulta)";
        }
    }

    public function get_desvinculados($id){
        $data["desvinculados"] = $this->loreModelo->get_desvinculados($id);
        $this->vistaApi($data);
    }

    public function set_vinculo($id, $historia, $insert){
        if ($id != -1){

            if ($insert == 1){
                $this->loreModelo->add_relaccion($id, $historia);
            } else {
                $this->loreModelo->del_relaccion($id, $historia);
            }
        }
        $data["vinculados"] = $this->loreModelo->get_vinculados($historia);

        $this->vistaApi($data);
    }

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

    public function add_publicacion(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sheet = $_POST;

            if($this->publicacionModelo->new_publicacion($sheet)){
                redireccionar("/arquitecto/vista_publicacion");
            } else {
                echo "Ni se como llegue aqui";
            }
  
        } else {
            $this->vista("/creador/historia/publicacion_detalle", $this->datos);
        }
    }


    // USUARIOS ()

    public function add_usuario($id = 'Time Anomaly'){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sheet = $_POST;

            if($this->usuarioModelo->new_usuario($sheet)){
                redireccionar("/arquitecto/vista_usuario");
            } else {
                echo "Ni se como llegue aqui";
            }

            if ($id != 'Time Anomaly'){
                
                if($this->usuarioModelo->mod_usuario($id, $sheet)){
                    redireccionar("/arquitecto/vista_usuario");
                } else {
                    echo "Ni se como llegue aqui";
                }
            } else {
                if($this->usuarioModelo->new_usuario($sheet)){
                    redireccionar("/arquitecto/vista_usuario");
                } else {
                    echo "Ni se como llegue aqui";
                }
            }
  
        } else {
            $this->datos["tipos_usuario"] = $this->usuarioModelo->get_tipos();

            if ($id == 'Time Anomaly') {
                // CREAR NUEVO
                $this->datos["editar"] = "no";

                $this->vista("/creador/usuario/usuario_detalle", $this->datos);
            } else {
                // EDITAR
                $this->datos["editar"] = "yes";
                $this->vista("/creador/usuario/usuario_detalle", $this->datos);
            }
        }
    }

    public function ban_usuario(){
        $id = $_POST['id'];

        if($this->usuarioModelo->ban_usuario($id)){
            redireccionar("/arquitecto/vista_usuario");
        } else {
            echo "Ni se como llegue aqui";
        }


    }


}