<?php

require '../../classes/AutoCarga.php';

$session = new Session();
$fileManager = new FileUpload('files');

$user = $session->get('user');
$names = $fileManager->getName();

if (is_array($names)) {
    $titles = Request::readArrayArcaico('titulo');
    $categoria = Request::readArrayArcaico('categoria');
    foreach ($names as $key => $value) {
        if($titles[$key] !== ''){
            $value = $titles[$key];
        }
        
        $names[$key] = utf8_decode($user . '¡¡¡' . str_replace(' ', '-_-', $value) . '¡¡¡¡' . $categoria[$key] . '¡¡¡¡¡' . 'PB');
    }
} else {
    $names = utf8_decode($user . '¡¡¡' . str_replace(' ', '-_-', $names) . '¡¡¡¡' . Request::post('categoria') . '¡¡¡¡¡' . 'PB');
}

$fileManager->resetType();
$fileManager->addType('mp3');
$fileManager->setStore('../../storage/songs/');
$fileManager->setName($names);
$fileManager->setSize(10000000);

$session->erase('number');

$res = $fileManager->upload();

header('Location:loadaudios.php');
