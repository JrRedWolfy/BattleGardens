<?php
    class MundoModelo{
        private $db;

        // Habra que actualizar las funciones actuales con el atributo Imagen

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Artefacto
        public function get_mundos(){

            $this->db->query("SELECT id_mundo as id, nombre, sobrenombre FROM mundo");

            return $this->db->registros();
        }

        public function get_mundos_short(){
            // Añadir la imagen cuando la haya.
            $this->db->query("SELECT id_mundo as id, nombre FROM mundo");

            return $this->db->registros();
        }

        public function new_mundo($sheet, $creador){

            $this->db->query("INSERT INTO mundo(nombre, sobrenombre, descripcion) 
                VALUES (:nombre, :sobrenombre, :texto)");

                $this->db->bind(':nombre', $sheet['nombre']);
                $this->db->bind(':sobrenombre', $sheet['sobrenombre']);
                $this->db->bind(':texto', $sheet['texto']);
            
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }
        


    }

?>