<?php
$title = 'Contacto';
require_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/authchek.php';
require_once __DIR__ . '/../db/connection.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $contacto = $registro->getContactoById($id);
  if (is_array($contacto)) { ?>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <img src="<?php echo empty($contacto['foto_path']) ? '../uploads/blank.jpg' : $contacto['foto_path']; ?>" class="card-img-top" alt="...">
        <h5 class="card-title"><?php echo htmlspecialchars($contacto['nombre'], ENT_QUOTES, 'UTF-8') . " " . htmlspecialchars($contacto['apellido'], ENT_QUOTES, 'UTF-8'); ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($contacto['nombre_especialidad'], ENT_QUOTES, 'UTF-8'); ?></h6>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($contacto['fecha_nacimiento'], ENT_QUOTES, 'UTF-8'); ?></h6>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($contacto['email'], ENT_QUOTES, 'UTF-8'); ?></h6>
        <div class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($contacto['phone'], ENT_QUOTES, 'UTF-8'); ?></div>
        <a class="btn btn-success btn-sm" href="listado.php">Volver</a>
        <a class="btn btn-warning btn-sm text-white" href="edit.html.php?id=<?php echo htmlspecialchars($contacto['id'], ENT_QUOTES, 'UTF-8'); ?>">Editar</a>
        <a onclick="return confirm('De verdad quieres eliminar este registro?')" class="btn btn-danger btn-sm" href="delete.php?id=<?php echo htmlspecialchars($contacto['id'], ENT_QUOTES, 'UTF-8'); ?>">Eliminar</a>
      </div>
    </div>

<?php
  } else {
    include_once __DIR__ . '/../includes/error.html.php';
    header('refresh:5; url=listado.php');
  }
} else {
  include_once __DIR__ . '/../includes/error.html.php';
  header('refresh:5; url=listado.php');
}
?>



<?php require_once __DIR__ . '/../includes/footer.php'; ?>