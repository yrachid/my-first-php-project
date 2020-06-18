<?php 
//&& $_REQUEST ['senha'] == $senha )
require 'class_conexao2.php';
$objeto_login = new conexao ();
$objeto_login -> defineServidor ("database");
$objeto_login -> defineSenha ("qi");
$objeto_login -> defineUsuario ("novousuario");

$objeto_login -> abrirConexao();

$objeto_login -> defineNomedobanco ("locadora");


$busca_dados = "SELECT * FROM clientes";
$encontra_dados = $objeto_login -> consulta ($busca_dados);  



 

	if (array_key_exists ("cookie_login" , $_COOKIE )){
		 echo "já existe um usuário Logado!";
    }
	 else{
         while($linha = mysql_fetch_array($encontra_dados)){
		 $login = $linha['login'];
		 $senha = $linha['senha'];
		 
	     if ($_REQUEST ['login'] == $login && $_REQUEST['senha'] == $senha){
             setcookie ("cookie_login","sim");
			 header("location:link_locadora.php");
         }
	     else{
	         echo "Usuário ou senha inválidos!";
	     }
	 }
	 }
?>
