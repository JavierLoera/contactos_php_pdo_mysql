<?php
$title = 'Registro';
require_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/authchek.php';
require_once __DIR__ . '/../db/connection.php';
?>

<h1 class='text-center'>Contactos</h1>
<form class="mb-5" method="POST" action="success.php" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="foto" class="form-label">Foto</label>
    <input accept="image/*" type="file" class="form-control" id="foto" name="foto">
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="nombre" placeholder="name">
  </div>
  <div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input required type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
  </div>
  <div class="mb-3">
    <label for="fechaN" class="form-label">Fecha de Nacimiento</label>
    <input required type="date" class="form-control" id="fechaN" name="fechaN" placeholder="Fecha Nacimiento">
  </div>
  <div class="mb-3">
    <label for="especialidad" class="form-label">Especialidad</label>

    <select required class="form-select" name="especialidad" id="especialidad">
      <option selected value="1">DBA</option>
      <option value="2">desarrollador web</option>
      <option value="3">Ingeniero de software</option>
      <option value="4">Otro</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input required type="email" class="form-control" name="email" id="email" placeholder="Email">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Número de telefono</label>
    <input required pattern="[0-9]{3}[0-9]{3}[0-9]{4}" type="tel" class="form-control" id="phone" name="phone" placeholder="Número de telefono de 10 digitos">
  </div>
  <div class="d-grid gap-2">
    <button type="submit" name="submit" class="btn btn-primary block">Registrar</button>
  </div>
</form>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>