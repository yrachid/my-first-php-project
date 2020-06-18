<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edicao</title>
</head>
<body>
<p>
<?php

 $temosid = false;
 if (array_key_exists("id" , $_GET) ) {
     if($_GET['id']> 0){
	     $temosid = true;
     }
  }
     if($temosid == true ){
         

 require 'class_conexao2.php';

 $objetoConexao = new conexao();

 $objetoConexao->defineServidor("database");
 $objetoConexao->defineUsuario("novousuario");
 $objetoConexao->defineSenha("qi");

 $objetoConexao->abrirConexao();

     if ($objetoConexao->estaConectado() == false){
	     echo "Não foi possível estabelecer uma conexão";
     } else {
	     
	     $objetoConexao->defineNomedobanco("locadora");
	     $objetoConexao->selecionaBanco();
	     if ($objetoConexao->estaComBancoSelecionado()==false) {
		     echo "Não foi possível estabelecer uma conexão";
	      } else {
	    
		      $idGet = $_GET['id'];
		      $sql = "select * from filmes where id=$idGet";
		
            }
	  	 
		 $resultado = $objetoConexao->consulta($sql);
		   if ($resultado == false){
			     echo "nenhum resultado valido!";
		   } else {
			     $linha = mysql_fetch_array($resultado);
		     }
	   }  



?>


<form id="form1" name="form1" method="post" action="processa_edicao_locadora.php">
  <p>&nbsp;</p>
  <p align="center"><strong>Alugar/Reservar</strong></p>
  <table width="306" border="1" align="center">
  <tr>
      <th width="120" align="center" scope="col"><strong>Código do filme</strong></th>
      <th width="170" scope="col"><label>
        <div align="center">
          <input name="id" type="text"  id="id" value="<?php echo $linha['id'];?>" readonly="true" />
        </div>
      </label></th>
    </tr>
    <tr> 
      <td align="center"><strong>Nome</strong></td>
      <td><label>
        <div align="center">
          <input name="nome" type="text" disabled="disabled" id="nome" value="<?php echo $linha['nome']?>" readonly="true"/>
          </div>
      </label></td>
    </tr>
    <tr>
      <td align="center"><strong>Valor</strong></td>
      <td><label>
        <div align="center">
          <input name="valor" type="text" disabled="disabled" id="valor" value="<?php echo $linha['valor']?>" readonly="true"/>
          </div>
      </label></td>
    </tr>
    <tr>
      <td align="center"><strong>Status</strong></td>
      <td><label>
        <div align="center">
          <input name="status_filme" type="text" disabled="disabled" id="status_filme" value="<?php echo $linha['status_filme']?>" readonly="true" />
          </div>
      </label></td>
    </tr>
	<tr>
      <td align="center"><strong>Genero</strong></td>
      <td><label>
        <div align="center">
          <input name="genero" type="text" disabled="disabled" id="genero" value="<?php echo $linha['genero']?>" readonly="true" />
          </div>
      </label></td>
    </tr>
	<tr>
      <td align="center"><strong>Ano</strong></td>
      <td><label>
        <div align="center">
          <input name="ano_lancamento" type="text" disabled="disabled" id="ano_lancamento" value="<?php echo $linha['ano_lancamento']?>" readonly="true" />
          </div>
      </label></td>
    </tr>
	<tr>
      <td align="center"><strong>Duracao</strong></td>
      <td><label>
        <div align="center">
          <input name="duracao" type="text" disabled="disabled" id="duracao" value="<?php echo $linha['duracao']?>" readonly="true" />
          </div>
      </label></td>
    </tr>
	<td align="center"><strong>Nacionalidade</strong></td>
      <td><label>
        <div align="center">
          <input name="nacionalidade" type="text" disabled="disabled" id="nacionalidade" value="<?php echo $linha['nacionalidade']?>" readonly="true" />
          </div>
      </label></td>
    </tr>
	<td align="center"><strong>Direcao</strong></td>
      <td><label>
        <div align="center">
          <input name="direcao" type="text" disabled="disabled" id="direcao" value="<?php echo $linha['direcao']?>" readonly="true" />
          </div>
      </label></td>
    </tr>
  </table>
  <p align="center">
    <label>
    <input type="submit" name="Alugar" id="Alugar" value="Alugar" />
    </label>
    <label></label>
    <label>
    <input type="submit" name="Reservar" id="Reservar" value="Reservar" />
    </label>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
     } else{
          print "<br><Br>Impossível trabalhar sem ID. ";   
        }	 


