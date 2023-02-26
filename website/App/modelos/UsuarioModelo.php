<?php
    class UsuarioModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Usuario

        public function get_usuarios(){
           
            $this->db->query("SELECT nickname, email, clave, id_rol FROM usuario");
            return $this->db->registros();

        }

        public function get_usuario($id){
            // Conseguir Usuario(No Final)   
            $this->db->query("SELECT * FROM usuario WHERE nickname = :id");

            $this->db->bind(':id', $id);

            return $this->db->registro();

        }


        public function new_usuario($sheet, $creador){
            // Crear Extraviado !!!! FALTA EL CREADOR EN LA TABLA
           
        }

        public function del_usuario($id){
            // Eliminar Extraviado
           
        }

        public function end_usuario($id){
            // Dar por terminado un Extraviado
           
        }

        public function edit_usuario($sheet, $id){
            // Editar Extraviado
        }

        public function activate_usuario($id){
            // Activar un Extraviado
           
        }

        


    }

?>