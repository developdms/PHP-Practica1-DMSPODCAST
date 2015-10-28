<?php
require '../classes/AutoCarga.php';

Functions::returnFromControlViewUpdateAudio();

$session = new Session();
$user = $session->get('user');
$songs = $session->get('songs');
$song = $session->get('song');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DMS PODCAST</title>
        <link rel="stylesheet" href="../style/style.css" />
    </head>
    <body>
        <div id="wrapper">
            <header>
                <div id="actions">
                    <a href="controllers/loadaudios.php">Principal</a>
                    <a href="control-view-upload.php">Agregar</a>
                    <a href="controllers/loadaudios.php?route=0">Borrar</a>
                    <a href="controllers/logout.php">Salir <?php echo $user;?></a>
                </div>
                <img src="../storage/img/logo.png" class="logo" />
            </header>
            <div id="body">
                <div id="viewer">
                    <?php
                    if (count($songs) === 0) {
                        ?>
                        <h2>No existen canciones para reproducir</h2>
                        <?php } else {
                        ?>
                        <form method="POST" action="controllers/updateaudio.php">
                            <?php
                            foreach ($songs as $value) {
                                echo $value->render();
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
            <footer>

            </footer>
        </div>
    </body>
</html>
