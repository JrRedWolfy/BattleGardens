<?php
    class EventoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Artefacto

        public function new_artefacto(){
            // Crear Artefacto
        }

        public function del_artefacto(){
            // Eliminar Artefacto
        }

        public function end_artefacto(){
            // Dar por terminado un Artefacto
        }

        public function edit_artefacto(){
            // Editar Artefacto
        }

        public function test_artefacto(){
            // Testear Artefacto
        }

        public function activate_artefacto(){
            // 
        }

        public function give_artefacto(){
            // Dar artefacto a un jugador
        }

        public function get_artefacto(){
            // Conseguir artefacto(No Final)   
        }


    }

?>