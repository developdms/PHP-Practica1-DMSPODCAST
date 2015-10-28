<?php

//  Para esta clase usaremos el patrón SingleTon, que es un patrón que se usa 
//  cuando sólo queremos que se pueda tener una sola instancia de una clase.
/**
 * Description of Session
 *
 * @author Usuario
 */
class Session {

    private static $init = false;

    function __construct() {
        if (!self::$init) {
            session_start();
        }
        self::$init = true;
    }

    function get($nombre) {
        if (isset($_SESSION[$nombre])) {
            return $_SESSION[$nombre];
        }
        return null;
    }

    function set($nombre, $valor) {
        $_SESSION[$nombre] = $valor;
    }

    function erase($nombre) {
        if (isset($_SESSION[$nombre])) {
            unset($_SESSION[$nombre]);
            return true;
        }
        return false;
    }

    function destroy() {
        session_destroy();
    }
    
    function exist($param) {
        return isset($_SESSION[$param]);
    }
    
    function previous(){
        return $_SERVER['HTTP_REFERER'];
    }

}
