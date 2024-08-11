<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Jugador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.html'; ?>

<?php
$nombre = " ";
$contraseña = " ";

if(isset($_GET['usuario'])){
    $user = $_GET['usuario'];
    include 'conexion.php';
    $query = "SELECT * FROM usuarios WHERE usuario='$user'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $user = $row['usuario'];
        $contraseña = $row['contraseña'];
    }
}
?>

<?php

if(isset($_POST['btnBorrar'])){
    $user = $_POST['usuario'];

    include 'conexion.php';
    $user = strval($user);
    $query = "DELETE FROM usuarios WHERE usuario='$user'";
    $ejq = mysqli_query($conn, $query);
    if ($ejq) {
        echo "<div class='alert alert-success mt-3'>Se borró el cliente correctamente</div>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Hay un error en la consulta: " . mysqli_error($conn) . "</div>";
    }
}
?>

<div class="container mt-5">
    <h1 class="text-center p-4 bg-primary text-white rounded">Borrar Usuario</h1>
    <form class="row g-3 p-4 bg-light" action="borrarusuario.php" method="POST">
        <input type="hidden" name="id_actual" value="<?php echo $id_actual; ?>">

        <div class="col-md-6 mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $user; ?>" readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label for="nombres" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $nombre; ?>" readonly>
        </div>



        <div class="col-md-6 mb-3">
            <label for="contraseña" class="form-label">Contraseña</label>
            <input type="text" class="form-control" name="contraseña" id="contraseña" value="<?php echo $contraseña; ?>" readonly>
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-danger btn-lg" name="btnBorrar">Borrar</button>
        </div>
    </form>
</div>

</body>
</html>
