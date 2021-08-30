<?php
    include('conexao.php');
    include('veterinario.php');
    
    if(empty($_POST['nome'])|| empty($_POST['email']) || empty($_POST['cpf']) || empty($_POST['telefone']) || empty($_POST['endereco']) || empty($_POST['usuario'])  || empty($_POST['senha'])){
        header('Location: cadastroVeterinario.html');
        exit();
    }

    $senha = md5($_POST["senha"]);
  	$vete = new Veterinario($_POST['nome'],$_POST["email"], $_POST["cpf"], $_POST["telefone"], $_POST["endereco"],$_POST["usuario"], $senha);
  
    $nome = $vete->getNome();
    $email = $vete->getEmail();
    $cpf = $vete->getCpf();
    $telefone = $vete->getTelefone();
    $endereco = $vete->getEndereco();
    $usuario = $vete->getUsuario();
    $senha = $vete->getSenha();
    $i = 0;

    $stmt = $conn->prepare("INSERT INTO `veterinario`(`nome`, `email`,`cpf`, `telefone`, `endereco`,`usuario`,  `senha`) 
    VALUES (:nome,:email,:cpf,:telefone, :endereco, :usuario, :senha)");

    $fetch = "SELECT `nome`, `usuario` FROM `veterinario`";
    $resultado = $conn->query($fetch);

    while($row = $resultado->fetch()) {
        if($row['usuario'] == $vete || $row['email'] == $email){
            $i++;
        }
    }

    if($i>0){
        echo "E-mail ou Usuário já existem.";
    }else{
        $stmt->execute(array(':nome' => $nome,':email' => $email ,':cpf' => $cpf, ':telefone' => $telefone,':endereco' => $endereco,':usuario' => $usuario,  ':senha'=> $senha));

        echo "Cadastro efetuado!";
        header("Location: loginVeterinario.html");
    }
?>