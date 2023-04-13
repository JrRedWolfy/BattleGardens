<?php
    class RondaModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Ronda


        // Funcion para crear un nuevo juego
        public function new_game($id, $sheet){

            $this->db->query("INSERT INTO juego(/*cosas*/) VALUES (/*Mas coosas*/)");
        
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        
        }

        // Funcion para obtener los miembros de un equipo
        public function get_miembros($game, $id){

            $this->db->query("SELECT * FROM (juego j INNER JOIN player p ON j.nickname = p.nickname) LEFT JOIN extraviado_detalle ed ON j.id_game = ed.id_game
                            WHERE j.id_game = :game AND p.nickname = :id
                            ORDER BY ronda_rescate, ed.id_extraviado");
        
            $this->db->bind(":game", $game);
            $this->db->bind(":id", $id);
                    
            $this->db->registros();
        }

        // Funcion para obtener los estados de un extraviado en juego
        public function get_estados_extra($game, $id){
            $this->db->query("SELECT * FROM extraviado_detalle ed, estado_extraviado ex, estado_extra e, juego j
                            WHERE ed.id_extraviado = ex.id_extraviado AND ex.id_estado_extra = e.id_estado_extra AND ed.id_extraviado = :id AND j.id_game = :game AND p.nickname = :id");
        
            $this->db->bind(":game", $game);
            $this->db->bind(":id", $id);
        
            $this->db->registros();
        
        }

        
        // Funcion para obtener las maquinas
        public function get_machines(){
        
            $this->db->query("SELECT * FROM maquina, estados_maquina, estado WHERE ...");
        
            $this->db->registros();
        }


        // Funcion para calcular y devolver la suerte de un equipo
        public function get_lucky($game){

            //Aplicar a: * = X^2 + X
            $this->db->query("SELECT SUM(*) FROM extraviado_detalle ed WHERE ed.id_juego = :id_juego GROUP BY ed.id_juego");
        
            $this->db->bind("id_juego", $game);
        
            $this->db->registro();
            
        }

        // Funcion para buscar la conclusion de un evento (evento+activador)
        public function get_conclusion($evento, $activador, $suerte){
        
            $this->db->query();
        }
        
        // Funcion para asignar un artefacto a un juego
        public function earn_artifact($player, $id){
        
            $this->db->query("INSERT INTO botin(nickname, id_artefacto) VALUES (:player, :id)");
        
            $this->db->bind(":player", $player);
            $this->db->bind(":id", $id);
        
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }



    }

?>