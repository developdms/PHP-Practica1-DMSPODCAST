<?php
    require '../../classes/AutoCarga.php';
    
    $user = Request::post('user');
    
    if ($user === NULL || $user === ''){
        header('Location:../../index.php');
        exit();
    }
    
    $session = new Session();
    $session->set('user', $user);
    
    header('Location:loadaudios.php');

