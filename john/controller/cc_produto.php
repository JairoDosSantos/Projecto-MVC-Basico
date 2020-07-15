<?php
require_once'../model/dao_produto.php';
require_once'../view/pages/listaProduto.php';

if (isset($_POST['guardar'])) {

	$produto->setNome($_POST['nome']);
	$produto->Insert();
	header("Location:../view/template.php?opcion=6");
	# code...
}
if (isset($_POST['editar'])) {

	$produto->setNome($_POST['nome']);
	$produto->setIdProduto($_POST['id']);
	#var_dump($produto);
	$produto->Update($_POST['id']);
	
	echo "<script type='text/javascript'>alert('Actualizado com sucesso!');</script>";
	header("Location:../view/template.php?opcion=6");
}