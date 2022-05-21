<?php include_once 'sesion.php'; ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <link rel='stylesheet' href='../css/styles.css'>
  <title><?= $title; ?></title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="listado.php">Contactos</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Registro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listado.php">Lista Contactos</a>
          </li>
        </ul>
        <?php if (!isset($_SESSION['userid'])) { ?>
          <span class="navbar-text">
            <a class="me-5 nav-link" href="login.php">Iniciar sesion</a>
          </span>
          <span class="navbar-text">
            <a class="nav-link" href="singup.php">Registrarse</a>
          </span>
        <?php } else { ?>
          <span class="navbar-text me-5"><?php echo $_SESSION['username'] ?></span>
          <span class="navbar-text">
            <a class="nav-link" href="logout.php">cerrar sesion</a>
          </span>
        <?php } ?>

      </div>
    </div>
  </nav>
  <div class='container'>