<?php
require '../classes/AutoCarga.php';
$session = new Session();
$user = $session->get('user');
$songs = $session->get('songs');
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
                    <a href="controllers/loadaudios.php?route=1">Editar</a>
                    <a href="controllers/logout.php">Salir <?php echo $user;?></a>
                </div>
                <img src="../storage/img/logo.png" class="logo" />
            </header>
            <div id="body">
                <div id="viewer">
                    <h2 class="head">Borrar canciones</h2>
                    <?php
                    if (count($songs) === 0) {
                        ?>
                        <h2>No existen canciones en tu directorio</h2>
                        <?php } else {
                        ?>
                        <form method="POST" action="controllers/phpdeletefiles.php">
                            <table id="tabledelete">
                            <?php
                            foreach ($songs as $value) {
                                echo $value->renderTable(1);
                            }
                        }
                        ?>
                            </table>
                    </form>
                </div>
            </div>
            <footer>

            </footer>
        </div>
    </body>
</html>
