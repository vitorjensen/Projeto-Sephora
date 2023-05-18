<?php 

if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['aut_codigo'])){
    die("Faça login para acessar sua conta.<p><a href=\"login.php\">Entrar</a></p>");
}
?>