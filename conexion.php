<?php
// conexion.php
$host = 'localhost';
$dbname = 'proyecto_atw';
$username = 'root'; // Cambia esto si usas otro usuario
$password = ''; // Si tienes contraseña en MySQL, agrégala aquí

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>
