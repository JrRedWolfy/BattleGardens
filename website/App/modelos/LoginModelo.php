<?php
    class LoginModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function login_usuario($datos){
            $this->db->query("SELECT * FROM usuario u, tipo_user t 
                WHERE u.nickname = :nickname AND u.clave = sha2(:clave,256) AND u.id_rol = t.id_rol");
        
            $this->db->bind(':nickname', $datos['nickname']);
            $this->db->bind(':clave', $datos['clave']);
    
            return $this->db->registro();

        }
    }
?>