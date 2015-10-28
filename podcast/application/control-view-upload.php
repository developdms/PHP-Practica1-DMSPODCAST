<?php
require '../classes/AutoCarga.php';

$session = new Session();
$user = $session->get('user');
$number = $session->get('number');
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
                    <a href="controllers/phpaddinputfiles.php">Canción</a>
                    <a href="control-panel.php" target="opviewer">Principal</a>
                    <a href="control-view-update.php" target="opviewer">Editar</a>
                    <a href="control-view-delete.php" target="opviewer">Borrar</a>
                    <a href="controllers/logout.php" target="opviewer">Salir <?php echo $user; ?></a>
                </div>
                <img src="../storage/img/logo.png" class="logo" />
            </header>
            <div id="body">
                <div id="viewer">
                    <div id="divupdate">
                        <h2>Seleccionar canciones</h2><br/>

                        <form action="controllers/uploadaudios.php" method="POST" enctype="multipart/form-data" id="formupload"> 
                            <label>Canción</label> 
                            <input type="text" name="titulo[]"/><br/>
                            <label>Fichero de audio:<input type="file" name="files[]" /></label><br/>
                            <label>Selecciona categoría:
                                <select name="categoria[]">
                                    <option value="Clasica">Clásica</option>
                                    <option value="Disco">Disco</option>
                                    <option value="Rap">Rap</option>
                                    <option value="Rock">Rock</option>                          
                                </select>
                            </label><br/>
                            <?php
                            if ($number !== NULL) {
                                for ($index = 0; $index < $number; $index++) {
                                    ?>
                                    <label>Canción</label> 
                                    <input type="text" name="titulo[]"/><br/>
                                    <label>Fichero de audio: <input type="file" name="files[]" /></label><br/>
                                    <label>Selecciona categoría: 
                                        <select name="categoria[]">
                                            <option value="Clásica">Clásica</option>
                                            <option value="Disco">Disco</option>
                                            <option value="Rap">Rap</option>
                                            <option value="Rock">Rock</option>                          
                                        </select>
                                    </label><br/>
                                    <?php
                                }
                            }
                            ?>
                            <button>Iniciar subida</button>
                        </form>
                    </div>
                </div>
                <footer>

                </footer>
            </div>
    </body>
</html>
