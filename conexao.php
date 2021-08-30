<?php
  try {
    $usuario = "root";
    $senha = "";

    $conn = new PDO('mysql:host=localhost;dbname=projeto', $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $c) {
    echo 'Ocorreu uma erro e a conexão não foi efetuada ' . $c->getMessage();
  }
?>
