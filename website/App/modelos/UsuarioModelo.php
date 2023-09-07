<?php
    class UsuarioModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Usuario

        public function get_usuarios(){
           
            $this->db->query("SELECT nickname, email, YEAR(CURDATE())-YEAR(fecha_creacion) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(fecha_creacion,'%m-%d'), 0 , -1 ) AS antiguedad ,ultima_sesion, t.nombre AS rol 
                            FROM usuario u, tipo_user t WHERE u.id_rol = t.id_rol AND inhabilitado = 0");
            return $this->db->registros();

        }

        public function get_usuario($id){
            // Conseguir Usuario(No Final)   
            $this->db->query("SELECT nickname, email, clave, id_rol, ultima_sesion FROM usuario WHERE nickname = :id");

            $this->db->bind(':id', $id);

            return $this->db->registro();

        }


        public function new_usuario($sheet){
            // Crear Extraviado !!!! FALTA EL CREADOR EN LA TABLA
            $this->db->query("INSERT INTO usuario(nickname, email, clave, id_rol, fecha_creacion) 
                VALUES (:nick, :email, SHA2(:clave, 256), :rol, CURDATE())");

                $this->db->bind(':nick', $sheet['nick']);
                $this->db->bind(':email', $sheet['email']);
                $this->db->bind(':clave', $sheet['clave']);
                $this->db->bind(':rol', $sheet['rol']);
            
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
            
        }

        public function ban_usuario($id){
            // Desactivar Usuario
            $this->db->query("UPDATE usuario SET inhabilitado = 1 WHERE nickname = :nick");

            $this->db->bind(':nick', $id);

            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
           
        }

        public function edit_usuario($sheet, $id){
            // Editar Extraviado
            $this->db->query("UPDATE usuario SET nickname = :new_nick, email = :email, clave = SHA2(:clave, 256) 
                WHERE nickname = :nick");

                $this->db->bind(':new_nick', $sheet['nick']);
                $this->db->bind(':email', $sheet['email']);
                $this->db->bind(':clave', $sheet['clave']);
                $this->db->bind(':nick', $id);

            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        // Plantear la posibilidad de conbinar ambas funciones pasando parametro true/false
        public function activate_usuario($id){
            // Activar un Extraviado
            $this->db->query("UPDATE usuario SET id_estado = 1 WHERE nickname = :nick");

            $this->db->bind(':nick', $id);

            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function give_ryoz($cantidad, $id){
            $this->db->query("UPDATE usuario SET ryoz = ryoz+:ryoz 
                WHERE nickname = :nick");

                $this->db->bind(':ryoz', $cantidad);
                $this->db->bind(':nick', $id);

            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function last_date($id){
            $this->db->query("UPDATE usuario SET ultima_sesion = NOW() 
                WHERE nickname = :nick");

                $this->db->bind(':nick', $id);

            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function set_rol($rol, $id){
            $this->db->query("UPDATE usuario SET id_rol = :rol
                WHERE nickname = :nick");

                $this->db->bind(':rol', $rol);
                $this->db->bind(':nick', $id);

            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        public function get_tipos(){
            $this->db->query("SELECT id_rol as id, nombre FROM tipo_user");
            return $this->db->registros();
        }

        public function set_color($color){

            $id = $_SESSION['usuarioSesion']->nickname;

            $this->db->query("UPDATE usuario SET color = :color
            WHERE nickname = :nick");

            $this->db->bind(':color', $color);
            $this->db->bind(':nick', $id);

            $this->db->execute();

        }

        public function set_size($size){

            $id = $_SESSION['usuarioSesion']->nickname;

            $this->db->query("UPDATE usuario SET letra = :size
            WHERE nickname = :nick");

            $this->db->bind(':size', $size);
            $this->db->bind(':nick', $id);

            $this->db->execute();
        }

        public function get_color(){

            $id = $_SESSION['usuarioSesion']->nickname;

            // Tomamos valores de accesibilidad Actuales
            $this->db->query("SELECT color FROM usuario
            WHERE nickname = :nick");

            $this->db->bind(':nick', $id);

            return $this->db->registro();
        }

        public function get_size(){

            $id = $_SESSION['usuarioSesion']->nickname;

            // Tomamos valores de accesibilidad Actuales
            $this->db->query("SELECT letra FROM usuario
            WHERE nickname = :nick");

            $this->db->bind(':nick', $id);

            return $this->db->registro();
        }

        public function get_preferencias(){
            $id = $_SESSION['usuarioSesion']->nickname;

            // Tomamos valores de accesibilidad Actuales
            $this->db->query("SELECT color, letra FROM usuario
            WHERE nickname = :nick");

            $this->db->bind(':nick', $id);

            return $this->db->registro();
        }

        public function get_progresos(){

            // Tomamos valores de la tabla progreso
            $this->db->query("SELECT id_progreso as id, nombre, color, texto FROM progreso");

            return $this->db->registros();
        }

    }

?>