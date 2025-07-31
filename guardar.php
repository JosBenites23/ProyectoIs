<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hacienda";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario y protegerlos
$nombre = trim($_POST['nombre']);
$email = trim($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // 🔐 Encriptar

// Usar sentencia preparada para evitar SQL injection
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $email, $password);

// Ejecutar y mostrar mensaje
if ($stmt->execute()) {
  echo "¡Registro exitoso!";
} else {
  echo "Error al registrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
