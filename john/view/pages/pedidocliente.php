<?php
	require_once'../model/dao_pedido.php';
	require_once'../model/dao_produto.php';
	require_once'../model/dao_cliente.php';

	$cliente=new Cliente();
	$produto=new Produto();
	$pedido=new Pedido();

	if (isset($_GET['accao'])) {
		$accao=$_GET['accao'];
		switch ($accao) {
			case 1:
				$pedido->Delete($_GET['id']);
				?><script>alert("Apagado com Sucesso!")</script><?php
				break;
						
			default:
				?><script>alert("Opção não existe!")</script><?php
				break;
		}
		# code...
	}
?>


<div class="container">
	<h2 class="page-header">Pedido dos Clientes</h2>

	<form action="template.php?opcion=4" method="POST">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<input type="search" name="pesquisa" placeholder="Pesquisa: Insira aquí o pedido" class="form-control">
				</div>
			</div>	
			<button type="submit" class="btn btn-source" ><span class="glyphicon glyphicon-source"></span>Pesquisa</button>
						
		</div>

	</form>

	<?php if (isset($_POST['pesquisa'])) {
	?>
	<table class="table table-borderless">
		<thead>
			<tr>
				<th>ID do Pedido</th>
				<th>Descrição do Pedido</th>
				<th>Cliente</th>
				<th>Produto</th>
			</tr>
		</thead>
		<tbody>
			<?php #foreach ($pedido->FindAllByName() as $key => $value) {
				# code...
			 ?>
			<tr>
				<td></td>
			</tr>
		</tbody>
		
	</table>


	<?php } else{?>



	<table class="table table-stripped">
		<thead>
			<tr>
				<th>ID do Pedido</th>
				<th>Descrição do Pedido</th>
				<th>Cliente</th>
				<th>Produto</th>
				
			</tr>
		</thead>
		<?php foreach ($pedido->FindAll() as $pe) {
				
			 ?>
		<tbody>
			
			<tr>
				<td><?php echo "$pe->id";?></td>
				<td><?php echo "$pe->descricao";?></td>
				<td><?php $c=$cliente->Find($pe->cliente_id); echo "$c->nome";?></td>
				<td><?php $p=$produto->Find($pe->produto_id); echo "$p->nome";?></td>
				<td><a href="?opcion=4&accao=1&id=<?php echo $pe->id;?>" onclick="return confirm('Deseja Realmente Apagar este Registro?')"><span class="glyphicon glyphicon-trash"></span></a></td>
				<td><a href="?opcion=3&accao=2&id=<?php echo $pe->id;?>" ><span class="glyphicon glyphicon-edit"></span></a></td>
			</tr>
		
		</tbody>
		<?php }?>
	</table>
<?php } ?>
</div>