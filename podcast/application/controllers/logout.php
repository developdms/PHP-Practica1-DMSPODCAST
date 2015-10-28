<?php

require '../../classes/AutoCarga.php';

$session = new Session();
$session->destroy();

header('Location:../../index.php');

