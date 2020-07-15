	<?php
		include_once"../model/dao_cliente.php";
		@$accao=$_GET['accao'];
		@$id=$_GET['id'];
		@$pesq=$_POST['pesquisa'];
		
		$cliente=new Cliente();

		switch ($accao) {
			case 1:
				$cliente->Delete($id);
				echo "<script>alert('Apagado com Sucesso!')</script>";
			break;
			
			default:
				# code...
				break;
		}
	?>
	



		<div class="page-header"><h2>Clientes Cadastrados</h2></div>
		<form action="template.php?opcion=5" method="POST" class="form-inline">
			<div class="form-group">
				<input type="source" name="pesquisa" class="form-control" placeholder="Insira o nome do cliente para pesquisar">
			</div>
			
			 <div class="form-group">
			 	<input type="submit" name="enviar" value="Pesquisar" class="btn btn-search">
			 </div>
		</form>


		<?php if(isset($_POST['enviar'])){
			
			if($_POST['enviar']=="Pesquisar"){?>
				<table class="table table-borderless">
					<thead>
						<tr>
							<th>Identificação do Cliente</th>
							<th>Nome do Cliente</th>
							<th colspan="2" class="center">Opções de Acções</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($cliente->FindAllByName($pesq) as $cliente) {
							
						 ?>
						<tr>
							<td><?php echo $cliente->id; ?></td>
							<td><?php echo $cliente->nome; ?></td>
							<td>
						<a href="?opcion=2&accao=2&id=<?php echo $cliente->id;?>" class="btn btn-warning">Editar
							<span class="glyphicon glyphicon-edit"></span>
						</a>
					</td>
					<td>
						<a href="?opcion=5&accao=1&id=<?php echo $cliente->id;?>" class="btn btn-danger"  onclick=" return confirm('Dejesa realmente apagar este registo?')">Apagar
							<span class="glyphicon glyphicon-trash"></span>
						</a>
					</td>

						</tr>
					<?php }?>
					</tbody>
				</table>


		<?php }}else{?>

		
		<table class="table table-borderless">
			<thead>
				<tr>
					<th>Identificação do Cliente</th>
					<th>Nome do Cliente</th>
					<th colspan="2" class="center">Opções de Acções</th>
				</tr>
			</thead>
			
			<tbody>
				
				<tr>
					<?php
					
					foreach ($cliente->FindAll() as $nom) {
						# code...
					?>
					<td><?php echo $nom->id;#Este id  tem de ser escrito como está no banco de dados?></td>
					<td><?php echo $nom->nome;#Este nome tem de ser escrito como no banco de dados?></td>
					<td>
						<a href="?opcion=2&accao=2&id=<?php echo $nom->id;?>" class="btn btn-warning">Editar
							<span class="glyphicon glyphicon-edit"></span>
						</a>
					</td>
					<td>
						<a href="?opcion=5&accao=1&id=<?php echo $nom->id;?>" class="btn btn-danger"  onclick=" return confirm('Dejesa realmente apagar este registo?')">Apagar
							<span class="glyphicon glyphicon-trash"></span>
						</a>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	<?php }?>
	<!--</section>-->
	