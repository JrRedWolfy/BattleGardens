<?php
    class EventoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Artefacto

        public function get_eventos(){
            // Conseguir artefacto(No Final) 
            $this->db->query("SELECT a.id_evento as id, a.img_artefacto as img, a.nombre as nombre, a.plus_ingenio as pi, a.plus_sigilo as ps, a.plus_fuerza as pf, a.valor as valor, a.autor as autor, a.fecha as fecha, p.id_progreso as progreso
                FROM evento e, progreso p
                WHERE e.id_progreso = p.id_progreso
                ORDER BY a.id_progreso");

            return $this->db->registros();  
        }

        public function get_evento(){
            // Conseguir artefacto(No Final)   
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