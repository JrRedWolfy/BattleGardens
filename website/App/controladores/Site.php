<?php
    class Site extends Controlador{

        public function __construct(){

            Sesion::iniciarSesion($this->datos);

            $this->loginModelo = $this->modelo('LoginModelo');

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

        public function noticias(){

            $this->vista("/navegacion/news/menu", $this->datos);
        }

        public function universo(){
            $this->vista("/navegacion/universo/menu", $this->datos);
        }

        public function comunidad(){
            $this->vista("/navegacion/comunidad/menu", $this->datos);
        }

    }

?>