<?php

$modulos_validos = [
    "Programación de Servicios y Aplicaciones",
    "Sistemas Informáticos",
    "Bases de Datos",
    "Desarrollo Web",
    "Lenguajes de Marcas"
];

$errores = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = trim($_POST['correo']);
    $modulo = trim($_POST['modulo']);
    $asunto = trim($_POST['asunto']);
    $descripcion = trim($_POST['descripcion']);

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no tiene un formato válido.";
    }

    if (!in_array($modulo, $modulos_validos)) {
        $errores[] = "El módulo seleccionado no es válido.";
    }

    if (strlen($asunto) > 50) {
        $errores[] = "El asunto no puede tener más de 50 caracteres.";
    }
    if (is_numeric($asunto)) {
        $errores[] = "El asunto no puede ser numérico.";
    }

    if (strlen($descripcion) > 300) {
        $errores[] = "La descripción no puede tener más de 300 caracteres.";
    }

    if (empty($errores)) {

        $linea = "\"$correo\";\"$modulo\";\"$asunto\";\"$descripcion\"\n";

        $archivo = 'data/dudas.csv';

        if (!file_exists('data')) {
            mkdir('data', 0777, true);
        }

        file_put_contents($archivo, $linea, FILE_APPEND);

        echo "<h1>¡Gracias por enviar tu duda!</h1>";
        echo "<p>Tu duda ha sido registrada correctamente.</p>";
        echo "<a href='formulario.php'>Enviar otra duda</a>";
    } else {

        echo "<h1>Errores en el formulario</h1>";
        echo "<ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "<a href='formulario.php'>Volver al formulario</a>";
    }
}
?>

