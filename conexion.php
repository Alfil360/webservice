<?php
    class conexion extends PDO
    {
    private $hostBd = 'localhost';
    private $nombreBd = 'dbga7aa5ev01';
    private $usuarioBd = 'root';
    private $passwordBd = '';

    public function __construct()
    {
        try{
            parent::__construct('mysql:host=' . $this->hostBd . ';dbname=' . $this->nombreBd . ';charset=utf8', $this->usuarioBd, $this->passwordBd, 
             array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

           } catch(PDOException $e){
        echo 'Error: ' . $e->getMessage();
        exit;   
        }
      }
    }
?>