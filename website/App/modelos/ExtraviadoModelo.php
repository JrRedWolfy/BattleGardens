<?php
    class ExtraviadoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        //Funciones de Extraviado
 
       public function get_extraviados(){
            // Conseguir Extraviado  
            $this->db->query("SELECT a.id_extraviado as id, a.nombre as nombre, a.autor as autor,
            year(a.fecha) as anio, p.nombre as progreso, p.color, a.fecha as fecha, icono as icon
                FROM extraviado a, progreso p, rareza r
                WHERE a.id_progreso = p.id_progreso AND a.id_rareza = r.id_rareza AND a.id_extraviado != 1 AND a.inhabilitado != 1
                ORDER BY a.id_extraviado");

            return $this->db->registros();
        }

        public function get_extraviado($id){
            // Conseguir Extraviado(No Final)
            $this->db->query("SELECT a.id_extraviado as id, a.nombre as nombre, a.origen as origen, a.titulo as titulo, a.profesion as profesion, a.descripcion as descripcion,
                    a.carisma as carisma, a.fuerza as fuerza, a.inteligencia as inteligencia, a.desventura as desventura, a.img as img, icono as icon,
                    a.fecha as fecha, p.id_progreso as progreso, r.nombre as rareza, m.img as world_img, r.color as color
                FROM extraviado a, progreso p, rareza r, mundo m
                WHERE a.id_progreso = p.id_progreso AND a.origen = m.id_mundo AND a.id_rareza = r.id_rareza AND a.id_extraviado = :id");

                $this->db->bind(':id', $id);

            return $this->db->registro();  
        }

        public function new_extraviado($sheet){

            $creador = $_SESSION["usuarioSesion"]->nickname;
            
            // Crear Extraviado !!!! FALTA EL CREADOR EN LA TABLA
            $this->db->query("INSERT INTO extraviado (nombre, origen, titulo, carisma, fuerza, inteligencia, desventura, fecha, id_progreso, id_rareza, icono, descripcion, profesion, autor)
            VALUES (:nombre, :origen, :titulo, :carisma, :fuerza, :inteligencia, :desventura, NOW(), :progreso, :rareza, :icono, :texto, :profesion, :creador)");

            $this->db->bind(':nombre',trim($sheet['nombre']));
            $this->db->bind(':origen',trim($sheet['mundo_select']));
            $this->db->bind(':titulo',trim($sheet['titulo']));
            $this->db->bind(':texto',trim($sheet['texto']));
            $this->db->bind(':profesion',trim($sheet['profesion']));
            $this->db->bind(':carisma',trim($sheet['carInput']));
            $this->db->bind(':inteligencia',trim($sheet['intInput']));
            $this->db->bind(':fuerza',trim($sheet['fueInput']));
            $this->db->bind(':desventura',trim($sheet['forInput']));
            $this->db->bind(':rareza',trim($sheet['rareza_select']));
            $this->db->bind(':icono',trim($sheet['imagen']));
            $this->db->bind(':progreso', "2"); // Poner el Estado En Proceso
            $this->db->bind(':creador', $creador);
           
            $id = $this->db->executeLastId();
            $this->modify_relaccion($sheet['conocido'], $sheet['motivo'], $id);
            return true;
            
        }

        public function del_extraviado($id){
            // Dar por cancelado un Extraviado (''borrar'')
            $this->db->query("UPDATE extraviado SET inhabilitado = 1
            WHERE id_extraviado = :id");
            // Poner Deshabilitado
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

        public function mod_extraviado($sheet, $id){
            // Editar Extraviado

            $this->db->query("UPDATE extraviado SET nombre = :nombre, origen = :origen, titulo = :titulo, carisma = :carisma, fuerza = :fuerza, inteligencia = :inteligencia, desventura = :desventura, id_rareza = :rareza, icono = :icono, descripcion = :texto, profesion = :profesion
            WHERE id_extraviado = :id");

            $this->db->bind(':nombre',trim($sheet['nombre']));
            $this->db->bind(':origen',trim($sheet['mundo_select']));
            $this->db->bind(':titulo',trim($sheet['titulo']));
            $this->db->bind(':texto',trim($sheet['texto']));
            $this->db->bind(':profesion',trim($sheet['profesion']));
            $this->db->bind(':carisma',trim($sheet['carInput']));
            $this->db->bind(':inteligencia',trim($sheet['intInput']));
            $this->db->bind(':fuerza',trim($sheet['fueInput']));
            $this->db->bind(':desventura',trim($sheet['forInput']));
            $this->db->bind(':rareza',trim($sheet['rareza_select']));
            $this->db->bind(':icono',trim($sheet['imagen']));
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                $this->modify_relaccion($sheet['conocido'], $sheet['motivo'], $id);
            return true;
            }else{
                return false;
            }
            
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

        public function modify_relaccion($conocidos, $motivos, $id){
            
            // DELETE de las relacciones actuales de la historia antes de asignar las nuevas
            
            $this->del_conocidos($id);
            $this->del_conocidos(1);
            
            // Añadir Extraviados con los que esta relaccionado

            $i = 0;
            foreach($conocidos as $conocido){
                $this->db->query("INSERT INTO relacciones (id_extraviado, id_conocido, motivo)
                VALUES (:id, :conocido, :motivo)");

                $this->db->bind(':conocido', $conocido);
                $this->db->bind(':motivo', $motivos[$i]);
                $this->db->bind(':id', $id); 

                $this->db->execute();
                $i = $i + 1;
            }

        }

        public function add_conocido($conocido, $id){
            $this->db->query("INSERT INTO relacciones (id_extraviado, id_conocido)
            VALUES (:id, :conocido)");

            $this->db->bind(':id', $id);
            $this->db->bind(':conocido', $conocido); 

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }


        }

        public function del_conocido($conocido, $id){
            $this->db->query("DELETE FROM relacciones WHERE id_extraviado = :id AND id_conocido = :conocido");

            $this->db->bind(':id', $id);
            $this->db->bind(':conocido', $conocido); 

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function del_conocidos($id){
            $this->db->query("DELETE FROM relacciones WHERE id_extraviado = :id");

            $this->db->bind(':id', $id); 

            $this->db->execute();
        
        }

        public function get_desconocidos($extraviado){ // 100% DONE
            // Obtener los Extraviados con los que no esta relaccionado

            $this->db->query("SELECT DISTINCT e.id_extraviado, concat(e.nombre,', ',e.titulo) as nombre, e.icono as extraviado, m.img as mundo 
                FROM extraviado e, mundo m 
                WHERE e.origen = m.id_mundo AND e.id_extraviado != 1 AND e.inhabilitado = 0 AND e.id_extraviado != :id AND e.id_extraviado 
                NOT IN(SELECT r.id_conocido FROM relacciones r WHERE r.id_extraviado=:id) 
                ORDER BY m.img, e.nombre");

                $this->db->bind(':id', $extraviado);

            return $this->db->registros();
            
        }


        public function get_conocidos($extraviado){
            // Obtener los Extraviados con los que esta relaccionado

            $this->db->query("SELECT DISTINCT e.id_extraviado, concat(e.nombre,', ',e.titulo) as nombre, e.icono as extraviado, re.motivo 
                FROM extraviado e, relacciones re 
                WHERE e.id_extraviado = re.id_conocido AND e.id_extraviado != 1 AND e.id_extraviado != :id AND e.id_extraviado 
                IN(SELECT r.id_conocido FROM relacciones r WHERE r.id_extraviado=:id) 
                ORDER BY e.nombre");

                $this->db->bind(':id', $extraviado);

            return $this->db->registros();
                        
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