<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="http://localhost/Portafolio/Ecomerce/proyecto%20eventos/style1.css">
</head>
<body>
    <header>
        
    <?php
session_start();

// Verificar si el usuario está en la sesión
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    // Si el usuario no está en la sesión, redirige al formulario
    header("Location: index.php");
    exit();
}
?>

<?php
include("conexion.php");


$query = "SELECT nombre FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}


$stmt->bind_param('s', $user); 
$stmt->execute();

// Obtener el resultado
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
    $nombre = $row['nombre'];
    
} else {
    exit;
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
?>



        <h1>Bienvenido <?php echo $nombre;  ?></h1>

    </header>



    <section id="controladores">
        <figure>
            <a href="añadircpruductos.php">
                <img src="imagenes/añade.png" alt="Añadir Producto">
                <figcaption>Añadir Producto</figcaption>
            </a>
        </figure>
        <figure>
            <a href="actualizarproductos.php">
                <img src="imagenes/editar.png" alt="Editar Producto">
                <figcaption>Editar Producto</figcaption>
            </a>
        </figure>
        <figure>
            <a href="eliminarproducto.php">
                <img src="imagenes/borrar.png" alt="Borrar Producto">
                <figcaption>Borrar Producto</figcaption>
            </a>
        </figure>
        <figure>
            <a href="mostrarproductos.php">
                <img src="imagenes/Productos.png" alt="Ver Producto">
                <figcaption>Ver Productos</figcaption>
            </a>
        </figure>
        <figure>
            <a href="mostrarregistrados.php">
                <img src="imagenes/usuario.png" alt="Ver Producto">
                <figcaption>Usuarios</figcaption>
            </a>
        </figure>
    </section>
    


    
    <section>
        <a href="index.php">
        <button>Cerrar Sesion</button>
        </a>
    </section>

    <footer>
        <p>Soporte: <a href="mailto:sebas2003asdi@gmail.com">sebas2003asdi@gmail.com</a></p>
    </footer>
</body>
</html>
