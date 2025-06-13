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

<div class="row">
        <div class="side">

        <?php
        $grimoire = 'generatedfiles/grimoire.txt';

        if (file_exists($grimoire) && !empty(trim(file_get_contents($grimoire)))) {
        echo "Sigue bien las instrucciones<br>";
        }
        else {
        echo "No hay entradas para tu hechizo";
        }
	?>  

	</div>

	<div class="main">

	<?php
	if (file_exists($grimoire) && !empty(trim(file_get_contents($grimoire)))) {

            $entrada = file_get_contents($grimoire);

            // Escapar el contenido completo
            $entrada_escapada = htmlspecialchars($entrada);

            // Permitir enlaces reemplazando las partes específicas
            // Aquí asumimos que el enlace está en el formato [enlace:URL] y que URL comienza por http o https
            // Por ejemplo: [enlace:http://example.com] o [enlace:https://example.com]
            $entrada_formateada = preg_replace_callback(
            '/\[enlace:(https?:\/\/\S+?)\]/',
                function ($matches) {
                    // Decodificar cualquier HTML especial en la URL
                    $url = htmlspecialchars_decode($matches[1]);
                    // Crear el enlace HTML permitido con target="_blank" para abrir en una nueva pestaña
                    return '<a href="' . htmlspecialchars($url) . '" target="_blank">' . htmlspecialchars($url) . '</a>';
                },
                $entrada_escapada
            );

            echo '<pre>' . $entrada_formateada . '</pre>';
        } else {
            echo '<pre>Utiliza el <a href="cauldron.html">caldero</a>!</pre>';
        }
        ?>
	</div>
</div>


</body>
</html>
