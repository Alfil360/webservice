<?php
/*Se incluye la conexión a la base de datos */
    include 'conexion.php';

    $pdo = new Conexion();

/*Utiliso el metodo GET para solicitar informacion de un usuario*/    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){

/*Login para usuario rigistrado pidiendo información de nombre de usuario y contraseña */        
        $sql = $pdo->prepare("SELECT * FROM USUARIOS WHERE usuario=:usuario AND contrasena=:contrasena");
        $sql->bindValue(':usuario', $_GET['usuario']);
        $sql->bindValue(':contrasena', $_GET['contrasena']);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $cuenta = $sql->rowCount();
        echo $cuenta;
        if ($cuenta){
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetchAll());
    }  
    else{
        echo "usuario no registrado";
    }
    exit;
    }
?>