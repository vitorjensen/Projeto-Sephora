<?PHP
require_once('banco.php');

$codigo 		   = $_REQUEST['txt_codigo'];
$nome_completo	   = $_REQUEST['txt_nome_completo'];
$email		       = $_REQUEST['txt_email'];


$sql = "update tb_autenticacao set 

aut_nome_completo = '$nome_completo',  
aut_email = '$email'

where 
aut_codigo = '$codigo'";

mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: login.php");
?>
