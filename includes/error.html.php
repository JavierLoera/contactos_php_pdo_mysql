<?php
require_once __DIR__ . '/../includes/header.php';

if (!empty($validaciones)) {
    foreach ($validaciones as $validacion) {
        echo "<div class='alert alert-danger' role='alert'>$validacion</div>";
    }
} else {
    echo "<div class='alert alert-danger' role='alert'>Ha acurrido un error</div>";
}




require_once __DIR__ . '/../includes/footer.php';
