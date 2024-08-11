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
 $qs="SELECT * FROM usuarios";
 $querys=mysqli_query($conn,$qs);
?>

<div class="container mt-4">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">NOMBRE</th>
                <th scope="col">USUARIO</th>
                <th scope="col">CONTRASEÑA</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($v = mysqli_fetch_array($querys)) { ?> 
            <tr> 
                <td><?php echo $v['nombre'] ?></td>
                <td><?php echo $v['usuario'] ?></td>
                <td><?php echo $v['contraseña'] ?></td>
                <td>
                    <a href="actualizarusuario.php?usuario=<?php echo $v['usuario']; ?>" class="btn btn-warning btn-sm">Actualizar</a>
                    <a href="borrarusuario.php?usuario=<?php echo $v['usuario']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas borrar este cliente?');">Borrar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
