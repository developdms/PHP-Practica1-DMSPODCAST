<?php

    require '../../classes/AutoCarga.php';
    
    $session = new Session();
    $number = $session->get('number');
    if($number === NULL){
        $number = 1;
    }else{
        $number++;
    }
    
    $session->set('number', $number);
    
    header('Location:../control-view-upload.php');
    

