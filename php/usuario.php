<?php
	class Usuario{
		private $nome;
		private $email;
		private $telefone;
		private $endereco;
		private $usu;
		private $senha;
		
		function __construct($nome,$email, $telefone,$endereco,$usuario, $senha){
			$this->nome = $nome;
			$this->email = $email;
			$this->telefone = $telefone;
			$this->endereco = $endereco;
			$this->usu = $usuario;
			$this->senha = $senha;
		}
		
		public function getNome(){
			return $this->nome;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getTelefone(){
			return $this->telefone;
		}
		public function getEndereco(){
			return $this->endereco;
		}
		public function getUsuario(){
			return $this->usu;
		}
		
		public function getSenha(){
			return $this->senha;
		}

		public function setUsuario($valor){
			$this->usuario = $valor;
		}
		public function setTelefone($valor){
			$this->telefone = $valor;
		}
		public function setEndereco($valor){
			$this->endereco = $valor;
		}
		public function setEmail($valor){
			$this->email = $valor;
		}
		public function setSenha($valor){
			$this->senha = $valor;
		}
		public function setNome($valor){
			$this->nome = $valor;
		}
		
	}
?>