<?php
    class LoreModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Lore


        public function get_historias(){

            $this->db->query("SELECT h.id_historia as id, h.titulo, h.autor, year(h.fecha) as anio, p.nombre as progreso, p.color, h.fecha, m.nombre as mundo
                            FROM historia h, mundo m, progreso p
                            WHERE h.id_mundo = m.id_mundo AND h.id_progreso = p.id_progreso AND h.id_historia != 1");

            return $this->db->registros();
        }

        public function get_historia($id){

            $this->db->query("SELECT h.id_historia as id, m.nombre as mundo, m.img as world_img, h.titulo, h.contenido, h.fecha, h.autor, p.nombre as progreso 
                            FROM historia h, mundo m, progreso p
                            WHERE h.id_mundo = m.id_mundo AND h.id_progreso = p.id_progreso AND h.id_historia = :id");

                $this->db->bind(":id", $id);

            return $this->db->registro();
        }


        public function new_story($sheet){ // FUNCIONAL (Sin cambios esperados)
            // Crear Relato

            $creador = $_SESSION["usuarioSesion"]->nickname;

            $this->db->query("INSERT INTO historia (id_mundo, titulo, contenido, autor, fecha, id_progreso)
                VALUES (:mundo, :titulo, :contenido, :autor, NOW(), :progreso)");

            $this->db->bind(':mundo',trim($sheet['mundo_select']));
            $this->db->bind(':titulo',trim($sheet['titulo']));
            $this->db->bind(':contenido',trim($sheet['contenido']));
            $this->db->bind(':autor', $creador);
            $this->db->bind(':progreso', "2"); // Poner el Estado En Proceso

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function del_story($id){
            // Eliminar Relato
            $this->db->query("DELETE FROM historia WHERE id_historia = :id");
            
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function end_Story($id){
            // Dar por terminado un Relato
            $this->db->query("UPDATE historia SET id_progreso = :progreso
            WHERE id_artefacto = :id");
            // Poner en :progreso el id del estado Finalizado
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function mod_story($id, $sheet){  // FUNCIONAL (Sin cambios esperados)
            // Editar Relato
            $this->db->query("UPDATE historia SET titulo = :titulo, id_mundo = :mundo, contenido = :contenido
            WHERE id_historia = :id");

            $this->db->bind(':titulo',trim($sheet['titulo']));
            $this->db->bind(':contenido',trim($sheet['contenido']));
            $this->db->bind(':mundo',trim($sheet['mundo_select']));

            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function activate_story($id){
            // Activar un Relato
            $this->db->query("UPDATE historia SET id_progreso = :progreso
            WHERE id_historia = :id");
            // Poner en :progreso el id del estado Activado (Para realizar la consulta el Estado inicial ha de ser Finalizado)
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function add_relaccion($id, $historia){
            // Asignar una historia a un Extraviado

            $this->db->query("INSERT INTO lore (id_historia, id_extraviado)
                VALUES (:id, :extraviado)");

                $this->db->bind(':id', $historia);
                $this->db->bind(':extraviado', $id); 
             
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function del_relaccion($id, $historia){
            // Desasignar de una historia a un Extraviado

            $this->db->query("DELETE FROM lore WHERE id_extraviado = :id AND id_historia = :historia");

            $this->db->bind(':id', $id);
            $this->db->bind(':historia', $historia); 

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function get_desvinculados($historia){
            // Obtener los Extraviados con los que no esta relaccionado

            $this->db->query("SELECT DISTINCT e.id_extraviado, concat(e.nombre,', ',e.titulo) as nombre, e.icono as extraviado, m.img as mundo 
                FROM extraviado e, mundo m 
                WHERE e.origen = m.id_mundo AND e.id_extraviado != 1 AND e.id_extraviado != :id AND e.id_extraviado 
                NOT IN(SELECT l.id_extraviado FROM lore l WHERE l.id_historia=:id) 
                ORDER BY m.img, e.nombre");

                $this->db->bind(':id', $historia);

            return $this->db->registros();
            
        }
        
        public function get_vinculados($historia){
            // Obtener los Extraviados con los que no esta relaccionado

            $this->db->query("SELECT DISTINCT e.id_extraviado, concat(e.nombre,', ',e.titulo) as nombre, e.icono as extraviado, m.img as mundo 
                FROM extraviado e, mundo m 
                WHERE e.origen = m.id_mundo AND e.id_extraviado != 1 AND e.id_extraviado != :id AND e.id_extraviado 
                IN(SELECT l.id_extraviado FROM lore l WHERE l.id_historia=:id) 
                ORDER BY m.img, e.nombre");

                $this->db->bind(':id', $historia);

            return $this->db->registros();
            
        }

        public function get_expositor(){
            $this->db->query("SELECT id_historia as id, titulo 
                            FROM historia 
                            WHERE id_progreso = 5 
                            ORDER BY fecha DESC LIMIT 3");

            return $this->db->registros();
        }

        public function get_last_story(){
            $this->db->query("SELECT id_historia as id, titulo, contenido, autor 
                            FROM historia 
                            WHERE id_progreso = 5 
                            ORDER BY fecha DESC LIMIT 1");

            return $this->db->registro();
        }

        public function get_pick_story($id){
            $this->db->query("SELECT id_historia as id, titulo, contenido, autor 
                            FROM historia 
                            WHERE id_historia = :id");

                $this->db->bind(':id', $id);

            return $this->db->registro();
        }

        public function world_history(){
            // Asignar Relatos a Mundos??(No Final)   
        }

        public function show_timeline(){
            // Mostrar una linea del tiempo con los Relatos de X mundo?? (No Final)
        }

        public function get_fil_fecha(){
            $this->db->query("SELECT DISTINCT year(fecha) AS fecha 
                FROM historia 
                ORDER BY year(fecha)");

            return $this->db->registros();
        }

        public function get_fil_autor(){
            $this->db->query("SELECT DISTINCT autor 
                FROM historia
                ORDER BY autor");

            return $this->db->registros();
        }

        public function get_fil_progreso(){
            $this->db->query("SELECT DISTINCT p.id_progreso AS id, p.nombre 
                FROM progreso p, historia e 
                WHERE p.id_progreso = e.id_progreso");

            return $this->db->registros();
        }



    }

?>