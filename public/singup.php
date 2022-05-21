<?php
$title = 'Registro';
require_once __DIR__ . '/../db/connection.php';
require_once __DIR__ . '/../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['username']) || empty($_POST['password']) || strlen($_POST['password']) < 10) {
        echo '<h2 class="text-danger text-center">Todos los campos deben estar llenos y la contraseña debe ser de almenos 10 caracteres</h2>.<br/><br/>';
    } else if (!$_POST['password'] == $_POST['confirmPassword']) {
        echo '<h2 class="text-danger text-center">Las contraseñas deben coinsidir</h2>.<br/><br/>';
    } else {
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];

        $result = $userData->insertUser($username, $password);

        if (!$result) {
            echo "<h2 class='text-danger text-center'>Nombre de usuario en uso</h2>";
        } else {
            echo "<h2 class='text-success text-center'>Muy bien ahora puedes Iniciar sesion</h2>";
            header('refresh:1; url=login.php');
        }
    }
}
?>
<h2 class="text-center text-primary">Registrarse</h2>

<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
    <div class="mb-3">
        <label for="username" class="form-label">Nombre de usuario</label>
        <input name="username" type="text" class="form-control" id="username" aria-describedby="emailHelp" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username'] ?>">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="password">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Confirmar Password</label>
        <input name="confirmPassword" type="password" class="form-control" id="password">
    </div>
    <div class="d-grid gap-2">
        <button type="submit" value="login" class="btn btn-primary block">Submit</button>
    </div>
</form>