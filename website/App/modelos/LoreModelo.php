<?php
    class LoreModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Lore

        // DESUSO
        public function get_ids($paso, $section){
            $section = $section * $paso;
            $paso = $section + $paso;

            $this->db->query("SELECT id_historia as id FROM historia ORDER BY id_historia LIMIT $section, $paso");

            return $this->db->registros();

        }


        public function get_historias(){

            $this->db->query("SELECT h.id_historia as id, m.nombre as mundo, h.titulo, h.fecha, h.autor, p.nombre as progreso FROM historia h, mundo m, progreso p
                            WHERE h.id_mundo = m.id_mundo AND h.id_progreso = p.id_progreso");

            return $this->db->registros();
        }

        public function get_historia($id){

            $this->db->query("SELECT h.id_historia as id, m.nombre as mundo, h.titulo, h.contenido, h.fecha, h.autor, p.nombre as progreso 
                            FROM historia h, mundo m, progreso p
                            WHERE h.id_mundo = m.id_mundo AND h.id_progreso = p.id_progreso AND h.id_historia = :id");

                $this->db->bind(":id", $id);

            return $this->db->registro();
        }


        public function new_story($sheet, $creador){
            // Crear Relato
            $this->db->query("INSERT INTO historia (id_mundo, titulo, contenido, autor, fecha, id_progreso)
                VALUES (:mundo, :titulo, :contenido, :autor, NOW(), :progreso)");

            $this->db->bind(':mundo',trim($sheet['mundo']));
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

        public function del_Story($id){
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

        public function edit_Story($id){
            // Editar Relato
            $this->db->query("UPDATE historia SET titulo = :titulo, contenido = :contenido
            WHERE id_historia = :id");

            $this->db->bind(':titulo',trim($sheet['titulo']));
            $this->db->bind(':contenido',trim($sheet['contenido']));

            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function activate_Story($id){
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

        public function asign_Story($relato, $id_group){
            // Asignar un Relato a uno o mas Extraviados (Quiza solo uno, en cuyo caso se controla desde js)

            // DELETE de las relacciones actuales de la historia antes de asignar las nuevas

            $continar = true;
            foreach($id_group as $id){
                $this->db->query("INSERT INTO lore (id_historia, id_extraviado)
                VALUES (:id, :extraviado)");

                $this->db->bind(':id', $relato);
                $this->db->bind(':extraviado', $id); // Poner el Estado En Proceso

                if($this->db->execute()){
                    $continuar = true;
                }else{
                    $continuar = false;
                    break;
                }
            }
            if($continar){
                return true;
            } else {
                return false;
            }
        }

        public function get_implicados($id){

            $this->db->query("SELECT e.nombre as extraviado, e.titulo as apodo
                            FROM historia h, lore l, extraviado e
                            WHERE h.id_historia = l.id_historia AND l.id_extraviado = e.id_extraviado AND h.id_historia = :id");

                $this->db->bind(":id", $id);

            return $this->db->registros();
        }

        public function world_history(){
            // Asignar Relatos a Mundos??(No Final)   
        }

        public function show_timeline(){
            // Mostrar una linea del tiempo con los Relatos de X mundo?? (No Final)
        }



    }

?>