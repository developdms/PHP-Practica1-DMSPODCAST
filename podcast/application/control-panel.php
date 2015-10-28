<?php
require '../classes/AutoCarga.php';
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
                    <a href="control-view-filter.php">Filtrar</a>
                    <a href="control-view-upload.php">Agregar</a>
                    <a href="controllers/loadaudios.php?route=1">Editar</a>
                    <a href="controllers/loadaudios.php?route=0">Borrar</a>
                    <a href="controllers/logout.php">Salir <?php echo $user; ?></a>
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
                        <form method="POST" action="controllers/audio.php">
                            <?php
                            foreach ($songs as $value) {
                                echo $value->render();
                            }
                        }
                        ?>
                    </form>
                </div>
                <div>
                    <?php
                    if ($song !== NULL) {
                        ?>
                        <audio autoplay src = <?php echo utf8_encode($song) ?>>
                            <p>Tu navegador no implementa el elemento audio.</p>
                        </audio>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <footer>
                <label id="left">dms PODCAST 2015</label>
                <label id="right">Practica 1 de Martin Santiago</label>
            </footer>
        </div>
    </body>
</html>
