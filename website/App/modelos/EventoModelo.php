<?php
    class EventoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Artefacto

        public function get_evens(){
            // Conseguir artefacto(No Final) 
            $this->db->query("SELECT e.id_evento as id, e.creador as creador, e.fecha as fecha, p.nombre as progreso
                FROM evento_detalle d, evento e, progreso p
                WHERE e.id_progreso = p.id_progreso AND d.id_det_evento = e.id_det_evento
                ORDER BY a.id_progreso");

            return $this->db->registros();  
        }

        public function get_eventos(){
            // Conseguir artefacto(No Final) 
            $this->db->query("SELECT ed.id_evento as id, t.nombre as tipo, ed.titulo, ed.autor, ed.fecha, ed.ultima_mod, p.nombre as progreso 
                            FROM (evento_detalle ed LEFT JOIN tipo_evento t ON ed.id_tipo_evento = t.id_tipo_evento)LEFT JOIN progreso p ON ed.id_progreso = p.id_progreso");

            return $this->db->registros();  
        }

        public function get_evento($id){

            $this->db->query("SELECT ed.id_evento as id, t.nombre as tipo, ed.titulo, ed.contenido, p.nombre as progreso 
                            FROM (evento_detalle ed LEFT JOIN tipo_evento t ON ed.id_tipo_evento = t.id_tipo_evento)LEFT JOIN progreso p ON ed.id_progreso = p.id_progreso
                            WHERE ed.id_evento = :id");

                $this->db->bind(":id", $id);

            return $this->db->registro();   
        }

        public function get_rarezas(){

            $this->db->query("SELECT e.id_rareza as id, nombre, indice_rareza as indice
                FROM rareza");

            return $this->db->registros(); 
        }

        public function new_evento(){
            // Crear Artefacto
        }

        public function del_evento(){
            // Eliminar Artefacto
        }

        public function end_evento(){
            // Dar por terminado un Artefacto
        }

        public function edit_evento(){
            // Editar Artefacto
        }

        public function test_evento(){
            // Testear Artefacto
        }

        public function activate_evento(){
            // 
        }

        


    }

?>