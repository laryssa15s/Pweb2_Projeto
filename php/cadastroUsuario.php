<?php
    include('./conexao.php');
    include('./usuario.php');
    
    if(empty($_POST['nome'])|| empty($_POST['email']) || empty($_POST['telefone']) || empty($_POST['endereco']) || empty($_POST['usuario'])  || empty($_POST['senha'])){
        header('Location: ../html/cadastroUsuario.html');
        exit();
    }

    $senha = md5($_POST["senha"]);
  	$usu = new Usuario($_POST['nome'],$_POST["email"], $_POST["telefone"], $_POST["endereco"],$_POST["usuario"], $senha);
    
    $nome = $usu->getNome();
    $email = $usu->getEmail();
    $telefone = $usu->getTelefone();
    $endereco = $usu->getEndereco();
    $usuario = $usu->getUsuario();
    $senha = $usu->getSenha();
    $i = 0;

    $stmt = $conn->prepare("INSERT INTO `usuario`(`nome`, `email`, `telefone`, `endereco`,`usuario`,  `senha`) 
    VALUES (:nome,:email,:telefone, :endereco, :usuario, :senha)");

    $fetch = "SELECT `nome`, `usuario` FROM `usuario`";
    $resultado = $conn->query($fetch);

    while($row = $resultado->fetch()) {
        if($row['usuario'] == $usu || $row['email'] == $email){
            $i++;
        }
    }

    if($i>0){
        echo "E-mail ou Usuário já existem.";
    }else{
        $stmt->execute(array(':nome' => $nome,':email' => $email, ':telefone' => $telefone,':endereco' => $endereco,':usuario' => $usuario,  ':senha'=> $senha));

        echo "Cadastro efetuado!";
        header("Location: ../html/loginUsuario.html");
    }
?>