<?php
    class PublicacionModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Publicacion

        public function get_publicaciones(){

            $this->db->query("SELECT * FROM publicacion");

            return $this->db->registros();


        }






    }

?>