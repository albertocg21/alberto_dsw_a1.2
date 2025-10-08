<?php
// includes/validaciones.php

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

function numero_temas_seleccionados($temas) {
    if (count($temas) < 1) {
        return "Debes seleccionar al menos 1 tema.";
    }

    if (count($temas) > 3) {
        return "No puedes seleccionar más de 3 temas.";
    }

    return true;
}
?>
