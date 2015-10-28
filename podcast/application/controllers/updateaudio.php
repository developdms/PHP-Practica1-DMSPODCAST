<?php
    
require '../../classes/AutoCarga.php';

$session = new Session();

$image = '../storage/img/unknown.png';
$song = utf8_decode(Request::post('single'));
$user = $session->get('user');

if ($user === NULL){
    header('Location:../../index.php');
    exit();
}elseif ($song === NULL) {
    header('Location:../control-view-update.php');
    exit();
}

$s = scandir('../../storage/img');

$file1 = GetData::name($song).utf8_decode('¡¡¡').str_replace(' ', utf8_decode('-¡-'), GetData::title($song)).utf8_decode('¡¡¡¡').GetData::category($song).utf8_decode('¡¡¡¡¡').GetData::access($song);

foreach ($s as $value) {
    $file2 = GetData::name($value).utf8_decode('¡¡¡').str_replace(' ', utf8_decode('-¡-'), GetData::title($value)).utf8_decode('¡¡¡¡').GetData::category($value).utf8_decode('¡¡¡¡¡').GetData::access($value);
    
    if($file1 === $file2.'PV' || $file1 === $file2.'PB'){
        $image = '../storage/img/'.$value;
    }
}

$session->set('song', $song);
$session->set('image', $image);
$session->set('title', GetData::title($song));
$session->set('category', GetData::category($song));
$session->set('access', GetData::access($song));

header('Location:../control-view-update-audio.php');


