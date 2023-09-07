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

            $this->db->query("SELECT a.id_artefacto as id, a.nombre as nombre, a.autor as autor, year(a.fecha) as anio, p.nombre as progreso, p.color, a.fecha as fecha, a.plus_carisma as pc, a.plus_fuerza as pf, a.plus_inteligencia as pi, plus_desventura as pd
                FROM artefacto a, progreso p
                WHERE a.id_progreso = p.id_progreso AND a.inhabilitado != 1
                ORDER BY a.fecha");

            return $this->db->registros();
        }

        public function get_artefacto($id){
            // Conseguir artefacto(No Final)
            $this->db->query("SELECT a.id_artefacto as id, a.id_rareza as rareza, a.icono as icon, a.nombre as nombre, a.descripcion as descripcion, a.plus_carisma as carisma, a.plus_fuerza as fuerza, a.plus_inteligencia as inteligencia, plus_desventura as desventura, a.autor as autor, a.fecha as fecha, p.id_progreso as progreso, r.color
                FROM artefacto a, progreso p, rareza r
                WHERE a.id_progreso = p.id_progreso AND a.id_artefacto = :id AND r.id_rareza = a.id_rareza");

                $this->db->bind(":id", $id);

            return $this->db->registro();   
        }

        // FUNCION FINAL
        public function new_artefacto($sheet){

            $creador = $_SESSION["usuarioSesion"]->nickname;
            // Crea un artefacto
            $this->db->query("INSERT INTO artefacto (id_rareza, nombre, descripcion, plus_carisma, plus_fuerza, plus_inteligencia, plus_desventura, autor, fecha, id_progreso, icono)
                VALUES (:rareza, :nombre, :descrip, :pc, :pf, :pi, :pd, :autor, NOW(), :progreso, :icono)");

            $this->db->bind(':rareza',trim($sheet['rareza_select']));
            $this->db->bind(':nombre',trim($sheet['nombre']));
            $this->db->bind(':descrip',trim($sheet['descripcion']));
            $this->db->bind(':pc',trim($sheet['carInput']));
            $this->db->bind(':pf',trim($sheet['fueInput']) );
            $this->db->bind(':pi',trim($sheet['intInput']));
            $this->db->bind(':pd',trim($sheet['forInput']));
            $this->db->bind(':icono',trim($sheet['imagen']));
            $this->db->bind(':autor', $creador);
            $this->db->bind(':progreso', "2"); // Poner el Estado En Desarrollo

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
        public function mod_artefacto($sheet, $id){
            // Editar Artefacto

            $this->db->query("UPDATE artefacto SET nombre = :nombre, id_rareza = :rareza, icono = :img, descripcion = :descrip, plus_carisma = :pc, plus_fuerza = :pf, plus_inteligencia = :pi, plus_desventura = :pd
                            WHERE id_artefacto = :id");

            $this->db->bind(':rareza',trim($sheet['rareza_select']));
            $this->db->bind(':nombre',trim($sheet['nombre']));
            $this->db->bind(':descrip',trim($sheet['descripcion']));
            $this->db->bind(':img',trim($sheet['imagen']));
            $this->db->bind(':pc',trim($sheet['carInput']));
            $this->db->bind(':pf',trim($sheet['fueInput']) );
            $this->db->bind(':pi',trim($sheet['intInput']));
            $this->db->bind(':pd',trim($sheet['forInput']));
            $this->db->bind(':id', $id);

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

            $this->db->query("SELECT id_rareza as id, nombre, color FROM rareza");

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
        
        public function get_fil_fecha(){
            $this->db->query("SELECT DISTINCT year(fecha) AS fecha 
                FROM artefacto 
                ORDER BY year(fecha)");

            return $this->db->registros();
        }

        public function get_fil_autor(){
            $this->db->query("SELECT DISTINCT autor 
                FROM artefacto
                ORDER BY autor");

            return $this->db->registros();
        }

        public function get_fil_progreso(){
            $this->db->query("SELECT DISTINCT p.id_progreso AS id, p.nombre 
                FROM progreso p, artefacto a 
                WHERE p.id_progreso = a.id_progreso");

            return $this->db->registros();
        }


    }

?>