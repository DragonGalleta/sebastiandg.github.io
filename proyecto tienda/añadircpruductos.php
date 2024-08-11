




    
    
       
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include('navbar.html'); ?>
<?php




try {
  if (isset($_GET['btn2'])) {
    
    $id = $_GET['id'];
    $pd = $_GET['producto'];
    $tp = $_GET['tipo'];
    $pc = $_GET['precio'];
    
   

    include 'conexion.php';

    
    $query = "INSERT INTO productos(id, producto, precio, tipo)
              VALUES('$id', '$pd', '$pc', '$tp')";

    $ejq = mysqli_query($conn, $query);

    if ($ejq) {
        echo '<div class="alert alert-success">Se registro el producto</div>';
    } else {
        echo '<div class="alert alert-danger">Error: Asegurate de llenar los campos con los datos correspondinetes</div>';
    }
}} catch (\Throwable $th) {
  echo '<div class="alert alert-danger">Error: Asegurate de llenar los campos con los datos correspondinetes</div>';}
?>


<div class="container mt-5">
    <h1 class="text-center p-4 bg-primary text-white rounded">Añadir un producto</h1>
    <form class="row g-3 p-4 bg-light" action="" method="GET">
        <div class="col-md-6 mb-3">
            <label for="inputState" class="form-label">Nuevo producto</label>
            <select id="inputState" name="tipo" class="form-select" required>
                <option value="" disabled selected>Seleccione el tipo de producto</option>
                <option value="Aseo">Aseo</option>
                <option value="Empaques">Empaques</option>
                <option value="Verduras">Verduras</option>
                <option value="Alchol">Alchol</option>
            </select>
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="inputId" class="form-label">ID</label>
            <input type="text" class="form-control" name="id" id="inputId" value="0">
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="inputName" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" name="producto" id="inputName" required>
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="inputProvedor" class="form-label">Precio</label>
            <input type="text" class="form-control" id="inputProvedor" name="precio" required>
        </div>
        
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary btn-lg" name="btn2">Enviar</button>
        </div>
    </form>
</div>

</body>
</html>