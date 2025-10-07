<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Dudas</title>
    <style>
        /* Distribuye los checkbox en dos columnas */
        .checkbox-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 columnas iguales */
            gap: 8px 20px; /* separación entre filas y columnas */
            max-width: 400px; /* ajusta el ancho según necesites */
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }
    </style>
</head>
<body>
    <h1>Formulario de Dudas</h1>
    <form action="registra_dudas.php" method="POST">
        <label for="correo">Correo electrónico:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="modulo">Módulo:</label><br>
        <select id="modulo" name="modulo" required>
            <option value="Programación de Servicios y Aplicaciones">Programación de Servicios y Aplicaciones</option>
            <option value="Sistemas Informáticos">Sistemas Informáticos</option>
            <option value="Bases de Datos">Bases de Datos</option>
            <option value="Desarrollo Web">Desarrollo Web</option>
            <option value="Lenguajes de Marcas">Lenguajes de Marcas</option>
        </select><br><br>

        <!-- <label for="Temas_relacionados">Temas relacionados:</label><br>
        <input type="checkbox" name="Linux" id="Linux" required>
        <label for="Linux">Linux</label>
        <input type="checkbox" name="Windows" id="Windows">
        <label for="Windows">Windows</label><br>
        <input type="checkbox" name="PHP" id="PHP">
        <label for="PHP">PHP</label>
        <input type="checkbox" name="HTML" id="HTML">
        <label for="HTML">HTML</label><br>
        <input type="checkbox" name="JavaScript" id="JavaScript">
        <label for="JavaScript">JavaScript</label>
        <input type="checkbox" name="Bash" id="Bash">
        <label for="Bash">Bash</label><br>
        <input type="checkbox" name="Calificaciones" id="Calificaciones">
        <label for="Calificaciones">Calificaciones</label>
        <input type="checkbox" name="Actividades" id="Actividades">
        <label for="Actividades">Actividades</label><br>
        <input type="checkbox" name="Examenes" id="Examenes">
        <label for="Examenes">Exámenes</label>
        <input type="checkbox" name="Otros" id="Otros">
        <label for="Otros">Otros</label><br><br> -->

        <label for="Temas_relacionados">Temas relacionados (selecciona al menos 1 y máximo 3):</label><br>
        <div class="checkbox-grid">
            <div class="checkbox-item"><input type="checkbox" name="tema[]" value="Linux" id="Linux"><label for="Linux">Linux</label></div>
            <div class="checkbox-item"><input type="checkbox" name="tema[]" value="Windows" id="Windows"><label for="Windows">Windows</label></div>
            <div class="checkbox-item"><input type="checkbox" name="tema[]" value="PHP" id="PHP"><label for="PHP">PHP</label></div>
            <div class="checkbox-item"><input type="checkbox" name="tema[]" value="HTML" id="HTML"><label for="HTML">HTML</label></div>
            <div class="checkbox-item"><input type="checkbox" name="tema[]" value="JavaScript" id="JavaScript"><label for="JavaScript">JavaScript</label></div>
            <div class="checkbox-item"><input type="checkbox" name="tema[]" value="Bash" id="Bash"><label for="Bash">Bash</label></div>
            <div class="checkbox-item"><input type="checkbox" name="tema[]" value="Calificaciones" id="Calificaciones"><label for="Calificaciones">Calificaciones</label></div>
            <div class="checkbox-item"><input type="checkbox" name="tema[]" value="Actividades" id="Actividades"><label for="Actividades">Actividades</label></div>
            <div class="checkbox-item"><input type="checkbox" name="tema[]" value="Examenes" id="Examenes"><label for="Examenes">Exámenes</label></div>
            <div class="checkbox-item"><input type="checkbox" name="tema[]" value="Otros" id="Otros"><label for="Otros">Otros</label></div>
        </div>

        <br>

        <label for="asunto">Asunto:</label><br>
        <input type="text" id="asunto" name="asunto" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Enviar Duda">
    </form>
</body>
</html>

