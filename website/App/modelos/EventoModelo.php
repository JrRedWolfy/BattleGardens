<?php
    class EventoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Eventos

        public function get_eventos(){
            // Conseguir artefacto(No Final) 
            $this->db->query("SELECT e.id_evento as id, e.titulo, e.autor, year(e.fecha) as anio, p.nombre as progreso, p.color, e.fecha, e.id_tipo_evento, e.ultima_mod 
                FROM evento e, progreso p 
                WHERE e.id_progreso = p.id_progreso AND e.id_evento != 1
                ORDER BY e.id_evento");

            return $this->db->registros();  
        }

        public function get_evento($id){

            $this->db->query("SELECT e.id_evento as id, e.titulo, e.id_tipo_evento as tipo, e.ultima_mod, e.autor, e.fecha, p.nombre as progreso, e.contenido 
            FROM evento e, progreso p 
            WHERE e.id_progreso = p.id_progreso AND e.id_evento = :id
            ORDER BY e.id_evento");

                $this->db->bind(":id", $id);

            return $this->db->registro();   
        }

        public function get_tipos(){

            $this->db->query("SELECT id_tipo_evento as id, nombre
                FROM tipo_evento");

            return $this->db->registros(); 
        }

        public function new_evento($sheet){
            // Crear Evento

            $creador = $_SESSION["usuarioSesion"]->nickname;

            $this->db->query("INSERT INTO evento (id_tipo_evento, titulo, contenido, autor, fecha, id_progreso)
            VALUES (:tipo, :nombre, :descrip, :autor, NOW(), :progreso)");

                $this->db->bind(':tipo',trim($sheet['tipo_select']));
                $this->db->bind(':nombre',trim($sheet['titulo']));
                $this->db->bind(':descrip',trim($sheet['contenido']));
                $this->db->bind(':autor', $creador);
                $this->db->bind(':progreso', "2"); // Poner el Estado En Desarrollo

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }

        public function get_arquetipo($id, $arquetipo){
            // Obtener Arquetipo
            $line = "";
            if ($arquetipo != "custom"){
                $line = "activacion = :arquetipo AND ";
            }

            $this->db->query("SELECT id_elemento as id, nombre, imagen_elemento as img, activacion
                FROM elemento 
                WHERE $line id_elemento 
                NOT IN (SELECT id_elemento FROM evento_activacion WHERE id_evento = :id);");

                $this->db->bind(":id", $id);
                if ($arquetipo != "custom"){
                    $this->db->bind(":arquetipo", $arquetipo);
                }

            return $this->db->registros();

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

        public function del_activador($elemento ,$evento){
            // Eliminar Activador

            $this->db->query("DELETE FROM evento_activador WHERE id_extraviado = :id AND id_conocido = :conocido");

            $this->db->bind(':id', $id);
            $this->db->bind(':conocido', $conocido); 

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }

        public function add_activador(){
            // Eliminar Activador

            $this->db->query("INSERT INTO evento_activador(id_evento, id_elemento, cantidad)  VALUES () WHERE id_extraviado = :id");

            $this->db->bind(':id', $id);
            $this->db->bind(':conocido', $conocido); 

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }

        public function get_activadores(){
            // Eliminar Activador


        }



        public function get_fil_fecha(){
            $this->db->query("SELECT DISTINCT year(fecha) AS fecha 
                FROM evento 
                ORDER BY year(fecha)");

            return $this->db->registros();
        }

        public function get_fil_autor(){
            $this->db->query("SELECT DISTINCT autor 
                FROM evento
                ORDER BY autor");

            return $this->db->registros();
        }

        public function get_fil_progreso(){
            $this->db->query("SELECT DISTINCT p.id_progreso AS id, p.nombre 
                FROM progreso p, evento e 
                WHERE p.id_progreso = e.id_progreso");

            return $this->db->registros();
        }


    }

?>