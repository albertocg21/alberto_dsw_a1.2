<?php

$modulos_validos = [
    "Programación de Servicios y Aplicaciones",
    "Sistemas Informáticos",
    "Bases de Datos",
    "Desarrollo Web",
    "Lenguajes de Marcas"
];

$errores = [];

function validar_correo($correo) {
    return filter_var($correo, FILTER_VALIDATE_EMAIL) ? true : "El correo electrónico no tiene un formato válido.";
}

function validar_modulo($modulo, $modulos_validos) {
    return in_array($modulo, $modulos_validos) ? true : "El módulo seleccionado no es válido.";
}

function validar_asunto($asunto) {
    if (strlen($asunto) > 50) {
        return "El asunto no puede tener más de 50 caracteres.";
    }
    if (is_numeric($asunto)) {
        return "El asunto no puede ser numérico.";
    }
    return true;
}

function validar_descripcion($descripcion) {
    return strlen($descripcion) <= 300 ? true : "La descripción no puede tener más de 300 caracteres.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = trim($_POST['correo']);
    $modulo = trim($_POST['modulo']);
    $asunto = trim($_POST['asunto']);
    $descripcion = trim($_POST['descripcion']);

    $resultado_correo = validar_correo($correo);
    if ($resultado_correo !== true) {
        $errores[] = $resultado_correo;
    }

    $resultado_modulo = validar_modulo($modulo, $modulos_validos);
    if ($resultado_modulo !== true) {
        $errores[] = $resultado_modulo;
    }

    $resultado_asunto = validar_asunto($asunto);
    if ($resultado_asunto !== true) {
        $errores[] = $resultado_asunto;
    }

    $resultado_descripcion = validar_descripcion($descripcion);
    if ($resultado_descripcion !== true) {
        $errores[] = $resultado_descripcion;
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

