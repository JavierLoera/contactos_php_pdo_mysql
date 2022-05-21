<?php
include_once __DIR__ . '/../includes/authchek.php';
require_once __DIR__ . '/../db/connection.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $resultado = $registro->deleteContacto($id);
    if ($resultado) {
        header('location:listado.php');
    } else {
        include_once 'includes/error.html.php';
        header('refresh:5; url=listado.php');
    }
} else {
    include_once 'includes/error.html.php';
    header('refresh:5; url=listado.php');
}
