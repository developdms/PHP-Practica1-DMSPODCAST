<?php

/**
 * Description of Functions
 *
 * @author MARTIN
 */
class Functions {

    public static function returnFromControlViewUpdateAudio() {
        $session = new Session();
        $session->erase('title');
        $session->erase('category');
        $session->erase('access');
    }

    public static function cleanLoadAudios() {
        unset($_POST['owner']);
        unset($_POST['category']);
        unset($_POST['acceso']);
    }

    public static function cleanUpdateAudio() {
        $session = new Session();
        $session->erase('image');
        $session->erase('title');
        $session->erase('category');
        $session->erase('access');
    }

}
