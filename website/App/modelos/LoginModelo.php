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

        // Funcion para dejar constancia de cuando fue la ultima vez que se conecto un usuario
        public function refresh_last_conecttion($id){
            $this->db->query("UPDATE usuario SET ultima_sesion = DATE(NOW())
                WHERE nickname = :nickname");
        
            $this->db->bind(':nickname', $id);
    
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

    }
?>