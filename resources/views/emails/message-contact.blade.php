<!DOCTYPE html>
<html>
<head>
    <title>Mensaje recibido</title>
</head>
<body>
    <p>Recibiste un mensaje de: {{ $datos['nombre'] }} - {{ $datos['email'] }}</p>
    <p><strong>Asunto:</strong> {{ $datos['asunto'] }}</p>
    <p><strong>Contenido:</strong> {{ $datos['mensaje'] }}</p>
</body>
</html>