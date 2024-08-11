<?php
$conn = new mysqli("localhost", "root","", "tienda");
if ($conn->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conn->connect_errno . ") " . 
    $conn->connect_error;
}else{
    

} ?>


