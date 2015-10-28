<?php

require '../../classes/AutoCarga.php';

$session = new Session();

$user = $session->get('user');
$song = $session->get('song');
$title = str_replace(' ', '-_-', utf8_decode(Request::post('title')));
$category = utf8_decode(Request::post('category'));
$access = 'PB';

if (Request::post('access')) {
    $access = 'PV';
}

if (file_exists('../' . $song)) {
    rename('../' . $song, "../../storage/songs/" . utf8_decode($user . '¡¡¡' . $title . "¡¡¡¡" . $category . '¡¡¡¡¡' . $access . '.mp3'));     
  
}


$fileManager = new FileUpload('image');
if ($fileManager->getName() !== NULL) {
    $fileManager->setStore("../../storage/img/");
    $filename = utf8_decode($user . '¡¡¡' . $title . "¡¡¡¡" . $category . '¡¡¡¡¡' . $access);
    $fileManager->setSize(10000000);
    $fileManager->setPolicy(2);
    $fileManager->setName($filename);
    $res = $fileManager->upload();
}

//$session->erase('song');

header('Location:loadaudios.php');
