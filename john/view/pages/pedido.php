<?php
	require_once'../model/dao_cliente.php';
	require_once'../model/dao_produto.php';
	require_once'../model/dao_pedido.php';

	$produto=new Produto();
	$cliente=new Cliente();
	$pedido=new Pedido();
	$valorCliente="";
	$valorProduto="";
	
	@$id=$pedido->Find($_GET['id'])->id;
	
	#echo $pedido->Find($id)->cliente_id."<br>";

	#var_dump($pedido);
	$name="enviar";
	$botao="Efectuar Pedido";
	$seleciona="Seleciona o Cliente";
	$selecionaProduto="Seleciona o Produto";


	if (isset($_GET['accao'])) {
		$accao=$_GET['accao'];
		$name="editar";
		$botao="Editar Pedido";
		
		switch ($accao) {
			case 2:
				$valorCliente=$pedido->Find($_GET['id'])->cliente_id;
				$seleciona=$cliente->Find($valorCliente)->nome;
				$valorProduto=$pedido->Find($_GET['id'])->produto_id;
				$selecionaProduto=$produto->Find($valorProduto)->nome;
				
				break;
			
			default:
				# code...
				break;
		}
		
	}

?>

<div>
	<form action="../controller/cc_pedido.php" method="POST">
		<h2 class="page-header">Pedidos</h2>
		<div class="row col-md-12">
			<div class="row form-group col-md-4">
				<label for="idP">ID do Pedido</label>
				<input type="text" name="idPedido" id="idP" class="form-control" readonly value="<?php echo @$pedido->Find($_GET['id'])->id;?>"	>
			</div>	
		</div>

		<div class="row form-group col-md-12">
			<label for="ped">Descrição do Pedido</label>
			<input name="desc" id="ped" class="form-control" 
			value="<?php echo @$descricao=$pedido->Find($_GET['id'])->descricao;?>" rows="4"></input>
		</div>

		<div class="row">

			<div class="form-group col-md-6">
				<label for="clienteD">Seleciona o Cliente</label>
				
				<select class="form-control" id="clienteD" name="clientes">
					<option selected value="<?php echo $valorCliente;?>"><?php echo $seleciona;?></option>
					<?php foreach ($cliente->FindAll() as $c) {
					# code...
				 	?>
					<option value="<?php echo $c->id;?>"><?php echo "$c->nome";?></option>
					<?php }?>
				</select>
				
			</div>

			
			<div class="form-group  col-md-6">
				<label for="produtoD">Seleciona o Produto</label>
				
				<select class="form-control"  name="produtoD" id="produtoD">
					<option value="<?php echo$valorProduto;?>"><?php echo$selecionaProduto;?></option>
					<?php foreach ($produto->FindAll() as $p) {
					# code...
					?>
					<option value="<?php echo $p->id;?>"><?php echo "$p->nome";?></option>
					<?php }?>
				</select>
			    
			
			</div>
			
		</div>
		
		<div class="row">
			<div class="form-group col-md-12">
				<button name="<?php echo $name;?>" type="submit" class="btn btn-primary">
					<?php echo $botao;?>
					<span class="glyphicon glyphicon-ok"></span>
				</button>
		<!--</div>-->
		<!--<div class="form-group col-md-12">-->
				<button class="btn btn-info" name="listar" type="submit" >Lista de Pedidos
					<span class="glyphicon glyphicon-list"></span>
				</button>
			</div>
		
		</div>

		
	</form>
</div>
	

