<?php
    class Site extends Controlador{

        public function __construct(){

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


                //if(Sesion::sesionCreada()){  //si ya estamos logueados redireccionamos
                    //redireccionar('/');

                //}

               $this->datos['error'] = $error;

               $this->vista('login', $this->datos);
            }
        }


        public function logout(){
            Sesion::cerrarSesion();
            redireccionar('/inicio');
        }

    }

?>