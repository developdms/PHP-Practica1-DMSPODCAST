<?php
require '../classes/AutoCarga.php';
$session = new Session();
$user = $session->get('user');
$song = $session->get('song');
$image = $session->get('image');
$title = $session->get('title');
$category = $session->get('category');
$access = $session->get('access');
$categories = GetData::getCategories('../storage/songs');

if($user === NULL){
    header('Location:../index.php');
    exit();
}else if($song === NULL){
    header('Location:control-view-update.php');
    exit();
}else if($image === NULL){
    $image = '../storage/img/unknown.png';
}
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
                    <a href="control-panel.php">Principal</a>
                    <a href="control-view-upload.php">Agregar</a>
                    <a href="controllers/loadaudios.php?route=0">Borrar</a>
                    <a href="controllers/logout.php">Salir <?php echo $user; ?></a>
                </div>
                <img src="../storage/img/logo.png" class="logo" />
            </header>
            <div id="body">
                <img src="<?php echo utf8_encode($image)?>" class="bigicon" />
                <form method="POST" action="controllers/phpupdateaudio.php" id="formupdate" enctype="multipart/form-data">
                    <label>Imagen</label>
                    <input type="file" name="image"/>
                    <label>Título</label>
                    <input type="text" name="title" value="<?php echo $title;?>"/>
                    <label>Categoría</label>
                    <select name="category">
                        <option value="Clasica">Clásica</option>
                        <option value="Disco">Disco</option>
                        <option value="Rap">Rap</option>
                        <option value="Rock">Rock</option>
                    </select>
                    <label>Acceso privado</label>
                    <input type="checkbox" name="access" <?php if($access === 'PV'){echo 'checked';}?>/>
                    
                    <button>Actualizar</button>
                </form>
            </div>
            <footer>

            </footer>
        </div>
    </body>
</html>

<?php
Functions::cleanUpdateAudio();
?>
