<?php
    include 'conexao.php';

    $pedido = $_POST['data'];
    $dados = json_decode($pedido, true);
    
    $produto = $dados['produto'];
    $preco = $dados['preco'];

    $sql = $conn->query("INSERT INTO pedidos (produto, preco) VALUES ('$produto', '$preco')");
  
?>