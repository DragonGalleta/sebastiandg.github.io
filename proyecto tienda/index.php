<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<?php

try {
  $password1 = "";
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];

    if ($name == "" || $user == "" || $password == "" || $password1 == "") {
        echo '<div class="alert alert-danger">Todos los campos son obligatorios</div>';
        exit;
       
    }
    if ($password != $password1) {
      echo '<div class="alert alert-danger">Las contraseñas no coinciden </div>';
      exit;
    }
    

    include('conexion.php');

    $query = "INSERT INTO usuarios(nombre, usuario, `contraseña`) VALUES ('$name', '$user', '$password')";
    $ejq = mysqli_query($conn, $query);

    if ($ejq) {
        echo "Nuevo registro creado exitosamente";
        header("Location: iniciosesion.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

} catch (\Throwable $th) {
  echo '<div class="alert alert-danger">Usuario no disponible</div>';
}
?>


<body>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" method ="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="name" require/>
                      <label class="form-label" for="form3Example1c"  >Nombre</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example3c" class="form-control" name="user"/>
                      <label class="form-label" for="form3Example3c"  require>Usuario</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="password" require/>
                      <label class="form-label" for="form3Example4c" >Contraseña</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="password" name="password1"id="form3Example4cd" class="form-control" require />
                      <label class="form-label" for="form3Example4cd" >Repita la Contraseña</label>
                    </div>
                  </div>

                

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" name="btn">Register</button>
                  </div>
                  <div class="text-center mt-3">
            <a href="iniciosesion.php" class="btn btn-outline-primary">¿Ya estás registrado?</a>
        </div>
                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="img.jpg"
                  class="img-fluid" alt="Sample image" width="400px">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>