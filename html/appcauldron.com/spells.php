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
        function crearhechizo() {
            // Crear un formulario invisible y enviarlo
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = ''; // Enviar la solicitud al mismo archivo PHP

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'crear_hechizo';
            input.value = '1';

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }

        function pararhechizo() {
            // Crear un formulario invisible y enviarlo
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = ''; // Enviar la solicitud al mismo archivo PHP

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'parar_hechizo';
            input.value = '1';

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }

        function continuarhechizo() {
            // Crear un formulario invisible y enviarlo
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = ''; // Enviar la solicitud al mismo archivo PHP

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'continuar_hechizo';
            input.value = '1';

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }

       function deshacerhechizo() {
            // Crear un formulario invisible y enviarlo
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = ''; // Enviar la solicitud al mismo archivo PHP

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'deshacer_hechizo';
            input.value = '1';

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }

       function eliminarhechizo() {
            // Crear un formulario invisible y enviarlo
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = ''; // Enviar la solicitud al mismo archivo PHP

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'eliminar_hechizo';
            input.value = '1';

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    </script>

<div class="row">
        <div class="side">

        <?php
        $spell = 'generatedfiles/spell.yaml';

        if (file_exists($spell)) {
        echo "Desata la magia<br>";
        }
        else {
        echo "No hay hechizos";
        }
	?>  

	<?php
	if (file_exists($spell)) {
	?>
	<br>
	<button onclick="crearhechizo()">Crear hechizo</button>
		<div id="cast">
		<?php
	        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crear_hechizo'])) {
	            shell_exec('sudo -u appcauldron scripts/cast_spell.sh');
	        }
		?>
		</div>
	<?php
	}
	?>

        <?php
        if (file_exists($spell)) {
        ?>
        <br>
        <button onclick="pararhechizo()">Parar hechizo</button>
                <div id="cast">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['parar_hechizo'])) {
                    shell_exec('sudo -u appcauldron scripts/stop_spell.sh');
                }
                ?>
                </div>
        <?php
        }
        ?>

        <?php
        if (file_exists($spell)) {
        ?>
        <br>
        <button onclick="continuarhechizo()">Continuar hechizo</button>
                <div id="cast">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['continuar_hechizo'])) {
                    shell_exec('sudo -u appcauldron scripts/resume_spell.sh');
                }
                ?>
                </div>
        <?php
        }
        ?>

        <?php
        if (file_exists($spell)) {
        ?>
	<br>
	<button onclick="deshacerhechizo()">Deshacer hechizo</button>
		<div id="dismiss">
		<?php
	        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deshacer_hechizo'])) {
	            shell_exec('sudo -u appcauldron scripts/undo_spell.sh');
	        }
		?>
		</div>

        <?php
        }
        ?>

	<br>

        <?php
        if (file_exists($spell)) {
        ?>
	<br>
        <button onclick="eliminarhechizo()">Eliminar hechizo</button>
                <div id="exterminate">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_hechizo'])) {
                    unlink($spell);
                    $grimorio = 'generatedfiles/grimoire.txt';
                    if (file_exists($grimorio)) {
	            	unlink($grimorio);
                    }
                    header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
		}
                ?>
                </div>

        <?php
        }
        ?>

	</div>

	<div class="main">
	<?php

	$spell = 'generatedfiles/spell.yaml';

	if (file_exists($spell)) {
	$hechizo = file_get_contents($spell);
	echo '<pre>' . htmlspecialchars($hechizo) . '</pre>';
	}
	else {
	echo '<pre>Utiliza el <a href="cauldron.html">caldero</a>!</pre>';
	}
	?>
	</div>
</div>

</body>
</html>
