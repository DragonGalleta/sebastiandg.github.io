<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
 include 'navbar.html'; 
 include 'conexion.php';
 $qs="SELECT * FROM productos";
 $querys=mysqli_query($conn,$qs);
?>

<div class="container mt-4">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Tipo</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($v = mysqli_fetch_array($querys)) { ?> 
            <tr> 
                <td><?php echo $v['id'] ?></td>
                <td><?php echo $v['producto'] ?></td>
                <td><?php echo $v['precio'] ?></td>
                <td><?php echo $v['tipo'] ?></td>
                <td>
                    <a href="actualizar.php?id=<?php echo $v['id']; ?>" class="btn btn-warning btn-sm">Actualizar</a>
                    <a href="borrar.php?id=<?php echo $v['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas borrar este cliente?');">Borrar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
