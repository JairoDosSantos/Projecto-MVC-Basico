<?php

require_once'dao_cliente.php';
require_once'dao_produto.php';

class Pedido extends crud{
	protected $tabela="pedido";

	private $descricao;
	private $idPedido;
	private $cliente;
	private $produto;



	public function getProduto(){
		return $this->produto;
	}
	public function setProduto($valor){
		$this->produto=$valor;
	}
	public function getDescricao(){
		return $this->descricao;
	}
	public function setDescricao($valor){
		$this->descricao=$valor;
	}
	public function getId(){
		return $this->idPedido;
	}
	public function setId($valor){
		$this->idPedido=$valor;
	}
	public function getCliente(){
		return $this->cliente;
	}
	public function setCliente($valor){
		$this->cliente=$valor;
	}

	public function Insert(){
		$sql="INSERT INTO $this->tabela(descricao, cliente_id, produto_id) VALUES(?,?,?)";
		$stmt=Conexao::prepare($sql);
		$stmt->bindParam(1,$this->descricao);
		$stmt->bindParam(2,$this->cliente);
		$stmt->bindParam(3,$this->produto);

		return $stmt->execute();
	}
	public function Update($id){
		$sql="UPDATE $this->tabela set descricao=?, cliente_id=?, produto_id=? WHERE id=?";
		$stmt=Conexao::prepare($sql);
		$stmt->bindParam(1,$this->descricao);
		$stmt->bindParam(2,$this->cliente);
		$stmt->bindParam(3,$this->produto);
		$stmt->bindParam(4,$id);

		return $stmt->execute();
	}
}