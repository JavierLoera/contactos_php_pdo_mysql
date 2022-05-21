<?php
$title = 'Contactos';
require_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/authchek.php';
require_once __DIR__ . '/../db/connection.php';

$userid = $_SESSION['userid'];
$contactos = $registro->getContactos($userid);
?>

<table class="table table-bordered border-primary">
  <thead>
    <tr>
      <th class="text-center" scope="col">ID</th>
      <th class="text-center" scope="col">Nombre</th>
      <th class="text-center" scope="col">Apellido</th>
      <th class="text-center" scope="col">Especialidad</th>
      <th class="text-center" scope="col">Detalles</th>
    </tr>
  </thead>
  <tbody>
    <?php if (empty($contactos)) {
      echo "<td colspan='5' class='text-center'>Sin registros aun</td>";
    } ?>
    <?php foreach ($contactos as $contacto) { ?>
      <tr>
        <td class="text-center"><?php echo htmlspecialchars($contacto['id'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td class="text-center"><?php echo htmlspecialchars($contacto['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td class="text-center"><?php echo htmlspecialchars($contacto['apellido'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td class="text-center"><?php echo htmlspecialchars($contacto['nombre_especialidad'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td class="text-center d-flex justify-content-evenly ">
          <a class="btn btn-success btn-sm" href="details.php?id=<?php echo htmlspecialchars($contacto['id'], ENT_QUOTES, 'UTF-8'); ?>">Ver</a>
          <a class="btn btn-warning btn-sm text-white" href="edit.html.php?id=<?php echo htmlspecialchars($contacto['id'], ENT_QUOTES, 'UTF-8'); ?>">Editar</a>
          <a onclick="return confirm('De verdad quieres eliminar este registro?')" class="btn btn-danger btn-sm" href="delete.php?id=<?php echo htmlspecialchars($contacto['id'], ENT_QUOTES, 'UTF-8'); ?>">Eliminar</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>