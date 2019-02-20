<?php
include "funcao.php";

if(isset($_POST['nome']))
{
	$dados = array($_POST['nome'], $_POST['telefone'], $_POST['endereco'], $_POST['bairro'], $_POST['mensagem']);
    if(sendMail($_POST['email'],'rafaeleduardowork@gmail.com', $dados, 'Formulário de cadastro Instar'))
    {
        echo "Sua mensagem foi enviada com sucesso!";
    }
    else
    {
        echo "Ocorreu um erro ao enviar";
    }
    echo "<br><a href='index.php'>Voltar</a>";
	
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Instar</title>
	<meta charset=UTF-8 />
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
	<h2>Cadastro - Instar</a></h2>
	
    <form method="post" id="formulario_contato" onsubmit="validaForm(); return false;" class="form">
		<p class="nome">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Seu Nome" />
		</p>
		
		<p class="email">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" placeholder="mail@exemplo.com.br" />
		</p>		
		
		<p class="telefone">
		 <label for="telefone">Telefone</label>
         <input type="tel" id="telefone" name="telefone" placeholder="Telefone para contato">
		</p>
		
		<p class="endereco">
		 <label for="endereco">Localidade</label>
         <input type="text" id="endereco" name="endereco" placeholder="Rua e numero">
		</p>
		
		<p class="bairro">
		 <label for="bairro">Bairro</label>
         <input type="text" id="bairro" name="bairro" placeholder="Nome do bairro">
		</p>
	
		<p class="text">
            <label for="mensagem">Mensagem</label>
            <textarea name="mensagem" id="mensagem" placeholder="Escreva sua mensagem" /></textarea>
		</p>
		
		<p class="submit">
            <input type="submit" id="submit" name="submit" value="Enviar" />
		</p>
	</form>
    <script type="text/javascript">
        function validaForm()
        {
            erro = false;
            if($('#nome').val() == '')
            {
                alert('Você precisa preencher o campo Nome');erro = true;
            }
            if($('#email').val() == '' && !erro)
            {
                alert('Você precisa preencher o campo E-mail');erro = true;
            }
			if($('#telefone').val() == '')
            {
                alert('Você precisa preencher o campo Telefone');erro = true;
            }
			if($('#endereco').val() == '')
            {
				alert('Você precisa preencher o campo Localidade');erro = true;
            }
			if($('#bairro').val() == '')
            {
                alert('Você precisa preencher o campo Bairro');erro = true;
            }
            if($('#mensagem').val() == '' && !erro)
            {
                alert('Você precisa preencher o campo Mensagem');erro = true;
            }
            
            //se nao tiver erros
            if(!erro)
            {
                $('#formulario_contato').submit();
            }
        }
    </script>
</body>
</html>