<?php
require_once'crud.php';
class Produto extends crud{
	private $idProduto;
	private $nome;
	protected $tabela="produto";

	public function getNome(){
		return $this->nome;
	}
	public function setNome($valor){
		$this->nome=$valor;
	}
	public function getIdProduto(){
		return $this->idProduto;
	}
	public function setIdProduto($valor){
		$this->idProduto=$valor;
	}

	public function Insert(){
		$sql="INSERT INTO $this->tabela(nome) VALUES(?)";
		$stmt=Conexao::prepare($sql);
		$stmt->bindParam(1,$this->nome);

		return $stmt->execute();
	}
	public function Update($id){
		$sql="UPDATE $this->tabela set nome=? WHERE id=?";
		$stmt=Conexao::prepare($sql);
		$stmt->bindParam(1,$this->nome);
		$stmt->bindParam(2,$this->idProduto);

		return $stmt->execute();
	}
}