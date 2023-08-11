<?php
    class ExtraviadoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Extraviado
 
       public function get_extraviados(){
            // Conseguir Extraviado(No Final)   
            $this->db->query("SELECT a.id_extraviado as id, a.nombre as nombre, icono as icon,
                    year(a.fecha) as anio, p.nombre as progreso, a.autor as autor, a.fecha as fecha
                FROM extraviado a, progreso p, rareza r
                WHERE a.id_progreso = p.id_progreso AND a.id_rareza = r.id_rareza
                ORDER BY a.id_extraviado");

            return $this->db->registros();
        }

        public function get_extraviado($id){
            // Conseguir Extraviado(No Final)
            $this->db->query("SELECT a.id_extraviado as id, a.nombre as nombre, a.origen as origen, a.titulo as titulo, a.profesion as profesion, a.descripcion as descripcion,
                    a.carisma as carisma, a.fuerza as fuerza, a.inteligencia as inteligencia, a.desventura as desventura, img as img, icono as icon,
                    a.fecha as fecha, p.id_progreso as progreso, r.nombre as rareza
                FROM extraviado a, progreso p, rareza r
                WHERE a.id_progreso = p.id_progreso AND a.id_rareza = r.id_rareza AND a.id_extraviado = :id");

                $this->db->bind(':id', $id);

            return $this->db->registro();  
        }

        public function new_extraviado($sheet, $creador){
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

        public function del_extraviado($id){
            // Eliminar Extraviado
            $this->db->query("DELETE FROM extraviado WHERE id_extraviado = :id");
            
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true; 
            }else{
                return false;
            }
        }

        public function end_extraviado($id){
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

        public function edit_extraviado(){
            // Editar Extraviado
        }

        public function test_extraviado($id){
            // Testear Extraviado
            $this->db->query("UPDATE extraviado SET id_progreso = 3
            WHERE id_extraviado = :id");
            // Poner en :progreso el id del estado Finalizado
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function activate_extraviado($id){
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

        public function give_extraviado($player, $extraviado){
            // Dar Extraviado a un jugador

            $this->db->query("INSERT INTO desbloqueados(nickname, id_extraviado, fecha) VALUES (:player, :id, DATE(NOW()))");

            $this->db->bind(":player", $player);
            $this->db->bind(":id", $extraviado);

            if ($this->db->execute()){
                return  true;
            } else {
                return false;
            }
        }

        public function add_relaccion($extraviado, $id_group){
            // Añadir Extraviados con los que esta relaccionado

            // DELETE de las relacciones actuales de la historia antes de asignar las nuevas

            $continar = true;
            foreach($id_group as $id){
                $this->db->query("INSERT INTO conocidos (id_extraviado, id_conocido)
                VALUES (:id, :extraviado)");

                $this->db->bind(':id', $extraviado);
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


        public function get_fil_fecha(){
            $this->db->query("SELECT DISTINCT year(fecha) AS fecha 
                FROM extraviado 
                ORDER BY year(fecha)");

            return $this->db->registros();
        }

        public function get_fil_autor(){
            $this->db->query("SELECT DISTINCT autor 
                FROM extraviado
                ORDER BY autor");

            return $this->db->registros();
        }

        public function get_fil_progreso(){
            $this->db->query("SELECT DISTINCT p.id_progreso AS id, p.nombre 
                FROM progreso p, extraviado e 
                WHERE p.id_progreso = e.id_progreso");

            return $this->db->registros();
        }


    }

?>