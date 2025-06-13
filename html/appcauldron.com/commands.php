<!DOCTYPE html>
<html lang="en">
<head>
<title>App Cauldron</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/appcauldron-style.css">
</head>
<body>

<div class="header">
  <h1></h1>
</div>

<div class="navbar">
  <a href="index.html">Home</a>
  <a href="cauldron.html">The Cauldron</a>
  <a href="spells.php">Hechizos</a>
  <a href="grimoire.php">Grimorio</a>
  <a href="info.html">Info</a>
  <a href="commands.php" class="right">Contemplar el Universo</a>
</div>

    <script>

       function borrarcontenedoresparados() {
            // Crear un formulario invisible y enviarlo
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = ''; // Enviar la solicitud al mismo archivo PHP

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'borrar_contenedores_parados';
            input.value = '1';

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }

       function borrarcontenedores() {
            // Crear un formulario invisible y enviarlo
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = ''; // Enviar la solicitud al mismo archivo PHP

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'borrar_contenedores';
            input.value = '1';

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }

       function borrarcontenedoresactivos() {
            // Crear un formulario invisible y enviarlo
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = ''; // Enviar la solicitud al mismo archivo PHP

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'borrar_contenedores_activos';
            input.value = '1';

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }

       function borrarredesanonimas() {
            // Crear un formulario invisible y enviarlo
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = ''; // Enviar la solicitud al mismo archivo PHP

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'borrar_redes_anonimas';
            input.value = '1';

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }


       function borrarvolanonimos() {
            // Crear un formulario invisible y enviarlo
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = ''; // Enviar la solicitud al mismo archivo PHP

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'borrar_vol_anonimos';
            input.value = '1';

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }

       function borrarvolumenes() {
            // Crear un formulario invisible y enviarlo
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = ''; // Enviar la solicitud al mismo archivo PHP

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'borrar_volumenes';
            input.value = '1';

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }


    </script>


<div class="row">
	<div class="side">
	<p class="p1">docker ps</p>
	</div>
	<div class="main">
	<p class="p1">
        <?php
        $result = shell_exec('sudo -u appcauldron scripts/docker_ps.sh');
	echo '<pre>' . htmlspecialchars($result) . '</pre>';
        ?>
	</p>
	</div>
        <div class="side">
        <p class="p1">docker container ls -a</p>

        <button onclick="borrarcontenedoresparados()">Borrar contenedores parados</button>
                <div id="deletecontainers">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar_contenedores_parados'])) {
                    shell_exec("sudo -u appcauldron scripts/delete_stopped_containers.sh");
                    header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                }
                ?>
                </div>

        <br>
        <button onclick="borrarcontenedores()">Borrar TODOS los contenedores</button>
                <div id="deletecontainers">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar_contenedores'])) {
                    shell_exec("sudo -u appcauldron scripts/delete_containers.sh");
                    header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                }
                ?>
                </div>

        </div>
        <div class="main">
        <p class="p1">
        <?php
        $result = shell_exec("sudo -u appcauldron scripts/docker_container_ls.sh");
        echo '<pre>' . htmlspecialchars($result) . '</pre>';
        ?>
        </p>
        </div>
        <div class="side">
        <p class="p1">docker-compose ls</p>

        <button onclick="borrarcontenedoresactivos()">Borrar contenedores activos</button>
                <div id="deleteactivecontainers">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar_contenedores_activos'])) {
                    shell_exec("sudo -u appcauldron scripts/delete_active_containers.sh");
                    header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                }
                ?>
                </div>

        </div>
        <div class="main">
        <p class="p1">
        <?php
        $result = shell_exec("sudo -u appcauldron scripts/docker-compose_ls.sh");
        echo '<pre>' . htmlspecialchars($result) . '</pre>';
        ?>
        </p>
        </div>
        <div class="side">
        <p class="p1">docker network ls</p>

        <button onclick="borrarredesanonimas()">Borrar redes no referenciadas</button>
                <div id="deleteanonnetworks">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar_redes_anonimas'])) {
                    shell_exec("sudo -u appcauldron scripts/delete_anon_networks.sh");
                    header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                }
                ?>
                </div>

        </div>
        <div class="main">
	<p class="p1">
        <?php
        $result = shell_exec("sudo -u appcauldron scripts/docker_network_ls.sh");
        echo '<pre>' . htmlspecialchars($result) . '</pre>';
        ?>
	</p>
        </div>
        <div class="side">
        <p class="p1">docker volume ls</p>

        <button onclick="borrarvolanonimos()">Borrar volumenes no referenciados</button>
                <div id="deleteanonvols">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar_vol_anonimos'])) {
                    shell_exec("sudo -u appcauldron scripts/delete_anon_vols.sh");
                    header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                }
                ?>
                </div>
	<br>
        <button onclick="borrarvolumenes()">Borrar TODOS los volumenes</button>
                <div id="deletevolumes">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar_volumenes'])) {
                    shell_exec("sudo -u appcauldron scripts/delete_volumes.sh");
                    header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                }
                ?>
                </div>

        </div>
        <div class="main">
        <p class="p1">
        <?php
        $result = shell_exec("sudo -u appcauldron scripts/docker_volume_ls.sh");
        echo '<pre>' . htmlspecialchars($result) . '</pre>';
        ?>
        </p>
        </div>
        <div class="side">
        <p class="p1">docker images</p>
        </div>
        <div class="main">
        <p class="p1">
        <?php
        $result = shell_exec("sudo -u appcauldron scripts/docker_images.sh");
        echo '<pre>' . htmlspecialchars($result) . '</pre>';
        ?>
        </p>
        </div>

</div>

</body>
</html>
