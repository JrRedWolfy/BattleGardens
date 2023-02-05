<?php
    class LoginModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function loginUsuario($datos){
            $this->db->query("SELECT * FROM usuario WHERE nickname = :nickname AND Password = sha2(:clave,256)");
        
            $this->db->bind(':nickname', $datos['nickname']);
            $this->db->bind(':clave', $datos['clave']);

    
            return $this->db->registro();

        }
    }
?>