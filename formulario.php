<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Dudas</title>
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

        <label for="asunto">Asunto:</label><br>
        <input type="text" id="asunto" name="asunto" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Enviar Duda">
    </form>
</body>
</html>

