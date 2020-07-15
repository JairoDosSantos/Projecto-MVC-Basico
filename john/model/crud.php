<?php

require_once'conexao.php';

abstract class crud extends Conexao{

	protected $tabela;

	abstract public function Insert();
	abstract public function Update($id);
	public function Delete($id){
		$sql="DELETE FROM $this->tabela WHERE id=:id";
		$stmt=Conexao::prepare($sql);
		$stmt->bindParam(':id',$id);
		
		return $stmt->execute();
	}
	public function Find($id){

		$sql="SELECT *FROM $this->tabela WHERE id=:id";
		$stmt=Conexao::prepare($sql);
		$stmt->bindParam(":id",$id);
		$stmt->execute();

		return $stmt->fetch();

	}

	public function FindAll(){
		$sql="SELECT *FROM $this->tabela ";
		$stmt=Conexao::prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function FindAllByName($name){
		$sql="SELECT *FROM $this->tabela WHERE nome=?";
		$stmt=Conexao::prepare($sql);
		$stmt->bindParam(1,$name);
		$stmt->execute();


		return $stmt->fetchAll();
	}


}