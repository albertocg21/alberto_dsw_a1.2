<?php
// Ruta del archivo CSV
$archivo = __DIR__ . '/data/dudas.csv';

// Crear la carpeta 'data' si no existe
if (!is_dir(__DIR__ . '/data')) {
    mkdir(__DIR__ . '/data', 0755, true);
}

// Recoger datos del formulario y sanitizarlos
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

// Preparar línea CSV
// Escapamos los campos para CSV (por ejemplo, con fputcsv)
$fp = fopen($archivo, 'a');
if ($fp === false) {
    die('No se pudo abrir el archivo para escritura.');
}

// Array con datos
$datos = [$email, $modulo, $asunto, $descripcion];

// Guardar la línea en el CSV
fputcsv($fp, $datos);
fclose($fp);

echo "Duda registrada correctamente. Gracias.";
?>
