<?php
$title = 'Editar Contacto';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/authchek.php';
require_once __DIR__ . '/../db/connection.php';

if (!isset($_GET['id'])) {
    include_once __DIR__ . '/../includes/error.html.php';
    header('refresh:5; url=listado.php');
} else {
    $id = $_GET['id'];
    $contacto = $registro->getContactoById($id);

?>

    <h1 class='text-center'>Editar Contacto</h1>
    <form class="mb-5" method="POST" action="edit.php">
        <input required type="hidden" name="id" value="<?php echo htmlspecialchars($contacto['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input required type="text" class="form-control" id="name" name="nombre" placeholder="name" value="<?php echo htmlspecialchars($contacto['nombre'], ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input required type="text" class="form-control" id="apellido" name="apellido" value="<?php echo htmlspecialchars($contacto['apellido'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="Apellido">
        </div>
        <div class="mb-3">
            <label for="fechaN" class="form-label">Fecha de Nacimiento</label>
            <input required type="date" class="form-control" id="fechaN" name="fechaN" value="<?php echo htmlspecialchars($contacto['fecha_nacimiento'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="Fecha Nacimiento">
        </div>
        <div class="mb-3">
            <label for="especialidad" class="form-label">Especialidad</label>

            <select required class="form-select" name="especialidad" id="especialidad">
                <option <?php if ($contacto['especialidad_id'] == '1') { ?><?php echo "selected";
                                                                        } ?> value="1">DBA</option>
                <option <?php if ($contacto['especialidad_id'] == '2') { ?><?php echo "selected";
                                                                        } ?> value="2">desarrollador web</option>
                <option <?php if ($contacto['especialidad_id'] == '3') { ?><?php echo "selected";
                                                                        } ?> value="3">Ingeniero de software</option>
                <option <?php if ($contacto['especialidad_id'] == '4') { ?><?php echo "selected";
                                                                        } ?> value="4">Otro</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input required type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($contacto['email'], ENT_QUOTES, 'UTF-8'); ?>" id="email" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Número de telefono</label>
            <input required pattern="[0-9]{3}[0-9]{3}[0-9]{4}" type="telr" class="form-control" id="phone" value="<?php echo htmlspecialchars($contacto['phone'], ENT_QUOTES, 'UTF-8'); ?>" name="phone" placeholder="Número de telefono">
        </div>
        <div class="d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-primary block">Editar</button>
        </div>
    </form>
<?php } ?>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>