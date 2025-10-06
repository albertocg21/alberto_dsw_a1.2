<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de dudas</title>
</head>
<body>
    <h1>Formulario de dudas</h1>
    <form action="registra_dudas.php" method="post">
        <label for="email">Correo electrónico:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="modulo">Módulo:</label><br>
        <select id="modulo" name="modulo" required>
            <option value="">--Selecciona un módulo--</option>
            <option value="Sistemas informáticos">Sistemas informáticos</option>
            <option value="Bases de datos">Bases de datos</option>
            <option value="Programación">Programación</option>
            <option value="Lenguaje de marcas">Lenguaje de marcas</option>
            <option value="Entornos de desarrollo">Entornos de desarrollo</option>
            <option value="Formación y orientación laboral">Formación y orientación laboral</option>
            <!-- Añade más módulos si quieres -->
        </select><br><br>

        <label for="asunto">Asunto:</label><br>
        <input type="text" id="asunto" name="asunto" required maxlength="100"><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="5" cols="40" required></textarea><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
