<?php
// Oculta errores en pantalla
ini_set('display_errors', 0);

require_once 'includes/validaciones.php';

// Bloquea ejecución directa si no es GET o POST
if ($_SERVER["REQUEST_METHOD"] !== "POST" && $_SERVER["REQUEST_METHOD"] !== "GET") {
    exit("Acceso no permitido");
}

$modulos_validos = [
    "Programación de Servicios y Aplicaciones",
    "Sistemas Informáticos",
    "Bases de Datos",
    "Desarrollo Web",
    "Lenguajes de Marcas"
];

$temas_validos = [
    "Linux", "Windows", "PHP", "HTML", "JavaScript",
    "Bash", "Calificaciones", "Actividades", "Examenes", "Otros"
];

$errores = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Protección contra XSS
    $correo       = htmlspecialchars(trim($_POST['correo']));
    $modulo       = htmlspecialchars(trim($_POST['modulo']));
    $asunto       = htmlspecialchars(trim($_POST['asunto']));
    $descripcion  = htmlspecialchars(trim($_POST['descripcion']));
    $temas_seleccionados = isset($_POST['tema']) ? $_POST['tema'] : [];

    // Validaciones
    $validacion_temas = numero_temas_seleccionados($temas_seleccionados);
    if ($validacion_temas !== true) {
        $errores[] = $validacion_temas;
    }

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

    $temas_string = implode(", ", $temas_seleccionados);

    if (empty($errores)) {
        $linea = "\"$correo\";\"$modulo\";\"$asunto\";\"$descripcion\";\"$temas_string\"\n";

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
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo "<a href='formulario.php'>Volver al formulario</a>";
    }
} else {

    echo "<h1>Acceso al formulario</h1>";
    echo "<p>No se han recibido datos para registrar.</p>";
    echo "<a href='formulario.php'>Ir al formulario</a>";
}
?>
