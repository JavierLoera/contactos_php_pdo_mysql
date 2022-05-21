<?php
$title = 'Inciar sesion';
require_once __DIR__ . '/../db/connection.php';
require_once __DIR__ . '/../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    $new_password = md5($password . $username);
    $result = $userData->getUser($username, $new_password);

    if (!$result) {
        echo "<h2 class='text-danger text-center'>Nombre de usuario o contraseña incorrectos</h2>";
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $result['id'];
        header('location:listado.php');
    }
}

?>

<h2 class="text-center text-primary">Iniciar sesión</h2>

<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
    <div class="mb-3">
        <label for="username" class="form-label">Nombre de usuario</label>
        <input name="username" type="text" class="form-control" id="username" aria-describedby="emailHelp" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username'] ?>">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="password">
    </div>
    <div class="d-grid gap-2">
        <button type="submit" value="login" class="btn btn-primary block">Submit</button>
    </div>
</form>