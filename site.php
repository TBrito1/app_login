<!DOCTYPE html>
<html lang="pt-br">
<!--
  @author: Thiago Brito
  @e-mail: brito.thiago01@gmail.com
-->
  <head>
    <?php
      /* esse bloco verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e 
      *digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), 
      *burlando a obrigação de fazer login, com isso se ele não estiver conectado não será criado a session, então 
      * ao verificar que a session não existe a página redireciona o mesmo para a index.php. 
      */
      session_start(); 
      if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        unset($_SESSION['login']);
      	unset($_SESSION['senha']);
      	header('location:index.html');
      }else{
        $logado = $_SESSION['login'];
      }
    ?>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyAPP-Login WEB</title>
    <!--Estilos Pessoal-->
    <link  rel="stylesheet" href="css/style.css"/>
  </head>

  <body>
    <div id="interface">
      <div id="centro">
        <table>
          <tr>
            <td id="menu" class="borda" colspan="2">
              <?php echo" Bem vindo: $logado";?><br/>
              <form method="post" action="ope.php" id="formlogin" name="formlogin">
                <input type="submit" value="LOGOUT" name="LOGOUT"/>
              </form>
            </td>
          </tr>
          <tr>
            <td id="opcoes" class="borda">
              MENU AQUI
            </td>
            <td id="conteudo" class="borda">
              CONTEUDO E ICONES AQUI
            </td>
          </tr>
          <tr>
            <td id="rodape" class="borda" colspan="2">
              Rodapé
            </td>
          </tr>
        </table>
    </div>
  </div>
  <footer>
    <p>
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
          <img style="border:0;width:40px;height:20px"
              src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
              alt="Valid CSS!" />
      </a>
    </p>
  </footer>
  </body>
</html>