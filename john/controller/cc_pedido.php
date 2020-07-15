<?php


require_once'../model/dao_pedido.php';
require_once'../view/pages/pedido.php';

if (isset($_POST['enviar'])) {
	$pedido=new Pedido();
	$pedido->setDescricao($_POST['desc']);
	$pedido->setId($_POST['idPedido']);
	$pedido->setProduto($_POST['produtoD']);
	$pedido->setCliente($_POST['clientes']);
	$pedido->Insert();
	header("Location:../view/template.php?opcion=4");
	# code...
}
elseif (isset($_POST['listar'])) {
	header("Location:../view/template.php?opcion=4");
	# code...
}
elseif (isset($_POST['editar'])) {

	$pedido=new Pedido();
	$pedido->setDescricao($_POST['desc']);
	$pedido->setId($_POST['idPedido']);
	$pedido->setProduto($_POST['produtoD']);
	$pedido->setCliente($_POST['clientes']);
	$pedido->Update($pedido->getId());
	?><script type="text/javascript">alert("Actualizado com Sucesso!");</script><?php
	


	header("Location:../view/template.php?opcion=4");
	
	
}