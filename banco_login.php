<?php
$usuario = 'root';
$senha =  '';
$database = 'sephora';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error){
    die("Falha ao se conectar ao servidor:" . $mysqli->error);
}

?>