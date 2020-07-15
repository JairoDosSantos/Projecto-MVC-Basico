<?php 
require_once'../model/dao_produto.php';
#carregar a classe do dmpdf
//require_once'./dompdf/dompdf_config.inc.php';
#instanciar a classe dompdf
//$dompdf=new DOMPDF();
$produto=new Produto();
$name="guardar";
$botao="Guardar";
@$id=$produto->Find($_GET['id'])->id;
if (isset($_GET['accao'])) {

	$accao=$_GET['accao'];
	switch ($accao) {
		case 1:
			$produto->Delete($_GET['id']);
			?> <script type="text/javascript">alert("Deletado com sucesso!");</script><?php
			break;
		case 2:
			$name="editar";
			$botao="Editar";
			$id=$produto->Find($_GET['id'])->id;
			$nomeP=$produto->Find($_GET['id'])->nome;
			$produto->setNome($nomeP);

			break;
		
		default:
			echo "Faço como?";
			break;
	}
}

	
?>

		<div class="container">
		
			<h2 class="page-header">Cadastro de Produto</h2>
				
				<form action="../controller/cc_produto.php" method="Post">
					<div class="row">
						<div class="col-md-8">
							<div>
								<input type="text" name="id" value="<?php echo @$_GET['id'];?>" class="hidden" readonly >
							</div>	
							<div class="form-group col-md-6">
								<input type="search" name="nome"  placeholder="Produto: Insira Aqui o nome do Produto" class="form-control" value="<?php echo $produto->getNome();?>">
							</div>
							<button type="submit" class="btn btn-primary" name="<?php echo $name?>"><?php  echo "$botao";?>
							</button>
							
						</div>
					</div>		
				</form>
				
			
			<table class="table table-borderless">
				<thead>
					<tr>
						<th>Código do Produto</th>
						<th>Nome do Produto</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($produto->FindAll() as $p) {
							# code...
						
					?>
					<tr>
						<td><?php echo "$p->id";?></td>
						<td><?php echo "$p->nome";?></td>
						<td>
							<a href="?opcion=6&accao=1&id=<?php echo $p->id;?>" onclick="return confirm ('deseja realmente apagar?')"><span class="glyphicon glyphicon-trash"></span></a>
							<a href="?opcion=6&accao=2&id=<?php echo $p->id;?>"><span class="glyphicon glyphicon-edit"></span></a>
						</td>
					</tr>
				<?php }
				?>
				</tbody>
				
			</table>
		</div>