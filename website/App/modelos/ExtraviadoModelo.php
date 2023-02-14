<?php
    class ExtraviadoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Extraviado

        public function new_extraviado($sheet, $creador){
            // Crear Extraviado !!!! FALTA EL CREADOR EN LA TABLA
            $this->db->query("INSERT INTO extraviado (nombre, origen, titulo, ingenio, sigilo, fuerza, valor, fecha, id_progreso)
            VALUES (:nombre, :origen, :titulo, :ingenio, :sigilo, :fuerza, , NOW(), :progreso)");

            $this->db->bind(':nombre',trim($sheet['nombre']));
            $this->db->bind(':origen',trim($sheet['origen']));
            $this->db->bind(':titulo',trim($sheet['titulo']));
            $this->db->bind(':ingenio',trim($sheet['ingenio']));
            $this->db->bind(':sigilo',trim($sheet['sigilo']));
            $this->db->bind(':fuerza',trim($sheet['fuerza']));
            $this->db->bind(':fuerza',trim($sheet['fuerza']));
            $this->db->bind(':titulo', $creador);
            $this->db->bind(':progreso', "1"); // Poner el Estado En Proceso

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function del_extraviado($id){
            // Eliminar Extraviado
            $this->db->query("DELETE FROM extraviado WHERE id_extraviado = :id");
            
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true; 
            }else{
                return false;
            }
        }

        public function end_extraviado(){
            // Dar por terminado un Extraviado
        }

        public function edit_extraviado(){
            // Editar Extraviado
        }

        public function test_extraviado(){
            // Testear Extraviado
        }

        public function activate_extraviado(){
            // Activar un Extraviado
        }

        public function give_extraviado(){
            // Dar Extraviado a un jugador
        }

        public function get_extraviado(){
            // Conseguir Extraviado(No Final)   
        }

        public function add_relaccion(){
            // Añadir Extraviados con los que esta relaccionado
        }


    }

?>