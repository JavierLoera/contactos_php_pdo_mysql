<?php
$host = 'localhost';
$db = 'ejercicio_db';
$user = 'root';
$password = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<h2 class='text-danger'>Error al concectar con la base de datos</h2>";
    throw new PDOException($e->getMessage());
}

require_once 'contactos.php';
require_once 'user.php';
$registro = new Contacto($pdo);
$userData = new User($pdo);
