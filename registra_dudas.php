<?php

$archivo = __DIR__ . '/data/dudas.csv';

if (!is_dir(__DIR__ . '/data')) {
    mkdir(__DIR__ . '/data', 0755, true);
}

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$modulo = filter_input(INPUT_POST, 'modulo', FILTER_UNSAFE_RAW);
$asunto = filter_input(INPUT_POST, 'asunto', FILTER_UNSAFE_RAW);
$descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_UNSAFE_RAW);

if (!$email || !$modulo || !$asunto || !$descripcion) {
    die('Error: Datos no válidos o incompletos.');
}

$modulo = htmlspecialchars($modulo, ENT_QUOTES, 'UTF-8');
$asunto = htmlspecialchars($asunto, ENT_QUOTES, 'UTF-8');
$descripcion = htmlspecialchars($descripcion, ENT_QUOTES, 'UTF-8');

$fp = fopen($archivo, 'a');
if ($fp === false) {
    die('No se pudo abrir el archivo para escritura.');
}

$datos = [$email, $modulo, $asunto, $descripcion];

fputcsv($fp, $datos);
fclose($fp);

echo "Duda registrada correctamente. Gracias.";
?>
