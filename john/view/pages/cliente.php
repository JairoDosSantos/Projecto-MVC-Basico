<?php 
	require_once'../model/dao_cliente.php';
	$desabilitar="readonly";
	$cliente =new Cliente();
	$botaoLabel="Inserir Cliente";
	$botaoName="inserirCliente";
	$acion="../controller/cc_cliente.php";
	
	
	if (isset($_GET['accao'])) {
		$desabilitar="";
		$esconder="hidden";
		$accao=$_GET['accao'];
		$id=$_GET['id'];
		$nome=$cliente->Find($id)->nome;
		$botaoLabel="Editar";
		$botaoName="Editar";
		#$acion="./template.php?opcion=2";
		
	}
	
?>







<section class="container">
	<section class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="page-header" align="center">
				<H2>Cadastro de Cliente</H2>
			</div>
			<form action="<?php echo $acion;?>" method="POST">
				<div class="form-group">
					<label for="cod" class="<?php echo $esconder;?>">ID do Cliente</label>
					<input type="text" name="codigo" id="cod" class="form-control <?php echo $esconder;?>" value="<?php echo @$id;?>
					" <?php echo $desabilitar;?>>
				</div>
				<div class="form-group">
					<label for="nome">Nome do Cliente</label>
					<input type="text" name="nome" id="nome" class="form-control"value="<?php echo @$nome;?>">
				</div>
				<!--<div class="form-group col-md-8 col-xs-6">-->
					<button type="submit" name="<?php echo $botaoName;?>" class="btn btn-primary">		
						<?php echo $botaoLabel;?>
						<span class="glyphicon glyphicon-ok"></span>
					</button>
				<!--</div>-->
				
				<!--<div class="form-group col-md-6 col-xs-6">-->
					<a href="?opcion=5" type="submit" name="listar" class="btn btn-info">Lista de Cliente 
						<span class="glyphicon glyphicon-list-alt"></span>
					</a> 
			<!--	</div>-->
			</form>
		</div>
		<div class="col-md-3"></div>
	</section>	
</section>