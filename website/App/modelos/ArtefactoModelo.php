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

            $this->db->query("SELECT a.id_artefacto as id, a.img as img, a.nombre as nombre, a.plus_carisma as pc, a.plus_fuerza as pf, a.plus_inteligencia as pi, plus_desventura as ps, a.autor as autor, a.fecha as fecha, p.nombre as progreso
                FROM artefacto a, progreso p
                WHERE a.id_progreso = p.id_progreso
                ORDER BY a.fecha");

            return $this->db->registros();
        }

        public function get_artefacto($id){
            // Conseguir artefacto(No Final)
            $this->db->query("SELECT a.id_artefacto as id, a.img as img, a.nombre as nombre, a.plus_carisma as pc, a.plus_fuerza as pf, a.plus_inteligencia as pi, plus_desventura as ps, a.autor as autor, a.fecha as fecha, p.id_progreso as progreso
                FROM artefacto a, progreso p
                WHERE a.id_progreso = p.id_progreso AND a.id_artefacto = :id
                ORDER BY a.fecha");

                $this->db->bind(":id", $id);

            return $this->db->registro();   
        }

        // FUNCION FINAL [[Falta adaptar imagenes]]
        public function new_artefacto($sheet, $creador){
            // Crea un artefacto
            $this->db->query("INSERT INTO artefacto (id_rareza, img, nombre, descripcion, plus_carisma, plus_fuerza, plus_inteligencia, plus_desventura, autor, fecha, progreso)
                VALUES (:rareza, 'imagen', :nombre, :descrip, :pc, :pf, :pi, :pl, :autor, NOW(), :progreso)");

            $this->db->bind(':rareza',trim($sheet['rareza']));
            $this->db->bind(':nombre',trim($sheet['titulo']));
            $this->db->bind(':descrip',trim($sheet['descripcion']));
            $this->db->bind(':pc',trim($sheet['carInput']));
            $this->db->bind(':pf',trim($sheet['fueInput']) );
            $this->db->bind(':pi',trim($sheet['intInput']));
            $this->db->bind(':pl',trim($sheet['forInput']));
            $this->db->bind(':autor', $creador);
            $this->db->bind(':progreso', "1"); // Poner el Estado En Proceso

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        // FUNCION FINAL [[Sin comentarios adicionales]]
        public function del_artefacto($id){
            
            // Dar por cancelado un artefacto (''borrar'')
            $this->db->query("UPDATE artefacto SET inhabilitado = 1
            WHERE id_artefacto = :id");
            // Poner Deshabilitado
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        // FUNCION FINAL [[Fecha de Finalizacion¿?]]
        public function end_artefacto($id){
            // Dar por terminado un Artefacto
            $this->db->query("UPDATE artefacto SET id_progreso = :progreso
            WHERE id_artefacto = :id");
            // Poner en :progreso el id del estado Finalizado
            $this->db->bind(':id', $id);
            $this->db->bind(':progreso', 3);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        // FUNCION FINAL [[Arreglar Imagen]]
        public function edit_artefacto($sheet, $id){
            // Editar Artefacto
            $this->db->query("UPDATE artefacto SET nombre = :nombre, id_rareza = :rareza, img = :imagen, descripcion = :descrip, plus_carisma = :pc, plus_fuerza = :pf, plus_inteligencia = :pi, plus_desventura = :pl
                            WHERE id_artefacto = :id");

            $this->db->bind(':rareza',trim($sheet['rareza']));
            $this->db->bind(':nombre',trim($sheet['titulo']));
            $this->db->bind(':descrip',trim($sheet['descripcion']));
            $this->db->bind(':pc',trim($sheet['carInput']));
            $this->db->bind(':pf',trim($sheet['fueInput']) );
            $this->db->bind(':pi',trim($sheet['intInput']));
            $this->db->bind(':pl',trim($sheet['forInput']));

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        // FUNCION FINAL[[Sin comentarios adicionales]]
        public function test_artefacto($id){
            // Testear Artefacto
            $this->db->query("UPDATE artefacto SET id_progreso = :progreso
            WHERE id_artefacto = :id");
            // Poner en :progreso el id del estado En Testeo (Para realizar la consulta el Estado inicial ha de ser Finalizado)
            $this->db->bind(':id', $id);
            $this->db->bind(':progreso', 4);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        // FUNCION FINAL[[Sin comentarios adicionales]]
        public function activate_artefacto($id){
            // Activar Artefacto
            $this->db->query("UPDATE artefacto SET id_progreso = :progreso
            WHERE id_artefacto = :id");
            // Poner en :progreso el id del estado Activado (Para realizar la consulta el Estado inicial ha de ser Finalizado)
            $this->db->bind(':id', $id);
            $this->db->bind(':progreso', 5);

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

        // DEVOLVER  RAREZAS
        public  function get_rarezas(){

            $this->db->query("SELECT id_rareza as id, nombre FROM rareza");

            return $this->db->registros();
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