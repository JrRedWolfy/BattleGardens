<?php
    class ArtefactoModelo{
        private $db;

        // Habra que actualizar las funciones actuales con el atributo Imagen

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Artefacto
        public function get_artefactos(){
            // Conseguir todos los Artefactos

            $this->db->query("SELECT a.id_artefacto as id, a.img_artefacto as img, a.nombre as nombre, a.plus_carisma as pc, a.plus_fuerza as pf, a.plus_inteligencia as pi, plus_infortuna as ps, a.autor as autor, a.fecha as fecha, p.id_progreso as progreso
                FROM artefacto a, progreso p
                WHERE a.id_progreso = p.id_progreso
                ORDER BY a.fecha");

            return $this->db->registros();
        }

        public function get_artefacto($id){
            // Conseguir artefacto(No Final)
            $this->db->query("SELECT a.id_artefacto as id, a.img_artefacto as img, a.nombre as nombre, a.plus_ingenio as pi, a.plus_sigilo as ps, a.plus_fuerza as pf, a.valor as valor, a.autor as autor, a.fecha as fecha, p.id_progreso as progreso
                FROM artefacto a, progreso p
                WHERE a.id_progreso = e.id_progreso AND a.id_artefacto = :id
                ORDER BY a.fecha");

                bind(":id", $id);

            return $this->db->registro();   
        }

        public function new_artefacto($sheet, $creador){
            // Crea un artefacto
            $this->db->query("INSERT INTO artefacto (nombre, plus_ingenio, plus_sigilo, plus_fuerza, valor, autor, fecha, progreso)
                VALUES (:nombre, :pi, :ps, :pf, :valor, :autor, NOW(), :progreso)");

            $this->db->bind(':nombre',trim($sheet['nombre']));
            $this->db->bind(':pi',trim($sheet['ingenio']));
            $this->db->bind(':ps',trim($sheet['sigilo']) );
            $this->db->bind(':pf',trim($sheet['fuerza']));
            $this->db->bind(':valor',trim($sheet['valor']));
            $this->db->bind(':autor', $creador);
            $this->db->bind(':progreso', "1"); // Poner el Estado En Proceso

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function del_artefacto($id){
            
            $this->db->query("DELETE FROM artefacto WHERE id_artefacto = :id");
            
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true; // OBSERVACION; Puede que borrar un curso no sea buena idea si eso conlleva eliminar los movimientos asociados.
            }else{
                return false;
            }
        }

        public function end_artefacto($id){
            // Dar por terminado un Artefacto
            $this->db->query("UPDATE artefacto SET id_progreso = :progreso
            WHERE id_artefacto = :id");
            // Poner en :progreso el id del estado Finalizado
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function edit_artefacto($sheet, $id){
            // Editar Artefacto
            $this->db->query("UPDATE artefacto SET nombre = :nombre, plus_ingenio = :pi, plus_sigilo = :ps, plus_fuerza = :pf, valor = :valor
            WHERE id_artefacto = :id");

            $this->db->bind(':nombre',trim($sheet['nombre']));
            $this->db->bind(':pi',trim($sheet['ingenio']));
            $this->db->bind(':ps',trim($sheet['sigilo']) );
            $this->db->bind(':pf',trim($sheet['fuerza']));
            $this->db->bind(':valor',trim($sheet['valor']));

            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function test_artefacto($id){
            // Testear Artefacto
            $this->db->query("UPDATE artefacto SET id_progreso = :progreso
            WHERE id_artefacto = :id");
            // Poner en :progreso el id del estado En Testeo (Para realizar la consulta el Estado inicial ha de ser Finalizado)
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function activate_artefacto($id){
            // Activar Artefacto
            $this->db->query("UPDATE artefacto SET id_progreso = :progreso
            WHERE id_artefacto = :id");
            // Poner en :progreso el id del estado Activado (Para realizar la consulta el Estado inicial ha de ser Finalizado)
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function collect_artefacto($id, $game){
            // Obtener un artefacto en un juego (Obtenibles en aventuras y en Eventos especiales)
            $this->db->query("INSERT INTO botin (id_artefacto, id_juego)
                VALUES (:id, :game)");

            $this->db->bind(':id', $id);
            $this->db->bind(':game', $game);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //!!  !!  !!  !!  !!  !!  !!
        // FUNCION INFUNCIONAL
        public function give_artefacto($id, $player){
            // Dar un artefacto a un jugador (Obtenibles por compra o al final de un juego Exitoso)
            $this->db->query("INSERT INTO botin (id_artefacto, id_juego)
                VALUES (:id, :game)");

            $this->db->bind(':id', $id);
            $this->db->bind(':game', $game);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        


    }

?>