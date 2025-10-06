<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = htmlspecialchars($_POST['correo']);
    $modulo = htmlspecialchars($_POST['modulo']);
    $asunto = htmlspecialchars($_POST['asunto']);
    $descripcion = htmlspecialchars($_POST['descripcion']);

    $linea = "\"$correo\";\"$modulo\";\"$asunto\";\"$descripcion\"\n";

    $archivo = 'data/dudas.csv';

    if (!file_exists('data')) {
        mkdir('data', 0777, true);
    }

    file_put_contents($archivo, $linea, FILE_APPEND);

    echo "<h1>¡Gracias por enviar tu duda!</h1>";
    echo "<p>Tu duda ha sido registrada correctamente.</p>";
    echo "<a href='formulario.php'>Enviar otra duda</a>";
}
?>
