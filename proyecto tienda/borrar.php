<?php
session_start();
include 'conexion.php';

$id_actual = "";
$id = "";
$producto = "";
$precio = "";
$tipo = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id_actual = $_GET['id'];

    $query = "SELECT * FROM productos WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $producto = $row['producto'];
        $precio = $row['precio'];
        $tipo = $row['tipo'];
    }
}

if (isset($_POST['btnBorrar'])) {
    $id_actual = $_POST['id_actual'];

    $query = "DELETE FROM productos WHERE id='$id_actual'";
    $ejq = mysqli_query($conn, $query);
    if ($ejq) {
        echo "<div class='alert alert-success mt-3'>Se borró el producto correctamente</div>";
        header("Location: mostrarproductos.php");
    } else {
        echo "<div class='alert alert-danger mt-3'>Hay un error en la consulta: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.html'; ?>

<div class="container mt-5">
    <h1 class="text-center p-4 bg-primary text-white rounded">Borrar Producto</h1>
    <form class="row g-3 p-4 bg-light" action="borrar.php" method="POST">
        <input type="hidden" name="id_actual" value="<?php echo $id; ?>">

        <div class="col-md-6 mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" name="id" id="id" value="<?php echo $id; ?>" readonly>
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="producto" class="form-label">Producto</label>
            <input type="text" class="form-control" name="producto" id="producto" value="<?php echo $producto; ?>" readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio" id="precio" value="<?php echo $precio; ?>" readonly>
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" class="form-control" name="tipo" id="tipo" value="<?php echo $tipo; ?>" readonly>
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-danger btn-lg" name="btnBorrar">Borrar</button>
        </div>
    </form>
</div>

</body>
</html>
