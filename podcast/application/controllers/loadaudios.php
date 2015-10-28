<?php

require '../../classes/AutoCarga.php';

$route = Request::get('route');
$owner = Request::post('owner');
$category = Request::readArrayArcaico('category');
$access = Request::post('acceso');

$categories = array();
if (count($category) > 0) {
    foreach ($category as $value) {
        $categories[$value] = 1;
    }
}

$session = new Session();

$user = $session->get('user');
$s = scandir('../../storage/songs');
$img = scandir('../../storage/img');

$songs = array();
foreach ($s as $value) {
    if ($value !== '.' && $value !== '..') {
        $image = NULL;
        foreach ($img as $i) {
            if (GetData::withoutExtension($i) === GetData::withoutExtension($value)) {
                $image = utf8_encode('../storage/img/' . $i);
            }
        }

        $song = new ListItem(utf8_encode(GetData::name($value)), utf8_encode(GetData::title($value)), utf8_encode(GetData::category($value)), date('dd-mm-YYYY'), utf8_encode('../storage/songs/' . $value), $image, utf8_encode(GetData::access($value)));
        $songs[] = $song;
    }
}


if(count($categories) > 0){
    $songs = filterCategory($songs, $categories);
}

if($owner !== NULL && $owner !== 'TD'){
    $songs = filterOwner($songs, $owner);
}

if($access !== NULL && $access !== 'TD'){
    $songs = filterAccess($songs, $access);
}

if($route === '1' || $route === '0'){
    $songs = filterOwner($songs, $user);
}

$session->set('songs', $songs);


switch ($route) {
    case '0':
        header('Location:../control-view-delete.php');
        exit();
        break;
    
    case '1':
        header('Location:../control-view-update.php');
        exit();
        break;

    default:
        break;
}

header('Location:../control-panel.php');
Functions::cleanLoadAudios();
exit();

function filterCategory($elements, $params) {
    $array = array();
    foreach ($elements as $value) {
        if (isset($params[$value->getCategory()])) {
            $array[] = $value;
        }
    }
    return $array;
}

function filterOwner($elements, $param){
    $array = array();
    foreach ($elements as $value) {
        if ($value->getUser() === $param) {
            $array[] = $value;
        }
    }
    return $array;
}

function filterAccess($elements, $param) {
    $array = array();
    foreach ($elements as $value) {
        if ($value->getAccess() === $param) {
            $array[] = $value;
        }
    }
    return $array;
}
