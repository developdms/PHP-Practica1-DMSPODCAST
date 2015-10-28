<?php

require '../../classes/AutoCarga.php';

$file = Request::post('filedelete');
$session = new Session();
$error = array();

    $filename = utf8_decode("../$file");
    if (file_exists($filename) && unlink($filename)) {
        header('Location:loadaudios.php?route=0');
        exit();
    }

header('Location:loadaudios.php');


