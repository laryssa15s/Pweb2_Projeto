<?php
    include('conexao.php');
    include('veterinario.php');
    
    if(empty($_POST['usuario']) || empty($_POST['senha'])){
        header('Location: loginVeterinario.html');
        exit();
    }

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT `usuario`, `senha` FROM `veterinario` WHERE `usuario` = :usuario and `senha` = :senha");

    $stmt->bindparam(":usuario", $usuario);
    $stmt->bindValue(":senha", md5($senha));
    $stmt->execute();

    if($stmt->rowCount() == 0){
        echo "Dados incorretos.";
        ?>
            <button><a href="loginVeterinario.html">Voltar</a></button>
        <?php
    }else{
        header("Location: principalVeterinario.html");
    }
?>