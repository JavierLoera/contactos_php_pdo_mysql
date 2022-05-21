<?php

$title = "Editar";
require_once __DIR__ . '/../db/connection.php';
require_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/authchek.php';


if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fechaN = $_POST['fechaN'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $especialidad = $_POST['especialidad'];
    $id = $_POST['id'];

    require_once 'validations.php';

    $validaciones = validateForms($nombre, $apellido, $fechaN, $email, $phone, $especialidad);
}
if (!$validaciones) {
    $result = $registro->updateContacto($nombre, $apellido, $fechaN, $email, $phone, $especialidad, $id);
    if ($result) {
        include_once __DIR__ . '/../includes/success.html.php';
        header('refresh:5; url=listado.php');
    } else {
        include_once __DIR__ . '/../includes/error.html.php';
        header('refresh:5; url=listado.php');
    }
} else {
    include_once __DIR__ . '/../includes/error.html.php';
    header('refresh:5; url=listado.php');
}
