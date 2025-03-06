<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    // Verificar si el correo ya está registrado
    $stmt = $pdo->prepare("SELECT email FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->fetch()) {
        echo "<script>alert('Este correo ya está registrado.'); window.location.href='register.html';</script>";
        exit();
    }

    // Insertar nuevo usuario
    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $email, $password]);

    echo "<script>alert('Registro exitoso. Ahora puedes iniciar sesión.'); window.location.href='login.html';</script>";
}
?>
