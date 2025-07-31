<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hacienda";

// Conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Datos del form
$email = trim($_POST["email"]);
$password = $_POST["password"];

// Buscar usuario por email
$stmt = $conn->prepare("SELECT id, nombre, password FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $usuario = $result->fetch_assoc();

  // Verificar contraseña
  if (password_verify($password, $usuario["password"])) {
    // Guardar en sesión
    $_SESSION["usuario_id"] = $usuario["id"];
    $_SESSION["usuario_nombre"] = $usuario["nombre"];
    echo "Inicio de sesión exitoso";
  } else {
    echo "Contraseña incorrecta";
  }
} else {
  echo "Correo no encontrado";
}

$stmt->close();
$conn->close();
?>
