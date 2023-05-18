<?php
require_once('banco_login.php');



if(isset($_POST['aut_nome_completo']) or isset($_POST['aut_email'])){

  if(strlen($_POST['aut_nome_completo']) == 0) {
   // echo "Preencha com seu nome cadastrado";
  } else if (strlen($_POST['aut_email']) == 0){
   // echo "Preencha com seu email cadastrado";
  }else{

    $nome = $mysqli->real_escape_string($_POST['aut_nome_completo']);
    $email = $mysqli->real_escape_string($_POST['aut_email']);

    $sql_code = "SELECT * FROM tb_autenticacao WHERE aut_nome_completo = '$nome' AND aut_email = '$email'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução SQL:" . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1){
      $usuario = $sql_query->fetch_assoc();
  
      if(!isset($_SESSION)){
        session_start();
      }

      $_SESSION['aut_codigo'] = $usuario['aut_codigo'];
      $_SESSION['aut_nome_completo'] = $usuario['aut_nome_completo'];
      $_SESSION['aut_email'] = $usuario['aut_email'];

      header("Location: recebe.php");
    } else {
     //echo "Erro ao logar, dados incorretos";
    }
  }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="imagens-e-video/sephora-logo-pqn.jpg" type="image/x-icon">
    <title>Sephora | Cadastro </title>

    <style>
      .alert{
        display: inline;
       padding: 10px;
       margin: 5px;
      margin-left: 3.5rem;
      }
      </style>
</head>

<body>
    <header>
        <nav>
            <img src="imagens-e-video/sephora-logo-branco.png" alt="SEPHORA Logo" id="imagem_sephora">
            <ul>
                <li><a class="nav_link" href="home.php">HOME</a></li>
                <li><a class="nav_link" href="produtos.php">PRODUTOS</a></li>
                <li><a class="nav_link" id="pag_atual" href="#">CADASTRO</a></li>
                <li><a class="nav_link" href="sobre.php">SOBRE</a></li>
                </ul>
            <a href="contato.html"></a>
        </nav>
        </header>
    <main>
        <br>
        <header>
            <h1 class="titulo-registrar"><a href="home.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="20" height="20"><path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
            </svg></a>Faça Login</h1>
            <span>
            <?php
            if(isset($_POST['aut_nome_completo']) or isset($_POST['aut_email'])){
              if(strlen($_POST['aut_nome_completo']) & (strlen($_POST['aut_email'])==0)) {
                echo ("<div class=\"alert alert-danger\" role=\"alert\">Preencha os campos necessários!</div>");
              }
              if(strlen($_POST['aut_nome_completo']) == 0) {
                echo ("<div class=\"alert alert-danger\" role=\"alert\">Preencha com seu nome cadastrado!</div>");
              } else if (strlen($_POST['aut_email']) == 0){
                echo ("<div class=\"alert alert-danger\" role=\"alert\">Preencha com seu Email cadastrado!</div>");
              }else{
                echo ("<div class=\"alert alert-danger\" role=\"alert\">Erro ao logar, dados incorretos!</div>");
              }
         
            }
            ?>
            </span>
        </header>
        <div class="card-body">
            <div class="container">
            <form  action="" method="POST">
                <div class="form-group">
                    <label> Primeiro nome: </label>
                    <input type="text" class="form-control" id="aut_nome_completo" name="aut_nome_completo" placeholder="Digite seu nome completo:" style="font-size: 16px;">
                
                    <label> Email: </label>
                    <input type="text" class="form-control" id="aut_email" name="aut_email" placeholder="Digite seu Email:" style="font-size: 16px;">
            <br>
            <div class="footer" style="text-align: center;">
            <button type="submit" value="Entrar" name="login" id="login" class="btn btn-primary" >
                    Entrar
                    </button>
                    
                    <div>
            
                    <br>
                    <a href="cadastro.php">Registre-se</a>
            </div>
                </form>
    </main>
    <footer>
        <section class="section_footer">
          <img src="imagens-e-video/Sephora-Emblema.png" alt="Sephora Logo" id="logo_footer">
          <section class="section_footer">
            <table>
              <tr style="background-color: black;">
                <th style="font-family: Raleway, Arial, Helvetica, sans-serif;">SERVIÇOS ONLINE</th>
                <th style="font-family: Raleway, Arial, Helvetica, sans-serif;">SERVIÇOS DA BOUTIQUE</th>
                <th style="font-family: Raleway, Arial, Helvetica, sans-serif;">A SEPHORA</th>
              </tr>
              <tr style="background-color: black;">
                <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Perguntas Frequentes</td>
                <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Escolha uma Boutique</td>
                <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Trabalhe Conosco</td>
              </tr>
              <tr style="background-color: black;">
                <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Minha Conta</td>
                <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Agendamento com a SEPHORA</td>
                <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Privacidade</td>
              </tr>
              <tr style="background-color: black;">
                <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Instrução de Cuidados</td>
                <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Lojas SEPHORA</td>
                <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Combate à Falsificação</td>
              </tr>
            </table>
          </section>
        </section>
      </footer>
</body>
</html>

