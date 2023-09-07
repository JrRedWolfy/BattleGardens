<?php
    class Site extends Controlador{

        public function __construct(){

            Sesion::iniciarSesion($this->datos);

            $this->loginModelo = $this->modelo('LoginModelo');
            $this->usuarioModelo = $this->modelo('UsuarioModelo');
            $this->loreModelo = $this->modelo('LoreModelo');

            if(isset($this->datos['usuarioSesion'])){
                $this->datos["accesibilidad"] = $this->usuarioModelo->get_preferencias();
            }
        }
        
        public function index($error =''){


            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $this->datos['nickname'] = trim($_POST['nickname']);
                $this->datos['clave'] = trim($_POST['clave']);

                $usuarioSesion = $this->loginModelo->loginUsuario($this->datos);

                if(isset($usuarioSesion) && !empty($usuarioSesion)){  //Si tiene datos el objeto devuelto entramos
                    
                    Sesion::crearSesion($usuarioSesion);

                    redireccionar('/inicio');
                } else{
                    redireccionar('/login/index/error_1');
                }

            }else{

               redireccionar("/inicio");
            }
        }

        public function home(){

            $this->vista("/landing_page", $this->datos);
        }

        public function noticias(){

            $this->vista("/navegacion/news/menu", $this->datos);
        }

        public function universo($id = 0){

            $this->datos['expositor'] = $this->loreModelo->get_expositor();
            if ($id == 0) {
                $this->datos['historia'] = $this->loreModelo->get_last_story();
            } else {
                $this->datos['historia'] = $this->loreModelo->get_pick_story($id);
            }

            $this->vista("/navegacion/universo/menu", $this->datos);
        }

        public function comunidad(){
            $this->vista("/navegacion/comunidad/menu", $this->datos);
        }

        public function profile(){
            $this->vista("/navegacion/utiles/profile", $this->datos);
        }


        // Cambiar el color de Accesibilidad
        public function set_Pcolor($color){
            $data["accesibilidad"] = $this->usuarioModelo->get_color();

            $this->usuarioModelo->set_color($color);
            
            $this->vistaApi($data);
        }

        // Cambiar el tamaño de Accesibilidad
        public function set_Psize($size){
            $data["accesibilidad"] = $this->usuarioModelo->get_size();

            $this->usuarioModelo->set_size($size);

            $this->vistaApi($data);
        }

    }

?>