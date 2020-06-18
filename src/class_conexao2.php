<?php
class conexao{
	private $servidor;
	private $usuario;
	private $senha;
	private $nomedobanco;
	private $conexao;
	private $bancoselecionado;

	function defineServidor($entrada){
		$this->servidor = $entrada;
	}
	function defineUsuario($entrada){
		$this->usuario = $entrada;
	}
	function defineSenha($entrada){
		$this->senha = $entrada;
	}
	function defineNomedobanco($entrada){
		$this->nomedobanco = $entrada;
	}
	function abrirConexao(){
		$this->conexao = mysql_pconnect($this->servidor,$this->usuario,$this->senha);
	}
	function fecharConexao(){
		mysql_close($this->conexao);
	}
	function selecionaBanco(){
		$this->bancoselecionado = mysql_select_db($this->nomedobanco,$this->conexao);
	}
	function consulta($entrada){
		return mysql_query($entrada, $this->conexao);
	}
	function atualizar($entrada){
		return mysql_query($entrada,$this->conexao);
	}
	function inserir($entrada){
		return mysql_query($entrada,$this->conexao);
	}
	function deletar($entrada){
		return mysql_query($entrada,$this->conexao);
	}
	function estaConectado(){
		if ($this->conexao==false){
			return false;
		} else {
			return true;
		}
	}
	function estaComBancoSelecionado(){
		return $this->bancoselecionado;
	}
}
?>