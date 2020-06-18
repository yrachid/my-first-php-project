<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Filmes</title>
</head>

<?php

require 'class_conexao2.php';

$temosresultados = false;
$objetoConexao = new conexao();

$objetoConexao->defineServidor("database");
$objetoConexao->defineUsuario("novousuario");
$objetoConexao->defineSenha("qi");

$objetoConexao->abrirConexao();

if ($objetoConexao->estaConectado() == false){
	echo "<br>Não foi possível estabelecer uma conexão";
} else {
	
	$objetoConexao->defineNomedobanco("locadora");
	$objetoConexao->selecionaBanco();
	if ($objetoConexao->estaComBancoSelecionado()==false) {
		echo "<br>Não foi possível estabelecer uma conexão";
	} else {
		$sql = "select * from filmes";
		$resultado = $objetoConexao->consulta($sql);
		if ($resultado == false){
			echo "<br>Nenhum resultado valido!";
		} else {
			$temosresultados = true;
			
		}
	}
}



?>

<body>
<p></p>
<p align="center">Tabela de filmes </p>
<table width="306" border="1" align="center">
  <tr>
    <th width="78" scope="col">Nº</th>
    <th width="78" scope="col">Nome</th>
    <th width="70" scope="col">Valor</th>
    <th width="99" scope="col">Status</th>
	<th width="99" scope="col">Genero</th>
	<th width="99" scope="col">Ano</th>
	<th width="99" scope="col">Duracao</th>
	<th width="99" scope="col">Nacionalidade</th>
	<th width="99" scope="col">Direcao</th>
	
  </tr>
<?php
if ($temosresultados == true){
	while ($linha = mysql_fetch_array($resultado)){
		echo "<tr>";

		echo "<td>";
	
			echo "<a href='"; 
			echo "http://localhost/edicao_locadora.php?id=";
			echo $linha['id'];
			echo "'>";
			echo $linha['id']; echo "</a>";
			
		echo "</td>";
		
		echo "<td>"; echo $linha['nome']; echo "</td>";
		echo "<td>"; echo $linha['valor']; echo "</td>";
		echo "<td>"; echo $linha['status_filme']; echo "</td>";
		echo "<td>"; echo $linha['genero']; echo "</td>";
		echo "<td>"; echo $linha['ano_lancamento']; echo "</td>";
		echo "<td>"; echo $linha['duracao']; echo "</td>";
		echo "<td>"; echo $linha['nacionalidade']; echo "</td>";
		echo "<td>"; echo $linha['direcao']; echo "</td>";
		echo "</tr>";
	}
} else {

echo "<tr>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "</tr>";

}

?>
 
</table>
<p align="center">&nbsp;</p>
</body>
</html>
