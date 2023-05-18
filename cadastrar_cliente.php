<?PHP
require_once('banco.php');


$codigo = $_REQUEST['txt_codigo'];
$nome_completo = $_REQUEST['txt_nome_completo'];
$email = $_REQUEST['txt_email'];
$telefone = $_REQUEST['txt_telefone'];
$sexo = $_REQUEST['txt_sexo'];
$data_nascimento = $_REQUEST['txt_data_nascimento'];
$escolaridade = $_REQUEST['txt_escolaridade'];
$endereco = $_REQUEST['txt_endereco'];
$cidade = $_REQUEST['txt_cidade'];
$pais = $_REQUEST['txt_pais'];
$mensagem = $_REQUEST['txt_mensagem'];
			   

$sql = "insert into tb_autenticacao (aut_codigo, aut_nome_completo, aut_email, aut_telefone, aut_sexo, aut_data_nascimento, aut_escolaridade, aut_endereco, aut_cidade, aut_pais, aut_mensagem) 
								values ('$codigo', '$nome_completo', '$email', '$telefone', '$sexo', '$data_nascimento', '$escolaridade', '$endereco', '$cidade', '$pais', '$mensagem')";

mysqli_query($con, $sql) or die ("Erro na sql!") ;

header("Location: home.php");

?>
