<?php

require 'class_conexao2.php';

function get_post_action($name)
{
    $params = func_get_args();
    
    foreach ($params as $name) {
        if (isset($_POST[$name])) {
            return $name;
        }
    }
}


$objetoConexao = new conexao();

$objetoConexao->defineServidor("database");
$objetoConexao->defineUsuario("novousuario");
$objetoConexao->defineSenha("qi");

$objetoConexao->abrirConexao();

if ($objetoConexao->estaConectado() == false){
	echo "Impossível estabelecer uma conexão";
} else {
	
	$objetoConexao->defineNomedobanco("locadora");
	$objetoConexao->selecionaBanco();
	if ($objetoConexao->estaComBancoSelecionado()==false) {
		echo "Impossível estabelecer uma conexão";
	} else {
            
		switch (get_post_action('Alugar', 'Reservar')) {
		
		case 'Alugar':
		    $identificador = $_POST['id'];	  
       	    $alugado = "Alugado";
			$reservado = "Reservado";
			$buscastatus = "SELECT status_filme FROM filmes WHERE id = $identificador;";
			$busca_status = $objetoConexao -> consulta ($buscastatus);
			$linha = mysql_fetch_array ($busca_status);
			$status_atual = $linha['status_filme'];
			
			if ($alugado == $status_atual){
			     Print "O filme está $status_atual .";
		     }else if($reservado == $status_atual){
			     print "O filme está $status_atual .";
			   }
			 
			 			 
			 else{
			     $sql = "UPDATE filmes SET status_filme='$alugado' WHERE id = '$identificador'; " ;
			     $inserirSucesso = $objetoConexao->atualizar($sql);
			     if ($inserirSucesso == false){
				     echo "Erro ao alugar filme." ;
			      } else {
				      echo "Filme alugado com sucesso.";
			        }
			  }
        break;
    
		case 'Reservar':
		    $identificador = $_POST['id'];
		    $alugado = "Alugado";
			$reservado = "Reservado";
			$buscastatus = "SELECT status_filme FROM filmes WHERE id = $identificador;";
			$busca_status = $objetoConexao -> consulta ($buscastatus);
			$linha = mysql_fetch_array ($busca_status);
			$status_atual = $linha['status_filme'];
		   if ($alugado == $status_atual){
			     Print "O filme está $status_atual .";
		     }else if($reservado == $status_atual){
			     print "O filme está $status_atual .";
			   }else{
		     $sql = "UPDATE filmes SET status_filme = '$reservado' WHERE id = '$identificador';";
			$atualizarSucesso = $objetoConexao->atualizar($sql);
			if ($atualizarSucesso == false){
				echo "<br><br>retornou um erro de atualizacao<br><br> " . $sql;
			} else {
				echo "<br><br>Filme reservado com sucesso.";
			}
			}
        break;
    
		   
		default:
			//no action sent
		}
	
		
		
	}
}
?>
