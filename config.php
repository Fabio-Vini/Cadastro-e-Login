<?php

$user = 'root';
$senha = '';
$banco = 'cadastro';
$server = 'localhost';

$con = new mysqli ($server, $user, $senha, $banco);

	//SABER SE A CONEXAO DEU CERTO
	
	// if($con -> connect_errno)
	// {
	// 	echo "Erro";
	// }
	// else
	// {
	// 	echo "Sucesso";
	// }

?>

