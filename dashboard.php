<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
  header("Location: login.html");
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Usuario</title>
  <style>
    body {
      font-family: Arial;
      background-color: #f5f5f5;
      padding: 20px;
    }

    .card {
      background-color: #fff9f1;
      border-radius: 10px;
      padding: 30px;
      max-width: 500px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
    }

    .logout-btn {
      margin-top: 20px;
      display: inline-block;
      padding: 10px 20px;
      background-color: #6d4c41;
      color: white;
      border: none;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
    }

    .logout-btn:hover {
      background-color: #5d4037;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>¡Bienvenido, <?php echo htmlspecialchars($_SESSION["usuario_nombre"]); ?>!</h2>
    <p>Has iniciado sesión correctamente.</p>
    <a href="logout.php" class="logout-btn">Cerrar sesión</a>
  </div>
</body>
</html>
