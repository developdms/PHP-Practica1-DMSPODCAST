<?php

/**
 * Description of GetData
 *
 * @author MARTIN
 */
class GetData {

    public static function name($param) {
        $init = 0;
        if(strrpos( $param ,  utf8_decode('/')) > 0){
            $init = strrpos( $param ,  utf8_decode('/')) + 1;
        }   
        $end = strpos( $param ,  utf8_decode('¡¡¡'));
        return substr($param, $init, ($end - $init));
    }
    
    public static function withoutExtension($param) {
        $init = 0;   
        $end = strpos( $param ,  utf8_decode('¡¡¡¡¡PB'))+7;
        if(!$end){
            $end = strpos( $param ,  utf8_decode('PV')) + 7;
        }
        return substr($param, 0, $end);
    }

    public static function title($param) {
        $init = strpos( $param ,  utf8_decode('¡¡¡')) + 3;
        $end = strpos( $param ,  utf8_decode('¡¡¡¡'));
        return str_replace('-_-',' ',substr($param, $init, ($end - $init)));
    }

    public static function category($param) {
        $init = strpos( $param ,  utf8_decode('¡¡¡¡')) + 4;
        $end = strpos( $param ,  utf8_decode('¡¡¡¡¡'));
        return str_replace('-',' ',substr($param, $init, ($end - $init)));
    }

    public static function access($param) {
        $init = strpos( $param ,  utf8_decode('¡¡¡¡¡')) + 5 ;
        $end = strpos( $param ,  utf8_decode('.mp3'));
        return substr($param, $init, ($end - $init));
    }
    
    public static function getUsers($param) {
        $array = array();
        $scan = scandir($param);
        if(count($scan)>0){
            foreach ($scan as $value) {
                if(!isset($array[GetData::name($value)])){
                    $array[GetData::name($value)] = 1;
                }
            }
        }
        return $array;
    }
    
    public static function getCategories($param) {
        $array = array();
        $scan = scandir($param);
        if(count($scan)>0){
            foreach ($scan as $value) {
                if(!isset($array[GetData::category($value)])){
                    $array[GetData::category($value)] = 1;
                }
            }
        }
        return $array;
    }

}
