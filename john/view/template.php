<!DOCTYPE html>
<html lang="PT">
<head>
	<title>Sistema de Gestão de Pedido</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">
	
</head>
<body>
	<?php
		$opcao=$_GET['opcion'];

		#echo $opcao;
			switch ($opcao) {
				case 1:
					$pagina='pages/home.php';
					$Home="active";
					break;
				
				case 2:
					$pagina='pages/cliente.php';
					$client="active";
					# code...
					break;
				case 3:
					$pagina='pages/pedido.php';
					$pedid="active";
					 break;
				case 4:
					 $pagina='pages/pedidocliente.php';
					 $pc="active";
					 # code...
					 break;
				case 5:
					$pagina='pages/listaCliente.php';
					break;
				case 6:
					$pagina='pages/listaProduto.php';
					$produto="active";
					break;		 
				default:
					$pagina='pages/error.php';
			}

	
	?>
	<header>
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a href="#" class="navbar-brand text-white">Gestão de Pedidos</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
							<span class="sr-only ">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
					</button>
					
				</div>


				<div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right" >
						<li class="<?php echo $Home?>"><a href="?opcion=1" class="text-white">Home</a></li>
						<li class="<?php echo $client?>"><a href="?opcion=2">Cliente</a> </li>
						<li class="<?php echo $pedid?>"><a href="?opcion=3">Pedidos</a> </li>
						<li class="<?php echo $pc?>"><a href="?opcion=4">Pedido dos Clientes</a></li>
						<li class="<?php echo $produto?>"><a href="?opcion=6">Cadastrar Produto</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<section class="container">
		<?php
			include	($pagina);
		?>
	</section>
	



	<footer>
		<!--<h2>Rodapé!</h2>-->
	</footer>
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/scripts.js"></script>
</body>
</html>