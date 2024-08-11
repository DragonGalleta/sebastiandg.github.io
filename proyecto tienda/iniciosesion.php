<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio de sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

     <link rel="stylesheet" href="style.css">

</head>

<body>
<?php
 session_start();

if (isset($_GET['btn'])) {
    $user = $_GET['user'];
    $password = $_GET['password'];
    $_SESSION['user'] = htmlspecialchars($_GET['user']);

    if ($user == "" || $password == "") {
        echo '<div class="alert alert-danger">Llena todos los datos</div>';
        exit;
    }

    include('conexion.php');

    // Consulta SQL para verificar usuario y contraseña
    $query = "SELECT * FROM usuarios WHERE usuario='$user' AND contraseña='$password'";
    $ejq = mysqli_query($conn, $query);

    // Verificar si se encontró un usuario
    if (mysqli_num_rows($ejq) > 0) {
        echo "Bienvenido, $user";
        header("Location: inicio.php");
        exit;
    } else {
        echo '<div class="alert alert-danger">Usuario o contraseña incorrectos</div>';
    }
}
?>
    
    <section class="vh-100" style="background-color: #eee;">
    
      <form method ="GET" style="margin-top: 150px;">
        
        <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>
                                <form class="mx-1 mx-md-4" method="GET">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="typeEmailX" class="form-control" name="user" required />
                                            <label class="form-label" for="typeEmailX">Usuario</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="typePasswordX" class="form-control" name="password" required />
                                            <label class="form-label" for="typePasswordX">Password</label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg" name="btn">Login</button>
                                    </div>
                                    <div class="text-center mt-3">
                                        <a href="index.php" class="btn btn-outline-primary">¿No tienes una cuenta? Regístrate</a>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                              <img src="img.jpg" class="img-fluid" alt="Sample image" width="400px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>






    
</body>
</html>