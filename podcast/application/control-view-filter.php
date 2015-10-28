<?php
require '../classes/AutoCarga.php';
$session = new Session();
$user = $session->get('user');
$users = GetData::getUsers('../storage/songs');
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
                    <a href="<?php echo $session->previous()?>">Atrás</a>
                    <a href="controllers/logout.php">Salir <?php echo $user; ?></a>
                </div>
                <img src="../storage/img/logo.png" class="logo" />
            </header>
            <div id="body">
                <div id="viewer">
                    <h2 class="head">Filtrar busqueda</h2>
                    <form id="filter" method="POST" action="controllers/loadaudios.php">
                        <div id="filterowner">
                            <label>Propietario</label>
                            <select name="owner">
                                <option value="TD">Todos</option>
                                <?php
                                foreach ($users as $key => $value) {
                                    echo"<option value=$key>$key</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div id="filteraccess" class="filters">
                            <label>Acceso</label>
                            <div><label>Todos</label><input type="radio" name="acceso" value="TD" checked/></div>
                            <div><label>Publicos</label><input type="radio" name="acceso" value="PB"/></div>
                            <div><label>Privados</label><input type="radio" name="acceso" value="PV"/></div>
                        </div>
                        <div id="category" class="filters">
                            <label>Categoria</label>   
                            <div><label>Clásica</label><input type="checkbox" name="category[]" value="Clasica" checked/></div>
                            <div><label>Disco</label><input type="checkbox" name="category[]" value="Disco" checked/></div>
                            <div><label>Rap</label><input type="checkbox" name="category[]" value="Rap" checked/></div>
                            <div><label>Rock</label><input type="checkbox" name="category[]" value="Rock" checked/></div>
                        </div>
                        <button>Filtrar</button>
                    </form>
                </div>
            </div>
            <footer>

            </footer>
        </div>
    </body>
</html>
