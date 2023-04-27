<?php

    function redireccionar($pagina){
        header('location: '.RUTA_URL.$pagina);
    }

    function formatFecha($fechaIngles){
        return date("d/m/Y H:i:s", strtotime($fechaIngles));
    }

    function tiene_permiso($rol, $permitidos){
    
        if(empty($permitidos) || in_array($rol, $permitidos)){
            return true;
        }
    }

    // Desuso
    function get_slot($taken){
        $slot = -1;
        if (count($taken) == 1){
            $slot = $taken[$i]->id+1;
        } else {
            for ($i = 0; $i <= count($taken); $i++){
                if($taken[$i]->id+1 != $taken[$i+1]->id){
                    $slot = $taken[$i]->id+1;
                    break;
                }
            }
        }
        
        return $slot;
    }
    

?>