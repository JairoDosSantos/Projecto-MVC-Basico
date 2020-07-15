

<?php
	require_once "crud.php";
class Cliente extends crud{

		protected $tabela="cliente";

		private $idCliente;
		private $nome;

		

		function getNome(){
			return $this->nome;
		}
		function setNome($valor){
			$this->nome=$valor;
		}
		function getIdCliente(){
			return $this->idCliente;
		}
		function setIdCliente($valor){
			$this->idCliente=$valor;
		}
		function Insert(){
			$sql="INSERT INTO $this->tabela(nome) VALUES(?)";
			$stmt=Conexao::prepare($sql);
			$stmt->bindParam(1,$this->nome);
			return $stmt->execute();
		}
		function Update($id){
			$sql="UPDATE $this->tabela set nome=? WHERE id=?";
			$stmt=Conexao::prepare($sql);
			$stmt->bindParam(1,$this->nome);
			$stmt->bindParam(2,$id);
			return $stmt->execute();
			
		}
		
		
		
	}
	//$cliente=new Cliente();
	//echo $cliente->Quantidade();
	//var_dump($cliente->TodosClientes());
	
?>