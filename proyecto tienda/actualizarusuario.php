<?php

try {
   session_start();
include 'conexion.php';

$nombre = "";
$user = "";
$contraseña = "";
$usuario_actual = "";

if(isset($_GET['usuario'])){
    $user = $_GET['usuario'];
    $usuario_actual = $user;
    
    $query = "SELECT * FROM usuarios WHERE usuario='$user'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $contraseña = $row['contraseña'];
        $user = $row['usuario'];
    }
}

if(isset($_POST['btnActualizar2'])){
    $user_actual = $_POST['usuario_actual'];
    $nom = $_POST['nombre'];
    $user = $_POST['usuario'];
    $contraseña = $_POST['password'];

    $query = "UPDATE usuarios SET nombre='$nom', usuario='$user', contraseña='$contraseña' WHERE usuario='$user_actual'";

    $ejq = mysqli_query($conn, $query);
    if ($ejq) {
        echo "<div class='alert alert-success mt-3'>Se actualizó el cliente correctamente</div>";
        header("location:mostrarregistrados.php");
    } else {
        echo "<div class='alert alert-danger mt-3'>Hay un error en la consulta: " . mysqli_error($conn) . "</div>";
    }
}
} catch (\Throwable $th) {
    echo "<div class='alert alert-danger mt-3'>Usuario no puede ser el mismo</div> "; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.html'; ?>

<div class="container mt-5">
    <h1 class="text-center p-4 bg-primary text-white rounded">Actualizar Usuario</h1>
    <form class="row g-3 p-4 bg-light" action="actualizarusuario.php" method="POST">
        <input type="hidden" name="usuario_actual" value="<?php echo $usuario_actual; ?>">

        <div class="col-md-6 mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $user; ?>" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="password" class="form-label">Nueva Contraseña</label>
            <input type="text" class="form-control" name="password" id="password" value="<?php echo $contraseña; ?>" required>
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary btn-lg" name="btnActualizar2">Actualizar</button>
        </div>
    </form>
</div>

</body>
</html>
