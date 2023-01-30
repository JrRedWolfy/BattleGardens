<?php
    class LoreModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Lore

        public function new_Story(){
            // Crear Relato
        }

        public function del_Story(){
            // Eliminar Relato
        }

        public function end_Story(){
            // Dar por terminado un Relato
        }

        public function edit_Story(){
            // Editar Relato
        }

        public function test_Story(){
            // Testear Relato
        }

        public function activate_Story(){
            // Activar un Relato
        }

        public function asign_Story(){
            // Asignar un Relato a uno o mas Extraviados (Quiza solo uno, en cuyo caso se controla desde js)
        }

        public function world_history(){
            // Asignar Relatos a Mundos??(No Final)   
        }

        public function show_timeline(){
            // Mostrar una linea del tiempo con los Relatos de X mundo?? (No Final)
        }



    }

?>