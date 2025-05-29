<?php
// 1. Conexión a la base de datos
$host = "localhost";     // Cambia si tu servidor no es local
$usuario = "root";       // Tu usuario de MySQL
$contrasena = "";        // Tu contraseña de MySQL
$base_de_datos = "cliente";

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// 2. Recibir datos del formulario
$nombre = $_POST['nombre'] ?? ''; // Usar operador null coalescing para evitar errores si no está definido
$telefono = $_POST['telefono'] ?? '';
$mensaje = $_POST['mensaje'] ?? '';
$calificacion = $_POST['calificacion'] ?? '';
$platillo = $_POST['platillo_favorito'] ?? '';
$recomendacion = $_POST['recomendacion'] ?? '';

// Validación simple
if (empty($nombre) || empty($telefono) || empty($mensaje) || empty($calificacion) || empty($platillo) || empty($recomendacion)) {
    die("Por favor, completa todos los campos.");
}

// 3. Insertar datos en la base de datos
$sql = "INSERT INTO contacto
    (nombre, telefono, mensaje, calificacion, platillo_favorito, recomendacion)
    VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $nombre, $telefono, $mensaje, $calificacion, $platillo, $recomendacion);

if ($stmt->execute()) {
    echo "¡Gracias por tu opinión! Se ha enviado correctamente.";
} else {
    echo "Error al guardar la información: " . $stmt->error;
}

// 4. Cerrar conexión
$stmt->close();
$conn->close();
?>