<?php

require '../../classes/AutoCarga.php';

$session = new Session();
echo $session->exist('song');

if ($session->get('song') === NULL) {
    $song = utf8_decode(Request::post('single'));
    if (file_exists('../' . $song)) {       
        $session->set('song', $song);
    }
} else {
    $session->erase('song');
}

header('Location:../control-panel.php');




