<?php

	include_once "../model/dao_cliente.php";
	include_once "../view/pages/cliente.php";
	/*function __autoload($ClassName){
		include_once '../model/'.$ClassName.'.php';

	}*/

	if (isset($_POST['inserirCliente'])) {
		$nome=$_POST['nome'];
		$cliente=new Cliente();
		$cliente->setNome($nome);
		$cliente->Insert();
		header("Location:../view/template.php?opcion=2");
		# code...
	}
	if (isset($_POST['Editar'])) {
			$desabilitar="";
			$esconder="hidden";
			
			$id=$_POST['codigo'];
			$nome=$_POST['nome'];			
			
			
			$cliente->setNome($nome);
			$cliente->Update($id);
			header("Location:../view/template.php?opcion=2");
			
	}
