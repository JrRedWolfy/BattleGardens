<?php
    class UsuarioModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Extraviado

        public function get_usuarios(){
            // Conseguir Extraviado(No Final)   
            $this->db->query("SELECT a.id_extraviado as id, a.img_artefacto as img, a.nombre as nombre, a.plus_ingenio as pi, a.plus_sigilo as ps, a.plus_fuerza as pf, a.valor as valor, a.autor as autor, a.fecha as fecha, p.id_progreso as progreso
                FROM extraviado a, progreso p
                WHERE a.id_progreso = e.id_progreso
                ORDER BY a.fecha");

            return $this->db->registros();
        }

        public function get_usuario(){
            // Conseguir Extraviado(No Final)   
        }

        public function new_usuario($sheet, $creador){
            // Crear Extraviado !!!! FALTA EL CREADOR EN LA TABLA
            $this->db->query("INSERT INTO extraviado (nombre, origen, titulo, ingenio, sigilo, fuerza, valor, fecha, id_progreso)
            VALUES (:nombre, :origen, :titulo, :ingenio, :sigilo, :fuerza, :valor, NOW(), :progreso)");

            $this->db->bind(':nombre',trim($sheet['nombre']));
            $this->db->bind(':origen',trim($sheet['origen']));
            $this->db->bind(':titulo',trim($sheet['titulo']));
            $this->db->bind(':ingenio',trim($sheet['ingenio']));
            $this->db->bind(':sigilo',trim($sheet['sigilo']));
            $this->db->bind(':fuerza',trim($sheet['fuerza']));
            $this->db->bind(':valor',trim($sheet['valor']));
            $this->db->bind(':progreso', "1"); // Poner el Estado En Proceso

            $this->db->bind(':creador', $creador);
           

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function del_usuario($id){
            // Eliminar Extraviado
            $this->db->query("DELETE FROM extraviado WHERE id_extraviado = :id");
            
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true; 
            }else{
                return false;
            }
        }

        public function end_usuario($id){
            // Dar por terminado un Extraviado
            $this->db->query("UPDATE extraviado SET id_progreso = 4
            WHERE id_extraviado = :id");
            // Poner en :progreso el id del estado Finalizado
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function edit_usuario(){
            // Editar Extraviado
        }

        public function activate_usuario($id){
            // Activar un Extraviado
            $this->db->query("UPDATE extraviado SET id_progreso = 2
            WHERE id_extraviado = :id");
            // Poner en :progreso el id del estado Finalizado
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }


    }

?>