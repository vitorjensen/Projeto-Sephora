<?PHP
require_once('banco.php');

$codigo 	= $_REQUEST['aut_codigo'];

$sql = "delete from tb_autenticacao where aut_codigo = '$codigo'";

mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: home.php");

?>