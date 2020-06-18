<?php
require 'class_conexao2.php';

$objeto_cadastro = new conexao();

$objeto_cadastro -> defineServidor ("database");
$objeto_cadastro -> defineUsuario ("novousuario");
$objeto_cadastro -> defineSenha ("qi");

$objeto_cadastro -> abrirConexao ();

  if ($objeto_cadastro -> estaConectado() == false){
         print "Impossível realizar conexão.";
   }else{
     $objeto_cadastro -> defineNomedobanco ("locadora");
     $objeto_cadastro -> selecionaBanco();
	 
     if ($objeto_cadastro -> estaComBancoSelecionado() == false){
	     print "Impossível realizar conexão.";
	 }
	 
	 else{
	     $nome = $_POST['nome']; 
		 $rg = $_POST['rg'];     
		 $email = $_POST['email'];
		 $telefone = $_POST['telefone'];
		 $endereco = $_POST['endereco'];
		 $cpf = $_POST['cpf'];
		 $login = $_POST['login'];
		 $senha = $_POST['senha'];
		 
		 $sql_email = "SELECT email FROM clientes WHERE email = '".$email."'";
		 $busca_email = $objeto_cadastro -> consulta ($sql_email);
		 $acha_email = mysql_num_rows ($busca_email);
		 
		 $sql_login = "SELECT login FROM clientes WHERE login = '".$login."'";
		 $busca_login = $objeto_cadastro -> consulta ($sql_login);
		 $acha_login = mysql_num_rows($busca_login);
		 
		 $sql_cpf = "SELECT cpf FROM clientes WHERE cpf = '".$cpf."'";
		 $busca_cpf = $objeto_cadastro -> consulta ($sql_cpf);
		 $acha_cpf = mysql_num_rows ($busca_cpf);
		 
		 $sql_rg = "SELECT rg FROM clientes WHERE rg = '".$rg."'";
		 $busca_rg = $objeto_cadastro -> consulta ($sql_rg);
		 $acha_rg = mysql_num_rows ($busca_rg);
		 
		 $cadastro_correto = 0;
		 
		 $nome = trim ($nome);
		 $rg = trim ($rg);
		 $email = trim ($email);
		 $telefone = trim ($telefone);
		 $endereco = trim ($endereco);
		 $cpf = trim ($cpf);
		 $login = trim ($login);
		 $senha = trim ($senha);
		 
		 $valida_email = '/^([-a-zA-Z_0-9])+@([a-zA-Z0-9])+(.[a-zA-Z0-9]+)+/';
		 $valida_nome = '^[a-z]{5,20}^';
		 $valida_login = '^[a-z0-9]{5,20}^';
		 
		    if (preg_match($valida_nome,$nome)==false){
			     print "<br><br>Nome inválido.";
			     $cadastro_correto = $cadastro_correto - 1;
			}else{
		         print "<br><br>Nome : $nome";
		         $cadastro_correto = $cadastro_correto +1;
		    }
		   
		    if(ctype_digit($cpf)== false) {
                 "<br><br>CPF Inválido.";
                 $cadastro_correto = $cadastro_correto - 1;

		    }else if (strlen($cpf) < 11 || strlen ($cpf) > 11) {
		         print "<br><br>CPF Inválido.";
			     $cadastro_correto = $cadastro_correto - 1;
		    }else if ($acha_cpf > 0){
			     print "<br><br>CPF Inválido.";
			     $cadastro_correto = $cadastro_correto - 1;
			}else{
			    if( ($cpf == '11111111111') || ($cpf == '22222222222') ||($cpf == '33333333333') || ($cpf == '44444444444') || ($cpf == '55555555555') || ($cpf == '66666666666') ||($cpf == '77777777777') || ($cpf == '88888888888') ||($cpf == '99999999999') || ($cpf == '00000000000') ) {
                     $cadastro_correto = $cadastro_correto - 1; 
                     print "<br><br>CPF Inválido.";
                }else {
                    $dv_informado = substr($cpf, 9,2);
                    for($i=0; $i<=8; $i++) {
                         $digito[$i] = substr($cpf, $i,1);
                    }
				  
                     $posicao = 10;
                     $soma = 0;
			 
                    for($i=0; $i<=8; $i++) {
                         $soma = $soma + $digito[$i] * $posicao;
                         $posicao = $posicao - 1;
                    }

                     $digito[9] = $soma % 11;

                    if($digito[9] < 2) {
                         $digito[9] = 0;
                    }else {
                         $digito[9] = 11 - $digito[9];
                    }

                     $posicao = 11;
                     $soma = 0;
                    for ($i=0; $i<=9; $i++) {
                         $soma = $soma + $digito[$i] * $posicao;
                         $posicao = $posicao - 1;
                    }

                     $digito[10] = $soma % 11;

                    if ($digito[10] < 2) {
                         $digito[10] = 0; 
                    }else {
                         $digito[10] = 11 - $digito[10];
                    }

                     $dv = $digito[9] * 10 + $digito[10];

                    if ($dv != $dv_informado) {
                         print "<br><br>CPF Inválido";
                         $cadastro_correto = $cadastro_correto - 1;
                    }else{
					     print "<br><br>CPF : $cpf";
                         $cadastro_correto = $cadastro_correto + 1;
                    }
                }
			}	
				
			if(preg_match($valida_email,$email)== false){	
				 print "<br><br>E-mail inválido. ";
				 $cadastro_correto = $cadastro_correto - 1;
			}else if ($acha_email > 0 ){
				 print "<br><br>E-mail inválido,pois já está em uso.";
				 $cadastro_correto = $cadastro_correto - 1;
			}else{
			     print "<br><br>E-mail : $email";
				 $cadastro_correto = $cadastro_correto + 1;
			}
			
            if(ctype_digit($rg) == false){
                 print "<Br><br>RG inválido";
			     $cadastro_correto = $cadastro_correto - 1;
		    }else if (strlen($rg) != 10  ){
			     print "<Br><br>RG Inválido.";
		         $cadastro_correto = $cadastro_correto - 1;
		    }else if ($acha_rg > 0){
			    print "<br><br>Este RG já foi utilizado!";
				$cadastro_correto = $cadastro_correto - 1;
			}else{
			     print "<br><br>RG : $rg";
				 $cadastro_correto = $cadastro_correto + 1;
		    }
		     
			  
		  
		    if(ctype_digit($telefone)==false ){
                 print "<br><br>Telefone inválido.";
            }else if(strlen($telefone) > 10){
			     print "<br><br>Telefone inválido.";
				 $cadastro_correto = $cadastro_correto - 1;
			}else{
			     print "<br><br>Telefone : $telefone";
                 $cadastro_correto = $cadastro_correto + 1; 
            }
			
			if(preg_match($valida_login , $login)== false){
			     print "<bR><br>Login inválido";
				 $cadastro_correto = $cadastro_correto - 1;
		    
		    }else if ($acha_login > 0 ){
                 print "<br><br>Login já existente.";
				 $cadastro_correto = $cadastro_correto - 1;
			}else{
			     print "<br><br> login : $login";
				 $cadastro_correto = $cadastro_correto + 1;
			}
			
			if(strlen($senha) < 5){
			     print "<br><br>Digite ao menos 5 caractéres no campo senha";
				 $cadastro_correto = $cadastro_correto - 1;
			}else{
			     print "<br><br>Senha : $senha ";
				 $cadastro_correto = $cadastro_correto + 1;
			}
			
             if($cadastro_correto == 7){ 
                 $sql = "INSERT INTO clientes SET nome = '$nome' ,	cpf = '$cpf' , rg = '$rg' , email = '$email' , telefone = '$telefone' , endereco = '$endereco' , login = '$login' , senha = '$senha'";
				 $inserirSucesso = $objeto_cadastro -> inserir	($sql);
		         if($inserirSucesso == true){
				     print "<br><br>Cadastro feito com sucesso.";
					  ?><a href="login-cookie.html">Página de Login</a>
					 
  				     <?php
				 }
				 
				 else{
				     print "<br><br>Impossível Realizar Cadastro.";
				    }
			}		
					
        }
	}
?>
  
