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
<script>
function obtenerFraseAleatoria() {
var frases = [
"Al agitar el caldero sientes una risa maliciosa.",
"Un hechizo del caldero puede cambiar el destino.",
"En el caldero, los secretos se mezclan con la magia.",
"El caldero burbujeante emite un vapor verde.",
"El caldero comienza a brillar.",
"El caldero cobra vida con una luz mágica.",
"El caldero emite susurros de magia más antigua.",
"El secreto está en el fondo del caldero.",
"Con cada burbuja, el caldero revela su poder.",
"El caldero es un portal hacia otros mundos.",
"El destino se entrelaza al remover el caldero.",
"El caldero convierte los sueños en realidad."
];
var indiceAleatorio = Math.floor(Math.random() * frases.length);
return frases[indiceAleatorio];
}
document.write(obtenerFraseAleatoria());
</script>
</div>
<div class="main">
<?php
echo nl2br("¡Hechizo creado con éxito!\n");
if (isset($_POST['submit'])) {
if (isset($_POST['bbdd'])) { $bbdd = $_POST['bbdd']; }
if (isset($_POST['nginx'])) { $nginx = $_POST['nginx']; }
if (isset($_POST['ftp'])) { $ftp = $_POST['ftp']; }
if (isset($_POST['netdata'])) { $netdata = $_POST['netdata']; }
if (isset($_POST['lms'])) { $lms = $_POST['lms']; }
if (isset($_POST['video'])) { $video = $_POST['video']; }
if (isset($_POST['wordpress'])) { $wordpress = $_POST['wordpress']; }
if (isset($_POST['office'])) { $office = $_POST['office']; }
$receta = "generatedfiles/ingredientes.txt";
$servicios = "generatedfiles/servicios.txt";
$ficheroreceta = fopen($receta, "w") or die("No se puede crear el fichero $receta");
$ficheroservicios = fopen($servicios, "w") or die("No se puede crear el fichero $servicios");
if (isset($bbdd) && !empty($bbdd)) {
$ingrediente = $bbdd . "\n\n";
$servicio = $bbdd . "\n";
fwrite($ficheroreceta, $ingrediente);
fwrite($ficheroservicios, $servicio);
}
if (isset($nginx) && !empty($nginx)) {
$ingrediente = $nginx . "\n\n";
$servicio = $nginx . "\n";
fwrite($ficheroreceta, $ingrediente);
fwrite($ficheroservicios, $servicio);
}
if (isset($ftp) && !empty($ftp)) {
$ingrediente = $ftp . "\n\n";
$servicio = $ftp . "\n";
fwrite($ficheroreceta, $ingrediente);
fwrite($ficheroservicios, $servicio);
}
if (isset($netdata) && !empty($netdata)) {
$ingrediente = $netdata . "\n\n";
$servicio = $netdata . "\n";
fwrite($ficheroreceta, $ingrediente);
fwrite($ficheroservicios, $servicio);
}
if (isset($lms) && !empty($lms)) {
$ingrediente = $lms . "\n\n";
$servicio = $lms . "\n";
fwrite($ficheroreceta, $ingrediente);
fwrite($ficheroservicios, $servicio);
}
if (isset($video) && !empty($video)) {
$ingrediente = $video . "\n\n";
$servicio = $video . "\n";
fwrite($ficheroreceta, $ingrediente);
fwrite($ficheroservicios, $servicio);
}
if (isset($wordpress) && !empty($wordpress)) {
$ingrediente = $wordpress . "\n\n";
$servicio = $wordpress . "\n";
fwrite($ficheroreceta, $ingrediente);
fwrite($ficheroservicios, $servicio);
}
if (isset($office) && !empty($office)) {
$ingrediente = $office . "\n\n";
$servicio = $office . "\n";
fwrite($ficheroreceta, $ingrediente);
fwrite($ficheroservicios, $servicio);
}

fclose($ficheroreceta);
fclose($ficheroservicios);

shell_exec('/var/www/html/appcauldron.com/scripts/magic_cauldron.sh');

$spell = 'generatedfiles/spell.yaml';

if (file_exists($spell)) {
$hechizo = file_get_contents($spell);
echo '<pre>' . htmlspecialchars($hechizo) . '</pre>';
}
else {
echo '<pre>Algo ha fallado en la elaboración..</pre>';
}

}
?>
</div>

</body>
</html>
