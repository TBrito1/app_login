<?php

// session_start inicia a sessão
session_start();

// as variaveis login e senha recebem os dados digitados na pagina anterior
$login = addslashes(trim($_POST['login']));
$senha = addslashes(trim($_POST['senha']));
$lin = isset($_POST["LOGIN"])?$_POST["LOGIN"]:null;
$lout = isset($_POST["LOGOUT"])?$_POST["LOGOUT"]:null;

// valida da chamada do usuario para entrada ou saída do sistema
if($lin != null)
	//Chamada da funcao que realiza a validacao de usuario e senha
	login($login,$senha);
elseif($lout != null)
	logout();
else
	echo "Erro de Conexão!!!";

/**
* Implementacao do metodo de Conexao com o Banco de dados
* utilizando a Biblioteca PDO para versoes do PHP 5 >= 5.1.0, PHP 7.
* @author 	TBrito1
* @since 	2017-11-20
* @version 	0.0.1
*/
function conection(){
	//Lembrando que manter username/password dentro da classe nao e uma boa ideia para codigos de Producao
	$DATABASE = "dbname=webapp";
	$PATH = "mysql:host=localhost;$DATABASE"; // ALTERE AQUI !!!
	$USER = "root";		// ALTERE AQUI !!!
	$PASSWORD = null;	// ALTERE AQUI !!!
	// As próximas linhas são responsáveis em se conectar com o banco de dados.
	try{
		//O objeto PDO necessita de tres parametros para abrir conexao:
		//Database destino, usuario e senha
		$pdo = new PDO($PATH,$USER,$PASSWORD);
	}catch (Exception $e) {
		echo "Exceção capturada: ",  $e->getMessage(), "\n";
	}
	//Retorna conexao aberta caso nao encontre nenhuma excecao
	return $pdo;
}

/**
* Implementacao do metodo de Entrada na Aplicação, validando usuario e senha no Banco de dados
* recebendo Login e Senha como parametros que foram passados pela requisicao.
* @param 	$login
* @param 	$senha
* @author 	TBrito1
* @since 	2017-11-20
* @version 	0.0.1
*/
function login($login,$senha){
	$pdo = conection(); // Recebe uma conexao

	//Monta a consulta e ja executa, trazendo o resultado para dentro de $busca
	$busca = $pdo->query("SELECT * FROM usuario WHERE  nome LIKE '$login' AND senha LIKE '$senha';");
	
	//Verifica se ha resultado de $busca, caso retorne a linha significa que o usuario e valido
   	if($busca->rowCount() == 1){
   		//Armazena informacoes na sessao
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
		header('location:site.php');	// redireciona para a pagina correta
	}else{
		logout();
	}
}

/**
* Implementacao do metodo de Saída da Aplicação, removendo elementos da sessao
* retornando para a pagina inicial.
* @author 	TBrito1
* @since 	2017-11-20
* @version 	0.0.1
*/
function logout(){
	//Remove informacoes da sessao
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header('location:index.html');	// redireciona para a pagina homepage
}

?>