<?php
session_start();

?>
<?PHP

require_once('banco.php');

$cons_codigo = isset($_REQUEST['txt_cons_codigo']) ? $_REQUEST['txt_cons_codigo']: '';
$cons_nome_completo = isset($_REQUEST['txt_cons_nome_completo']) ? $_REQUEST['txt_cons_nome_completo']: '';
$cons_email = isset($_REQUEST['txt_cons_email']) ? $_REQUEST['txt_cons_email']: '';


$sql = "select * from tb_autenticacao
  where 
    aut_codigo like '%".$cons_codigo."%'AND
    aut_nome_completo like '%".$cons_nome_completo."%'AND
    aut_email like '%".$cons_email."%'
 ";
 $sql = mysqli_query($con, $sql) or die ("Erro na sql!") ;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <link rel="shortcut icon" href="imagens-e-video/sephora-logo-pqn.jpg" type="image/x-icon">
    <title>Sephora | Home </title>
</head>
<body>
    <header>
      <nav class="propaganda">
        <ul id="ul_prop">
          <li><a class = "txt_prop"href="produtos.html">OFERTAS ESPECIAIS!</a></li>
          <li><img class="img_prop" src="imagens-e-video/imagem_propaganda"></li>
          <li><a class="txt_prop" href="produtos.html">SOMENTE HOJE TUDO COM 20% DE DESCONTO!</a></li>
          <li><img class="img_prop" src="imagens-e-video/imagem_propaganda"></li>
          <li><a class="txt_prop" href="produtos.html">FRETE GRÁTIS PARA TODO O BRASIL</a></li>
        </ul>
      </nav>
      <nav>
        <img src="imagens-e-video/sephora-logo-branco.png" alt="SEPHORA Logo" id="imagem_sephora">
          <ul>
              <li><a class="nav_link" id="pag_atual" href="#">HOME</a></li>
              <li><a class="nav_link" href="produtos.php">PRODUTOS</a></li>
              <li><a class="nav_link" href="cadastro.php">CADASTRO</a></li>
              <li><a class="nav_link" href="sobre.php">SOBRE</a></li>
 
              <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"></path>
          </svg>  
        </a>
      

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
         
            <!-- Message Start -->
              <div class="media-body">
           
                <h5 class="dropdown-item-title text-center">
                  
                <?php 
            
            if(isset($_SESSION['aut_codigo'])){
            echo $_SESSION['aut_nome_completo']; 
          }
          ?>
           </h5>
           <h5 class="dropdown-item-title">
           <div class="dropdown-divider"></div>
              <?php if(!isset($_SESSION['aut_codigo'])){
              echo("<a href=\"login.php\" class=\"dropdown-item dropdown-footer\">
              <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 512 512\" width=\"15\" height=\"16\"><path d=\"M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z\"/>
               </svg> Entrar</a>");
            }else{

             echo "<a href=\"servico.php\" class=\"dropdown-item dropdown-footer\"><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 512 512\" width=\"15\" height=\"16\"><path d=\"M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z\"/>
              </svg> Perfil</a>";
            }
           
           
          ?>
          </a>
           </h5>
               
              </div>
         
          <div class="dropdown-divider"></div>
          <div class="media">
              <div class="media-body">
          <h5 class="dropdown-item-title">

              <?php   if(isset($_SESSION['aut_codigo'])){
            echo("<a href=\"logout.php\" class=\"dropdown-item dropdown-footer\"><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 512 512\"  width=\"15\" height=\"16\"><path d=\"M400 54.1c63 45 104 118.6 104 201.9 0 136.8-110.8 247.7-247.5 248C120 504.3 8.2 393 8 256.4 7.9 173.1 48.9 99.3 111.8 54.2c11.7-8.3 28-4.8 35 7.7L162.6 90c5.9 10.5 3.1 23.8-6.6 31-41.5 30.8-68 79.6-68 134.9-.1 92.3 74.5 168.1 168 168.1 91.6 0 168.6-74.2 168-169.1-.3-51.8-24.7-101.8-68.1-134-9.7-7.2-12.4-20.5-6.5-30.9l15.8-28.1c7-12.4 23.2-16.1 34.8-7.8zM296 264V24c0-13.3-10.7-24-24-24h-32c-13.3 0-24 10.7-24 24v240c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24z\"/>
            </svg> Sair</a>"); 
          }
          ?>
        </div>
        </div>
        </div>
      </ul>
         
      </nav>
    </header>
    
    <main>
        <section class="imagem_com_item_texto_e_botao" id="img01">
            <section class="class_da_imagem_perfume">
              <img src="imagens-e-video/coco-mademoseille.png" alt="Perfume Chanel - Coco Mademoiselle" class="imagem_perfume" id="img_perfume01">
            </section>
            <section class="texto_e_botao">
              <h1>CHANEL</h1>
              <h2>COCO MADEIMOSELLE</h2>
              <a href="produtos.html"><button>VEJA MAIS</button></a>
            </section>
        </section>
        <section class="imagem_com_item_texto_e_botao" id="img02">
            <section class="class_da_imagem_perfume">
              <img src="imagens-e-video/malbec.png" alt="Perfume Malbec - CLUB INTENSO" class="imagem_perfume" id="img_perfume02">
            </section>
            <section class="texto_e_botao" id="texto2">
              <h1>Malbec</h1>
              <h2>CLUB INTENSO</h2>
              <a href="produtos.html"><button id="texto2">VEJA MAIS</button></a>
            </section>
        </section>
        <section class="imagem_com_item_texto_e_botao" id="img03">
            <section class="class_da_imagem_perfume">
              <img src="imagens-e-video/hugoboss-kitbanho.png" alt="Kit Banho HUGO BOSS - EAU DE TOILETTE" class="imagem_perfume" id="img_perfume03">
            </section>
            <section class="texto_e_botao" id="texto3">
              <h1>HUGO BOSS</h1>
              <h2>KIT BANHO</h2>
              <a href="produtos.html"><button id="texto3">VEJA MAIS</button></a>
            </section>
        </section>
        <section class="imagem_com_item_texto_e_botao" id="img04">
            <section class="class_da_imagem_perfume">
              <img src="imagens-e-video/goodgirl.png" alt="Perfume Good Girl - Carolina Herrera" class="imagem_perfume" id="img_perfume04">
            </section>
            <section class="texto_e_botao" id="texto4">
              <h1 style="font-weight: lighter;">GOOD GIRL</h1>
              <h2>CAROLINA HERRERA</h2>
              <a href="produtos.html"><button id="texto4">VEJA MAIS</button></a>
            </section>
        </section>
        <section class="imagem_com_item_texto_e_botao" id="img05">
            <section class="class_da_imagem_perfume">
              <img src="imagens-e-video/bleudechanel.png" alt="Perfume Chanel - Bleu de Chanel" class="imagem_perfume" id="img_perfume05">
            </section>
            <section class="texto_e_botao" id="texto5">
              <h1>CHANEL</h1>
              <h2>BLEU DE CHANEL</h2>
              <a href="produtos.html"><button id="texto5">VEJA MAIS</button></a>
            </section>
        </section>
        <section class="imagem_com_item_texto_e_botao" id="img06">
            <section class="class_da_imagem_perfume">
              <img src="imagens-e-video/nativaspa.png" alt="Perfume Chanel - Coco Mademoiselle" class="imagem_perfume" id="img_perfume06">
            </section>
            <section class="texto_e_botao" id="texto6">
              <h1>oBoticário</h1>
              <h2>NativaSPA</h2>
              <a href="produtos.html"><button id="texto6">VEJA MAIS</button></a>
            </section>
        </section>
    </main>
    
    <footer>
      <section class="section_footer">
        <img src="imagens-e-video/Sephora-Emblema.png" alt="Sephora Logo" id="logo_footer">
        <section class="section_footer">
          <table>
            <tr>
              <th style="font-family: Raleway, Arial, Helvetica, sans-serif;">SERVIÇOS ONLINE</th>
              <th style="font-family: Raleway, Arial, Helvetica, sans-serif;">SERVIÇOS DA BOUTIQUE</th>
              <th style="font-family: Raleway, Arial, Helvetica, sans-serif;">A SEPHORA</th>
            </tr>
            <tr>
              <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Perguntas Frequentes</td>
              <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Escolha uma Boutique</td>
              <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Trabalhe Conosco</td>
            </tr>
            <tr>
              <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Minha Conta</td>
              <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Agendamento com a SEPHORA</td>
              <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Privacidade</td>
            </tr>
            <tr>
              <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Instrução de Cuidados</td>
              <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Lojas SEPHORA</td>
              <td style="font-family: Raleway, Arial, Helvetica, sans-serif;">Combate à Falsificação</td>
            </tr>
          </table>
        </section>
      </section>
    </footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>