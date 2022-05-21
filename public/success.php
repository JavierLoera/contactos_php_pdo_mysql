<?php
$title = 'Registro exitoso';
require_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/authchek.php';
require_once __DIR__ . '/../db/connection.php';


if (isset($_POST['submit'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $fechaN = $_POST['fechaN'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $especialidad = $_POST['especialidad'];
  $userid = $_SESSION['userid'];

  $origin_file = $_FILES['foto']['tmp_name'];
  $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
  $target_dir = '../uploads/';
  $destination = "$target_dir$phone.$ext";
  move_uploaded_file($origin_file, $destination);

  require_once 'validations.php';
  $validaciones = validateForms($nombre, $apellido, $fechaN, $email, $phone, $especialidad);
}
if (!$validaciones) {
  $isSuccess = $registro->insertContacto($nombre, $apellido, $fechaN, $email, $phone, $especialidad, $destination, $userid);
  if ($isSuccess) {
    include_once __DIR__ . '/../includes/success.html.php';
    header('refresh:5; url=listado.php');
  } else {
    include_once __DIR__ . '/../includes/error.html.php';
  }
} else {
  include_once __DIR__ . '/../includes/error.html.php';
}




require_once __DIR__ . '/../includes/footer.php';
