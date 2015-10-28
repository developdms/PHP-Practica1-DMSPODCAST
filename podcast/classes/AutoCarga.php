<?php

class AutoCarga {
    
    static public function carga($clase) {
        $archivo ="../classes/".str_replace('\\', '/', $clase).'.php';
        if(!file_exists($archivo)){
            $archivo ="../../classes/".str_replace('\\', '/', $clase).'.php';
        }
        require $archivo;
    }
}

spl_autoload_register('Autocarga::carga');
