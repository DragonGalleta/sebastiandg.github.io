
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

<?php include('navbar.html'); ?>

<div class="container mt-5">
    <h1 class="text-center p-4 bg-primary text-white rounded">Borrar Producto</h1>
    <form class="row g-3 p-4 bg-light" method="POST">
        
        <div class="col-md-6 mb-3">
            <label for="nuevo_id" class="form-label"> ID</label>
            <input type="text" class="form-control" name="id" id="nuevo_id" value="" >
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="inputState" class="form-label">Tipo</label>
            <select id="inputState" name="tipo" class="form-select">
                <option value="" selected>  </option>
                <option value="Aseo">Aseo</option>
                <option value="Empaques">Empaques</option>
                <option value="Verduras">Verduras</option>
                <option value="Alcohol">Alcohol</option>
            </select>
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="producto" class="form-label">Producto</label>
            <input type="text" class="form-control" name="producto" id="producto" value="">
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="precio" class="form-label">Nuevo precio</label>
            <input type="number" class="form-control" name="precio" id="precio" value="">
        </div>
        
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary btn-lg" name="btnActualizar">Actualizar</button>
        </div>
    </form>
</div>

<?php           
include('conexion.php');
$id_borrar = "";

if (isset($_POST['btnActualizar'])) {
    $id = $_POST['id'];
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];
    $tipo = $_POST['tipo'];

    // Consulta para seleccionar el producto
    $query = "SELECT id, producto, precio, tipo FROM productos WHERE id = '$id' OR producto = '$producto' OR precio = '$precio' OR tipo = '$tipo'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo '<div class="container">';
        echo '<h1>Producto</h1>';
        
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $producto = $row['producto'];
            $precio = $row['precio'];
            $tipo = $row['tipo'];

            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<p><strong>ID:</strong> ' . htmlspecialchars($id) . '</p>';
            echo '<p><strong>Producto:</strong> ' . htmlspecialchars($producto) . '</p>';
            echo '<p><strong>Precio:</strong> ' . htmlspecialchars($precio) . '</p>';
            echo '<p><strong>Tipo:</strong> ' . htmlspecialchars($tipo) . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<form method="POST">';
            echo '<input type="hidden" name="id_borrar" value="' . htmlspecialchars($id) . '">';
            echo '<div class="mb-3">';
            echo '<label for="producto_borrar" class="form-label">Producto</label>';
            echo '<input type="text" class="form-control" name="producto_borrar" id="producto_borrar" value="' . htmlspecialchars($producto) . '">';
            echo '</div>';
            echo '<div class="mb-3">';
            echo '<label for="precio_borrar" class="form-label">Precio</label>';
            echo '<input type="number" class="form-control" name="precio_borrar" id="precio_borrar" value="' . htmlspecialchars($precio) . '">';
            echo '</div>';
            echo '<div class="mb-3">';
            echo '<label for="tipo_borrar" class="form-label">Tipo</label>';
            echo '<select id="tipo_borrar" name="tipo_borrar" class="form-select">';
            echo '<option value="Aseo" ' . ($tipo == 'Aseo' ? 'selected' : '') . '>Aseo</option>';
            echo '<option value="Empaques" ' . ($tipo == 'Empaques' ? 'selected' : '') . '>Empaques</option>';
            echo '<option value="Verduras" ' . ($tipo == 'Verduras' ? 'selected' : '') . '>Verduras</option>';
            echo '<option value="Alcohol" ' . ($tipo == 'Alcohol' ? 'selected' : '') . '>Alcohol</option>';
            echo '</select>';
            echo '</div>';
            echo '<button type="submit" class="btn btn-danger btn-sm" name="btnConfirmarBorrar">Confirmar </button>';
            echo '</form>';
        }

        echo '</div>';
    } else {
        echo '<div class="alert alert-danger">No se encontraron productos que coincidan con los criterios.</div>';
    }
} elseif (isset($_POST['btnConfirmarBorrar'])) {
    $id_borrar = $_POST['id_borrar'];
    $producto_actualizar = $_POST['producto_borrar'];
    $precio_borrar = $_POST['precio_borrar'];
    $tipo_borrar = $_POST['tipo_borrar'];

    // Consulta de actualización
    $query_borrar = "DELETE FROM  productos  WHERE id = '$id_borrar'";
    if ($conn->query($query_borrar) === TRUE) {
        echo '<div class="alert alert-success">Producto Borrado correctamente.</div>';
    } else {
        echo '<p><div class="alert alert-danger">Error al actualizar el producto: ' . $conn->error . '</div>';
    }
} else {

}


?>
