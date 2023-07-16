<?php

/*Se incluye la conexión a la base de datos */
include 'conexion.php';

$pdo = new Conexion();


/*Utiliso el metodo POST para insertar información en la base de datos */
if($_SERVER['REQUEST_METHOD'] == 'POST'){

/*Registra a un usuario para que ingrese a la aplicación */
    $sql = "INSERT INTO usuarios (nombres, apellidos, usuario, contrasena) VALUES (:nombres, :apellidos, :usuario, :contrasena)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nombres', $_POST['nombres']);
    $stmt->bindValue(':apellidos', $_POST['apellidos']);
    $stmt->bindValue(':usuario', $_POST['usuario']);
    $stmt->bindValue(':contrasena', $_POST['contrasena']);
    $stmt->execute();
    $idPost = $pdo->lastInsertId();
    if($idPost){
        header("HTTP/1.1 200 OK");
        echo json_encode($idPost);
    }
    else echo "No se pudo registar el usuario";
    exit;
}

?>